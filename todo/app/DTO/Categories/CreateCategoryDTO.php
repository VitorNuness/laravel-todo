<?php

namespace App\DTO\Categories;

use App\Http\Requests\StoreUpdateCategoryRequest;

class CreateCategoryDTO
{
    public function __construct(
        public string $name,
    )
    {
        //
    }

    public static function makeFromRequest(StoreUpdateCategoryRequest $request): self
    {
        return new self(
            $request->name,
        );
    }
}