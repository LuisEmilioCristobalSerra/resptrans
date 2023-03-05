<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'responsives.index',
            'responsives.create',
            'responsives.show',
            'transfers.index',
            'transfers.show',
            'transfers.create',
            'employees.index',
            'employees.create',
            'employees.update',
            'employees.delete',
            'employees.show',
        ];
        $roles = [
            'operator',
            'employee',
        ];
        foreach($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        foreach($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
