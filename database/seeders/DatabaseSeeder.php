<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            MstOsSeeder::class,
            MstServerSeeder::class,
            MstDatabaseSeeder::class,
            MstLangSeeder::class,
            MstFrameworkSeeder::class,
            MstMiddlewareSeeder::class,
            MstVersionManagementSeeder::class,
            ProfileSeeder::class,
            MstVirtualEnvironmentSeeder::class,
            ProjectSeeder::class,
            AdminSeeder::class,
            EngineerSkillLanguageSeeder::class,
            EngineerSkillFrameworkSeeder::class,
            EngineerSkillDatabaseSeeder::class,
            EngineerSkillMiddlewareSeeder::class,
            EngineerSkillOsSeeder::class,
            EngineerSkillServerSeeder::class,
            EngineerSkillVirtualEnvironmentSeeder::class,
            EngineerSkillVersionManagementSeeder::class,
        ]);
    }
}
