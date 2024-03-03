<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'serch_user', 'display_name' => 'ユーザー検索', 'description' => 'ユーザーを検索する権限'],
            ['name' => 'delete_user', 'display_name' => 'ユーザーの削除', 'description' => 'ユーザーを削除する権限'],
            ['name' => 'add_adminuser', 'display_name' => '管理者の追加', 'description' => '新しい管理者を追加する権限'],
            ['name' => 'delete_adminuser', 'display_name' => '管理者の削除', 'description' => '管理者を削除する権限'],
        ]);
    }
}
