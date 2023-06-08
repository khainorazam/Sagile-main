<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([ProjectsTableSeeder::class]);
        $this->call([RolesTableSeeder::class]);
        $this->call([CodingStandardsTableSeeder::class]);
        $this->call([SecurityFeaturesTableSeeder::class]);
        $this->call([PerformanceFeaturesTableSeeder::class]);
        $this->call([StatusesTableSeeder::class]);
        $this->call([TeamsTableSeeder::class]);
    }
}
