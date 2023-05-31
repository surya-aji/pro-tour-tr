<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // Create Tester User, Role, & Permission
        // create user
        $user = User::create([
            'id' => Str::uuid(),
            'name' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'phone_number' => '081111111111',
            'password' => Hash::make('12345678'),
            'created_by' => 'UserSeeder',
            'updated_by' => 'UserSeeder'
        ]);

     
        // create role & give permission
        $role = Role::create(['name' => 'super-admin', 'created_by' => 'UserSeeder', 'updated_by' => 'UserSeeder']);
        Role::create(['name' => 'public', 'created_by' => 'UserSeeder', 'updated_by' => 'UserSeeder']);

        $role->syncPermissions(Permission::all());
        $user->assignRole($role);
        $user->givePermissionTo(Permission::all());

    }
}
