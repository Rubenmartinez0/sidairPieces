<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['state' => 'Obra en construcción'],
            ['state' => 'Obra finalizada'],
            ['state' => 'Obra parada'],
            ['state' => 'Obra denegada'],
            ['state' => 'Obra cancelada'],
            ['state' => 'Obra pendiente'],
        ];
        foreach($states as $state){
            \App\Models\ProjectState::create($state);
        }
    }
}
