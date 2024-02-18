<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineerSkillFrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ユーザー 1 のスキルを追加
        DB::table("engineer_skill_frameworks")->insert([
            'user_id' => 1,
            'name' => 'React',
            'experience_months' => 6,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_frameworks")->insert([
            'user_id' => 1,
            'name' => 'Redux',
            'experience_months' => 2,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_frameworks")->insert([
            'user_id' => 1,
            'name' => 'Laravel',
            'experience_months' => 2,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 2 のスキルを追加
        DB::table("engineer_skill_frameworks")->insert([
            'user_id' => 2,
            'name' => 'Vue.js',
            'experience_months' => 8,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ユーザー 2 のスキルを追加
        DB::table("engineer_skill_frameworks")->insert([
            'user_id' => 2,
            'name' => 'Laravel',
            'experience_months' => 8,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 3 のスキルを追加
        DB::table("engineer_skill_frameworks")->insert([
            'user_id' => 3,
            'name' => 'Angular',
            'experience_months' => 4,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ユーザー 3 のスキルを追加
        DB::table("engineer_skill_frameworks")->insert([
            'user_id' => 3,
            'name' => 'Laravel',
            'experience_months' => 4,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
