<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Coffe Space Cafe</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAF3E0;
            min-height: 100vh;
        }
        
        .navbar {
            background: linear-gradient(135deg, #A67C52 0%, #6D4C41 100%);
            color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            font-size: 24px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo svg {
            width: 30px;
            height: 30px;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }
        
        .nav-links a:hover {
            opacity: 0.8;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        .logout-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 30px;
        }
        
        .welcome-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 30px;
        }
        
        .welcome-section h1 {
            color: #6D4C41;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .welcome-section p {
            color: #666;
            font-size: 18px;
            margin-bottom: 30px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card .icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #A67C52 0%, #6D4C41 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .stat-card .icon svg {
            width: 30px;
            height: 30px;
            color: white;
        }
        
        .stat-card h3 {
            color: #6D4C41;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .stat-card p {
            color: #666;
            font-size: 16px;
        }
        
        .quick-actions {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .quick-actions h2 {
            color: #6D4C41;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .action-btn {
            background: linear-gradient(135deg, #A67C52 0%, #6D4C41 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(166, 124, 82, 0.3);
        }
        
        .action-btn svg {
            width: 24px;
            height: 24px;
        }
        
        .placeholder-content {
            background: white;
            border-radius: 20px;
            padding: 60px 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 30px;
        }
        
        .placeholder-content h2 {
            color: #6D4C41;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .placeholder-content p {
            color: #666;
            font-size: 18px;
            margin-bottom: 30px;
        }
        
        .coffee-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #A67C52 0%, #6D4C41 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .coffee-icon svg {
            width: 40px;
            height: 40px;
            color: white;
        }
        
        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .main-content {
                padding: 0 20px;
                margin: 20px auto;
            }
            
            .welcome-section,
            .quick-actions,
            .placeholder-content {
                padding: 30px 20px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                    <line x1="6" y1="1" x2="6" y2="4"></line>
                    <line x1="10" y1="1" x2="10" y2="4"></line>
                    <line x1="14" y1="1" x2="14" y2="4"></line>
                </svg>
                Coffe Space Cafe
            </div>
            
            <div class="nav-links">
                <a href="#dashboard">Dashboard</a>
                <a href="#menu">Menu</a>
                <a href="#orders">Pesanan</a>
                <a href="#reports">Laporan</a>
                <a href="#settings">Pengaturan</a>
            </div>
            
            <div class="user-menu">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <span>{{ auth()->user()->name ?? 'User' }}</span>
                <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    
    <div class="main-content">
        <div class="welcome-section">
            <h1>Selamat datang di Coffe Space Cafe!</h1>
            <p>Sistem manajemen kafe yang modern dan efisien</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                        <line x1="6" y1="1" x2="6" y2="4"></line>
                        <line x1="10" y1="1" x2="10" y2="4"></line>
                        <line x1="14" y1="1" x2="14" y2="4"></line>
                    </svg>
                </div>
                <h3>150</h3>
                <p>Pesanan Hari Ini</p>
            </div>
            
            <div class="stat-card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M12 1v6m0 6v6"></path>
                        <path d="M15.5 4.5l-3 3m0 0l-3-3m3 3l3-3"></path>
                        <path d="M8.5 19.5l3-3m0 0l3 3m-3-3l-3 3"></path>
                    </svg>
                </div>
                <h3>Rp 2.5M</h3>
                <p>Pendapatan Bulan Ini</p>
            </div>
            
            <div class="stat-card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <h3>45</h3>
                <p>Pelanggan Aktif</p>
            </div>
            
            <div class="stat-card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <h3>12</h3>
                <p>Menu Tersedia</p>
            </div>
        </div>
        
        <div class="quick-actions">
            <h2>Aksi Cepat</h2>
            <div class="actions-grid">
                <button class="action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Tambah Pesanan
                </button>
                
                <button class="action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14,2 14,8 20,8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10,9 9,9 8,9"></polyline>
                    </svg>
                    Kelola Menu
                </button>
                
                <button class="action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Kelola Pengguna
                </button>
                
                <button class="action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14,2 14,8 20,8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10,9 9,9 8,9"></polyline>
                    </svg>
                    Lihat Laporan
                </button>
            </div>
        </div>
        
        <div class="placeholder-content">
            <div class="coffee-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                    <line x1="6" y1="1" x2="6" y2="4"></line>
                    <line x1="10" y1="1" x2="10" y2="4"></line>
                    <line x1="14" y1="1" x2="14" y2="4"></line>
                </svg>
            </div>
            <h2>Dashboard Siap Digunakan!</h2>
            <p>Ini adalah halaman dashboard kosong yang siap untuk dikembangkan lebih lanjut.</p>
            <p>Fitur-fitur seperti manajemen menu, pesanan, dan laporan dapat ditambahkan di sini.</p>
        </div>
    </div>
</body>
</html> 