<?php

declare(strict_types=1);

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$createUsersTable = '
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        password TEXT NOT NULL
    );
';

$createNewsTable = '
    CREATE TABLE IF NOT EXISTS news (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        content TEXT NOT NULL,
        author TEXT NOT NULL,
        date TEXT NOT NULL
    );
';

if (!file_exists($dbPath)) {
    touch($dbPath);
}

$pdo->exec($createUsersTable);
$pdo->exec($createNewsTable);

$verificaUsuarioPadrao = 'SELECT * FROM users WHERE email = "admin@gmail.com";';

$statement = $pdo->query($verificaUsuarioPadrao);

if ($statement->fetchAll()) {
    return;
}

$password = password_hash('123456', PASSWORD_ARGON2ID);

$inserirUsuarioPadrao = 'INSERT INTO users (name, email, password) VALUES ("Administrador", "admin@gmail.com", ?);';

$statement = $pdo->prepare($inserirUsuarioPadrao);

$statement->bindValue(1, $password);

$statement->execute();



