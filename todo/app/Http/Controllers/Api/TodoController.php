<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Interfaces\TodoServiceInterface;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function __construct(
        private TodoServiceInterface $service,
    )
    {}

    public function index()
    {
        $todos = $this->service->getAllTodos();
        return TodoResource::collection($todos);
    }

    public function store(StoreUpdateTodoRequest $request)
    {
        $data = $request->validated();
        $todo = $this->service->createTodo($data);
        return new TodoResource($todo);
    }

    public function show(string $id)
    {
        $todo = $this->service->getTodoById($id);
        return new TodoResource($todo);
    }

    public function update(StoreUpdateTodoRequest $request, string $id)
    {
        $data = $request->validated();
        $todo = $this->service->updateTodo($id, $data);
        return new TodoResource($todo);
    }

    public function destroy(string $id)
    {
        $this->service->deleteTodo($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
