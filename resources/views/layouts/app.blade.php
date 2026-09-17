<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Library System</title>
</head>

<body>

    <header>
        <h1>Library System</h1>
        <p>Sistem Informasi Perpustakaan Sederhana</p>
        
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a> |
            <a href="{{ route('books.index') }}">Books</a> |
            <a href="{{ route('categories.index') }}">Categories</a> |
            <a href="{{ route('members.index') }}">Members</a>
        </nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>&copy; 2026 Library System - Sistem Informasi Perpustakaan</p>
    </footer>

</body>
</html>