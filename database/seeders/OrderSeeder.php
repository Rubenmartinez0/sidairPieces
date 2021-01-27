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
            // ['order_id' => 2101140001, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            // 'state_id' => 1, 'created_at' => "2021-01-14 14:38:17", 'updated_at' => "2021-01-14 14:38:17"],
            // ['order_id' => 2101140002, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            // 'state_id' => 1, 'created_at' => "2021-01-14 15:38:17", 'updated_at' => "2021-01-14 15:38:17"],
            // ['order_id' => 2101140003, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            // 'state_id' => 1, 'created_at' => "2021-01-14 16:38:17", 'updated_at' => "2021-01-14 16:38:17"],

            // ['order_id' => 2101150001, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            // 'state_id' => 1, 'created_at' => "2021-01-15 14:38:17", 'updated_at' => "2021-01-15 14:38:17"],
            // ['order_id' => 2101150002, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            // 'state_id' => 1, 'created_at' => "2021-01-15 15:38:17", 'updated_at' => "2021-01-15 15:38:17"],

            // ['order_id' => 2101180001, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            // 'state_id' => 1, 'created_at' => "2021-01-18 13:38:17", 'updated_at' => "2021-01-18 13:38:17"],
            // ['order_id' => 2101180002, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            // 'state_id' => 1, 'created_at' => "2021-01-18 15:38:17", 'updated_at' => "2021-01-18 15:38:17"],
            
            ['order_id' => 2101180001, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-18 15:38:17", 'updated_at' => "2021-01-18 09:38:17"],
            ['order_id' => 2101180002, 'client_id' => 1, 'project_id' => 1, 'created_by' => 1,'material_id' => 2,
            'state_id' => 1, 'created_at' => "2021-01-18 10:52:14", 'updated_at' => "2021-01-18 10:52:14"],

            ['order_id' => 2101180003, 'client_id' => 1, 'project_id' => 1, 'created_by' => 2,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-18 15:38:17", 'updated_at' => "2021-01-18 09:38:17"],
            ['order_id' => 2101180004, 'client_id' => 1, 'project_id' => 1, 'created_by' => 2,'material_id' => 2,
            'state_id' => 1, 'created_at' => "2021-01-18 10:52:14", 'updated_at' => "2021-01-18 10:52:14"],
            ['order_id' => 2101180005, 'client_id' => 1, 'project_id' => 1, 'created_by' => 2,'material_id' => 1,
            'state_id' => 1, 'created_at' => "2021-01-18 15:38:17", 'updated_at' => "2021-01-18 09:38:17"],

            
        ];
        foreach($orders as $order){
            \App\Models\Order::create($order);
        }
    }
}
