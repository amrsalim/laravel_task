<?php

namespace Modules\AdminGroup\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AdminGroup\Database\factories\AdminGroupsFactory;

class AdminGroups extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): AdminGroupsFactory
    {
        //return AdminGroupsFactory::new();
    }
}
