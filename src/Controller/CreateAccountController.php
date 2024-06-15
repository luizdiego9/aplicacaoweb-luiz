<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Helper\FlashMessageTrait;
use Seminario\Mvc\Helper\HtmlRendererTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CreateAccountController
{
    use HtmlRendererTrait;
    use FlashMessageTrait;

    public function createAccount(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, body: $this->renderTemplate('create-account'));
    }

    public function confirmCreation(ServerRequestInterface $request): ResponseInterface
    {
        $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if (!$name || !$email || !$password) {
            $this->addErrorMessage('Todos os campos são obrigatórios');
            
            return new Response(302, ['Location' => '/create-account']);
        }

        $passwordHash = password_hash($password, PASSWORD_ARGON2ID);

        $dbPath = __DIR__ . '/../../banco.sqlite';
        $pdo = new \PDO("sqlite:$dbPath");

        $statement = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $email);
        $statement->bindValue(3, $passwordHash);
        $statement->execute();

        $this->addSuccessMessage('Usuário criado com sucesso, faça login para continuar.');

        return new Response(302, ['Location' => '/login']);
    }
}
