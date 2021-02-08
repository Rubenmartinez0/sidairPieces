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
            ['state' => 'En construcción'],
            ['state' => 'Finalizada'],
            ['state' => 'Parada'],
            ['state' => 'Denegada'],
            ['state' => 'Cancelada'],
            ['state' => 'Pendiente'],
        ];
        foreach($states as $state){
            \App\Models\ProjectState::create($state);
        }
    }
}
