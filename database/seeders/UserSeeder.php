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
            ['username' => 'ruben', 'password' => Hash::make('1'), 'role_id' => '1', 'active' => True],
            ['username' => 'carlos', 'password' => Hash::make('1'), 'role_id' => '1', 'active' => True],
            ['username' => 'admin', 'password' => Hash::make('1'), 'role_id' => '2', 'active' => True],
            ['username' => 'user', 'password' => Hash::make('1'), 'role_id' => '3', 'project_id' => 1, 'material_id' => 1, 'active' => True],
            ['username' => 'user2', 'password' => Hash::make('1'), 'role_id' => '3', 'active' => False],
        ];

        foreach($users as $user){
            \App\Models\User::create($user);
        }
    }
}
