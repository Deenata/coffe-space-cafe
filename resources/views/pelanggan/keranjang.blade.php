<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Coffee Space Cafe</title>
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
            background: linear-gradient(135deg, #FAF3E0 0%, #F5E6D3 50%, #E8D5C4 100%);
            box-shadow: 4px 0 20px rgba(166, 124, 82, 0.15);
            border-radius: 0 24px 24px 0;
            display: flex;
            flex-direction: column;
            position: relative;
            flex-shrink: 0;
            overflow: hidden;
        }

        .sidebar-header {
            padding: 32px 24px 24px 24px;
            border-bottom: 1px solid rgba(166, 124, 82, 0.1);
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
        }

        .brand-text {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #A67C52;
            letter-spacing: 0.5px;
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
            gap: 16px;
            padding: 16px 20px;
            text-decoration: none;
            color: #6D4C41;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #A67C52 0%, #C4A484 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 16px;
        }

        .nav-link:hover::before {
            opacity: 0.1;
        }

        .nav-link:hover {
            color: #A67C52;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(166, 124, 82, 0.15);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #A67C52 0%, #C4A484 100%);
            color: #FFFFFF;
            box-shadow: 0 6px 20px rgba(166, 124, 82, 0.25);
            transform: translateX(4px);
        }

        .nav-link.active::before {
            display: none;
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
            background: linear-gradient(135deg, #6D4C41 0%, #8B6F47 100%);
            color: #FFFFFF;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(109, 76, 65, 0.2);
            border-radius: 16px;
            min-height: 48px;
            width: 100%;
        }

        .logout-link .nav-icon {
            color: #FFFFFF;
        }

        .logout-link:hover {
            background: linear-gradient(135deg, #5A3F35 0%, #7A5F3F 100%);
            color: #FFFFFF;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(109, 76, 65, 0.3);
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
        
        .cart-container {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .cart-item {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
            gap: 20px;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .item-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }
        
        .item-details {
            flex: 1;
        }
        
        .item-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        
        .item-price {
            color: #8B4513;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .qty-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            background: #f8f9fa;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .qty-btn:hover {
            background: #e9ecef;
        }
        
        .qty-display {
            min-width: 40px;
            text-align: center;
            font-weight: 600;
        }
        
        .item-total {
            font-size: 1.2rem;
            font-weight: 700;
            color: #8B4513;
            min-width: 100px;
            text-align: right;
        }
        
        .remove-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
        }
        
        .remove-btn:hover {
            background: #c82333;
        }
        
        .cart-summary {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        .summary-total {
            font-weight: 700;
            font-size: 1.3rem;
            color: #8B4513;
            border-top: 2px solid #8B4513;
            padding-top: 10px;
        }
        
        .checkout-btn {
            width: 100%;
            background: #8B4513;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s ease;
        }
        
        .checkout-btn:hover {
            background: #A0522D;
        }
        
        .checkout-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .empty-cart h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #8B4513;
        }
        
        .empty-cart p {
            margin-bottom: 20px;
        }
        
        .browse-btn {
            background: #8B4513;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            display: inline-block;
            font-weight: 600;
        }
        
        .browse-btn:hover {
            background: #A0522D;
            color: white;
        }
        
        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
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
                    <span class="brand-text">Coffee Space Cafe</span>
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
                        <a href="{{ route('pelanggan.lihat-menu') }}" class="nav-link">
                            <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 19h12a2 2 0 0 0 2-2V7H4v10a2 2 0 0 0 2 2z"/>
                                <path d="M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                            </svg>
                            <span class="nav-text">Lihat Menu</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('keranjang.index') }}" class="nav-link active">
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
                <h1>🛒 Keranjang Saya</h1>
                <p>Review pesananmu sebelum Memesan dan Membayar </p>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            
            @if($carts->count() > 0)
                <div class="cart-container">
                    @foreach($carts as $cart)
                        <div class="cart-item">
                            <img src="{{ $cart->menu->gambar ? asset('storage/' . $cart->menu->gambar) : 'https://via.placeholder.com/80x80?text=No+Image' }}" 
                                 alt="{{ $cart->menu->nama }}" class="item-image">
                            
                            <div class="item-details">
                                <div class="item-name">{{ $cart->menu->nama }}</div>
                                <div class="item-price">Rp {{ number_format($cart->menu->harga, 0, ',', '.') }}</div>
                            </div>
                            
                            <div class="quantity-controls">
                                <form action="{{ route('keranjang.qty', $cart->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="minus">
                                    <button type="submit" class="qty-btn" {{ $cart->qty <= 1 ? 'disabled' : '' }}>-</button>
                                </form>
                                
                                <span class="qty-display">{{ $cart->qty }}</span>
                                
                                <form action="{{ route('keranjang.qty', $cart->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="plus">
                                    <button type="submit" class="qty-btn">+</button>
                                </form>
                            </div>
                            
                            <div class="item-total">
                                Rp {{ number_format($cart->menu->harga * $cart->qty, 0, ',', '.') }}
                            </div>
                            
                            <form action="{{ route('keranjang.hapus', $cart->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove-btn" onclick="return confirm('Hapus item dari keranjang?')">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    @endforeach
                    
                    <div class="cart-summary">
                        @php
                            $subtotal = $carts->sum(function($item) {
                                return $item->menu->harga * $item->qty;
                            });
                        @endphp
                        
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="summary-row">
                            <span>Pajak (10%):</span>
                            <span>Rp {{ number_format($subtotal * 0.1, 0, ',', '.') }}</span>
                        </div>
                        <div class="summary-row summary-total">
                            <span>Total:</span>
                            <span>Rp {{ number_format($subtotal * 1.1, 0, ',', '.') }}</span>
                        </div>
                        
                        <a href="{{ route('keranjang.checkout') }}" class="checkout-btn">
                            💳 Pesan Sekarang
                        </a>
                    </div>
                </div>
            @else
                <div class="empty-cart">
                    <h3>🛒 Keranjang Kosong</h3>
                    <p>Belum ada item di keranjangmu. Yuk, pilih menu favoritmu!</p>
                    <a href="{{ route('pelanggan.lihat-menu') }}" class="browse-btn">
                        Lihat Menu
                    </a>
                </div>
            @endif
        </main>
    </div>
</body>
</html>