<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // public function index() {
    // $title = 'Daftar Buku';
    // $description = 'Daftar Buku yang tersedia di Perpustakaan';}
    public function index() 
    {
        $books = Book::all();

        return view('books.index', compact('books'));       
    }

    public function show($id)
    {
    return view('books.show', compact('id'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
    Book::create([
        'title' => $request->title,
        'author' => $request->author,
        'year' => $request->year,
        'stok' => $request->stok,
    ]);

    return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
    return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
    $book->update([
        'title' => $request->title,
        'author' => $request->author,
        'year' => $request->year,
        'stok' => $request->stok,
    ]);
    return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }


}
