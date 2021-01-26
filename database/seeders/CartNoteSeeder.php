<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CartNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = [
            ['user_id' => 1, 'content' => "Nota de prueba numero 1"],
            ['user_id' => 1, 'content' => "Esto es una nota de prueba"],
            ['user_id' => 1, 'content' => "Haciendo prueba para nota"],

        ];
        foreach($notes as $note){
            \App\Models\CartNote::create($note);
        }
    }
}
