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
            ['material' => 'chapa', 'visible' => True],
            ['material' => 'fibra', 'visible' => True],
        ];
        foreach($materials as $material){
            \App\Models\Material::create($material);
        }
    }
}
