<?php

namespace App\Interfaces;

use App\DTO\Categories\CreateCategoryDTO;
use App\DTO\Categories\UpdateCategoryDTO;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById(string $id);
    public function deleteCategory(string $id);
    public function createCategory(CreateCategoryDTO $createDTO);
    public function updateCategory(UpdateCategoryDTO $updateDTO);
}