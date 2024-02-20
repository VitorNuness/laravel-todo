<?php

namespace App\DTO\Todos;

use App\Http\Requests\StoreUpdateTodoRequest;

class UpdateTodoDTO
{
    public function __construct(
        public string $id,
        public string $description,
        public bool $is_complete,
        public string | null $category,
    )
    {
        //
    }

    public static function makeFromRequest(StoreUpdateTodoRequest $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->description,
            $request->is_complete,
            $request->category
        );
    }
}