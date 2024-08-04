<?php

namespace App\Http\Controllers;

use App\DTOs\ArticleDTO;
use App\Http\Requests\ArticleRequest;
use App\Services\ArticleServices;
use App\Traits\QueryParamsTrait;
use App\Utils\ArrayUtil;
use App\Utils\ConvertUtil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ArticleController extends ApiController
{
    use QueryParamsTrait;

    private ArticleServices $articleServices;

    public function __construct(ArticleServices $articleServices) {
        $this->articleServices = $articleServices;
    }

    /**
     * Display a listing of the articles.
     */
    public function index(): JsonResponse
    {
        list($limit, $sortBy, $dir, $searchTerm) = $this->getDataTableParams();

        return $this->successResponse($this->articleServices->getAll($limit, $sortBy, $dir, $searchTerm));
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(ArticleRequest $request)
    {
        $attributes = $request->request->all();
        $article = $this->articleServices->create(new ArticleDTO(
            ArrayUtil::get($attributes, 'title'),
            ArrayUtil::get($attributes, 'content')
        ));

        return $this->successResponse($article);
    }

    /**
     * Display the specified article.
     */
    public function show(string $id)
    {
        try {
            return $this->successResponse($this->articleServices->find(ConvertUtil::string2int($id)));
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(404, 'Not found');
        }
    }

    /**
     * Update the specified article in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        try {
            $attributes = $request->request->all();
            $article = $this->articleServices->update(
                new ArticleDTO(
                    ArrayUtil::get($attributes, 'title'),
                    ArrayUtil::get($attributes, 'content')
                ),
                ConvertUtil::string2int($id)
            );

            return $this->successResponse($article);
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(404, 'Not found');
        }
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->articleServices->delete(ConvertUtil::string2int($id));

            return $this->successResponse([]);
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(404, 'Not found');
        }
    }
}
