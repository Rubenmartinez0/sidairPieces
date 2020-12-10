<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $clients = [
            ['name' => 'cliente1', 'visible' => True],
            ['name' => 'cliente2', 'visible' => False],
            ['name' => 'cliente3', 'visible' => True],
            ['name' => 'cliente4', 'visible' => True],
        ];
        foreach($clients as $client){
            \App\Models\Client::create($client);
        }
        $this->call([
            UserSeeder::class,
        ]);
        
        //DB::table('clients')->insert($clients);
    }
}
