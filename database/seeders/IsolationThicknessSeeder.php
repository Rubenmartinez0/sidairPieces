<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IsolationThicknessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thickness = [
            ['thickness' => 6, 'unit' => 'mm', 'type_id' => 1],
            ['thickness' => 10, 'unit' => 'mm', 'type_id' => 1],
            ['thickness' => 20, 'unit' => 'mm', 'type_id' => 1],
            ['thickness' => 25, 'unit' => 'mm', 'type_id' => 2],
            ['thickness' => 30, 'unit' => 'mm', 'type_id' => 1],
            ['thickness' => 40, 'unit' => 'mm', 'type_id' => 2],
            ['thickness' => -1, 'unit' => 'mm', 'type_id' => 3],
        ];
        foreach($thickness as $thick){
            \App\Models\IsolationThickness::create($thick);
        }
    }
}
