<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartItems = [
            ['user_id' => 1, 'type_id' => 1, 'quantity' => 1],
            ['user_id' => 1, 'type_id' => 2, 'quantity' => 10],
            ['user_id' => 1, 'type_id' => 3, 'quantity' => 3],
            ['user_id' => 1, 'type_id' => 4, 'quantity' => 5],
            ['user_id' => 1, 'type_id' => 4, 'quantity' => 6],
            ['user_id' => 1, 'type_id' => 2, 'quantity' => 3],
            ['user_id' => 1, 'type_id' => 5, 'quantity' => 2],
            ['user_id' => 1, 'type_id' => 1, 'quantity' => 1],
            ['user_id' => 1, 'type_id' => 2, 'quantity' => 10],
            ['user_id' => 1, 'type_id' => 3, 'quantity' => 3],
            ['user_id' => 1, 'type_id' => 4, 'quantity' => 5],
            ['user_id' => 1, 'type_id' => 4, 'quantity' => 6],
            ['user_id' => 1, 'type_id' => 2, 'quantity' => 3],
            ['user_id' => 1, 'type_id' => 5, 'quantity' => 2],

            ['user_id' => 2, 'type_id' => 3, 'quantity' => 1],
            ['user_id' => 2, 'type_id' => 4, 'quantity' => 1],

        ];
        foreach($cartItems as $item){
            \App\Models\CartItem::create($item);
        }
    }
}
