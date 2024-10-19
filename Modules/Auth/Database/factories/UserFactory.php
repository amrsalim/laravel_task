<?php

namespace Modules\Auth\Database\factories;

use App\Models\AdminGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use App\Enums\AccountType;
use App\Enums\Gender;

class UserFactory extends Factory
{



    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Randomly assign account type and gender using Enums

        return [
            'id'                => (string) Str::uuid(), // Generate a UUID for the ID
            'name' => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail, // Unique email address
            'mobile'            => $this->faker->optional()->phoneNumber, // Optional mobile number
            'photo'             => $this->faker->optional()->imageUrl(), // Optional photo URL
            'gender'            => 'male', // Enum for gender
            'account_type'      => 'admin', // Enum for account type
            'password'          => bcrypt('password'), // Default password (hashed)
            'admin_group_id'    => AdminGroup::factory(), // Associate with an AdminGroup
            'email_verified_at' => now(), // Timestamp for email verification
            'remember_token'    => Str::random(10), // Remember token
            'created_at'        => now(),
            'updated_at'        => now(),
        ];
    }
}
