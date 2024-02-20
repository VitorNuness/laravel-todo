<?php

namespace App\Repositories;

use App\DTO\Todos\CreateTodoDTO;
use App\DTO\Todos\UpdateTodoDTO;
use App\Interfaces\TodoRepositoryInterface;
use App\Models\Todo;
use stdClass;

class TodoRepository implements TodoRepositoryInterface
{
    public function __construct(
        protected Todo $model,
    )
    {
        //
    }
    public function getAllTodos()
    {
        return $this->model->all();
    }
    public function getTodoById(string $id)
    {
        return $this->model->findOrFail($id);
    }
    public function deleteTodo(string $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
    public function createTodo(CreateTodoDTO $values)
    {
        return $this->model->create( (array) $values);
    }
    public function updateTodo(UpdateTodoDTO $updateDTO)
    {
        $todo = $this->model->findOrFail($updateDTO->id);
        $todo->update((array) $updateDTO);
        return $todo;
    }
}