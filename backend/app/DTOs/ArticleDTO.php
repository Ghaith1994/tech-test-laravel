<?php

namespace App\DTOs;

use App\Http\Requests\ArticleRequest;

class ArticleDTO
{
    private string $title;

    private string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    /** @return array<string, string> */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
