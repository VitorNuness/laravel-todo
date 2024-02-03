<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Interfaces\TodoRepositoryInterface;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function __construct(
        private TodoRepositoryInterface $repository,
    )
    {}

    public function index()
    {
        $todos = $this->repository->getAllTodos();
        return TodoResource::collection($todos);
    }

    public function store(StoreUpdateTodoRequest $request)
    {
        $data = $request->validated();
        $todo = $this->repository->createTodo($data);
        return new TodoResource($todo);
    }

    public function show(string $id)
    {
        $todo = $this->repository->getTodoById($id);
        return new TodoResource($todo);
    }

    public function update(StoreUpdateTodoRequest $request, string $id)
    {
        $data = $request->validated();
        $todo = $this->repository->updateTodo($id, $data);
        return new TodoResource($todo);
    }

    public function destroy(string $id)
    {
        $this->repository->deleteTodo($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
