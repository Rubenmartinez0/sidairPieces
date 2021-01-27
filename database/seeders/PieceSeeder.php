<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PieceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pieces = [
            ['order_id' => 1, 'quantity' => 5, 'type_id' => 1, 'material_id' => 1, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:1,b:2,c:4,e:6,l:1,x:3,y:5', 'ordered_by' => 1, 'ordered_at' => "2021-01-18 15:38:17"],
            ['order_id' => 1, 'quantity' => 2, 'type_id' => 2, 'material_id' => 1, 'state_id' => 2, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:4,b:4,d:4,e:4,f:4,l:4,r:4', 'ordered_by' => 1, 'ordered_at' => "2021-01-18 15:38:17"],
            ['order_id' => 1, 'quantity' => 1, 'type_id' => 3, 'material_id' => 1, 'state_id' => 3, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:5,b:5,c:55,e:5,f:555,r:5,w:5', 'ordered_by' => 1, 'ordered_at' => "2021-01-18 15:38:17"],
            ['order_id' => 1, 'quantity' => 3, 'type_id' => 4, 'material_id' => 1, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:66,b:6,c:6,d:666,h:6,l1:6,m:6,n:6,r1:6,r2:6', 'ordered_by' => 1, 'ordered_at' => "2021-01-18 15:38:17"],
            
            ['order_id' => 2, 'quantity' => 4, 'type_id' => 2, 'material_id' => 2, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:4,b:4,d:4,e:4,f:4,l:4,r:4', 'ordered_by' => 1, 'ordered_at' => "2021-01-18 10:52:14"],
            ['order_id' => 2, 'quantity' => 1, 'type_id' => 3, 'material_id' => 2, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:5,b:5,c:55,e:5,f:555,r:5,w:55', 'ordered_by' => 1, 'ordered_at' => "2021-01-18 10:52:14" ],
            

            ['order_id' => 3, 'quantity' => 6, 'type_id' => 1, 'material_id' => 1, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:1,b:2,c:4,e:6,l:1,x:3,y:5', 'ordered_by' => 2, 'ordered_at' => "2021-01-18 15:38:17"],
            ['order_id' => 3, 'quantity' => 1, 'type_id' => 2, 'material_id' => 1, 'state_id' => 2, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:4,b:4,d:4,e:4,f:4,l:4,r:4', 'ordered_by' => 2, 'ordered_at' => "2021-01-18 15:38:17"],
            
            ['order_id' => 4, 'quantity' => 3, 'type_id' => 3, 'material_id' => 1, 'state_id' => 3, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:5,b:5,c:55,e:5,f:555,r:5,w:5', 'ordered_by' => 2, 'ordered_at' => "2021-01-18 15:38:17"],
            ['order_id' => 4, 'quantity' => 4, 'type_id' => 4, 'material_id' => 1, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:66,b:6,c:6,d:666,h:6,l1:6,m:6,n:6,r1:6,r2:6', 'ordered_by' => 1, 'ordered_at' => "2021-01-18 15:38:17"],
            
            ['order_id' => 5, 'quantity' => 7, 'type_id' => 2, 'material_id' => 2, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:4,b:4,d:4,e:4,f:4,l:4,r:4', 'ordered_by' => 2, 'ordered_at' => "2021-01-18 10:52:14"],
            ['order_id' => 5, 'quantity' => 4, 'type_id' => 2, 'material_id' => 2, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:4,b:4,d:4,e:4,f:4,l:4,r:4', 'ordered_by' => 2, 'ordered_at' => "2021-01-18 10:52:14"],
            ['order_id' => 5, 'quantity' => 2, 'type_id' => 3, 'material_id' => 2, 'state_id' => 1, 'client_id' => 1, 'project_id' => 1, 'measurements' => 'a:5,b:5,c:55,e:5,f:555,r:5,w:55', 'ordered_by' => 2, 'ordered_at' => "2021-01-18 10:52:14" ],
        ];
        foreach($pieces as $piece){
            \App\Models\Piece::create($piece);
        }
    }
}
