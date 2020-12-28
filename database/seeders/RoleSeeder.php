<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Superadmin'],
            ['name' => 'Admin'],
            ['name' => 'Manager'],
            ['name' => 'Order'],
            ['name' => 'Manufacture'],
            ['name' => 'Order and manufacture'],
            ['name' => 'Guest'],
        ];
        foreach($roles as $role){
            \App\Models\Role::create($role);
        }
    }
}
