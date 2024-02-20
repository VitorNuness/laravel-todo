<?php

namespace App\Repositories;

use App\DTO\Categories\CreateCategoryDTO;
use App\DTO\Categories\UpdateCategoryDTO;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        protected Category $model,
    )
    {
        //
    }
    public function getAllCategories()
    {
        return $this->model->all();
    }
    public function getCategoryById(string $id)
    {
        return $this->model->findOrFail($id);
    }
    public function deleteCategory(string $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
    public function createCategory(CreateCategoryDTO $createDTO)
    {
        return $this->model->create( (array) $createDTO);
    }
    public function updateCategory(UpdateCategoryDTO $updateDTO)
    {
        $todo = $this->model->findOrFail($updateDTO->id);
        $todo->update( (array) $updateDTO);
        return $todo;
    }
}