<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AdminGroup;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminGroup>
 */
class AdminGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'        => (string) Str::uuid(), // Generate a UUID for the ID
            'name'      => 'amr',
            'created_at'=> now(),
            'updated_at'=> now(),
        ];
    }
}
