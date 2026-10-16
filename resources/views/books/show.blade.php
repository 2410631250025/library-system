@extends('layouts.app')
@section('title', 'Detail Buku')
@section('content')

    <h2>Detail Buku</h2>
    <p><strong>ID Buku:</strong> {{ $book->id }}</p>
    <p>Judul: {{ $book->title }}</p>
    <p>Penulis: {{ $book->author }}</p>
    <p>Tahun Terbit: {{ $book->year }}</p>
    <p>Stok: {{ $book->stok }}</p>

    <a href="{{ route('books.edit', $book) }}" >
        <button type="button">Edit</button>
    </a>

    <a href="{{ route('books.index') }}" class="button">
        Kembali ke Books
    </a>

@endsection