<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            'user_id' => 1,
            'division' => '開発部',
            'position' => '一般',
            'section' => 'Web開発',
            'industry_experience' => 24,
            'birthdate' => '1990-01-01',
            'pr' => 'Web開発が得意で、新しい技術にも積極的に取り組みます。'
        ]);

        DB::table('profiles')->insert([
            'user_id' => 2,
            'division' => '開発部',
            'position' => '課長',
            'section' => 'Web開発',
            'industry_experience' => 36,
            'birthdate' => '1985-05-15',
            'pr' => '営業経験豊富で、お客様との信頼関係を大切にしています。'
        ]);

        DB::table('profiles')->insert([
            'user_id' => 3,
            'division' => '開発部',
            'position' => '主任',
            'section' => 'Web開発',
            'industry_experience' => 12,
            'birthdate' => '1995-12-31',
            'pr' => '人事業務を通じて、社員の成長を支援しています。'
        ]);
        DB::table('profiles')->insert([
            'user_id' => 4,
            'division' => null,
            'position' => '一般',
            'section' => null,
            'industry_experience' =>null,
            'birthdate' => null,
            'pr' => null
        ]);
    }
}
