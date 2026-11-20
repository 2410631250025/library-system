@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div style="max-width: 500px; background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid #B8842C;">
    <h2 style="color: #633A2C; margin-top: 0; margin-bottom: 18px;">Edit Kategori Buku</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 18px;">
            <label style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 6px;">Nama Kategori</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; box-sizing: border-box;">
            @error('name')
                <p style="color: #dc3545; font-size: 0.85rem; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #800000; color: #fff; padding: 10px 18px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
                Update
            </button>
            <a href="{{ route('categories.index') }}" style="background: #E0D6B8; color: #633A2C; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection