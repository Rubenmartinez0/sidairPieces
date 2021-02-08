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
            ['name' => 'Esclat', 'visible' => True],
            ['name' => 'BonArea', 'visible' => False],
            ['name' => 'Consum', 'visible' => True],
            ['name' => 'Dia', 'visible' => True],
        ];
        foreach($clients as $client){
            \App\Models\Client::create($client);
        }
    }
}
