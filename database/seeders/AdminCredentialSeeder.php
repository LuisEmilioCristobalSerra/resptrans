<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Env;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->firstOrCreate([
            'name' => 'admin',
        ], [
                'email' => Env::get('ADMIN_EMAIL'),
                'password' => bcrypt(Env::get('ADMIN_PASSWORD')),
            ]);
        $role = Role::create(['name' => 'super-admin']);
        $user->assignRole($role);
    }
}
