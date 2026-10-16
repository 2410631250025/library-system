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
                'name' => 'Aditya Nugraha', 'email' => 'asitya@gmail.com', 'phone' => '081234567890'
            ],
            [
                'name' => 'Nazma Adhvika Arafah', 'email' => 'nasmah@gmail.com', 'phone' => '081234567891'
            ],
            [
                'name' => 'Abelia Yustika', 'email' => 'asel@gmail.com', 'phone' => '081234567892'
            ],
            [
                'name' => 'Annisa Annastia', 'email' => 'cia@gmail.com', 'phone' => '081234567893'
            ],
            [
                'name' => 'Nisa Ainul Hakim', 'email' => 'isul@gmail.com', 'phone' => '081234567894'
            ],
        ];

        foreach ($members as $member) {
            \App\Models\Member::create($member);
        }
    }
}
