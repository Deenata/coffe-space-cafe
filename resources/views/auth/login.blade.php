<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Coffe Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: #FAF3E0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 400px;
            padding: 36px 28px;
        }
        h1 {
            color: #A67C52;
            font-size: 2rem;
            margin-bottom: 8px;
            text-align: center;
            font-family: 'Poppins', 'Inter', sans-serif;
        }
        .subtitle {
            color: #6D4C41;
            text-align: center;
            margin-bottom: 24px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 18px;
        }
        .form-group label {
            color: #A67C52;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 2px;
            letter-spacing: 0.01em;
        }
        .form-group input[type="email"], .form-group input[type="password"] {
            width: 100%;
            padding: 13px 16px;
            border-radius: 12px;
            border: 1.5px solid #E0C9B2;
            background: #FAF3E0;
            color: #6D4C41;
            font-size: 1rem;
            font-family: 'Poppins', 'Inter', sans-serif;
            transition: border 0.2s, box-shadow 0.2s;
            outline: none;
            margin-bottom: 0;
            box-sizing: border-box;
        }
        .form-group input[type="email"]:focus, .form-group input[type="password"]:focus {
            border: 1.5px solid #A67C52;
            box-shadow: 0 0 0 2px #A67C5233;
            background: #fff;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }
        .actions label {
            font-weight: 400;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }
        .actions input[type="checkbox"] {
            margin-right: 6px;
        }
        .actions a {
            color: #A67C52;
            text-decoration: none;
            font-size: 0.95rem;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        button[type="submit"] {
            width: 100%;
            padding: 13px;
            background: #A67C52;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #8B6B4A;
        }
        .footer {
            text-align: center;
            margin-top: 18px;
        }
        .footer a {
            color: #A67C52;
            font-weight: 600;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 500px) {
            .container { padding: 18px 6vw; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <h1 style="margin-top: 8px;">Coffee Space Cafe</h1>
        <div class="subtitle">Selamat datang kembali</div>
        @if ($errors->any())
            <div style="background:#FEE;color:#C53030;padding:10px 14px;border-radius:8px;margin-bottom:18px;font-size:14px;border-left:4px solid #C53030;">
                <strong>Oops!</strong> Ada beberapa masalah dengan input Anda.
                <ul style="margin-top: 8px; margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a href="{{ url('/') }}" class="btn-back" style="position:absolute;top:24px;right:32px;z-index:10;display:inline-block;padding:10px 28px;background:#FAF3E0;color:#A67C52;border-radius:10px;font-weight:600;text-decoration:none;border:1.5px solid #E0C9B2;transition:background 0.2s;">&larr; Kembali ke Beranda</a>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda" required>
            </div>
            <div class="actions">
                <label><input type="checkbox" name="remember"> Ingat saya</label>
                <a href="#">Lupa kata sandi?</a>
            </div>
            <button type="submit">Masuk</button>
        </form>
        <div class="footer">
            Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
    </div>
</body>
</html> 