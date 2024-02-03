<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById(string $id);
    public function deleteCategory(string $id);
    public function createCategory(array $values);
    public function updateCategory(string $id, array $values);
}