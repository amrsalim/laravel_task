<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\AdminGroup;
use App\Enums\AccountType;
use App\Enums\Gender;
use Illuminate\Support\Facades\Hash;

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
        $faker = \Faker\Factory::create();

        return [
            'id'                => $faker->uuid, // UUID
            'name'              => $faker->name, // Full name
            'email'             => $faker->unique()->safeEmail, // Safe email
            'mobile'            => $faker->optional()->e164PhoneNumber, // Optional mobile number in E.164 format
            'photo'             => $faker->optional()->imageUrl(640, 480, 'people', true, 'Faker'), // Optional profile image
            'gender'            => $faker->randomElement([Gender::Male, Gender::Female]), // Random gender
            'account_type'      => $faker->randomElement([AccountType::User, AccountType::Admin]), // Random account type
//            'password'          => bcrypt('password'), // Using bcrypt for password hashing
            'admin_group_id'    => AdminGroup::factory(), // Create associated admin group
            'email_verified_at' => $faker->dateTimeThisYear(), // Random datetime within the current year
            'remember_token'    => Str::random(10),
            'created_at'        => now(),
            'updated_at'        => now(),
        ];
    }
}
