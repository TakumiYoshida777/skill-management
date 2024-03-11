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
            "Amazon DynamoDB",
            "Amazon Neptune",
            "Apache Cassandra",
            "Apache Hadoop",
            "CouchDB",
            "db4o",
            "Google Bigtable",
            "InfluxDB",
            "MariaDB",
            "Memcached",
            "Microsoft SQL Server",
            "MongoDB",
            "MySQL",
            "Neo4j",
            "ObjectDB",
            "PostgreSQL",
            "Prometheus",
            "Redis",
            "XML DB"
        ];


        $seed_data_ary = [];
        for($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "name" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_databases')->insert($seed_data_ary);
    }
}

