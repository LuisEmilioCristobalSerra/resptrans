<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitialRoleSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            OperatorRoleSeeder::class,
            EmployeeRoleSeeder::class,
        ]);
    }
}
