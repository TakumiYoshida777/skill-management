<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineerSkillDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 全員共通のスキルを追加
        DB::table("engineer_skill_databases")->insert([
            'user_id' => 1,
            'name' => 'MySQL',
            'experience_months' => 24,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_databases")->insert([
            'user_id' => 2,
            'name' => 'MySQL',
            'experience_months' => 24,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_databases")->insert([
            'user_id' => 3,
            'name' => 'MySQL',
            'experience_months' => 24,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 1 の追加スキルを追加
        DB::table("engineer_skill_databases")->insert([
            'user_id' => 1,
            'name' => 'PostgreSQL',
            'experience_months' => 12,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_databases")->insert([
            'user_id' => 1,
            'name' => 'SQLite',
            'experience_months' => 6,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 2 の追加スキルを追加
        DB::table("engineer_skill_databases")->insert([
            'user_id' => 2,
            'name' => 'MongoDB',
            'experience_months' => 12,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_databases")->insert([
            'user_id' => 2,
            'name' => 'Amazon DynamoDB',
            'experience_months' => 6,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 3 の追加スキルを追加
        DB::table("engineer_skill_databases")->insert([
            'user_id' => 3,
            'name' => 'PostgreSQL',
            'experience_months' => 12,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_databases")->insert([
            'user_id' => 3,
            'name' => 'MongoDB',
            'experience_months' => 6,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
