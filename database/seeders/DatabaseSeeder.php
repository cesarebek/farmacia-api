<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'super-admin']);

        $user = User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $user->assignRole($role);
    }
}
