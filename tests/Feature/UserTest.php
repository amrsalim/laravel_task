<?php

use App\Enums\AccountType;
use App\Enums\Gender;
use App\Models\AdminGroup;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Faker\Factory as FakerFactory;

use Illuminate\Support\Facades\Artisan;
//uses(Tests\TestCase::class, RefreshDatabase::class)->in(__DIR__);

beforeEach(function () {
    $this->adminGroup = AdminGroup::factory()->create();
    $this->user = User::factory()->create();
});
it('checks the database default connection', function () {
    $this->assertTrue(\DB::connection()->getPdo() instanceof \PDO);
});

it('can create a user with valid data', function () {
    $user = User::factory()->create([
        'admin_group_id' => $this->adminGroup->id, // Use the adminGroup created in beforeEach
    ]);

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->id)->toBeString()
        ->and($user->account_type)->toBeInstanceOf(AccountType::class)
        ->and($user->gender)->toBeInstanceOf(Gender::class)
        ->and($user->adminGroup)->toBeInstanceOf(AdminGroup::class);
});

it('generates a UUID for the user ID upon creation', function () {
    expect($this->user->id)->toBeString()
        ->and(strlen($this->user->id))->toBe(36);
});

it('has a relationship with AdminGroup', function () {
    $user = User::factory()->create([
        'admin_group_id' => $this->adminGroup->id,
    ]);

    expect($user->adminGroup)->toBeInstanceOf(AdminGroup::class)
        ->and($user->adminGroup->id)->toEqual($this->adminGroup->id);
});

it('casts account_type and gender to their respective Enums', function () {
    expect($this->user->account_type)->toBeInstanceOf(AccountType::class)
        ->and($this->user->gender)->toBeInstanceOf(Gender::class);
});

it('can update user attributes without violating unique constraint', function () {
    $user = User::factory()->create();

    // Update user attributes without changing email
    $user->update([
        'name' => 'Updated Name',

    ]);

    // Refresh the user instance to get updated values
    $user = $user->fresh();

    expect($user->name)->toBe('Updated Name');
});







