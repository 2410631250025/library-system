<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'user', 'details.book'])->get();
        return view('borrowings.index', compact('borrowings'));
    }
    public function create()
    {
        $members = Member::all();
        // Hanya tampilkan buku yang stoknya masih ada
        $books = Book::where('stok', '>', 0)->get(); 
        
        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([    
            'member_id' => 'required|exists:members,id',    
            'book_id' => 'required|exists:books,id',    
            'quantity' => 'required|integer|min:1', 
        ]);

    $book = Book::findOrFail($request->book_id); 
    
    if ($book->stok < $request->quantity) {    
        return back()        
            ->withErrors([            
                'quantity' => 'Stok buku tidak mencukupi.',        
                ])        
                ->withInput(); 
    }

    $borrowing = Borrowing::create([    
        'user_id' => auth()->id(),    
        'member_id' => $request->member_id,    
        'borrowing_date' => now()->toDateString(),    
        'due_date' => now()->addDays(7)->toDateString(),    
        'status' => 'borrowed', 
    ]); 
    
    $borrowing->details()->create([    
        'book_id' => $book->id,    
        'quantity' => $request->quantity, 
    ]);

    $book->decrement('stok', $request->quantity);

    return redirect()->back()->with('success', 'Transaksi peminjaman berhasil, stok buku telah dikurangi!');
    
    }

    public function returnBook($id)
    {
    
    $borrowing = Borrowing::findOrFail($id);

    if ($borrowing->status === 'returned') {
        return redirect()->back()->with('error', 'Buku pada transaksi ini sudah dikembalikan sebelumnya.');
    }

    $borrowing->update([
        'return_date' => now()->toDateString(),
        'status' => 'returned',
    ]);

    foreach ($borrowing->details as $detail) {
        $detail->book->increment('stok', $detail->quantity);
    }
    return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }
}