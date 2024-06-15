<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogoutController
{
    public function logout(ServerRequestInterface $request): ResponseInterface
    {
        session_destroy();
        
        return new Response(302, ['Location' => '/login']);
    }
}
