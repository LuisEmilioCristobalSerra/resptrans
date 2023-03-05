<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class EmployeeRoleSeeder extends Seeder
{
    public function run()
    {
        $role = Role::where('name', 'employee')->first();
        $permissions = [
            'responsives.index',
            'responsives.show',
            'transfers.index',
            'transfers.show',
        ];
        foreach($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
