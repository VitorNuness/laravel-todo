<?php

namespace App\Interfaces;

interface CategoryServiceInterface
{
    public function getAllCategories();
    public function getCategoryById(string $id);
    public function createCategory(array $values);
    public function updateCategory(string $id, array $values);
    public function deleteCategory(string $id);
}