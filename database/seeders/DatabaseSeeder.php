<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        // Optionally, you can also assign the roles to users
        // Example: Assign the 'admin' role to the first user in the users table
        $user = User::first();
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
