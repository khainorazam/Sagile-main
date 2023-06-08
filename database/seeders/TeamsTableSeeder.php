<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            'id' => 1,
            'team_name' => 'A',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('teams')->insert([
            'id' => 2,
            'team_name' => 'B',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('teams')->insert([
            'id' => 3,
            'team_name' => 'C',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
