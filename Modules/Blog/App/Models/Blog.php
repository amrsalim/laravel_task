<?php
namespace Modules\Blog\App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'title',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
    public static function newFactory()
    {
        return \Modules\Blog\Database\factories\BlogFactory::new();
    }
}
