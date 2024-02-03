<?php

namespace App\Interfaces;

interface TodoRepositoryInterface
{
    public function getAllTodos();
    public function getTodoById(string $id);
    public function deleteTodo(string $id);
    public function createTodo(array $values);
    public function updateTodo(string $id, array $values);
}