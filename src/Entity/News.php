<?php

declare(strict_types=1);

namespace Seminario\Mvc\Entity;
class News
{
    public readonly int $id;
    public readonly string $title;
    public readonly string $content;
    public readonly string $author;
    public readonly string $category;
    
    public readonly \DateTime $date;

    public function __construct(string $title, string $content, string $author, \DateTime $date, string $category)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = $date;
        $this->category = $category;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getDate(): string
    {
        return $this->date->format('d/m/Y H:i:s');
    }
}
