<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $memberCount = Member::count();

        return view('dashboard.index', compact(
            'bookCount',
            'categoryCount',
            'memberCount'
        ));
    }
}