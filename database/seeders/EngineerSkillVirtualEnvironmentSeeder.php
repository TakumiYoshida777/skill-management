<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineerSkillVirtualEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ユーザー 1 のスキルを追加
        DB::table("engineer_skill_virtual_environments")->insert([
            'user_id' => 1,
            'name' => 'Docker',
            'experience_months' => 24,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_virtual_environments")->insert([
            'user_id' => 1,
            'name' => 'AWS EC2 (Amazon Elastic Compute Cloud)',
            'experience_months' => 12,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 2 のスキルを追加
        DB::table("engineer_skill_virtual_environments")->insert([
            'user_id' => 2,
            'name' => 'VirtualBox',
            'experience_months' => 36,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_virtual_environments")->insert([
            'user_id' => 2,
            'name' => 'Docker',
            'experience_months' => 24,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("engineer_skill_virtual_environments")->insert([
            'user_id' => 2,
            'name' => 'VirtualBox',
            'experience_months' => 24,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ユーザー 3 のスキルを追加
        DB::table("engineer_skill_virtual_environments")->insert([
            'user_id' => 3,
            'name' => 'Docker',
            'experience_months' => 12,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("engineer_skill_virtual_environments")->insert([
            'user_id' => 3,
            'name' => 'VirtualBox',
            'experience_months' => 24,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("engineer_skill_virtual_environments")->insert([
            'user_id' => 3,
            'name' => 'VMware',
            'experience_months' => 24,
            'auto_renew_flag' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
