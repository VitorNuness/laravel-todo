<?php

namespace App\Interfaces;

interface TodoServiceInterface
{
    public function getAllTodos();
    public function getTodoById(string $id);
    public function createTodo(array $values);
    public function updateTodo(string $id, array $values);
    public function deleteTodo(string $id);
}