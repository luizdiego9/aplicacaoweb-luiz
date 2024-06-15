<?php

declare(strict_types=1);

namespace Seminario\Mvc\Controller;

use Seminario\Mvc\Helper\HtmlRendererTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Seminario\Mvc\Entity\News;
use Seminario\Mvc\Repository\NewsRepository;

class NewsListController
{
    use HtmlRendererTrait;

    public function __construct(private NewsRepository $newsRepository)
    {
    }

    public function listNews(ServerRequestInterface $request) : ResponseInterface
    {
        $newsList = $this->newsRepository->all();

        return new Response(200, body: $this->renderTemplate(
            'news-list',
            ['newsList' => $newsList]
        ));
    }

    public function newsListJson() {
        $newsList = array_map(function (News $news): array {
            return [
                'title' => $news->getTitle(),
                'content' => $news->getContent(),
                'author' => $news->getAuthor(),
                'date' => $news->getDate()
            ];
        }, $this->newsRepository->all());

        return new Response(200, [
            'Content-Type' => 'application/json'
        ], json_encode($newsList));
    }
}
