<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IsolationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['type' => 'eta', 'id' => 1],
            ['type' => 'vn', 'id' => 2],
            ['type' => 'irb', 'id' => 3],
        ];
        foreach($types as $type){
            \App\Models\IsolationType::create($type);
        }
    }
}
