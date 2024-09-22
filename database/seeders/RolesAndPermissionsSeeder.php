<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrayOfPermissionNames = [
            'doctor create',
            'doctor view',
            'doctor edit',
            'doctor delete',
            'employee create',
            'employee view',
            'employee edit',
            'employee delete',
            'patient create',
            'patient view',
            'patient edit',
            'patient delete',
        ];

        // Insert Permissions to DB
        foreach ($arrayOfPermissionNames as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web'],
                ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            );
        }

        $arrayOfRoles = [
            'admin',
            'doctor',
            'reciepcent_employee',
            'nurse_employee',
            'patient'
        ];

        // Insert Roles to DB
        foreach ($arrayOfRoles as $role) {
            Role::firstOrCreate(
                ['name' => $role, 'guard_name' => 'web'],
                ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            );
        }

        // Retrieve the 'admin' role from DB
        $adminRole = Role::where('name', 'admin')->first();

        // Retrieve all permissions from DB
        $permissions = Permission::all();

        // Assign all permissions to the 'admin' role
        $adminRole->givePermissionTo($permissions);
    }
}
