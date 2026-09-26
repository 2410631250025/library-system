@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')

    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>

        <ul>
        {{-- -@foreach ($books as $book)
            <li>{{  $book }}</li>
            @endforeach--}}

        @foreach($books as $book)
        <li>
            <p>ID Buku: {{ $book->id }}</p>
            <p>Judul: {{ $book->title }}</p>
            <p>Penulis: {{ $book->author }}</p>
            <p>Tahun Terbit: {{ $book->year }}</p>
            <p>Stok: {{ $book->stok }}</p>
        </li>
        @endforeach
        </ul>

@endsection