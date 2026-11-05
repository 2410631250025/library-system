<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <style>
        /* Reset dan Base Font */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Latar Belakang Layar Penuh */
        body {
            background-color: #E0D6B8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #633A2C;
        }

        /* Kotak Login (Card) */
        .login-card {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #800000;
        }

        /* Judul Login */
        .login-card h1 {
            text-align: center;
            color: #800000;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        .login-card p.subtitle {
            text-align: center;
            color: #B8842C;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        /* Kotak Error Alert */
        .error-alert {
            background-color: #fde8e8;
            border: 1px solid #f9bcbc;
            color: #c81e1e;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.85rem;
        }
        .error-alert p {
            margin-bottom: 5px;
        }
        .error-alert p:last-child {
            margin-bottom: 0;
        }

        /* Grup Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #633A2C;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #B8842C;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efek saat input diklik/fokus */
        .form-group input:focus {
            border-color: #800000;
            box-shadow: 0 0 5px rgba(128, 0, 0, 0.2);
        }

        /* Tombol Login */
        .btn-login {
            width: 100%;
            background-color: #800000;
            color: #ffffff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #633A2C;
        }
    </style>
</head>

<body>
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif
    
    <div class="login-card">
        <h1>Library System</h1>
        <p class="subtitle">Silakan login untuk melanjutkan</p>

        @if ($errors->any())
            <div class="error-alert">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Masukkan email Anda"
                    value="{{ old('email') }}"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Masukkan password Anda"
                    required
                >
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>