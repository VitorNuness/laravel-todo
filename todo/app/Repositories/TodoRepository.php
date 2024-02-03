<?php

namespace App\Repositories;

use App\Interfaces\TodoRepositoryInterface;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function __construct(
        protected Todo $model,
    )
    {

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
    public function createTodo(array $values)
    {
        return $this->model->create($values);
    }
    public function updateTodo(string $id, array $values)
    {
        return $this->model->findOrFail($id)->update($values);
    }
}