<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 100 sample projects
        $projects = [];
        $user_id = 1;

        for ($i = 0; $i < 300; $i++) {
            if ($i % 100 == 0 && $i != 0) {
                $user_id++;
            }
            $projects[] = [
                'user_id' => $user_id,
                'name' => 'Project ' . ($i + 1),
                'description' => 'This is project ' . ($i + 1) . ' description.',
                'start_date' => now(),
                'end_date' => now()->addMonths(random_int(1, 12)), // Random end date within 1 to 12 months
                'team_size' => random_int(5, 15),
                'all_team_size' => random_int(10, 20),
                'position' => 'Role ' . ($i + 1),
                'requirement_definition_flag' => true,
                'basic_design_flag' => true,
                'detailed_design_flag' => false,
                'db_design_flag' => false,
                'programming_flag' => false,
                'unit_testing_flag' => false,
                'integration_testing_flag' => false,
                'system_testing_flag' => false,
                'operation_testing_flag' => false,
                'system_migration_flag' => false,
                'operation_maintenance_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('projects')->insert($projects);
    }
}
