<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            ['name' => 'Esclat Sant Boi', 'client_id' => 1, 'state_id' => 1, 'started_at' => '2020-07-10 12:43:50'],
            ['name' => 'BonArea Sabadell', 'client_id' => 2, 'state_id' => 2, 'started_at' => '2019-12-03 10:57:50', 'finished_at' => '2020-06-10 16:57:50'],
            ['name' => 'Consum Terrasa', 'client_id' => 3, 'state_id' => 2, 'started_at' => '2020-11-10 09:09:50', 'finished_at' => '2020-12-10 16:57:50'],
            ['name' => 'Esclat Sitges', 'client_id' => 1, 'state_id' => 1, 'started_at' => '2020-09-27 13:15:12'],
            ['name' => 'Esclat Calella', 'client_id' => 1, 'state_id' => 2, 'started_at' => '2020-01-22 16:57:50', 'finished_at' => '2020-09-04 09:44:54'],
            ['name' => 'Dia Glories', 'client_id' => 4, 'state_id' => 1, 'started_at' => '2020-12-07 19:43:50'],
        ];
        foreach($projects as $project){
            \App\Models\Project::create($project);
        }
    }
}
