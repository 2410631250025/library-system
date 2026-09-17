@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <h3>Informasi Library System</h3>
    <p><strong>Jumlah Buku:</strong> {{ $bookCount }} buku</p>
    <p><strong>Jumlah Member:</strong> {{ $memberCount }} member</p>
    <p><strong>Jumlah Kategori:</strong> {{ $categoryCount }} kategori</p>

@endsection