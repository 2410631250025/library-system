@extends('layouts.app')
@section('title', 'Detail Buku')
@section('content')

    <h2>Detail Buku</h2>
    <p><strong>ID Buku:</strong> {{ $id }}</p>
    <a href="{{ route('books.index') }}" class="button">
        Kembali ke Books
    </a>

@endsection