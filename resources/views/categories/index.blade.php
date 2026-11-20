@extends('layouts.app')

@section('title', 'Kategori Buku')

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
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 20px;
    }
    .category-card {
        background-color: #ffffff;
        border-radius: 14px;
        padding: 22px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-left: 5px solid #800000;
    }
    .category-info {
        margin-bottom: 18px;
    }
    .category-label {
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #B8842C;
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }
    .category-name {
        font-size: 1.2rem;
        color: #633A2C;
        margin: 0;
        font-weight: bold;
    }
    .category-actions {
        display: flex;
        gap: 8px;
        padding-top: 14px;
        border-top: 1px solid #f0ebe1;
    }
    .btn-action {
        flex: 1;
        padding: 8px 12px;
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
        <h3>Kategori Buku</h3>
        <p>Klasifikasi dan pengelompokan koleksi perpustakaan.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn-add">+ Tambah Kategori Baru</a>
</div>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="categories-grid">
    @foreach($categories as $category)
        <div class="category-card">
            <div class="category-info">
                <span class="category-label">Kategori #{{ $loop->iteration }}</span>
                <h4 class="category-name">{{ $category->name }}</h4>
            </div>

            <div class="category-actions">
                <a href="{{ route('categories.edit', $category) }}" class="btn-action btn-edit">Edit</a>

                <form action="{{ route('categories.destroy', $category) }}"
                    method="POST"
                    class="delete-form"
                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection