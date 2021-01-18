<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PieceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pieceTypes = [
            ['name' => 'Unión desplazada', 'image_path' => '/png/pieces/union_desplazada.png',  'image_path2' => '/png/pieces/2/union_desplazada.png',
            'measurements' => array('a', 'b', 'c', 'e', 'l', 'x', 'y')],

            ['name' => 'Codo Radial con salida recta v2', 'image_path' => '/png/pieces/codo_radial_salida_recta.png',
            'image_path2' => '/png/pieces/2/codo_radial_salida_recta.png',
            'measurements' => array('a', 'b', 'd', 'e', 'f', 'l', 'r')],

            ['name' => 'Codo Radial', 'image_path' => '/png/pieces/codo_radial.png', 'image_path2' => '/png/pieces/2/codo_radial.png',
            'measurements' => array('a', 'b', 'c', 'e','f','r','w')],

            ['name' => 'Ramas rectangulares v2', 'image_path' => '/png/pieces/ramas_rectangulares.png', 'image_path2' => '/png/pieces/2/ramas_rectangulares.png',
            'measurements' => array('a','b', 'c', 'd', 'h', 'l1', 'm', 'n', 'r1', 'r2')],

            ['name' => 'Tapa Rectangular', 'image_path' => '/png/pieces/tapa_rectangular.png',
            'measurements' => array('Ancho', 'Alto')],
            
            ['name' => 'Tramo recto', 'image_path' => '/png/pieces/tramo_recto.png',
            'image_path2' => '/png/pieces/2/tramo_recto.png',
            'measurements' => array('a','b','l')],

            ['name' => 'Unión concéntrica', 'image_path' => '/png/pieces/union_concentrica.png',
            'image_path2' => '/png/pieces/2/union_concentrica.png',
            'measurements' => array('a','b','c','d', 'e', 'f', 'l', 'x','y')],

            ['name' => 'Unión excéntrica',  'image_path' => '/png/pieces/union_excentrica.png',
            'image_path2' => '/png/pieces/2/union_excentrica.png',
            'measurements' => array('a','b','c','d', 'e', 'f', 'l', 'x','y')],

            ['name' => 'División triple v2', 'image_path' => '/png/pieces/division_triple.png',
            'image_path2' => '/png/pieces/2/division_triple.png',
            'measurements' => array('a','b', 'c', 'd', 'h', 'l', 'n', 'r1', 'r2')],

        ];

        foreach($pieceTypes as $pieceType){
            \App\Models\PieceType::create($pieceType);
        }
    }
}
