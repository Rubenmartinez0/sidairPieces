<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['state' => 'Encargado'],
            ['state' => 'En preparación'],
            ['state' => 'Preparado'],
            ['state' => 'Denegado'],
        ];
        foreach($states as $state){
            \App\Models\OrderState::create($state);
        }
    }
}
