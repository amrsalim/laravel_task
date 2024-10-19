<?php

namespace Modules\AdminGroup\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminGroupRolesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'account_type' => $this->account_type,
            'admin_group_id' => $this->admin_group_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
