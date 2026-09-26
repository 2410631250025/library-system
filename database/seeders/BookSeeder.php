<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Pemrograman Web Framework',
                'author' => 'Billy Ibrahim',
                'year' => 2026,
                'stok' => 1,
            ],
            [
                'title' => 'Menapak Jejak Sejarah Indramayu',
                'author' => 'Supali Kasim',
                'year' => 2017,
                'stok' => 3,
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'year' => 2018,
                'stok' => 2,
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'year' => 2008,
                'stok' => 0,
            ],
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'year' => 2005,
                'stok' => 1,
            ],
            [
                'title' => 'Pengantar Kecerdasan Buatan',
                'author' => 'Bagja Nugraha',
                'year' => 2019,
                'stok' => 4,
            ],
            [
                'title' => 'Pengantar Blockchain Untuk Bisnis',
                'author' => 'Ahmad Khusaeri',
                'year' => 2024,
                'stok' => 2,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}