<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerformanceFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('performance_features')->insert([
            'id' => 1,
            'perfeature_name' => 'Loading Time',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('performance_features')->insert([
            'id' => 2,
            'perfeature_name' => 'Buffering Time',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('performance_features')->insert([
            'id' => 3,
            'perfeature_name' => 'Response Time',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('performance_features')->insert([
            'id' => 4,
            'perfeature_name' => 'Loading Time',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('performance_features')->insert([
            'id' => 5,
            'perfeature_name' => 'Buffering Time',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('performance_features')->insert([
            'id' => 6,
            'perfeature_name' => 'Response Time',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
