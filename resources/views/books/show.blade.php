@extends('layouts.app')
@section('title', 'Detail Buku')
@section('content')

    <h2>Detail Buku</h2>
    <p><strong>ID Buku:</strong> {{ $id }}</p>
    <p><strong>Judul:</strong> {{ $book['title'] }}</p>
    <p><strong>Penulis:</strong> {{ $book['author'] }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $book['year'] }}</p>
    <p><strong>Stok:</strong> {{ $book['stok'] }}</p>
    <a href="{{ route('books.index') }}" class="button">
        Kembali ke Books
    </a>

@endsection