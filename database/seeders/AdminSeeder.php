<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    
        $role1 = Role::create(['name' => 'super-admin']);
        $role2 = Role::create(['name' => 'customer']);

        $user = User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $user->assignRole($role1);
    }
}
