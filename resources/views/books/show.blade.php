@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<style>
    .detail-container {
        max-width: 650px;
    }
    .page-header {
        margin-bottom: 20px;
    }
    .page-header h3 {
        font-size: 1.8rem;
        color: #633A2C;
        margin: 0 0 4px 0;
    }
    .page-header p {
        color: #8c6239;
        margin: 0;
        font-size: 0.95rem;
    }
    .detail-card {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border-top: 5px solid #800000;
    }
    .book-header-title {
        font-size: 1.45rem;
        color: #800000;
        margin: 0 0 20px 0;
        padding-bottom: 15px;
        border-bottom: 1px solid #f0ebe1;
    }
    .detail-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
        margin-bottom: 28px;
    }
    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 10px;
        border-bottom: 1px dashed #ece6d8;
        font-size: 0.95rem;
    }
    .detail-label {
        font-weight: bold;
        color: #633A2C;
    }
    .detail-value {
        color: #444444;
        font-weight: 500;
    }
    .badge-category {
        background-color: #F3EAD8;
        color: #633A2C;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: bold;
    }
    .badge-stok {
        background-color: #e8f5e9;
        color: #2e7d32;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: bold;
    }
    .action-buttons {
        display: flex;
        gap: 12px;
    }
    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        font-size: 0.9rem;
        text-align: center;
        transition: opacity 0.2s;
    }
    .btn:hover {
        opacity: 0.88;
    }
    .btn-edit {
        background-color: #B8842C;
        color: #ffffff;
    }
    .btn-back {
        background-color: #E0D6B8;
        color: #633A2C;
    }
</style>

<div class="detail-container">
    <div class="page-header">
        <h3>Detail Buku</h3>
        <p>Informasi lengkap koleksi buku perpustakaan.</p>
    </div>

    <div class="detail-card">
        <h4 class="book-header-title">{{ $book->title }}</h4>

        <div class="detail-list">
            <div class="detail-row">
                <span class="detail-label">ID Buku</span>
                <span class="detail-value">#{{ $book->id }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Penulis</span>
                <span class="detail-value">{{ $book->author }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Tahun Terbit</span>
                <span class="detail-value">{{ $book->year ?? '-' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Kategori</span>
                <span class="badge-category">{{ $book->category?->name ?? 'Belum ada kategori' }}</span>
            </div>
            <div class="detail-row" style="border-bottom: none;">
                <span class="detail-label">Stok Tersedia</span>
                <span class="badge-stok">{{ $book->stok ?? 0 }} buku</span>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('books.edit', $book) }}" class="btn btn-edit">Edit Buku</a>
            <a href="{{ route('books.index') }}" class="btn btn-back">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection