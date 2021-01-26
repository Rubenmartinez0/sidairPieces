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
            ['user_id' => 1, 'type_id' => 1, 'quantity' => 1, 'measurements' => 'a:1,b:2,c:4,e:6,l:1,x:3,y:5'],
            ['user_id' => 1, 'type_id' => 2, 'quantity' => 10, 'measurements' => 'a:4,b:4,d:4,e:4,f:4,l:4,r:4'],
            ['user_id' => 1, 'type_id' => 3, 'quantity' => 3, 'measurements' => 'a:5,b:5,c:55,e:5,f:555,r:5,w:5'],
            ['user_id' => 1, 'type_id' => 4, 'quantity' => 5, 'measurements' => 'a:66,b:6,c:6,d:666,h:6,l1:6,m:6,n:6,r1:6,r2:6'],

            ['user_id' => 2, 'type_id' => 3, 'quantity' => 1, 'measurements' => 'a:5,b:5,c:55,e:5,f:555,r:5,w:5'],
            ['user_id' => 2, 'type_id' => 4, 'quantity' => 1, 'measurements' => 'a:66,b:6,c:6,d:666,h:6,l1:6,m:6,n:6,r1:6,r2:6'],

        ];
        foreach($cartItems as $item){
            \App\Models\CartItem::create($item);
        }
    }
}
