<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineerSkillLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('engineer_skill_languages')->insert([
            [
                'user_id' => 1,
                'name' => 'PHP',
                'experience_months' => 20,
                'auto_renew_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'HTML',
                'experience_months' => 20,
                'auto_renew_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'CSS',
                'experience_months' => 20,
                'auto_renew_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Javascript',
                'experience_months' => 7,
                'auto_renew_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => 'Java',
                'experience_months' => 7,
                'auto_renew_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => 'PHP',
                'experience_months' => 2,
                'auto_renew_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => 'HTML',
                'experience_months' => 20,
                'auto_renew_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => 'Go',
                'experience_months' => 0,
                'auto_renew_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
