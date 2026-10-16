<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Teknologi & Pemrograman',
            ],
            [
                'name' => 'Sejarah',
            ],
            [
                'name' => 'Pengembangan Diri',
            ],
            [
                'name' => 'Kecerdasan Buatan',
            ],
            [
                'name' => 'Bisnis & Teknologi',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
