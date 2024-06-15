<?php

declare(strict_types=1);

return [
    'GET|/' => [\Seminario\Mvc\Controller\NewsListController::class, 'listNews'],

    'GET|/nova-noticia' => [\Seminario\Mvc\Controller\CreateNewsController::class, 'createNews'],
    'POST|/nova-noticia' => [\Seminario\Mvc\Controller\CreateNewsController::class, 'confirmCreation'],

    'GET|/editar-noticia' => [\Seminario\Mvc\Controller\EditNewsController::class, 'editNews'],
    'POST|/editar-noticia' => [\Seminario\Mvc\Controller\EditNewsController::class, 'confirmEdit'],

    'GET|/remover-noticia' => [\Seminario\Mvc\Controller\DeleteNewsController::class, 'delete'],
    
    'GET|/login' => [\Seminario\Mvc\Controller\LoginFormController::class, 'loginForm'],
    'GET|/create-account' => [\Seminario\Mvc\Controller\CreateAccountController::class, 'createAccount'],
    'POST|/create-account' => [\Seminario\Mvc\Controller\CreateAccountController::class, 'confirmCreation'],
    'POST|/login' => [\Seminario\Mvc\Controller\LoginController::class, 'login'],
    'GET|/logout' => [\Seminario\Mvc\Controller\LogoutController::class, 'logout'],
];

