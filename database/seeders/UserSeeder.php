<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['username' => 'ruben', 'password' => Hash::make('1'), 'role_id' => 1, 'active' => True, 'client_id' => 1, 'project_id' => 1, 'material_id' => 1],
            ['username' => 'carlos', 'password' => Hash::make('1'), 'role_id' => 1, 'active' => True, 'client_id' => 1, 'project_id' => 1, 'material_id' => 1],
            ['username' => 'jc', 'password' => Hash::make('1'), 'role_id' => 1, 'active' => True ],
            
            // ['username' => 'admin', 'password' => Hash::make('1'), 'role_id' => '2', 'active' => True],
            // ['username' => 'manager', 'password' => Hash::make('1'), 'role_id' => '3', 'active' => True],
            // ['username' => 'order', 'password' => Hash::make('1'), 'role_id' => '4', 'project_id' => 1, 'material_id' => 1, 'active' => True],
            // ['username' => 'user', 'password' => Hash::make('1'), 'role_id' => '5', 'active' => True],
            // ['username' => 'user2', 'password' => Hash::make('1'), 'role_id' => '5', 'active' => False],
            // ['username' => 'both', 'password' => Hash::make('1'), 'role_id' => '6', 'active' => True],
            // ['username' => 'guest', 'password' => Hash::make('1'), 'role_id' => '7', 'active' => True],
        ];

        foreach($users as $user){
            \App\Models\User::create($user);
        }
    }
}
