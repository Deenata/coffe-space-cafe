<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - Coffe Space Cafe</title>
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
        .main {
            flex: 1;
            margin-left: 0;
            padding: 40px 5vw 40px 5vw;
            padding-left: 300px;
            display: flex;
            flex-direction: column;
            gap: 32px;
            overflow-y: auto;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        .main.expanded {
            margin-left: 0;
            padding-left: 80px;
        }
        @media (min-width: 1025px) {
            .main {
                margin-left: 0;
                padding-left: 300px;
            }
            .main.expanded {
                margin-left: 0;
                padding-left: 80px;
            }
        }
        @media (max-width: 1024px) {
            .main { 
                margin-left: 0 !important;
                padding-left: 5vw !important;
            }
            .container { 
                flex-direction: column; 
            }
        }
        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            padding: 28px 32px;
            margin-bottom: 24px;
        }
        .settings-card h2 {
            color: var(--kopi);
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 18px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--kopi-dark);
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid #e0d3c0;
            background: var(--white);
            color: var(--kopi-dark);
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--kopi);
        }
        .save-btn {
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 16px;
            padding: 12px 32px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
        }
        .save-btn:hover {
            background: var(--kopi-dark);
        }
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-weight: 600;
            transition: opacity 0.4s;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .profile-settings-card {
            background: #fff;
            border-radius: 22px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 36px 32px 32px 32px;
            max-width: 400px;
            margin: 32px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .profile-photo-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 18px;
        }
        .profile-photo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #f8e8c8;
            margin-bottom: 10px;
        }
        .change-photo-btn {
            background: #f8e8c8;
            color: #a67c52;
            border: none;
            border-radius: 8px;
            padding: 6px 18px;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 18px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .change-photo-btn:hover {
            background: #f3d9a7;
        }
        .form-group {
            width: 100%;
            margin-bottom: 16px;
        }
        .form-group label {
            font-weight: 700;
            color: #a67c52;
            margin-bottom: 6px;
            display: block;
        }
        .input-cream {
            width: 100%;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1.5px solid #e0d3c0;
            background: #f8e8c8;
            color: #6d4c41;
            font-size: 1rem;
            margin-top: 4px;
            transition: border-color 0.2s;
        }
        .input-cream:focus {
            outline: none;
            border-color: #a67c52;
        }
        .save-btn-wide {
            width: 100%;
            background: #a67c52;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 14px 0;
            font-size: 1.1rem;
            font-weight: bold;
            margin-top: 10px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .save-btn-wide:hover {
            background: #6d4c41;
        }
        .settings-flex {
            display: flex;
            flex-direction: row;
            gap: 32px;
            align-items: flex-start;
            width: 100%;
        }
        .settings-card {
            flex: 1 1 55%;
            min-width: 320px;
            max-width: 600px;
        }
        .profile-settings-card {
            flex: 1 1 45%;
            min-width: 320px;
            max-width: 400px;
        }
        @media (max-width: 900px) {
            .settings-flex {
                flex-direction: column;
                gap: 24px;
            }
            .settings-card, .profile-settings-card {
                max-width: 100%;
                min-width: 0;
            }
        }
        @media (max-width: 600px) {
            .main-header h1 { font-size: 1.2rem; }
            .settings-card { padding: 20px 24px; }
            .save-btn { padding: 10px 24px; font-size: 0.95rem; }
        }
    </style>
</head>
<body>
<div class="container">
    @include('admin.partials.sidebar')
    <main class="main">
        <div class="main-header">
            <h1>Pengaturan</h1>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif
        <div class="settings-flex">
            <div class="profile-settings-card">
                <div class="profile-photo-section">
                    <img src="{{ auth()->user()->foto ? asset('storage/' . auth()->user()->foto) : 'https://placehold.co/96x96?text=Foto' }}" class="profile-photo" alt="Foto Profil">
                    <button type="button" class="change-photo-btn">Ubah Foto Profil</button>
                </div>
                <form method="POST" action="{{ route('settings.account.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', auth()->user()->name) }}" class="input-cream">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="input-cream">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" id="password" name="password" class="input-cream">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Profil</label>
                        <input type="file" id="foto" name="foto" class="input-cream">
                    </div>
                    <button type="submit" class="save-btn-wide">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </main>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.transition = 'opacity 0.4s';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 400);
        });
    }, 1000);
});
</script>
</body>
</html> 