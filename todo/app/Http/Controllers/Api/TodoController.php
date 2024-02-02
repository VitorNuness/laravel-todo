<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::paginate();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $todo = Todo::create($data);
        // dd($todo);
        return new TodoResource($todo);
    }

    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return new TodoResource($todo);
    }

    public function update(Request $request, string $id)
    {
        $todo = Todo::findOrFail($id);
        $data = $request->all();
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
