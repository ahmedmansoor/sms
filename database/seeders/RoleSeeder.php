<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->truncate();

        $roles = [
            'super-admin', //1
            'admin', //2
            'inventory-clerk', //3
            'user', //4
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}