<?php

namespace App\Http\Controllers\Api;

use App\DTO\Todos\CreateTodoDTO;
use App\DTO\Todos\UpdateTodoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Interfaces\TodoServiceInterface;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function __construct(
        protected TodoServiceInterface $service,
    )
    {}

    public function index()
    {
        $todos = $this->service->getAllTodos();
        return TodoResource::collection($todos);
    }

    public function store(StoreUpdateTodoRequest $request)
    {
        $todo = $this->service->createTodo(
            CreateTodoDTO::makeFromRequest($request)
        );
        return new TodoResource($todo);
    }

    public function show(string $id)
    {
        $todo = $this->service->getTodoById($id);
        return new TodoResource($todo);
    }

    public function update(StoreUpdateTodoRequest $request, string $id)
    {
        $todo = $this->service->updateTodo(
            UpdateTodoDTO::makeFromRequest($request, $id)
        );
        return new TodoResource($todo);
    }

    public function destroy(string $id)
    {
        $this->service->deleteTodo($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
