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
            "Flask",
            "Koa",
            "NGINX",
            "Ruby on Rails Middleware",
            "Laravel Middleware",
            "Express.js Middleware",
            "Flask Middleware",
            "Spring Security",
            "Express.js Passport",
            "Django Middleware",
            "ASP.NET Middleware",
            "Node.js Middleware",
            "Django Middleware",
            "ASP.NET Core Middleware",
            "ASP.NET Core Middleware",
            "Django Middleware",
            "ASP.NET Web API Middleware",
            "ASP.NET Core Authentication",
            "Express GraphQL",
            "Django GraphQL",
            "Express Morgan",
            "Connect Morgan",
            "Django Logging",
            "ASP.NET Core Middleware",
            "Express Proxy Middleware",
            "Django Middleware",
            "ASP.NET Core Middleware",
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
