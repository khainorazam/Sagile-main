<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'id' => 1,
            'role_name' => 'Project Manager',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'role_name' => 'Scrum Master',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'role_name' => 'Software Tester',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 4,
            'role_name' => 'Chief Programmer',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 5,
            'role_name' => 'Programmer',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 6,
            'role_name' => 'System Analyst',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 7,
            'role_name' => 'User',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 8,
            'role_name' => 'PM',
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 9,
            'role_name' => 'Scrum Master',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 10,
            'role_name' => 'Software Tester',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 11,
            'role_name' => 'Chief Programmer',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 12,
            'role_name' => 'Programmer',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 13,
            'role_name' => 'System Analyst',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 14,
            'role_name' => 'User',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 15,
            'role_name' => 'PM',
            'project_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 16,
            'role_name' => 'Project Manager',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 17,
            'role_name' => 'Scrum Master',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 18,
            'role_name' => 'Software Tester',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 19,
            'role_name' => 'Programmer',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 20,
            'role_name' => 'System Analyst',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 21,
            'role_name' => 'User',
            'project_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
