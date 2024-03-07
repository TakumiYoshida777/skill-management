<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // ロールを追加する
                DB::table('roles')->insert([
                    ['id' => 1,'name' => 'user', 'display_name' => 'ユーザー', 'description' => 'スキルシート作成機能の利用者（一般ユーザー）'],
                    ['id' => 2,'name' => 'admin', 'display_name' => '管理者', 'description' => 'システムの管理者'],
                    ['id' => 3,'name' => 'owner', 'display_name' => 'システムオーナー', 'description' => 'システムのオーナー'],
                ]);
    }
}
