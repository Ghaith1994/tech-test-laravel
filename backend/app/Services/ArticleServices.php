<?php

namespace App\Services;

use App\DTOs\ArticleDTO;
use App\Models\Article;
use App\Repositories\ArticleRepositoryInterface;

class ArticleServices
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /** @return Article[] */
    public function getAll(int $limit, string $sortBy, string $dir, ?string $searchTerm): array
    {
        return $this->articleRepository->getAll($limit, $sortBy, $dir, $searchTerm);
    }

    public function create(ArticleDTO $articleDTO): Article
    {
        return $this->articleRepository->create($articleDTO);
    }

    public function find(int $id): Article
    {
        return $this->articleRepository->findById($id);
    }

    public function update(ArticleDTO $articleDTO, int $id): Article
    {
        return $this->articleRepository->update($articleDTO, $id);
    }

    public function delete(int $id): void
    {
        $this->articleRepository->delete($id);
    }
}
