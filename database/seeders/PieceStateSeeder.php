<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PieceStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['state' => 'Encargada'],
            ['state' => 'En fabricación'],
            ['state' => 'Fabricada'],
            ['state' => 'Denegada'],
        ];
        foreach($states as $state){
            \App\Models\PieceState::create($state);
        }
    }
}
