@extends('layouts.app')

@section('title', 'Data Member')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
    <h2 style="color: #633A2C; margin: 0;">Data Anggota</h2>
    <a href="{{ route('members.create') }}" style="background: #800000; color: #fff; padding: 10px 16px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.9rem;">
        + Tambah Anggota Baru
    </a>
</div>

@if (session('success'))
    <div style="background: #d4edda; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #28a745;">
        {{ session('success') }}
    </div>
@endif

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 18px;">
    @foreach($members as $member)
        <div style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid #800000; display: flex; flex-direction: column; justify-content: space-between;">
            <div style="margin-bottom: 16px; font-size: 0.92rem; color: #444;">
                <span style="display: inline-block; background: #F3EAD8; color: #633A2C; padding: 3px 10px; border-radius: 15px; font-size: 0.8rem; font-weight: bold; margin-bottom: 8px;">
                    {{ $member->member_code ?? 'Tanpa Kode' }}
                </span>
                <h3 style="color: #633A2C; margin: 0 0 10px 0; font-size: 1.15rem;">{{ $member->name }}</h3>
                <p style="margin: 4px 0;"><strong>Email:</strong> {{ $member->email }}</p>
                <p style="margin: 4px 0;"><strong>Telepon:</strong> {{ $member->phone ?? '-' }}</p>
                <p style="margin: 4px 0;"><strong>Alamat:</strong> {{ $member->address ?? '-' }}</p>
            </div>

            <div style="display: flex; gap: 8px; padding-top: 12px; border-top: 1px solid #f0ebe1;">
                <a href="{{ route('members.edit', $member) }}" style="flex: 1; background: #B8842C; color: #fff; padding: 8px; border-radius: 7px; text-decoration: none; text-align: center; font-weight: bold; font-size: 0.85rem;">
                    Edit
                </a>

                <form action="{{ route('members.destroy', $member) }}" method="POST" style="flex: 1; margin: 0;" onsubmit="return confirm('Yakin ingin menghapus anggota ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="width: 100%; background: #dc3545; color: #fff; padding: 8px; border: none; border-radius: 7px; font-weight: bold; font-size: 0.85rem; cursor: pointer;">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection