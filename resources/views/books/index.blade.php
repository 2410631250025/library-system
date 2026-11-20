@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }
    .page-header h3 {
        font-size: 1.8rem;
        color: #633A2C;
        margin: 0;
    }
    .page-header p {
        color: #8c6239;
        margin: 4px 0 0 0;
        font-size: 0.95rem;
    }
    .btn-add {
        background-color: #800000;
        color: #ffffff;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        font-size: 0.9rem;
        box-shadow: 0 3px 10px rgba(128, 0, 0, 0.2);
        transition: background-color 0.2s;
    }
    .btn-add:hover {
        background-color: #600000;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 12px 18px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 5px solid #28a745;
        font-weight: 500;
    }
    .books-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
        gap: 20px;
    }
    .book-card {
        background-color: #ffffff;
        border-radius: 14px;
        padding: 22px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-top: 4px solid #800000;
    }
    .book-title {
        font-size: 1.2rem;
        color: #633A2C;
        margin: 0 0 12px 0;
        line-height: 1.3;
    }
    .book-meta {
        font-size: 0.9rem;
        color: #555555;
        margin-bottom: 18px;
    }
    .book-meta p {
        margin: 6px 0;
    }
    .badge-category {
        display: inline-block;
        background-color: #F3EAD8;
        color: #633A2C;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    .badge-stok {
        display: inline-block;
        background-color: #e8f5e9;
        color: #2e7d32;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    .book-actions {
        display: flex;
        gap: 8px;
        padding-top: 14px;
        border-top: 1px solid #f0ebe1;
    }
    .btn-action {
        flex: 1;
        padding: 8px 10px;
        border-radius: 7px;
        font-size: 0.85rem;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: opacity 0.2s;
        display: inline-block;
    }
    .btn-action:hover {
        opacity: 0.88;
    }
    .btn-detail {
        background-color: #E0D6B8;
        color: #633A2C;
    }
    .btn-edit {
        background-color: #B8842C;
        color: #ffffff;
    }
    .btn-delete {
        background-color: #dc3545;
        color: #ffffff;
        width: 100%;
    }
    .delete-form {
        flex: 1;
        margin: 0;
    }
</style>

<div class="page-header">
    <div>
        <h3>Daftar Buku</h3>
        <p>Koleksi buku yang tersedia di perpustakaan.</p>
    </div>
    <a href="{{ route('books.create') }}" class="btn-add">+ Tambah Buku Baru</a>
</div>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="books-grid">
    @foreach($books as $book)
        <div class="book-card">
            <div>
                <h4 class="book-title">{{ $book->title }}</h4>
                <div class="book-meta">
                    <p><strong>Penulis:</strong> {{ $book->author }}</p>
                    <p><strong>Kategori:</strong> <span class="badge-category">{{ $book->category?->name ?? 'Belum ada kategori' }}</span></p>
                    <p><strong>Stok:</strong> <span class="badge-stok">{{ $book->stok ?? 0 }} tersedia</span></p>
                </div>
            </div>

            <div class="book-actions">
                <a href="{{ route('books.show', $book) }}" class="btn-action btn-detail">Detail</a>
                <a href="{{ route('books.edit', $book) }}" class="btn-action btn-edit">Edit</a>

                @can('delete', $book)
                <form action="{{ route('books.destroy', $book->id) }}"
                    method="POST"
                    class="delete-form"
                    onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">Hapus</button>
                </form>
                @endcan
            </div>
        </div>
    @endforeach
</div>
@endsection