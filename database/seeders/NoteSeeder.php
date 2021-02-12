<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = [
            ['project_id' => 1, 'order_id' => 1, 'user_id' => 1, 'content' => "Tubo recto de 2x2 metros con aislante de 4mm"],
            ['project_id' => 1, 'order_id' => 1, 'user_id' => 1, 'content' => "Codo de 45 con aislante de 2mm"],

            ['project_id' => 1, 'order_id' => 3, 'user_id' => 2, 'content' => "Tubo recto de 2x2 metros con aislante de 4mm"],
            ['project_id' => 1, 'order_id' => 3, 'user_id' => 2, 'content' => "Nota de prueba para este pedido"],
            ['project_id' => 1, 'order_id' => 4, 'user_id' => 2, 'content' => "Primera nota del pedido"],
            ['project_id' => 1, 'order_id' => 5, 'user_id' => 2, 'content' => "Codo de 45 con aislante de 2mm"],

        ];
        foreach($notes as $note){
            \App\Models\Note::create($note);
        }
    }
}
