<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [
            ['material' => 'Chapa', 'visible' => True],
            ['material' => 'Fibra', 'visible' => True],
        ];
        foreach($materials as $material){
            \App\Models\Material::create($material);
        }
    }
}
