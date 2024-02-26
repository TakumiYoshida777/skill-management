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

        for ($i = 0; $i < 30; $i++) {
            if ($i == 10 || $i == 20) {
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
                'requirement_definition_flag' => $i % 3 == 0 ? true : false,
                'basic_design_flag' => $i % 2 == 0 ? true : false,
                'detailed_design_flag' => $i % 5 == 0 ? true : false,
                'db_design_flag' => $i % 6 == 0 ? true : false,
                'programming_flag' => $i % 4 == 0 ? true : false,
                'unit_test_flag' => $i % 8 == 0 ? true : false,
                'integration_test_flag' => $i % 7 == 0 ? true : false,
                'system_test_flag' => $i % 9 == 0 ? true : false,
                'operation_test_flag' => $i % 10 == 0 ? true : false,
                'system_migration_flag' => $i % 11 == 0 ? true : false,
                'operation_maintenance_flag' => $i % 1 == 0 ? true : false,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $project_used_middleware[] = [
                'project_id' => $i + 1,
                'name' => 'Flask',
            ];
            $project_used_frameworks[] = [
                'project_id' => $i + 1,
                'name' => 'Laravel',
            ];
            $project_used_version_management[] = [
                'project_id' => $i + 1,
                'name' => 'Git',
            ];
            $project_used_languages[] = [
                'project_id' => $i + 1,
                'name' => 'PHP',
            ];
            $project_used_databases[] = [
                'project_id' => $i + 1,
                'name' => 'MariaDB',
            ];
            $project_used_servers[] = [
                'project_id' => $i + 1,
                'name' => 'Server ' . ($i + 1),
            ];
            $project_used_os[] = [
                'project_id' => $i + 1,
                'name' => 'Arch Linux',
            ];
            $project_used_virtual_environments[] = [
                'project_id' => $i + 1,
                'name' => 'Docker',
            ];
        }

        DB::table('projects')->insert($projects);
        DB::table('project_used_middleware')->insert($project_used_middleware);
        DB::table('project_used_frameworks')->insert($project_used_frameworks);
        DB::table('project_used_version_management')->insert($project_used_version_management);
        DB::table('project_used_languages')->insert($project_used_languages);
        DB::table('project_used_databases')->insert($project_used_databases);
        DB::table('project_used_servers')->insert($project_used_servers);
        DB::table('project_used_os')->insert($project_used_os);


        $projects2[] = [
            'user_id' => 1,
            'name' => 'endNullProject',
            'description' => '現在アサインされてます',
            'start_date' => now(),
            'end_date' => null, // Random end date within 1 to 12 months
            'team_size' => random_int(5, 15),
            'all_team_size' => random_int(10, 20),
            'position' => 'Role ' . ($i + 1),
            'requirement_definition_flag' => true,
            'basic_design_flag' => true,
            'detailed_design_flag' => false,
            'db_design_flag' => false,
            'programming_flag' => false,
            'unit_test_flag' => false,
            'integration_test_flag' => false,
            'system_test_flag' => false,
            'operation_test_flag' => false,
            'system_migration_flag' => false,
            'operation_maintenance_flag' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('projects')->insert($projects2);
    }
}
