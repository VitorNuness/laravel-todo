<?php

namespace App\Interfaces;

use App\DTO\Categories\CreateCategoryDTO;
use App\DTO\Categories\UpdateCategoryDTO;

interface CategoryServiceInterface
{
    public function getAllCategories();
    public function getCategoryById(string $id);
    public function createCategory(CreateCategoryDTO $createDTO);
    public function updateCategory(UpdateCategoryDTO $updateDTO);
    public function deleteCategory(string $id);
}