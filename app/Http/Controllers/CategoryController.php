<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = [
            'Teknologi & Pemrograman',
            'Sejarah',
            'Pengembangan Diri',
            'Kecerdasan Buatan',
            'Bisnis & Teknologi',
        ];
    return view('categories.index', compact('categories'));
    }
}
