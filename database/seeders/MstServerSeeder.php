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
            "Adobe Media Server",
            "Amazon CloudFront",
            "Amazon EC2",
            "Bind",
            "Apache",
            "Cloudflare",
            "Cisco ASA",
            "FileZilla Server",
            "Fortinet FortiGate",
            "Google Cloud Compute Engine",
            "KVM",
            "Microsoft DNS",
            "Microsoft Exchange Server",
            "Microsoft Hyper-V",
            "Microsoft IIS",
            "Microsoft Azure VM",
            "Microsoft Stream",
            "Nginx",
            "NTP (Network Time Protocol)サーバー",
            "pfSense",
            "Postfix",
            "ProFTPD",
            "Pure-FTPd",
            "Samba",
            "Sendmail",
            "Tomcat",
            "Unbound",
            "VMware vSphere/ESXi",
            "vsftpd",
            "WebSphere",
            "WildFly",
            "Wowza Streaming Engine"
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
