<?php

namespace App\Repositories;

use App\DTOs\ArticleDTO;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    /** @return Article[] */
    public function getAll(int $limit, string $sortBy, string $dir, string $searchTerm): array;

    public function create(ArticleDTO $articleDTO): Article;

    public function findById(int $id): Article;

    public function update(ArticleDTO $articleDTO, int $id): Article ;

    public function delete(int $id): void;
}
