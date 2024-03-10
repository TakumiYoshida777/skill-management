<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * データベースシードを実行します。
     */
    public function run(): void
    {
        DB::table('users')
        ->insert([
            [
                'id' => '1',
                'role_id' => 1,
                'first_name' => '太郎',
                'first_name_kana' => 'タロウ',
                'last_name' => 'テスト',
                'last_name_kana' => 'テスト',
                'email' => 'test@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'role_id' => 1,
                'first_name' => '健太',
                'first_name_kana' => 'ケンタ',
                'last_name' => '佐藤',
                'last_name_kana' => 'サトウ',
                'email' => 'sato.kenta@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'role_id' => 2,
                'first_name' => '美咲',
                'first_name_kana' => 'ミサ',
                'last_name' => '鈴木',
                'last_name_kana' => 'スズキ',
                'email' => 'suzuki.misaki@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'role_id' => 3,
                'first_name' => '巧',
                'first_name_kana' => 'タクミ',
                'last_name' => '吉田',
                'last_name_kana' => 'ヨシダ',
                'email' => env('MY_MAIL_ADDRESS'),
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'role_id' => 3,
                'first_name' => 'オーナー',
                'first_name_kana' => 'オーナー',
                'last_name' => 'システム',
                'last_name_kana' => 'システム',
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

