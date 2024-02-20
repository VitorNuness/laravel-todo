<?php

namespace App\Http\Controllers\Api;

use App\DTO\Categories\CreateCategoryDTO;
use App\DTO\Categories\UpdateCategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryServiceInterface $service,
    )
    {}

    public function index()
    {
        $categories = $this->service->getAllCategories();
        return CategoryResource::collection($categories);
    }

    public function store(StoreUpdateCategoryRequest $request)
    {
        $category = $this->service->createCategory(
            CreateCategoryDTO::makeFromRequest($request)
        );
        return new CategoryResource($category);
    }

    public function show(string $id)
    {
        $category = $this->service->getCategoryById($id);
        return new CategoryResource($category);
    }

    public function update(StoreUpdateCategoryRequest $request, string $id)
    {
        $category = $this->service->updateCategory(
            UpdateCategoryDTO::makeFromRequest($request, $id)
        );
        return new CategoryResource($category);
    }

    public function destroy(string $id)
    {
        $this->service->deleteCategory($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
