<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Menu - Coffee Space Cafe</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background: #FAF3E0;
            box-shadow: 2px 0 12px rgba(166, 124, 82, 0.08);
            border-radius: 0 20px 20px 0;
            display: flex;
            flex-direction: column;
            position: relative;
            flex-shrink: 0;
            overflow: hidden;
        }

        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(166, 124, 82, 0.08);
            background: transparent;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            color: #A67C52;
            flex-shrink: 0;
        }

        .brand-text-wrapper {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .brand-text-line1,
        .brand-text-line2 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: #A67C52;
            letter-spacing: 0.2px;
            display: block;
        }

        .brand-text-line1 {
            margin-bottom: 2px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 24px 16px;
            overflow-y: auto;
        }

        .nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            text-decoration: none;
            color: #A67C52;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 12px;
            transition: all 0.2s ease;
            position: relative;
            background: transparent;
            min-height: 48px;
        }

        .nav-link:hover {
            background: rgba(166, 124, 82, 0.08);
            color: #8B6F47;
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.6);
            color: #A67C52;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(166, 124, 82, 0.08);
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .nav-link:hover .nav-icon {
            transform: scale(1.1);
        }

        .nav-text {
            font-weight: 500;
            transition: font-weight 0.3s ease;
        }

        .nav-link:hover .nav-text {
            font-weight: 600;
        }

        button.nav-link {
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            padding: 0;
            cursor: pointer;
            font: inherit;
            color: inherit;
        }
        
        .logout-link {
            background: #A67C52;
            color: #FFFFFF;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(166, 124, 82, 0.2);
        }
        
        .logout-link .nav-icon {
            color: #FFFFFF;
        }
        
        .logout-link:hover {
            background: #8B6F47;
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(166, 124, 82, 0.3);
        }
        
        .logout-link:hover .nav-icon {
            transform: translateX(2px);
        }
        
        .main {
            flex: 1;
            padding: 30px;
            background: #f5f5f5;
        }
        
        .page-header {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .page-header h1 {
            color: #8B4513;
            margin-bottom: 10px;
            font-size: 2rem;
        }
        
        .tabs {
            display: flex;
            margin-bottom: 20px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .tab-btn {
            flex: 1;
            padding: 15px 20px;
            border: none;
            background: #f8f9fa;
            color: #6c757d;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .tab-btn.active {
            background: #8B4513;
            color: white;
        }
        
        .tab-btn:hover {
            background: #A0522D;
            color: white;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .menu-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .menu-card:hover {
            transform: translateY(-5px);
        }
        
        .menu-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            display: block;
        }
        
        .menu-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .menu-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #8B4513;
            margin-bottom: 10px;
        }
        
        .menu-desc {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 15px;
            min-height: 40px;
        }
        
        .add-cart-btn {
            background: #8B4513;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s ease;
        }
        
        .add-cart-btn:hover {
            background: #A0522D;
        }
        
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="brand">
                    <svg class="brand-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                        <line x1="6" y1="1" x2="6" y2="4"></line>
                        <line x1="10" y1="1" x2="10" y2="4"></line>
                        <line x1="14" y1="1" x2="14" y2="4"></line>
                    </svg>
                    <div class="brand-text-wrapper">
                        <span class="brand-text-line1">Coffee</span>
                        <span class="brand-text-line2">Space Cafe</span>
                    </div>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ route('pelanggan.dashboard') }}" class="nav-link">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="3" width="7" height="7" rx="2"/>
                                <rect x="14" y="3" width="7" height="7" rx="2"/>
                                <rect x="14" y="14" width="7" height="7" rx="2"/>
                                <rect x="3" y="14" width="7" height="7" rx="2"/>
                            </svg>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('pelanggan.lihat-menu') }}" class="nav-link active">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 19h12a2 2 0 0 0 2-2V7H4v10a2 2 0 0 0 2 2z"/>
                                <path d="M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                            </svg>
                            <span class="nav-text">Lihat Menu</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('keranjang.index') }}" class="nav-link">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                            <span class="nav-text">Keranjang</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('status.pesanan') }}" class="nav-link">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M8 21h8a2 2 0 0 0 2-2V7H6v12a2 2 0 0 0 2 2z"/>
                                <path d="M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                            </svg>
                            <span class="nav-text">Status Pesanan</span>
                        </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a href="{{ route('pelanggan.pengaturan') }}" class="nav-link">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                            </svg>
                            <span class="nav-text">Pengaturan Akun</span>
                        </a>
                    </li>
                    <li class="nav-item logout-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link logout-link">
                                <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16,17 21,12 16,7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                                <span class="nav-text">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="main">
            <div class="page-header">
                <h1>🍽️ Lihat Menu</h1>
                <p>Pilih menu favoritmu dan tambahkan ke keranjang</p>
            </div>
            
            <!-- Tabs -->
            <div class="tabs">
                <button class="tab-btn active" onclick="showTab('makanan')">🍕 Makanan</button>
                <button class="tab-btn" onclick="showTab('minuman')">☕ Minuman</button>
            </div>
            
            <!-- Menu Makanan -->
            <div id="menu-makanan" class="menu-grid">
                @foreach($menus->where('kategori', 'makanan') as $menu)
                    <div class="menu-card">
                        <img src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : 'https://via.placeholder.com/120x120?text=No+Image' }}" 
                             alt="{{ $menu->nama }}" class="menu-image">
                        <div class="menu-title">{{ $menu->nama }}</div>
                        <div class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                        <div class="menu-desc">{{ $menu->deskripsi ?? 'Menu lezat dari Coffee Space Cafe' }}</div>
                        <form action="{{ route('keranjang.tambah') }}" method="POST">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <button type="submit" class="add-cart-btn">
                                🛒 Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            
            <!-- Menu Minuman -->
            <div id="menu-minuman" class="menu-grid hidden">
                @foreach($menus->where('kategori', 'minuman') as $menu)
                    <div class="menu-card">
                        <img src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : 'https://via.placeholder.com/120x120?text=No+Image' }}" 
                             alt="{{ $menu->nama }}" class="menu-image">
                        <div class="menu-title">{{ $menu->nama }}</div>
                        <div class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                        <div class="menu-desc">{{ $menu->deskripsi ?? 'Minuman segar dari Coffee Space Cafe' }}</div>
                        <form action="{{ route('keranjang.tambah') }}" method="POST">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <button type="submit" class="add-cart-btn">
                                🛒 Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
    
    <script>
        function showTab(tabName) {
            // Hide all menu grids
            document.getElementById('menu-makanan').classList.add('hidden');
            document.getElementById('menu-minuman').classList.add('hidden');
            
            // Remove active class from all tabs
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Show selected tab and add active class
            if (tabName === 'makanan') {
                document.getElementById('menu-makanan').classList.remove('hidden');
                document.querySelector('.tab-btn:first-child').classList.add('active');
            } else {
                document.getElementById('menu-minuman').classList.remove('hidden');
                document.querySelector('.tab-btn:last-child').classList.add('active');
            }
        }
    </script>
</body>
</html>