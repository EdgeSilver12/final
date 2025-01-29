<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they don't already exist
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);
        
        // Optionally, you can assign the 'admin' role to the first user
        $user = User::first();
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
