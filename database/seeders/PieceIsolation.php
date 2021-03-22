<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PieceIsolation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isolations = [
            ['type' => 'eta', 'thickness' => 6, 'side' => 'interior'],
            ['type' => 'eta', 'thickness' => 10, 'side' => 'interior'],
            ['type' => 'eta', 'thickness' => 20, 'side' => 'interior'],
            ['type' => 'eta', 'thickness' => 30, 'side' => 'interior'],
            ['type' => 'eta', 'thickness' => 6, 'side' => 'exterior'],
            ['type' => 'eta', 'thickness' => 10, 'side' => 'exterior'],
            ['type' => 'eta', 'thickness' => 20, 'side' => 'exterior'],
            ['type' => 'eta', 'thickness' => 30, 'side' => 'exterior'],
            ['type' => 'vn', 'thickness' => 25, 'side' => 'interior'],
            ['type' => 'vn', 'thickness' => 40, 'side' => 'interior'],
            ['type' => 'ibr', 'thickness' => -1, 'side' => 'exterior'],

        ];
        foreach($isolations as $isolation){
            \App\Models\PieceIsolation::create($isolation);
        }
    }
}
