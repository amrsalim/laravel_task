<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , UsesUuid ,SoftDeletes;
    protected $fillable = [
        'name', 'description', 'slug', 'status', 'user_id'
    ];
    // Casts attributes
    protected $casts = [
        'status' => 'boolean', // Cast status to boolean
    ];
    // A category belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
