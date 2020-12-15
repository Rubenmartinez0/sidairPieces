<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            ['name' => 'Union desplazada', 'path' => '/png/pieces/union_desplazada.png'],
            ['name' => 'Codo radial con salida recta', 'path' => '/png/pieces/codo_radial_salida_recta.png'],
            ['name' => 'Codo radial', 'path' => '/png/pieces/codo_radial.png'],
            ['name' => 'Ramas rectangulares', 'path' => '/png/pieces/ramas_rectangulares.png'],
            ['name' => 'Tapa rectangular', 'path' => '/png/pieces/tapa_rectangular.png'],
            ['name' => 'Tramo recto con pestañas', 'path' => '/png/pieces/tramo_recto_pestanas.png'],
            ['name' => 'Union concentrica', 'path' => '/png/pieces/union_concentrica.png'],
            ['name' => 'Union excentrica', 'path' => '/png/pieces/union_excentrica.png'],
            ['name' => 'Division triple', 'path' => '/png/pieces/division_triple.png'],
        ];
        foreach($images as $image){
            \App\Models\Image::create($image);
        }
    }
}
