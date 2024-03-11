<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstVirtualEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "AWS EC2 (Amazon Elastic Compute Cloud)",
            "Docker",
            "Google Cloud Compute Engine",
            "HashiCorp Nomad",
            "Hyper-V",
            "KVM (Kernel-based Virtual Machine)",
            "LXC (Linux Containers)",
            "LXD (Linux Container Daemon)",
            "Microsoft Azure Virtual Machines",
            "Minikube",
            "OpenVZ",
            "Oracle VM VirtualBox",
            "Parallels",
            "Proxmox Virtual Environment",
            "QEMU",
            "Rancher",
            "Vagrant",
            "VirtualBox",
            "VMware",
            "Xen"
        ];

        $seed_data_ary = [];
        for($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "name" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_virtual_environments')->insert($seed_data_ary);
    }
}
