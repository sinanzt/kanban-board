<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskStateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('task_states')->insert([
            ['title' => "Unscheduled", 'order' => 1],
            ['title' => "On hold", 'order' => 2],
            ['title' => "In progress", 'order' => 3],
            ['title' => "Test", 'order' => 4],
            ['title' => "Ready For Approval", 'order' => 5],
            ['title' => "Completed", 'order' => 6]
        ]);
        

    }
}
