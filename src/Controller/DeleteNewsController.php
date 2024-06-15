<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Helper\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Seminario\Mvc\Repository\NewsRepository;

class DeleteNewsController 
{
    use FlashMessageTrait;

    public function __construct(private NewsRepository $newsRepository)
    {
    }

    public function delete(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            $this->addErrorMessage('ID inválido');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        $success = $this->newsRepository->remove($id);
        if ($success === false) {
            $this->addErrorMessage('Erro ao remover notícia');
            return new Response(302, [
                'Location' => '/'
            ]);
        }

        $this->addSuccessMessage('Notícia removida com sucesso');
        
        return new Response(302, [
            'Location' => '/'
        ]);
    }
}
