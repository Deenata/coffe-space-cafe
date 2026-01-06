<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Coffe Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
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
            max-width: 420px;
            padding: 20px 28px;
        }
        h1 {
            color: #A67C52;
            font-size: 2rem;
            margin-bottom: 8px;
            text-align: center;
        }
        .subtitle {
            color: #6D4C41;
            text-align: center;
            margin-bottom: 24px;
        }
        label {
            color: #6D4C41;
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 90%;
            padding: 10px 10px;
            border: 2px solid #E8E8E8;
            border-radius: 10px;
            margin-bottom: 10px;
            font-size: 1rem;
            background: #FAFAFA;
        }
        input:focus {
            border-color: #A67C52;
            outline: none;
            background: #fff;
        }
        .actions {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 18px;
        }
        .actions input[type="checkbox"] {
            margin-right: 6px;
        }
        .actions label {
            font-weight: 400;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
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
    <a href="{{ route('login') }}" class="btn-back" style="position:absolute;top:24px;right:32px;z-index:10;display:inline-block;padding:10px 28px;background:#FAF3E0;color:#A67C52;border-radius:10px;font-weight:600;text-decoration:none;border:1.5px solid #E0C9B2;transition:background 0.2s;">&larr; Kembali ke Login</a>
    <div class="container">
        <h1>Coffe Space Cafe</h1>
        <div class="subtitle">Bergabung dengan kami</div>
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
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div style="display: flex; gap: 10px; margin-bottom: 16px;">
                <div style="flex:1; display: flex; flex-direction: column; gap: 6px;">
                    <label for="first_name">Nama Depan</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Nama depan" required>
                </div>
                <div style="flex:1; display: flex; flex-direction: column; gap: 6px;">
                    <label for="last_name">Nama Belakang</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Nama belakang" required>
                </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px;">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div style="display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px;">
                <label for="phone">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" placeholder="Nomor telepon" required>
            </div>
            <div style="display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px;">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Kata sandi" required>
            </div>
            <div style="display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px;">
                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required>
            </div>
            <div class="actions" style="margin-bottom: 18px;">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">Saya setuju dengan <a href="#">Syarat & Ketentuan</a></label>
            </div>
            <button type="submit">Daftar Sekarang</button>
        </form>
        <div class="footer">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>
</body>
</html> 