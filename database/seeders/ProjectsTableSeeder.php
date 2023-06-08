<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'id' => 1,
            'user_id' => 1,
            'proj_name' => 'Java',
            'proj_desc' => 'Programming',
            'start_date' => '2021-01-05',
            'end_date' => '2021-07-30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('projects')->insert([
            'id' => 2,
            'user_id' => 1,
            'proj_name' => 'SDA',
            'proj_desc' => 'SDA Prototype',
            'start_date' => '2021-01-05',
            'end_date' => '2021-07-30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('projects')->insert([
            'id' => 3,
            'user_id' => 3,
            'proj_name' => 'Library System',
            'proj_desc' => 'UTM Library System',
            'start_date' => '2021-01-05',
            'end_date' => '2021-07-30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
