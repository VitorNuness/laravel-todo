<?php

namespace App\Services;

use App\DTO\Categories\CreateCategoryDTO;
use App\DTO\Categories\UpdateCategoryDTO;
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

    public function createCategory(CreateCategoryDTO $createDTO)
    {
        return $this->repository->createCategory($createDTO);
    }

    public function updateCategory(UpdateCategoryDTO $updateDTO)
    {
        return $this->repository->updateCategory($updateDTO);
    }

    public function deleteCategory(string $id)
    {
        return $this->repository->deleteCategory($id);
    }

}