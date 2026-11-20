@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .dashboard-header { 
        margin-bottom: 30px; 
        color: #633A2C; 
    }
    .dashboard-header h3 { 
        font-size: 1.8rem; 
        margin-bottom: 5px; 
    }
    .stats-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
        gap: 25px; 
        margin-bottom: 40px; 
    }
    .stat-card { 
        background-color: #ffffff; 
        border-radius: 15px; 
        padding: 25px; 
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); 
        display: flex; 
        flex-direction: column; 
        justify-content: space-between; 
    }
    .stat-icon { 
        width: 40px; 
        height: 40px; 
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-size: 1.2rem; 
        margin-bottom: 20px; 
        font-weight: bold; 
    }
    .stat-details h4 { 
        font-size: 1.1rem; 
        color: #633A2C; 
        margin-bottom: 8px; 
    }
    .stat-details .count { 
        font-size: 2rem; 
        font-weight: bold; 
        color: #800000; 
    }
    .stat-details .label { 
        font-size: 0.9rem; 
        color: #B8842C; 
    }
    
    /* Highlight Card (Kartu Merah) */
    .stat-card.highlight { 
        background-color: #800000; 
        color: #ffffff; 
    }
    .stat-card.highlight .stat-details h4, 
    .stat-card.highlight .stat-details .count { 
        color: #ffffff; 
    }
    .stat-card.highlight .stat-details .label { 
        color: #E0D6B8; 
    }
    .stat-card.highlight .stat-icon { 
        background-color: rgba(255, 255, 255, 0.2); 
        color: #ffffff; 
    }
    
    /* Regular Card (Kartu Putih) */
    .stat-card.regular .stat-icon { 
        background-color: #E0D6B8; 
        color: #800000; 
    }

    /* Tombol Card */
    .card-btn { 
        margin-top: 25px; 
        padding: 10px; 
        border-radius: 8px; 
        text-align: center; 
        text-decoration: none; 
        font-weight: bold; 
        font-size: 0.9rem; 
        display: block;
    }
    .stat-card.highlight .card-btn { 
        background-color: #ffffff; 
        color: #800000; 
    }
    .stat-card.regular .card-btn { 
        border: 1px solid #B8842C; 
        color: #633A2C; 
        background-color: transparent; 
    }
</style>

<div class="dashboard-header">
    <h3>Informasi Library System</h3>
    <p>Ringkasan data perpustakaan saat ini.</p>
</div>

<div class="stats-grid">
    <!-- Kartu 1: Total Buku -->
    <div class="stat-card highlight">
        <div class="stat-icon">📚</div>
        <div class="stat-details">
            <h4>Total Buku</h4>
            <!-- Menggunakan ?? 0 untuk mencegah error jika variabel kosong -->
            <div class="count">{{ $bookCount ?? 0 }}</div>
            <div class="label">Judul tersedia</div>
        </div>
        <a href="{{ route('books.index') }}" class="card-btn">Kelola Buku</a>
    </div>

    <!-- Kartu 2: Total Member -->
    <div class="stat-card regular">
        <div class="stat-icon">👥</div>
        <div class="stat-details">
            <h4>Total Member</h4>
            <div class="count">{{ $memberCount ?? 0 }}</div>
            <div class="label">Anggota aktif</div>
        </div>
        <a href="{{ route('members.index') }}" class="card-btn">Lihat Member</a>
    </div>

    <!-- Kartu 3: Kategori -->
    <div class="stat-card regular">
        <div class="stat-icon">🏷️</div>
        <div class="stat-details">
            <h4>Kategori</h4>
            <div class="count">{{ $categoryCount ?? 0 }}</div>
            <div class="label">Klasifikasi buku</div>
        </div>
        <a href="{{ route('categories.index') }}" class="card-btn">Lihat Kategori</a>
    </div>

    <!-- Kartu 4: Peminjaman -->
    <div class="stat-card regular">
        <div class="stat-icon">🔄</div>
        <div class="stat-details">
            <h4>Peminjaman</h4>
            <div class="count">{{ $borrowingCount ?? 0 }}</div>
            <div class="label">{{ $activeBorrowingCount ?? 0 }} sedang dipinjam</div>
        </div>
        <a href="{{ route('borrowings.index') }}" class="card-btn">Kelola Peminjaman</a>
    </div>
</div>
@endsection