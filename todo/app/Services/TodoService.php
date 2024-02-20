<?php

namespace App\Services;

use App\DTO\Todos\CreateTodoDTO;
use App\DTO\Todos\UpdateTodoDTO;
use App\Interfaces\TodoRepositoryInterface;
use App\Interfaces\TodoServiceInterface;
use stdClass;

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

    public function createTodo(CreateTodoDTO $values)
    {
        return $this->repository->createTodo($values);
    }

    public function updateTodo(UpdateTodoDTO $updateDTO)
    {
        return $this->repository->updateTodo($updateDTO);
    }

    public function deleteTodo(string $id)
    {
        return $this->repository->deleteTodo($id);
    }

}