@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
    <h2 style="color: #633A2C; margin: 0;">Daftar Peminjaman</h2>
    <a href="{{ route('borrowings.create') }}" style="background: #800000; color: #fff; padding: 10px 16px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.9rem;">
        + Tambah Peminjaman Baru
    </a>
</div>

@if (session('success'))
    <div style="background: #d4edda; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #28a745;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="background: #f8d7da; color: #721c24; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #dc3545;">
        {{ session('error') }}
    </div>
@endif

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(310px, 1fr)); gap: 18px;">
    @foreach($borrowings as $borrowing)
        <div style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid {{ $borrowing->status == 'borrowed' ? '#B8842C' : '#28a745' }}; display: flex; flex-direction: column; justify-content: space-between;">
            <div style="margin-bottom: 16px; font-size: 0.92rem; color: #444;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    @if($borrowing->status == 'borrowed')
                        <span style="background: #fff3cd; color: #856404; padding: 3px 10px; border-radius: 15px; font-size: 0.8rem; font-weight: bold;">
                            Dipinjam
                        </span>
                    @else
                        <span style="background: #d4edda; color: #155724; padding: 3px 10px; border-radius: 15px; font-size: 0.8rem; font-weight: bold;">
                            Dikembalikan ({{ $borrowing->return_date }})
                        </span>
                    @endif
                </div>

                <h3 style="color: #633A2C; margin: 0 0 8px 0; font-size: 1.15rem;">
                    {{ $borrowing->member?->name ?? 'Anggota tidak ditemukan' }}
                </h3>
                <p style="margin: 4px 0;"><strong>Petugas:</strong> {{ $borrowing->user?->name ?? '-' }}</p>
                <p style="margin: 4px 0;"><strong>Pinjam:</strong> {{ $borrowing->borrowing_date }} &bull; <strong>Jatuh Tempo:</strong> {{ $borrowing->due_date }}</p>

                <div style="margin-top: 12px; padding: 10px; background: #fdfbf7; border-radius: 8px; border: 1px solid #f0ebe1;">
                    <strong style="color: #633A2C; font-size: 0.85rem;">Buku yang dipinjam:</strong>
                    <ul style="margin: 6px 0 0 0; padding-left: 18px; color: #333;">
                        @foreach($borrowing->details as $detail)
                            <li style="margin-bottom: 3px;">{{ $detail->book?->title ?? 'Buku dihapus' }} <strong>({{ $detail->quantity }} pcs)</strong></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @if($borrowing->status == 'borrowed')
                <div style="padding-top: 12px; border-top: 1px solid #f0ebe1;">
                    <form action="{{ route('borrowings.return', $borrowing->id) }}" 
                          method="POST" 
                          style="margin: 0;"
                          onsubmit="return confirm('Yakin ingin memproses pengembalian buku ini?');">
                        @csrf
                        <button type="submit" style="width: 100%; background: #B8842C; color: #fff; padding: 9px; border: none; border-radius: 7px; font-weight: bold; font-size: 0.88rem; cursor: pointer;">
                            Kembalikan Buku
                        </button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>
@endsection