<?php

namespace App\Interfaces;

use App\DTO\Todos\CreateTodoDTO;
use App\DTO\Todos\UpdateTodoDTO;
use stdClass;

interface TodoServiceInterface
{
    public function getAllTodos();
    public function getTodoById(string $id);
    public function createTodo(CreateTodoDTO $values);
    public function updateTodo(UpdateTodoDTO $updateDTO);
    public function deleteTodo(string $id);
}