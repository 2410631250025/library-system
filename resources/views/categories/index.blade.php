@extends('layouts.app')
@section('title', 'Kategori Buku')
@section('content')

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('categories.create') }}">+ Tambah Kategori Baru</a>
        
    <h2>Kategori Buku</h2>
    <ul>
    @foreach($categories as $category)
    <li>
        <p> {{ $category->name }}</p>

        <a href="{{ route('categories.edit', $category) }}" >
            <button type="button">Edit</button>
        </a>

            <form action="{{ route('categories.destroy', $category) }}" method="POST" >
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
