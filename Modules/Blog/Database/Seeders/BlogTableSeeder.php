<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\App\Models\Blog;

class BlogTableSeeder extends Seeder
{
    public function run(): void
    {
        Blog::factory()->count(50)->create(); // Creates 50 fake blog posts
    }
}
