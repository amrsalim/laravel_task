<?php

namespace Modules\Category\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\App\resources\UserResource;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'status' => $this->status ? 'Active' : 'Inactive',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at ? $this->deleted_at : null,
            'user' => new UserResource($this->whenLoaded('user')), // Assuming you have a UserResource for the relationship
        ];

    }
}
