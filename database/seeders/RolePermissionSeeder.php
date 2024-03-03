<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_permission')->insert([
            ['role_id' => 1, 'permission_id' => 2], // 管理者ロールに「ユーザー検索」権限を追加
            ['role_id' => 2, 'permission_id' => 1], // システムオーナーロールに「ユーザーの削除」権限を追加
            ['role_id' => 2, 'permission_id' => 3], // システムオーナーロールに「管理者の追加」権限を追加
            ['role_id' => 2, 'permission_id' => 4], // システムオーナーロールに「管理者の削除」権限を追加
        ]);
    }
}
