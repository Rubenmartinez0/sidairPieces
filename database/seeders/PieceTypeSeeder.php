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
            ['name' => 'Unión desplazada', 'measurements' => json_encode(array('Ancho de Entrada', 'Profundidad de entrada', 'Ancho de salida',
            'Profundidad de salida', 'Longitud', 'Extensión de entrada', 'Extensión de salida', 'Desplazamiento vertical', 'Desplazamiento Horizontal'))],

            ['name' => 'Codo Radial con salida recta v2 – Pantalón con salida recta', 'measurements' => json_encode(array('Ancho izquierdo',
            'Ancho superior', 'Ancho inferior', 'Profundo', 'Extensión izquierda', 'Extensión inferior', 'Alto', 'Radio interno', 'Angulo'))],

            ['name' => 'Codo Radial', 'measurements' => json_encode(array('Ancho superior', 'Ancho inferior', 'Profundo', 'Extension interna superior',
            'Extension interna inferior', 'Radio interno', 'Angulo'))],

            ['name' => 'Ramas rectangualres v2 – Pantalón doble', 'measurements' => json_encode(array('Ancho inferior', 'Extensión inferior', 'Ancho izquierdo', 'Extensión izquierda',
            'Radio izquierdo', 'Ancho derecho', 'Extensión derecha', 'Radio derecho', 'Profundo'))],

            ['name' => 'Tapa Rectangular', 'measurements' => json_encode(array('Ancho', 'Alto'))],
            
            ['name' => 'Tramo recto con pestañas', 'measurements' => json_encode(array('Ancho', 'Profundo', 'Longitud'))],

            ['name' => 'Unión concéntrica', 'measurements' => json_encode(array('Ancho de entrada', 'Profundidad de entrada', 'Ancho de salida', 'Profundidad de salida',
            'Longitud', 'Extensión de entrada', 'Extensión de salida'))],

            ['name' => 'Unión excéntrica', 'measurements' => json_encode(array('Ancho de entrada', 'Profundidad de entrada', 'Ancho de salida', 'Profundidad de salida',
            'Longitud', 'Extensión de entrada', 'Extensión de salida'))],

            ['name' => 'División triple v2 - Pantalón triple', 'measurements' => json_encode(array('Ancho inferior', 'Extensión inferior', 'Ancho izquierdo', 'Extensión izquierda',
            'Radio izquierdo', 'Ángulo izquierdo', 'Ancho derecho', 'Extensión derecha', 'Radio derecho', 'Ángulo derecho', 'Ancho central', 'Altura central', 'Profundo'))],

        ];
        foreach($pieceTypes as $pieceType){
            \App\Models\PieceType::create($pieceType);
        }
    }
}
