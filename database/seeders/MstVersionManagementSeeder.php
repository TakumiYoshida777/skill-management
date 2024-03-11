<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstVersionManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "AccuRev",
            "AllChange",
            "Alienbrain",
            "ArX",
            "Assembla",
            "AWS CodeCommit",
            "Beanstalk",
            "Bitbucket",
            "Bazaar",
            "ClearCase",
            "CodePlex",
            "Concurrent Versions System (CVSNT)",
            "Continuus",
            "CVS",
            "Darcs",
            "Flashline",
            "Fossil",
            "Git",
            "GitHub",
            "GitLab",
            "Gitea",
            "GNU Arch",
            "IBM Configuration Management Version Control (CMVC)",
            "Kallithea",
            "Mercurial",
            "MercurialEclipse",
            "Monotone",
            "MKS Source Integrity",
            "Perforce",
            "Plastic SCM",
            "PVCS",
            "Rational Team Concert (RTC)",
            "RCS",
            "RhodeCode",
            "SCCS",
            "SCM Manager",
            "SourceForge",
            "SourceGear Vault",
            "StarTeam",
            "SubGit",
            "Subversion",
            "Surround SCM",
            "Team Foundation Version Control (TFVC)",
            "Vesta",
            "VersionOne",
            "VersionRecall",
            "Visual SourceSafe (VSS)",
            "Veracity"
        ];


        $seed_data_ary = [];
        for ($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "name" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_version_managements')->insert($seed_data_ary);
    }
}
