@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<style>
    .form-container {
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
    .form-card {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border-top: 5px solid #B8842C;
    }
    .form-group {
        margin-bottom: 18px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
        color: #633A2C;
        margin-bottom: 6px;
        font-size: 0.95rem;
    }
    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d6cbb5;
        border-radius: 8px;
        font-size: 0.95rem;
        color: #333333;
        background-color: #fdfbf7;
        box-sizing: border-box;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-control:focus {
        outline: none;
        border-color: #800000;
        background-color: #ffffff;
        box-shadow: 0 0 0 3px rgba(128, 0, 0, 0.1);
    }
    .error-text {
        color: #dc3545;
        font-size: 0.85rem;
        margin: 5px 0 0 0;
    }
    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 25px;
        padding-top: 18px;
        border-top: 1px solid #f0ebe1;
    }
    .btn {
        padding: 10px 22px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 0.95rem;
        text-decoration: none;
        border: none;
        cursor: pointer;
        text-align: center;
        transition: opacity 0.2s;
    }
    .btn:hover {
        opacity: 0.88;
    }
    .btn-update {
        background-color: #800000;
        color: #ffffff;
    }
    .btn-cancel {
        background-color: #E0D6B8;
        color: #633A2C;
    }
</style>

<div class="form-container">
    <div class="page-header">
        <h3>Edit Buku</h3>
        <p>Perbarui informasi koleksi buku perpustakaan.</p>
    </div>

    <div class="form-card">
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul Buku</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $book->title) }}"
                    required>
                @error('title')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="author">Penulis</label>
                <input
                    type="text"
                    id="author"
                    name="author"
                    class="form-control"
                    value="{{ old('author', $book->author) }}"
                    required>
                @error('author')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="year">Tahun Terbit</label>
                <input
                    type="number"
                    id="year"
                    name="year"
                    class="form-control"
                    value="{{ old('year', $book->year) }}">
                @error('year')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="stok">Stok Buku</label>
                <input
                    type="number"
                    id="stok"
                    name="stok"
                    class="form-control"
                    placeholder="Jumlah stok buku"
                    value="{{ old('stok', $book->stok) }}"
                    min="0"
                    required>
                @error('stok')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id', $book->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-update">Simpan Perubahan</button>
                <a href="{{ route('books.index') }}" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection