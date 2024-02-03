<?php

namespace App\Services;

use App\Interfaces\TodoRepositoryInterface;
use App\Interfaces\TodoServiceInterface;

class TodoService implements TodoServiceInterface
{
    public function __construct(
        private TodoRepositoryInterface $repository,
    )
    {
        //
    }

    public function getAllTodos()
    {
        return $this->repository->getAllTodos();
    }

    public function getTodoById(string $id)
    {
        return $this->repository->getTodoById($id);
    }

    public function createTodo(array $values)
    {
        return $this->repository->createTodo($values);
    }

    public function updateTodo(string $id, array $values)
    {
        return $this->repository->updateTodo($id, $values);
    }

    public function deleteTodo(string $id)
    {
        return $this->repository->deleteTodo($id);
    }

}