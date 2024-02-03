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
            "VirtualBox",
            "VMware",
            "Docker",
            "Vagrant",
            "KVM (Kernel-based Virtual Machine)",
            "Hyper-V",
            "Parallels",
            "QEMU",
            "Xen",
            "Proxmox Virtual Environment",
            "LXC (Linux Containers)",
            "OpenVZ",
            "LXD (Linux Container Daemon)",
            "AWS EC2 (Amazon Elastic Compute Cloud)",
            "Google Cloud Compute Engine",
            "Microsoft Azure Virtual Machines",
            "Oracle VM VirtualBox",
            "HashiCorp Nomad",
            "Rancher",
            "Minikube"
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
