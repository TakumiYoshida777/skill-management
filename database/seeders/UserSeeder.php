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
                'first_name' => '巧',
                'first_name_kana' => 'タクミ',
                'last_name' => '吉田',
                'last_name_kana' => 'ヨシダ',
                'email' => 'yoshida.fm.0626@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}

