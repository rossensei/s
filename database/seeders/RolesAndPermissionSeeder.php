<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = Role::create(['name' => 'admin']);
        $m = Role::create(['name' => 'manager']);
        $s = Role::create(['name' => 'supplier']);

        Permission::create(['name' => 'manage-suppliers']);
        Permission::create(['name' => 'manage-users']);
        Permission::create(['name' => 'manage-items']);

        $a->givePermissionTo(Permission::all());
        $m->givePermissionTo(['manage-suppliers']);

        $admin = User::create([
            'name' => 'Rosalino Flores',
            'email' => 'fross0988@gmail.com',
            'password' => bcrypt('password123')
        ]);

        $manager = User::create([
            'name' => 'User Manager',
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $supplier = User::create([
            'name' => 'Supplier',
            'email' => 'supplier@example.com',
            'password' => bcrypt('password123')
        ]);

        $user = User::create([
            'name' => 'Normal User',
            'email' => 'test@email.com',
            'password' => bcrypt('password123')
        ]);

        $supplier->assignRole($a);

        $admin->assignRole('admin');
        $manager->assignRole('manager');
    }
}
