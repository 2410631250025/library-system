<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $memberCount = Member::count();
        $borrowingCount = Borrowing::count();
        $activeBorrowingCount = Borrowing::where('status', 'borrowed')->count();

        return view('dashboard.index', compact(
            'bookCount',
            'categoryCount',
            'memberCount',
            'borrowingCount',
            'activeBorrowingCount'
        ));
    }
}