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
      <h3>{{ $book->title }}</h3>    
      <p>Penulis: {{ $book->author }}</p>    
      <p>Kategori: {{ $book->category?->name ?? 'Belum ada kategori' }}</p>

            <a href="{{ route('books.show', $book) }}" >
                <button type="button">Detail</button>
            </a>  

            @can('delete', $book)
            <form action="{{ route('books.destroy', $book->id) }}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus buku ini?');">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>
            </form>
            @endcan
            
        </li>
        @endforeach
    </ul>

@endsection


