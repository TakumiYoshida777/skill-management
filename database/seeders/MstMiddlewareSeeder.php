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
            "Apache Tomcat", "Express.js", "Flask", "Koa", "NGINX", "Redux Middleware", "Spring Boot", "Django Middleware", "Connect", "ASP.NET Middleware",
            "Ruby on Rails Middleware", "Laravel Middleware", "Express.js Middleware", "Flask Middleware", "Spring Security", "Express.js Passport", "Django Middleware", "Redux Thunk", "ASP.NET Core Middleware", "Node.js Middleware",
            "Morgan", "Helmet", "Body-parser", "Cors", "Compression", "Multer", "Passport", "Redux Logger", "Redux Saga", "Redux Thunk",
            "Express Session", "Connect Flash", "Winston", "Bunyan", "Log4js", "Django Rest Framework", "Connect Rate Limit", "ASP.NET Core Middleware", "Django CORS Headers", "Node.js Cluster",
            "Socket.IO", "Express Validator", "ASP.NET Core Identity", "Django Middleware", "Redux Persist", "Connect Redis", "Memcached", "Express Rate Limit", "Django Ratelimit", "ASP.NET Web API Middleware",
            "Express JWT", "Passport JWT", "Django OAuth Toolkit", "Spring Security OAuth", "ASP.NET Core Authentication", "Redux Form", "Redux Observable", "Redux Throttle", "Connect Multipart", "Express Multer",
            "Django File Upload", "ASP.NET Core File Upload", "Node.js Multer", "Connect Cookie Parser", "Express Cookie Session", "Express CSRF", "Django CSRF", "ASP.NET Core Antiforgery", "Redux Promise", "Express GraphQL",
            "Django GraphQL", "Express Morgan", "Connect Morgan", "Django Logging", "Express Timeout", "ASP.NET Core Middleware", "Redux WebSocket", "Socket.IO Middleware", "ASP.NET Core SignalR", "Express Proxy Middleware",
            "Django Middleware", "ASP.NET Core Middleware", "Connect Gzip", "Express Gzip", "Compression Middleware", "Django Compressor", "ASP.NET Bundling and Minification", "Node.js Gzip", "Redux Logger", "Redux DevTools Extension"
        ];


        $seed_data_ary = [];
        for($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "name" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_middlewares')->insert($seed_data_ary);
    }
}
