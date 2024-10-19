<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends  JsonResource
{

    public function toArray($request)
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
            'email_verified_at'=> $this->email_verified_at ? $this->email_verified_at->toDateTimeString() : null, // Type: datetime, Nullable
            'created_at'       => $this->created_at->toDateTimeString(), // Type: datetime
            'updated_at'       => $this->updated_at->toDateTimeString(), // Type: datetime
            'deleted_at'       => $this->deleted_at ? $this->deleted_at->toDateTimeString() : null, // Type: datetime, Nullable
        ];
    }
}
