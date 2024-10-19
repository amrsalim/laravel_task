<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'id' => Str::uuid(),
            'name' => $faker->word, // Generates a random word
            'description' => $faker->sentence, // Generates a random sentence
            'slug' => $faker->unique()->slug, // Generates a unique slug
            'status' => $faker->boolean(80), // 80% chance of being true
            'user_id' => 1, // Assuming a user with ID 1 exists
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
