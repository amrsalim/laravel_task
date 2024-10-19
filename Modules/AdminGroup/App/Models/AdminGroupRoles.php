<?php

namespace Modules\AdminGroup\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AdminGroup\Database\factories\AdminGroupRolesFactory;

class AdminGroupRoles extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): AdminGroupRolesFactory
    {
        //return AdminGroupRolesFactory::new();
    }
}
