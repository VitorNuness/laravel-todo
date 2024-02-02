<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::paginate();
        return TodoResource::collection($todos);
    }

    public function store(StoreUpdateTodoRequest $request)
    {
        $data = $request->validated();
        $todo = Todo::create($data);
        // dd($todo);
        return new TodoResource($todo);
    }

    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return new TodoResource($todo);
    }

    public function update(StoreUpdateTodoRequest $request, string $id)
    {
        $todo = Todo::findOrFail($id);
        $data = $request->validated();
        $todo->update($data);
        return new TodoResource($todo);
    }

    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
