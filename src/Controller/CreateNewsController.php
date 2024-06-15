<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Entity\News;
use Seminario\Mvc\Helper\FlashMessageTrait;
use Seminario\Mvc\Helper\HtmlRendererTrait;
use Seminario\Mvc\Repository\NewsRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CreateNewsController
{
    use FlashMessageTrait;
    use HtmlRendererTrait;

    public function __construct(private NewsRepository $NewsRepository)
    {
        $_SESSION['operation'] = 'create-news';
    }

    public function createNews(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, body: $this->renderTemplate('news-form'));
    }

    public function confirmCreation(ServerRequestInterface $request): ResponseInterface
    {
        $requestBody = $request->getParsedBody();
        $title = filter_var($requestBody['title']);
        if ($title === false) {
            $this->addErrorMessage('Título não informado');
            return new Response(302, [
                'Location' => '/nova-noticia'
            ]);
        }

        $content = filter_var($requestBody['content']);

        if ($content === false) {
            $this->addErrorMessage('Conteúdo não informado');
            return new Response(302, [
                'Location' => '/nova-noticia'
            ]);
        }

        $author = filter_var($requestBody['author']);

        if ($author === false) {
            $this->addErrorMessage('Autor não informado');
            return new Response(302, [
                'Location' => '/nova-noticia'
            ]);
        }
        
        $category = filter_var($requestBody['category']);

        if($category === false || empty($category)){
            $this->addErrorMessage('Categoria não informada');
            return new Response(302, [
                'location' => '/nova-noticia'
            ]);
        }

        $News = new News($title, $content, $author, new \DateTime(), $category);

        $success = $this->NewsRepository->add($News);

        if ($success === false) {
            $this->addErrorMessage('Erro ao cadastrar a notícia');
            return new Response(302, [
                'Location' => '/nova-noticia'
            ]);
        }

        $this->addSuccessMessage('Notícia cadastrada com sucesso');
        
        return new Response(302, [
            'Location' => '/'
        ]);

    }
}
