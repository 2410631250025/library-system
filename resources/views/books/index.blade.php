@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

<a href="{{ route('books.create') }}">+ Tambah Buku Baru</a>

<ul>
    @foreach($books as $book)
    <li>
        <p>ID Buku: {{ $book->id }}</p>
        <p>Judul: {{ $book->title }}</p>

            <a href="{{ route('books.show', $book) }}" >
                <button type="button">Detail</button>
            </a>  

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


