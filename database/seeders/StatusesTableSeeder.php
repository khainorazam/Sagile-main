<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'id' => 1,
            'title' => 'Backlog',
            'slug' => 'baclog',
            'order' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('statuses')->insert([
            'id' => 2,
            'title' => 'Up Next',
            'slug' => 'up next',
            'order' => 2,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('statuses')->insert([
            'id' => 3,
            'title' => 'In Progress',
            'slug' => 'in progress',
            'order' => 3,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('statuses')->insert([
            'id' => 4,
            'title' => 'Done',
            'slug' => 'done',
            'order' => 4,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
