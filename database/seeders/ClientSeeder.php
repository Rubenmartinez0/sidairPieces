<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            ['name' => 'cliente1', 'visible' => True],
            ['name' => 'cliente2', 'visible' => False],
            ['name' => 'cliente3', 'visible' => True],
            ['name' => 'cliente4', 'visible' => True],
        ];
        foreach($clients as $client){
            \App\Models\Client::create($client);
        }
    }
}
