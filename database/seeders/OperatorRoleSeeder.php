<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class OperatorRoleSeeder extends Seeder
{
    public function run()
    {
        $role = Role::where('name', 'operator')->first();
        $permissions = [
            'responsives.index',
            'responsives.create',
            'responsives.show',
            'transfers.index',
            'transfers.show',
            'transfers.create',
            'employees.create',
            'employees.show',
            'employees.index',
        ];
        foreach($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
