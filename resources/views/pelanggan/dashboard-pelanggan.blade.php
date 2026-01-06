<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - Coffee Space Cafe</title>
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
        
        .welcome-card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .welcome-card h1 {
            color: #8B4513;
            margin-bottom: 10px;
        }
        
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .card h3 {
            color: #8B4513;
            margin-bottom: 15px;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .menu-item {
            background: #f9f9f9;
            padding: 15px;  
            border-radius: 8px;
            text-align: center;
            position: relative;
        }
        
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .menu-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
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
                        <a href="{{ route('pelanggan.dashboard') }}" class="nav-link {{ request()->routeIs('pelanggan.dashboard') ? 'active' : '' }}">
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
                        <a href="{{ route('pelanggan.lihat-menu') }}" class="nav-link {{ request()->routeIs('pelanggan.lihat-menu') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 19h12a2 2 0 0 0 2-2V7H4v10a2 2 0 0 0 2 2z"/>
                                <path d="M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                            </svg>
                            <span class="nav-text">Lihat Menu</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('keranjang.index') }}" class="nav-link {{ request()->routeIs('keranjang.index') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                            <span class="nav-text">Keranjang</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('status.pesanan') }}" class="nav-link {{ request()->routeIs('status.pesanan') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M8 21h8a2 2 0 0 0 2-2V7H6v12a2 2 0 0 0 2 2z"/>
                                <path d="M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                            </svg>
                            <span class="nav-text">Status Pesanan</span>
                        </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a href="{{ route('pelanggan.pengaturan') }}" class="nav-link {{ request()->routeIs('pelanggan.pengaturan') ? 'active' : '' }}">
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
            <!-- Welcome Card -->
            <div class="welcome-card">
                <h1>Selamat Datang, {{ $user->name }}! 👋</h1>
                <p>Senang melihatmu kembali di Coffee Space Cafe</p>
            </div>
            
            <!-- Status Pesanan -->
            <div class="card">
                <h3>📋 Status Pesanan Terakhir</h3>
                @if($lastOrder)
                    <p><strong>Pesanan:</strong> {{ $lastOrder->invoice_number ?? 'INV-' . $lastOrder->created_at->format('Ymd') . '-' . str_pad($lastOrder->id, 3, '0', STR_PAD_LEFT) }}</p>
                    <p><strong>Status:</strong> {{ $lastOrder->status }}</p>
                    <p><strong>Total:</strong> Rp {{ number_format($lastOrder->total, 0, ',', '.') }}</p>
                @else
                    <p>Belum ada pesanan.</p>
                @endif
            </div>
            
            <!-- Statistik -->
            <div class="card">
                <h3>📊 Statistik Pesanan</h3>
                <div class="menu-grid" style="grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));">
                    <div class="menu-item" style="background: linear-gradient(135deg, #A67C52 0%, #8B6F47 100%); color: white; text-align: center;">
                        <h4 style="font-size: 2rem; margin-bottom: 5px;">{{ $totalOrders }}</h4>
                        <p style="font-size: 0.9rem; opacity: 0.9;">Total Pesanan</p>
                    </div>
                    <div class="menu-item" style="background: linear-gradient(135deg, #8B4513 0%, #6D4C41 100%); color: white; text-align: center;">
                        <h4 style="font-size: 2rem; margin-bottom: 5px;">Rp {{ number_format($totalSpending, 0, ',', '.') }}</h4>
                        <p style="font-size: 0.9rem; opacity: 0.9;">Total Pengeluaran</p>
                    </div>
                    <div class="menu-item" style="background: linear-gradient(135deg, #D4A574 0%, #A67C52 100%); color: white; text-align: center;">
                        <h4 style="font-size: 2rem; margin-bottom: 5px;">{{ $pendingOrders }}</h4>
                        <p style="font-size: 0.9rem; opacity: 0.9;">Pesanan Pending</p>
                    </div>
                </div>
            </div>
            
            <!-- Best Seller -->
            @if($bestSellers->count() > 0)
            <div class="card">
                <h3>⭐ Menu Best Seller</h3>
                <div class="menu-grid">
                    @foreach($bestSellers as $menu)
                        <div class="menu-item" style="cursor: pointer; transition: transform 0.2s;" onclick="window.location.href='{{ route('pelanggan.lihat-menu') }}'">
                            <img src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80' }}" alt="{{ $menu->nama }}">
                            <div style="position: absolute; top: 10px; right: 10px; background: #FFD700; color: #8B4513; padding: 4px 8px; border-radius: 12px; font-size: 0.7rem; font-weight: bold;">⭐ Best</div>
                            <h4>{{ $menu->nama }}</h4>
                            <p><strong>Rp {{ number_format($menu->harga, 0, ',', '.') }}</strong></p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Menu Baru -->
            @if($newMenus->count() > 0)
            <div class="card">
                <h3>🆕 Menu Baru</h3>
                <div class="menu-grid">
                    @foreach($newMenus as $menu)
                        <div class="menu-item" style="cursor: pointer; transition: transform 0.2s;" onclick="window.location.href='{{ route('pelanggan.lihat-menu') }}'">
                            <img src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80' }}" alt="{{ $menu->nama }}">
                            <div style="position: absolute; top: 10px; right: 10px; background: #4CAF50; color: white; padding: 4px 8px; border-radius: 12px; font-size: 0.7rem; font-weight: bold;">NEW</div>
                            <h4>{{ $menu->nama }}</h4>
                            <p><strong>Rp {{ number_format($menu->harga, 0, ',', '.') }}</strong></p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Rekomendasi Menu -->
            <div class="card">
                <h3>🍽️ Rekomendasi Menu Untukmu</h3>
                <div class="menu-grid">
                    @foreach($rekomendasi as $menu)
                        <div class="menu-item" style="cursor: pointer; transition: transform 0.2s;" onclick="window.location.href='{{ route('pelanggan.lihat-menu') }}'">
                            <img src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80' }}" alt="{{ $menu->nama }}">
                            <h4>{{ $menu->nama }}</h4>
                            <p><strong>Rp {{ number_format($menu->harga, 0, ',', '.') }}</strong></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>