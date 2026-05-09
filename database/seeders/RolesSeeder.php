<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'add user']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('add user');
        $role1->givePermissionTo('edit user');
        $role1->givePermissionTo('delete user');

        $role2 = Role::create(['name' => 'manager']);
        $role2->givePermissionTo('edit user');

        // create admin users
        $user = \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@dsinfoway.com',
            'password' => Hash::make("terminal")
        ]);
        $user->assignRole($role1);
    }
}
