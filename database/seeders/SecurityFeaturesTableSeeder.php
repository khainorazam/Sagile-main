<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecurityFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('security_features')->insert([
            'id' => 1,
            'secfeature_name' => 'SQL Injection',
            'secfeature_desc' => 'Avoid any hacker',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('security_features')->insert([
            'id' => 2,
            'secfeature_name' => 'Cross_Site Scripting',
            'secfeature_desc' => 'Malicious Scripts',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('security_features')->insert([
            'id' => 3,
            'secfeature_name' => 'SQL',
            'secfeature_desc' => 'sql',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('security_features')->insert([
            'id' => 4,
            'secfeature_name' => 'SQL Injection',
            'secfeature_desc' => 'Avoid any hacker',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('security_features')->insert([
            'id' => 5,
            'secfeature_name' => 'Cross_Site Scripting',
            'secfeature_desc' => 'Malicious Scripts',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('security_features')->insert([
            'id' => 6,
            'secfeature_name' => 'SQL',
            'secfeature_desc' => 'sql',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
