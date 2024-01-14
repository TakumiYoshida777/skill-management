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
            "Bazaar", "CVS", "Git", "Mercurial", "Perforce", "Subversion", "Team Foundation Version Control (TFVC)", "Bitbucket", "GitHub", "GitLab",
            "SourceForge", "AWS CodeCommit", "Beanstalk", "Gitea", "RhodeCode", "Plastic SCM", "Fossil", "Darcs", "Monotone", "GNU Arch",
            "Vesta", "CodePlex", "Kallithea", "Assembla", "Visual SourceSafe (VSS)", "AccuRev", "ClearCase", "StarTeam", "SourceGear Vault", "Plastic SCM",
            "Surround SCM", "VersionOne", "Alienbrain", "Rational Team Concert (RTC)", "ArX", "Flashline", "IBM Configuration Management Version Control (CMVC)", "MKS Source Integrity", "PVCS", "RCS",
            "SCCS", "Continuus", "Concurrent Versions System (CVSNT)", "AllChange", "SCM Manager", "Darcs", "Veracity", "Veracity", "Kallithea", "Plastic SCM",
            "Fossil", "MercurialEclipse", "VersionRecall", "SubGit", "Mercurial", "Veracity", "Plastic SCM", "Fossil", "Veracity", "RCS",
            "SCCS", "Continuus", "Concurrent Versions System (CVSNT)", "AllChange", "SCM Manager", "Darcs", "Veracity", "Veracity", "Kallithea", "Plastic SCM",
            "Fossil", "MercurialEclipse", "VersionRecall", "SubGit", "Mercurial", "Veracity"
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
