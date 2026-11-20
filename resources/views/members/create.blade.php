@extends('layouts.app')

@section('title', 'Tambah Anggota Baru')

@section('content')
<div style="max-width: 550px; background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid #800000;">
    <h2 style="color: #633A2C; margin-top: 0; margin-bottom: 18px;">Tambah Anggota Baru</h2>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 14px;">
            <label for="member_code" style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 5px;">Kode Anggota</label>
            <input type="text" id="member_code" name="member_code" value="{{ old('member_code') }}" placeholder="Contoh: M006" required
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; box-sizing: border-box;">
            @error('member_code')
                <p style="color: #dc3545; font-size: 0.85rem; margin: 4px 0 0;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 14px;">
            <label for="name" style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 5px;">Nama Anggota</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; box-sizing: border-box;">
            @error('name')
                <p style="color: #dc3545; font-size: 0.85rem; margin: 4px 0 0;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 14px;">
            <label for="email" style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 5px;">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@gmail.com" required
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; box-sizing: border-box;">
            @error('email')
                <p style="color: #dc3545; font-size: 0.85rem; margin: 4px 0 0;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 14px;">
            <label for="phone" style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 5px;">Telepon</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08123456789"
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; box-sizing: border-box;">
            @error('phone')
                <p style="color: #dc3545; font-size: 0.85rem; margin: 4px 0 0;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 18px;">
            <label for="address" style="display: block; font-weight: bold; color: #633A2C; margin-bottom: 5px;">Alamat</label>
            <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap anggota"
                style="width: 100%; padding: 10px 12px; border: 1px solid #d6cbb5; border-radius: 8px; box-sizing: border-box; font-family: inherit;">{{ old('address') }}</textarea>
            @error('address')
                <p style="color: #dc3545; font-size: 0.85rem; margin: 4px 0 0;">{{ $message }}</p>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #800000; color: #fff; padding: 10px 18px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
                Simpan
            </button>
            <a href="{{ route('members.index') }}" style="background: #E0D6B8; color: #633A2C; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection