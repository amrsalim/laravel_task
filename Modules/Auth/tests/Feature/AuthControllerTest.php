<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(Tests\TestCase::class, RefreshDatabase::class)->in(__DIR__);


it('can register a new user', function () {
    // Simulate registration
    $response = $this->postJson('/api/v1/register', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password'
    ]);

    // Check response status and structure
    $response->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'account_type',
                'created_at',
                'updated_at'
            ],
            'access_token',
            'token_type',
            'expires_in'
        ]);

    // Verify user was created in the database
    $this->assertDatabaseHas('users', [
        'email' => 'john@example.com',
        'name' => 'John Doe'
    ]);
});

it('can login a user', function () {
    $password = Hash::make('password');
    // First, create a user
    $user = User::factory()->create([
        'password' =>$password ,
    ]);

    // Attempt to login
    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
        'password' => "password",
    ]);

    // Check the response
    $response->assertStatus(200);
});
it('can logout the authenticated user', function () {
    // First, create and authenticate a user
    $user = User::factory()->create();
    $token = auth()->login($user);

    // Simulate logout request
    $response = $this->postJson('/api/v1/logout', [], [
        'Authorization' => "Bearer $token"
    ]);

    // Check response
    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Successfully logged out.'
        ]);
});

it('can return the authenticated user profile', function () {
    // First, create and authenticate a user
    $user = User::factory()->create();
    $token = auth()->login($user);

    // Fetch authenticated user profile
    $response = $this->postJson('/api/v1/me', [
        'Authorization' => "Bearer $token"
    ]);
//    dd($response->json());
    // Check if the status is 200 OK
    $response->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'account_type',
                'admin_group_id',
                'created_at',
                'updated_at'
            ]
        ]);


});
