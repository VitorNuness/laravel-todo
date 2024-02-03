<?php

namespace App\Services;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    public function __construct(
        private CategoryRepositoryInterface $repository,
    )
    {
        //
    }

    public function getAllCategories()
    {
        return $this->repository->getAllCategories();
    }

    public function getCategoryById(string $id)
    {
        return $this->repository->getCategoryById($id);
    }

    public function createCategory(array $values)
    {
        return $this->repository->createCategory($values);
    }

    public function updateCategory(string $id, array $values)
    {
        return $this->repository->updateCategory($id, $values);
    }

    public function deleteCategory(string $id)
    {
        return $this->repository->deleteCategory($id);
    }

}