<?php

namespace App\Repositories;

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
    public function createCategory(array $values)
    {
        return $this->model->create($values);
    }
    public function updateCategory(string $id, array $values)
    {
        $todo = $this->model->findOrFail($id);
        $todo->update($values);
        return $todo;
    }
}