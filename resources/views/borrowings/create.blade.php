@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<div style="max-width: 550px; background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid #800000;">
    <h2 style="color: #633A2C; margin-top: 0; margin-bottom: 18px;">Form Peminjaman Buku</h2>

    @if (session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; border-left: 4px solid #28a745;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; border-left: 4px solid #dc3545;">
            <ul style="margin: 0; padding-left: 18px; font-size: 0.9rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 14px;">
            <label style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 5px;">Pilih Anggota</label>
            <select name="member_id" required
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; background: #fff; box-sizing: border-box;">
                <option value="">-- Pilih Anggota --</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->name }} ({{ $member->member_code }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 14px;">
            <label style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 5px;">Pilih Buku</label>
            <select name="book_id" required
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; background: #fff; box-sizing: border-box;">
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                        {{ $book->title }} (Stok: {{ $book->stok }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 5px;">Jumlah Pinjam</label>
            <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" required
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; box-sizing: border-box;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #800000; color: #fff; padding: 10px 18px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
                Simpan Transaksi
            </button>
            <a href="{{ route('borrowings.index') }}" style="background: #E0D6B8; color: #633A2C; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold;">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection