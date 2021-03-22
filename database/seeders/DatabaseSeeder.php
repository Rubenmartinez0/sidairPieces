<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ClientSeeder::class,
            MaterialSeeder::class,
            PieceSeeder::class,
            NoteSeeder::class,
            PieceStateSeeder::class,
            PieceTypeSeeder::class,
            ProjectSeeder::class,
            ProjectStateSeeder::class,
            RoleSeeder::class,
            OrderSeeder::class,
            OrderStateSeeder::class,
            CartItemSeeder::class,
            CartNoteSeeder::class,
            PieceIsolation::class,
        ]);
    }
}


