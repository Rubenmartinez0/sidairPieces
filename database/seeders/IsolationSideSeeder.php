<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IsolationSideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sides = [
            ['side' => 'Interior'],
            ['side' => 'Exterior'],
        ];
        foreach($sides as $side){
            \App\Models\IsolationSide::create($side);
        }
    }
}
