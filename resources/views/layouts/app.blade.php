<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Library System</title>
    <style>
        /* 1. Mendaftarkan Palet Warna */
        :root {
            --maroon: #800000;
            --dark-brown: #633A2C;
            --brown: #B8842C;
            --gold: #B8860B;
            --beige: #E0D6B8;
            --white: #ffffff;
        }

        /* 2. Reset CSS Basic */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* 3. Setup Layout Grid (Meniru Layout Dashboard) */
        body {
            display: grid;
            grid-template-columns: 260px 1fr; /* 260px untuk sidebar, sisanya untuk konten */
            grid-template-rows: 1fr auto;
            min-height: 100vh;
            background-color: var(--beige);
            color: var(--dark-brown);
        }

        /* 4. Mengubah <header> menjadi Sidebar Kiri */
        header {
            grid-column: 1 / 2;
            grid-row: 1 / 3;
            background-color: var(--white);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            border-right: 2px solid var(--gold);
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        }

        header h1 {
            color: var(--maroon);
            font-size: 1.6rem;
            margin-bottom: 5px;
        }

        header p {
            font-size: 0.85rem;
            color: var(--brown);
            margin-bottom: 40px;
        }

        header hr {
            display: none; /* Dihilangkan agar terlihat lebih modern */
        }

        /* 5. Navigasi / Menu Sidebar */
        nav {
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
        }

        nav a {
            text-decoration: none;
            color: var(--dark-brown);
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        /* Efek saat menu di-hover / disorot */
        nav a:hover {
            background-color: var(--brown);
            color: var(--white);
            transform: translateX(5px);
        }

        /* 6. Tombol Logout di bawah sidebar */
        nav form {
            margin-top: 30px;
        }

        nav button {
            width: 100%;
            background-color: var(--maroon);
            color: var(--beige);
            border: none;
            padding: 14px 15px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        nav button:hover {
            background-color: var(--dark-brown);
        }

        /* 7. Area Konten Utama di Tengah/Kanan */
        main {
            grid-column: 2 / 3;
            grid-row: 1 / 2;
            padding: 40px;
            background-color: var(--beige);
            overflow-y: auto;
        }

        /* 8. Footer di bagian bawah konten utama */
        footer {
            grid-column: 2 / 3;
            grid-row: 2 / 3;
            padding: 20px 40px;
            background-color: var(--white);
            border-top: 1px solid var(--gold);
            text-align: center;
            font-size: 0.9rem;
            color: var(--dark-brown);
        }
        
        footer hr {
            display: none;
        }
    </style>
</head>

<body>

    <header>
        <h1>Library System</h1>
        <p>Sistem Informasi Perpustakaan Sederhana</p>
        
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('members.index') }}">Members</a>
            <a href="{{ route('borrowings.index') }}">Borrowings</a>
            
            @can('manage-user')
                <a href="{{ route('users.index') }}">
                    Kelola Pengguna
                </a>
            @endcan
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 Library System - Sistem Informasi Perpustakaan</p>
    </footer>

</body>
</html>