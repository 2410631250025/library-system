@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')

<a href="{{ route('books.create') }}">Tambah Buku Baru</a>

<ul>
    @foreach($books as $book)
    <li>
        <p>ID Buku: {{ $book->id }}</p>
        <p>Judul: {{ $book->title }}</p>
            <p>Penulis: {{ $book->author }}</p>
            <p>Tahun Terbit: {{ $book->year }}</p>
            <p>Stok: {{ $book->stok }}</p>

            <a href="{{ route('books.edit', $book) }}" >Edit</a>
        
            <form action="{{ route('books.destroy', $book) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit">
                    Hapus
                </button>
            </form>
            
        </li>
        @endforeach
    </ul>

@endsection


