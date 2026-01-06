<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Kasir - Coffe Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #FAF3E0;
            --white: #FFFFFF;
            --kopi: #A67C52;
            --kopi-dark: #6D4C41;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--cream);
            min-height: 100vh;
            color: var(--kopi-dark);
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            background: var(--white);
            box-shadow: 2px 0 16px rgba(166,124,82,0.07);
            border-radius: 0 32px 32px 0;
            padding: 32px 0 24px 0;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .sidebar .brand {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--kopi);
            text-align: center;
            margin-bottom: 36px;
            letter-spacing: 1px;
        }
        .sidebar nav {
            flex: 1;
        }
        .sidebar ul {
            list-style: none;
            padding: 0 0 0 18px;
        }
        .sidebar ul li {
            margin-bottom: 18px;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: var(--kopi-dark);
            font-weight: 600;
            font-size: 1rem;
            padding: 10px 18px;
            border-radius: 12px 0 0 12px;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar ul li a.active, .sidebar ul li a:hover {
            background: var(--cream);
            color: var(--kopi);
        }
        .sidebar ul li svg {
            width: 22px;
            height: 22px;
            color: var(--kopi-dark);
        }
        .sidebar ul li a.active svg, .sidebar ul li a:hover svg {
            color: var(--kopi);
        }
        .sidebar .logout {
            margin-top: 32px;
            text-align: center;
        }
        .sidebar .logout form button {
            background: var(--kopi);
            color: var(--white);
            border: none;
            padding: 10px 32px;
            border-radius: 20px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
        }
        .sidebar .logout form button:hover {
            background: var(--kopi-dark);
        }
        .main {
            flex: 1;
            padding: 40px 5vw 40px 5vw;
            display: flex;
            flex-direction: column;
            gap: 32px;
        }
        .main-header {
            margin-bottom: 24px;
        }
        .main-header h1 {
            color: var(--kopi);
            font-size: 2rem;
            font-weight: 700;
        }
        .settings-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 32px 40px 28px 40px;
            max-width: 700px;
            margin: 0 auto 32px auto;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        .settings-card h2 {
            color: var(--kopi);
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .settings-card form label {
            font-weight: 600;
            color: var(--kopi-dark);
            margin-bottom: 6px;
            display: block;
        }
        .settings-card form input[type="text"],
        .settings-card form input[type="email"],
        .settings-card form input[type="password"] {
            width: 100%;
            padding: 10px 16px;
            border-radius: 12px;
            border: 1px solid #e0d3c0;
            background: var(--cream);
            color: var(--kopi-dark);
            font-size: 1rem;
            margin-bottom: 16px;
            box-shadow: 0 1px 4px rgba(166,124,82,0.07);
        }
        .settings-card form input[type="file"] {
            margin-bottom: 16px;
        }
        .settings-card form .settings-btn {
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 12px;
            padding: 10px 28px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
            margin-right: 10px;
        }
        .settings-card form .settings-btn:hover {
            background: var(--kopi-dark);
        }
        .settings-card form .reset-btn {
            background: #f7cfcf;
            color: #b71c1c;
            border: none;
            border-radius: 12px;
            padding: 10px 28px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.07);
            transition: background 0.2s;
        }
        .settings-card form .reset-btn:hover {
            background: #fbe9e7;
        }
        .profile-pic {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }
        .profile-pic img {
            width: 56px;
            height: 56px;
            object-fit: cover;
            border-radius: 50%;
            border: 1px solid #e0d3c0;
        }
        .account-info-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            padding: 18px 24px;
            max-width: 340px;
            margin-top: 16px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 1rem;
        }
        .account-info-card .info-label {
            color: var(--kopi);
            font-weight: 600;
        }
        .logout-btn {
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
            width: 100%;
        }
        .logout-btn:hover {
            background: var(--kopi-dark);
        }
        @media (max-width: 900px) {
            .container { flex-direction: column; }
            .sidebar { width: 100%; border-radius: 0 0 32px 32px; flex-direction: row; padding: 16px 0; }
            .sidebar nav { flex: none; }
            .main { padding: 24px 3vw; }
            .settings-card { padding: 18px 8vw; max-width: 100%; }
        }
        @media (max-width: 600px) {
            .main-header h1 { font-size: 1.2rem; }
            .settings-card, .account-info-card { padding: 12px; min-width: 0; }
        }
    </style>
</head>
<body>
<div class="container">
    @include('kasir.partials.sidebar')
    <main class="main">
        <div class="main-header">
            <h1>Pengaturan Profil Kasir</h1>
        </div>
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        <div class="settings-card">
            <h2>Ubah Profil</h2>
            <form method="POST" action="{{ route('pengaturan.kasir.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="profile-pic">
                    <img src="{{ $user && $user->foto ? Storage::url($user->foto) : 'https://placehold.co/56x56?text=Foto' }}" alt="Foto Profil">
                    <input type="file" id="foto" name="foto" accept="image/*">
                </div>
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" value="{{ $user ? $user->name : '' }}" required>
                @error('nama')
                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: -12px; margin-bottom: 12px;">{{ $message }}</div>
                @enderror
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" value="{{ $user ? $user->email : '' }}" required>
                @error('email')
                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: -12px; margin-bottom: 12px;">{{ $message }}</div>
                @enderror
                
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" value="{{ $user ? $user->username : '' }}" required>
                @error('username')
                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: -12px; margin-bottom: 12px;">{{ $message }}</div>
                @enderror
                
                <label for="password">Ubah Password (opsional)</label>
                <input type="password" id="password" name="password" placeholder="Password Baru">
                @error('password')
                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: -12px; margin-bottom: 12px;">{{ $message }}</div>
                @enderror
                
                <button type="submit" class="settings-btn">Simpan Perubahan</button>
                <button type="reset" class="reset-btn">Reset</button>
            </form>
            
          
    </main>
</div>

<script>
    // Auto dismiss success alert after 3 seconds
    setTimeout(function() {
        const alert = document.querySelector('[style*="background: #d4edda"]');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000);
</script>
</body>
</html> 