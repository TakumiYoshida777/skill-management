<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')
        ->insert([
            [
                'id' => '2',
                'first_name' => '太郎',
                'first_name_kana' => 'タロウ',
                'last_name' => '管理者',
                'last_name_kana' => 'カンリシャ',
                'role_id' => 1,
                'email' => 'admin@admin.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('admins')
        ->insert([
            [
                'id' => '3',
                'first_name' => '次郎',
                'first_name_kana' => 'ジロウ',
                'last_name' => '管理者',
                'last_name_kana' => 'カンリシャ',
                'role_id' => 2,
                'email' => 'owner@owner.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
