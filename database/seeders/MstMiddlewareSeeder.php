<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstMiddlewareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "ASP.NET Core Authentication",
            "ASP.NET Core Middleware",
            "ASP.NET Middleware",
            "ASP.NET Web API Middleware",
            "Connect Morgan",
            "Django GraphQL",
            "Django Logging",
            "Django Middleware",
            "Express GraphQL",
            "Express Morgan",
            "Express Proxy Middleware",
            "Express.js Middleware",
            "Express.js Passport",
            "Flask",
            "Flask Middleware",
            "Koa",
            "Laravel Middleware",
            "NGINX",
            "Node.js Middleware",
            "Ruby on Rails Middleware",
            "Spring Security"
          ];


        $seed_data_ary = [];
        for ($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "name" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_middlewares')->insert($seed_data_ary);
    }
}
