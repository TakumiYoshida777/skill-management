<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'employees' => '123456789',
                'first_name' => '巧',
                'first_name_kana_en' => 'Takumi',
                'last_name' => '吉田',
                'last_name_kana_en' => 'Yoshida',
                'email' => 'yoshida.fm.0626@gmail.com',
                'email_verified_at' => null,
                'birthdate' => '1998-02-25',
                'position' => '一般',
                'division' => '管理部',
                'section' => 'システム課',
                'industry_experience_months' => 18,
                'password' => Hash::make('password'),
                'pr' => '自己PR自己PR自己PR自己PR自己PR自己PR自己PR自己PR自己PR',
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'employees' => '135792468',
                'first_name' => '健太',
                'first_name_kana_en' => 'Kenta',
                'last_name' => '佐藤',
                'last_name_kana_en' => 'Sato',
                'email' => 'sato.kenta@example.com',
                'email_verified_at' => null,
                'birthdate' => '1995-08-25',
                'position' => '一般',
                'division' => 'ICT事業部',
                'section' => '',
                'industry_experience_months' => 12,
                'password' => Hash::make('password'),
                'pr' => '自己PR自己PR自己PR自己PR自己PR自己PR自己PR自己PR自己PR',
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'employees' => '246813579',
                'first_name' => '美咲',
                'first_name_kana_en' => 'Misaki',
                'last_name' => '鈴木',
                'last_name_kana_en' => 'Suzuki',
                'email' => 'suzuki.misaki@example.com',
                'email_verified_at' => null,
                'birthdate' => '1992-06-03',
                'position' => 'ICT事業部',
                'section' => '',
                'division' => 'マネージャー',
                'industry_experience_months' => 36,
                'password' => Hash::make('password'),
                'pr' => '自己PR自己PR自己PR自己PR自己PR自己PR自己PR自己PR自己PR',
                'remember_token' => 'remember_token_value_here',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
