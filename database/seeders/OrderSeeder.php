<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            ['order_id' => 2001140001, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-14 14:38:17", 'updated_at' => "2021-01-14 14:38:17"],
            ['order_id' => 2001140002, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-14 15:38:17", 'updated_at' => "2021-01-14 15:38:17"],
            ['order_id' => 2001140003, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-14 16:38:17", 'updated_at' => "2021-01-14 16:38:17"],

            ['order_id' => 2001150001, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-15 14:38:17", 'updated_at' => "2021-01-15 14:38:17"],
            ['order_id' => 2001150002, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-15 15:38:17", 'updated_at' => "2021-01-15 15:38:17"],

            ['order_id' => 2001180001, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-18 13:38:17", 'updated_at' => "2021-01-18 13:38:17"],
            
        ];
        foreach($orders as $order){
            \App\Models\Order::create($order);
        }
    }
}
