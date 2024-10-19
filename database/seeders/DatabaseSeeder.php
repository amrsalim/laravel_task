<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AdminGroup;
use App\Models\AdminGroupRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (User::where('email', 'test@test.com')->count() == 0) {
            // Create admin group
            $group = AdminGroup::create([
                'name' => 'full admin',
            ]);

            // Define roles
            $roles = ['users', 'admin_groups', 'admin_group_roles'];

            // Create roles for the admin group
            foreach ($roles as $role) {
                AdminGroupRole::create([
                    'admin_group_id' => $group->id,
                    'resource' => $role,
                    'create' => 'yes',
                    'show' => 'yes',
                    'update' => 'yes',
                    'delete' => 'yes',
                    'force_delete' => 'yes',
                    'restore' => 'yes',
                ]);
            }

            // Create the user if it doesn't exist
            User::firstOrCreate([
                'email' => 'test@test.com',
            ], [
                'name' => 'admin',
                'password' => bcrypt(123456),
                'account_type' => 'admin',
                'admin_group_id' => $group->id,
                'email_verified_at' => now(),
            ]);
        }

    }
}
