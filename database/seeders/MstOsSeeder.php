<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstOsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $oss = [
            # Windows シリーズ
            "Windows 11",
            "Windows 10",
            "Windows 8",
            "Windows 7",

            # Macintosh (Apple) シリーズ
            "macOS Monterey",
            "macOS Big Sur",
            "macOS Catalina",

            # Linux シリーズ
            "Ubuntu",
            "Fedora",
            "Debian",
            "CentOS",
            "Arch Linux",

            # Unix ファミリー
            "AIX",
            "HP-UX",
            "Solaris",
            "FreeBSD",
            "OpenBSD",
            "NetBSD",

            # モバイル OS
            "Android",
            "iOS",
            "HarmonyOS",
            "KaiOS",

            # 組み込みシステム向け OS
            "FreeRTOS",
            "VxWorks",
            "QNX",
            "μC/OS",

            # リアルタイム OS (RTOS)
            "FreeRTOS",
            "RTLinux",
            "FreeOSEK",

            # その他
            "Chrome OS",
            "Haiku",
            "Plan 9",
            "ReactOS"
        ];


        $seed_os_ary = [];
        for($i = 0; $i < count($oss); $i++) {
            $ary = [
                "id" => $i +1,
                "os" => $oss[$i]
            ];
            $seed_os_ary[] = $ary;
        }
        DB::table('mst_oss')->insert($seed_os_ary);
    }
}

