<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@authninja.com',
            'role' => 'admin',
        ]);
        $role = Role::create(['name' => 'Admin']);
        $user->assignRole($role);
    }
}

