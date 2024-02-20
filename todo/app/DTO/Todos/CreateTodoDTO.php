<?php

namespace App\DTO\Todos;

use App\Http\Requests\StoreUpdateTodoRequest;

class CreateTodoDTO
{
    public function __construct(
        public string $description,
        public bool $is_complete,
        public string | null $category,
    )
    {
        //
    }

    public static function makeFromRequest(StoreUpdateTodoRequest $request): self
    {
        return new self(
            $request->description,
            $request->is_complete,
            $request->category
        );
    }
}