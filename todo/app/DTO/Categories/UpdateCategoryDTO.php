<?php

namespace App\DTO\Categories;

use App\Http\Requests\StoreUpdateCategoryRequest;

class UpdateCategoryDTO
{
    public function __construct(
        public string $id,
        public string $name,
    )
    {
        //
    }

    public static function makeFromRequest(StoreUpdateCategoryRequest $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->name,
        );
    }
}