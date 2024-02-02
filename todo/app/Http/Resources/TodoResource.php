<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "description" => $this->description,
            "is_complete" => $this->is_complete,
            "owner" => $this->owner,
            "created_at" => Carbon::make($this->created_at)->format('Y-m-d'),
            "updated_at" => Carbon::make($this->updated_at)->format('Y-m-d'),
        ];
    }
}
