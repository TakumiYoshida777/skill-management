<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineerSkillMiddlewareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ユーザー 1 のスキルを追加
        DB::table("engineer_skill_middleware")->insert([
            'user_id' => 1,
            'name' => 'Laravel Middleware',
            'experience_months' => 6,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ユーザー 1 のスキルを追加
        DB::table("engineer_skill_middleware")->insert([
            'user_id' => 1,
            'name' => 'Express GraphQL',
            'experience_months' => 6,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 2 のスキルを追加
        DB::table("engineer_skill_middleware")->insert([
            'user_id' => 2,
            'name' => 'Laravel Middleware',
            'experience_months' => 12,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ユーザー 2 のスキルを追加
        DB::table("engineer_skill_middleware")->insert([
            'user_id' => 2,
            'name' => 'Koa',
            'experience_months' => 12,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ユーザー 2 のスキルを追加
        DB::table("engineer_skill_middleware")->insert([
            'user_id' => 2,
            'name' => 'Django Middleware',
            'experience_months' => 12,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 3 のスキルを追加
        DB::table("engineer_skill_middleware")->insert([
            'user_id' => 3,
            'name' => 'Laravel Middleware',
            'experience_months' => 8,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ユーザー 3 のスキルを追加
        DB::table("engineer_skill_middleware")->insert([
            'user_id' => 3,
            'name' => 'Connect Morgan',
            'experience_months' => 8,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
