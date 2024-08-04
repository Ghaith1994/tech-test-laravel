<?php

namespace App\Repositories;

use App\DTOs\ArticleDTO;
use App\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    /** @return Article[] */
    public function getAll(int $limit, string $sortBy, string $dir, ?string $searchTerm): array
    {
        return Article::query()
            ->where('title', 'LIKE', "%{$searchTerm}%")
            ->orderBy($sortBy, $dir)
            ->paginate($limit)->items();
    }

    public function create(ArticleDTO $articleDTO): Article
    {
        return Article::query()->create($articleDTO->toArray());
    }

    public function findById(int $id): Article
    {
        return Article::query()->findOrFail($id);
    }

    public function update(ArticleDTO $articleDTO, int $id): Article
    {
        $article = $this->findById($id);
        $article->update($articleDTO->toArray());

        return $article;
    }

    public function delete(int $id): void
    {
        $this->findById($id)->delete();
    }
}
