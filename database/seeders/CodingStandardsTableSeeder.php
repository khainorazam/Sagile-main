<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodingStandardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coding_standards')->insert([
            'id' => 1,
            'codestand_name' => 'Security includes',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('coding_standards')->insert([
            'id' => 2,
            'codestand_name' => 'QR code',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('coding_standards')->insert([
            'id' => 3,
            'codestand_name' => 'example',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
