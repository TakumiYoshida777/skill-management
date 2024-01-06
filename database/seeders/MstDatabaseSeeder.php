<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "XMLデータベース",
            "MySQL",
            "MariaDB",
            "PostgreSQL",
            "Microsoft SQL Server",
            "db4o",
            "ObjectDB",
            "Redis",
            "Amazon DynamoDB",
            "Apache Cassandra",
            "MongoDB",
            "CouchDB",
            "Neo4j",
            "Amazon Neptune",
            "InfluxDB",
            "Prometheus",
            "Apache Hadoop",
            "Google Bigtable",
            "Redis",
            "Memcached"
        ];


        $seed_data_ary = [];
        for($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "database" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_databases')->insert($seed_data_ary);
    }
}

