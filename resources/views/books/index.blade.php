@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')

    <h2>Daftar Buku</h2>
    <p>Berikut adalah koleksi buku yang tersedia di Library System.</p>

        <ul>
        @foreach($books as $book)
            <li>
                <p><strong>{{ $book['title'] }}</strong></p>
                <p>Penulis: {{ $book['author'] }}</p>
                <p>Tahun Terbit: {{ $book['year'] }}</p>
            </li>

        @if($book['stok'] > 0)
            <p>Stok: {{ $book['stok'] }}</p>
        @else
            <p>Stok Habis</p>
        @endif
        
        @endforeach
        </ul>

@endsection