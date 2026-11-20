<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Aditya Nugraha', 'member_code' => 'M001', 'email' => 'asitya@gmail.com', 'phone' => '081234567890', 'address' => 'Jl. Merdeka No. 17, Karawang'
            ],
            [
                'name' => 'Nazma Adhvika Arafah', 'member_code' => 'M002', 'email' => 'nasmuy@gmail.com', 'phone' => '081234567891', 'address' => 'Jl. Cilandak No. 091, Indramayu'
            ],
            [
                'name' => 'Abelia Yustika', 'member_code' => 'M003', 'email' => 'asel@gmail.com', 'phone' => '081234567892', 'address' => 'Jl. Diponegoro No. 031, Cikarang'
            ],
            [
                'name' => 'Annisa Annastia', 'member_code' => 'M004', 'email' => 'cia@gmail.com', 'phone' => '081234567893', 'address' => 'Jl. Gajah Mada No. 101, Brebes'
            ],
            [
                'name' => 'Nisa Ainul Hakim', 'member_code' => 'M005', 'email' => 'isul@gmail.com', 'phone' => '081234567894', 'address' => 'Jl. Hasanuddin No. 026, Sukabui'
            ],
        ];

        foreach ($members as $member) {
            \App\Models\Member::create($member);
        }
    }
}
