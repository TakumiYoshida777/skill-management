<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('owners')
        ->insert([
            [
                'id' => '1',
                'first_name' => '次郎',
                'first_name_kana' => 'ジロウ',
                'last_name' => 'システム管理者',
                'last_name_kana' => 'システムカンリシャ',
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
