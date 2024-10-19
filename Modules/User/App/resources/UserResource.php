<?php

namespace Modules\User\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'               => $this->id, // UUID
            'name'             => $this->name, // Type: string
            'email'            => $this->email, // Type: string
            'mobile'           => $this->mobile, // Type: string, Nullable
            'photo_url'        => $this->photo ? asset('storage/' . $this->photo) : null, // Type: string (URL), Nullable
            'gender'           => $this->gender, // Type: string, Allowed: 'male', 'female', Nullable
            'account_type'     => $this->account_type, // Type: string, Allowed: 'user', 'admin'
            'admin_group_id'   => $this->admin_group_id, // Type: uuid, Nullable
            'email_verified_at'=> $this->email_verified_at ? $this->email_verified_at : null, // Type: datetime, Nullable
            'created_at'       => $this->created_at, // Type: datetime
            'updated_at'       => $this->updated_at, // Type: datetime
            'deleted_at'       => $this->deleted_at ? $this->deleted_at : null, // Type: datetime, Nullable
        ];
    }
}
