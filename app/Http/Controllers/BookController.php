<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // public function index() {
    // $title = 'Daftar Buku';
    // $description = 'Daftar Buku yang tersedia di Perpustakaan';}
    public function index() 
    {
        $books = Book::with('category')->get();

        return view('books.index', compact('books'));       
    }

    public function show(Book $book)
    {
    return view('books.show', compact('book'));
    }

    public function create()
    {
        $title = 'Tambah Buku';
        $categories = Category::orderBy('name')->get();
        $book = new Book();

        return view('books.create', compact('title', 'book', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900',       
            'stok' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]); 

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku Berhasil Ditambahkan.');
    }

    public function edit(Book $book)
    {

    $categories = Category::orderBy('name')->get();
    
    return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
    $book->update([
        'title' => $request->title,
        'author' => $request->author,
        'year' => $request->year,
        'stok' => $request->stok,
        'category_id' => $request->category_id,
    ]);
    return redirect()->route('books.index')
        ->with('success', 'Data Buku Berhasil Diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }


}