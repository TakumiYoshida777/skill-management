<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "Apache", "Nginx", "Microsoft IIS",
            "Tomcat", "WildFly", "WebSphere",
            "Samba", "FileZilla Server", "vsftpd",
            "Postfix", "Sendmail", "Microsoft Exchange Server",
            "VMware vSphere/ESXi", "Microsoft Hyper-V", "KVM",
            "Cloudflare", "Akamai", "Amazon CloudFront",
            "BIND", "Microsoft DNS", "Unbound",
            "ProFTPD", "Pure-FTPd", "vsftpd",
            "pfSense", "Cisco ASA", "Fortinet FortiGate",
            "Wowza Streaming Engine", "Adobe Media Server", "Microsoft Stream",
            "NTP (Network Time Protocol)サーバー",
            "Amazon EC2", "Microsoft Azure VM", "Google Cloud Compute Engine"
        ];


        $seed_data_ary = [];
        for ($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "name" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_servers')->insert($seed_data_ary);
    }
}
