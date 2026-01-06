<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Seller - Coffe Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --cream: #FAF3E0; --white: #FFFFFF; --kopi: #A67C52; --kopi-dark: #6D4C41; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: var(--cream); min-height: 100vh; color: var(--kopi-dark); }
        .container { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: var(--white); box-shadow: 2px 0 16px rgba(166,124,82,0.07); border-radius: 0 32px 32px 0; padding: 32px 0 24px 0; display: flex; flex-direction: column; position: relative; }
        .sidebar .brand { font-size: 1.5rem; font-weight: 700; color: var(--kopi); text-align: center; margin-bottom: 40px; letter-spacing: 1px; }
        .sidebar nav { flex: 1; }
        .sidebar ul { list-style: none; padding: 0 0 0 24px; }
        .sidebar ul li { margin-bottom: 18px; }
        .sidebar ul li a { display: flex; align-items: center; gap: 12px; text-decoration: none; color: var(--kopi-dark); font-weight: 600; font-size: 1rem; padding: 10px 18px; border-radius: 12px 0 0 12px; transition: background 0.2s, color 0.2s; }
        .sidebar ul li a.active, .sidebar ul li a:hover { background: var(--cream); color: var(--kopi); }
        .sidebar .logout { margin-top: 32px; text-align: center; }
        .sidebar .logout form button { background: var(--kopi); color: var(--white); border: none; padding: 10px 32px; border-radius: 20px; font-size: 1rem; font-weight: 600; cursor: pointer; box-shadow: 0 2px 8px rgba(166,124,82,0.10); transition: background 0.2s; }
        .sidebar .logout form button:hover { background: var(--kopi-dark); }
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
        .main-header { display: flex; justify-content: space-between; align-items: center; }
        .main-header h1 { color: var(--kopi); font-size: 2rem; font-weight: 700; }
        .settings-card { background: var(--white); border-radius: 20px; box-shadow: 0 4px 16px rgba(166,124,82,0.10); padding: 28px 32px; margin-bottom: 24px; }
        .settings-card h2 { color: var(--kopi); font-size: 1.2rem; font-weight: 600; margin-bottom: 18px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: var(--kopi-dark); }
        .form-group input[type="text"], .form-group textarea, .form-group select, .form-group input[type="date"] { width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid #e0d3c0; background: var(--white); color: var(--kopi-dark); font-size: 1rem; transition: border-color 0.2s; }
        .form-group input[type="file"] { margin-top: 6px; }
        .form-group input[type="text"]:focus, .form-group textarea:focus, .form-group select:focus, .form-group input[type="date"]:focus { outline: none; border-color: var(--kopi); }
        .save-btn { background: var(--kopi); color: var(--white); border: none; border-radius: 16px; padding: 12px 32px; font-size: 1rem; font-weight: 600; cursor: pointer; box-shadow: 0 2px 8px rgba(166,124,82,0.10); transition: background 0.2s; }
        .save-btn:hover { background: var(--kopi-dark); }
        .alert { padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; font-weight: 600; transition: opacity 0.4s; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
		.save-btn, button.save-btn, button[type="submit"].save-btn { background: #a67c52; color: #fff; border: none; border-radius: 12px; padding: 6px 18px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-right: 4px; transition: background 0.2s; }
		.save-btn:hover, button.save-btn:hover, button[type="submit"].save-btn:hover { background: #6d4c41; }
        
        /* Menu Grid Styles */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 24px;
            margin-top: 24px;
        }
        
        .menu-card {
            background: var(--white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(166,124,82,0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
        }
        
        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(166,124,82,0.15);
        }
        
        .menu-card.selected {
            border-color: var(--kopi);
            box-shadow: 0 6px 20px rgba(166,124,82,0.2);
        }
        
        .menu-card input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
            pointer-events: none;
        }
        
        .menu-card-label {
            display: block;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }
        
        .menu-image-wrapper {
            width: 100%;
            height: 160px;
            overflow: hidden;
            background: var(--cream);
            position: relative;
        }
        
        .menu-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .menu-card:hover .menu-image {
            transform: scale(1.1);
        }
        
        .best-seller-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            color: var(--kopi-dark);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            display: none;
        }
        
        .menu-card.selected .best-seller-badge {
            display: block;
        }
        
        .menu-checkbox-overlay {
            position: absolute;
            top: 12px;
            left: 12px;
            width: 28px;
            height: 28px;
            background: rgba(255,255,255,0.95);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .menu-card input[type="checkbox"]:checked ~ .menu-checkbox-overlay {
            background: var(--kopi);
        }
        
        .menu-card input[type="checkbox"]:checked ~ .menu-checkbox-overlay::after {
            content: '✓';
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
        }
        
        .menu-checkbox-overlay::after {
            content: '';
            transition: all 0.3s ease;
        }
        
        .menu-info {
            padding: 16px;
        }
        
        .menu-name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--kopi-dark);
            margin-bottom: 6px;
            line-height: 1.4;
        }
        
        .menu-category {
            font-size: 0.85rem;
            color: #8B7355;
            margin-bottom: 8px;
            text-transform: capitalize;
        }
        
        .menu-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--kopi);
        }
        
        .submit-container {
            margin-top: 32px;
            display: flex;
            justify-content: flex-end;
        }
        
        .save-btn-large {
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 12px;
            padding: 14px 36px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(166,124,82,0.2);
            transition: all 0.3s ease;
        }
        
        .save-btn-large:hover {
            background: var(--kopi-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(166,124,82,0.3);
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #8B7355;
        }
        
        .empty-state svg {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            opacity: 0.5;
        }
        
        /* Tab Styles */
        .tab-container {
            margin-bottom: 24px;
        }
        
        .tab-buttons {
            display: flex;
            gap: 12px;
            border-bottom: 2px solid #e0d3c0;
            margin-bottom: 24px;
        }
        
        .tab-button {
            background: transparent;
            border: none;
            padding: 14px 28px;
            font-size: 1rem;
            font-weight: 600;
            color: #8B7355;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            position: relative;
            bottom: -2px;
        }
        
        .tab-button:hover {
            color: var(--kopi);
            background: rgba(166, 124, 82, 0.05);
        }
        
        .tab-button.active {
            color: var(--kopi);
            border-bottom-color: var(--kopi);
            background: rgba(166, 124, 82, 0.08);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        @media (max-width: 900px) { 
            .container { flex-direction: column; } 
            .sidebar { width: 100%; border-radius: 0 0 32px 32px; flex-direction: row; padding: 16px 0; } 
            .sidebar nav { flex: none; } 
            .main { padding: 24px 3vw; } 
            .menu-grid {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
                gap: 16px;
            }
        }
        @media (max-width: 600px) { 
            .main-header h1 { font-size: 1.2rem; } 
            .settings-card { padding: 20px 24px; } 
            .save-btn { padding: 10px 24px; font-size: 0.95rem; }
            .menu-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 12px;
            }
            .menu-image-wrapper {
                height: 140px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    @include('admin.partials.sidebar')
    <main class="main">
        <div class="main-header">
            <h1>Best Seller</h1>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
		@if(session('error'))
			<div class="alert alert-error">{{ session('error') }}</div>
		@endif
		<!-- SECTION: BEST SELLER -->
        <div class="settings-card">
            <h2>Best Seller Menu (Landing Page)</h2>
            <p style="color: #8B7355; margin-bottom: 24px; font-size: 0.95rem;">Pilih menu yang akan ditampilkan sebagai Best Seller di halaman utama. Klik pada card menu untuk memilih.</p>
            
            @if($makanan->count() > 0 || $minuman->count() > 0)
            <form method="POST" action="{{ route('promo_best_seller.best_seller.update') }}" id="bestSellerForm">
                @csrf
                
                <!-- Tab Navigation -->
                <div class="tab-container">
                    <div class="tab-buttons">
                        <button type="button" class="tab-button active" data-tab="makanan">
                            <svg style="width: 20px; height: 20px; display: inline-block; vertical-align: middle; margin-right: 8px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                            </svg>
                            Makanan ({{ $makanan->count() }})
                        </button>
                        <button type="button" class="tab-button" data-tab="minuman">
                            <svg style="width: 20px; height: 20px; display: inline-block; vertical-align: middle; margin-right: 8px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                <line x1="6" y1="1" x2="6" y2="4"></line>
                                <line x1="10" y1="1" x2="10" y2="4"></line>
                                <line x1="14" y1="1" x2="14" y2="4"></line>
                            </svg>
                            Minuman ({{ $minuman->count() }})
                        </button>
                    </div>
                    
                    <!-- Tab Content: Makanan -->
                    <div class="tab-content active" id="tab-makanan">
                        @if($makanan->count() > 0)
                        <div class="menu-grid">
                            @foreach($makanan as $menu)
                            <div class="menu-card {{ $menu->is_best_seller ? 'selected' : '' }}" data-menu-id="{{ $menu->id }}">
                                <input type="checkbox" 
                                       name="best_seller[]" 
                                       value="{{ $menu->id }}" 
                                       id="menu-{{ $menu->id }}"
                                       {{ $menu->is_best_seller ? 'checked' : '' }}>
                                <label for="menu-{{ $menu->id }}" class="menu-card-label">
                                    <div class="menu-checkbox-overlay"></div>
                                    <span class="best-seller-badge">⭐ Best Seller</span>
                                    <div class="menu-image-wrapper">
                                        @if($menu->gambar)
                                            <img src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" class="menu-image">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="{{ $menu->nama }}" class="menu-image">
                                        @endif
                                    </div>
                                    <div class="menu-info">
                                        <div class="menu-name">{{ $menu->nama }}</div>
                                        <div class="menu-category">{{ $menu->kategori ?? 'Menu' }}</div>
                                        <div class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                                    </div>
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="empty-state">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                            <p style="font-size: 1.1rem; font-weight: 600; margin-bottom: 8px;">Belum ada menu makanan</p>
                            <p style="font-size: 0.95rem;">Silakan tambahkan menu makanan di halaman Manajemen Menu</p>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Tab Content: Minuman -->
                    <div class="tab-content" id="tab-minuman">
                        @if($minuman->count() > 0)
                        <div class="menu-grid">
                            @foreach($minuman as $menu)
                            <div class="menu-card {{ $menu->is_best_seller ? 'selected' : '' }}" data-menu-id="{{ $menu->id }}">
                                <input type="checkbox" 
                                       name="best_seller[]" 
                                       value="{{ $menu->id }}" 
                                       id="menu-{{ $menu->id }}"
                                       {{ $menu->is_best_seller ? 'checked' : '' }}>
                                <label for="menu-{{ $menu->id }}" class="menu-card-label">
                                    <div class="menu-checkbox-overlay"></div>
                                    <span class="best-seller-badge">⭐ Best Seller</span>
                                    <div class="menu-image-wrapper">
                                        @if($menu->gambar)
                                            <img src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" class="menu-image">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="{{ $menu->nama }}" class="menu-image">
                                        @endif
                                    </div>
                                    <div class="menu-info">
                                        <div class="menu-name">{{ $menu->nama }}</div>
                                        <div class="menu-category">{{ $menu->kategori ?? 'Menu' }}</div>
                                        <div class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                                    </div>
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="empty-state">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                            <p style="font-size: 1.1rem; font-weight: 600; margin-bottom: 8px;">Belum ada menu minuman</p>
                            <p style="font-size: 0.95rem;">Silakan tambahkan menu minuman di halaman Manajemen Menu</p>
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="submit-container">
                    <button type="submit" class="save-btn-large">
                        <svg style="width: 20px; height: 20px; display: inline-block; vertical-align: middle; margin-right: 8px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Best Seller
                    </button>
                </div>
            </form>
            @else
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                </svg>
                <p style="font-size: 1.1rem; font-weight: 600; margin-bottom: 8px;">Belum ada menu</p>
                <p style="font-size: 0.95rem;">Silakan tambahkan menu terlebih dahulu di halaman Manajemen Menu</p>
            </div>
            @endif
        </div>
    </main>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide alerts
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.transition = 'opacity 0.4s';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 400);
        });
    }, 3000);
    
    // Update card appearance when checkbox changes
    document.querySelectorAll('.menu-card input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const card = this.closest('.menu-card');
            if (this.checked) {
                card.classList.add('selected');
            } else {
                card.classList.remove('selected');
            }
        });
        
        // Initialize selected state
        const card = checkbox.closest('.menu-card');
        if (checkbox.checked) {
            card.classList.add('selected');
        }
    });
    
    // Tab switching functionality
    document.querySelectorAll('.tab-button').forEach(function(button) {
        button.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            
            // Remove active class from all buttons and contents
            document.querySelectorAll('.tab-button').forEach(function(btn) {
                btn.classList.remove('active');
            });
            document.querySelectorAll('.tab-content').forEach(function(content) {
                content.classList.remove('active');
            });
            
            // Add active class to clicked button and corresponding content
            this.classList.add('active');
            document.getElementById('tab-' + tabName).classList.add('active');
        });
    });
    
    // Form submission feedback
    const form = document.getElementById('bestSellerForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const checkedCount = form.querySelectorAll('input[type="checkbox"]:checked').length;
            if (checkedCount === 0) {
                if (!confirm('Anda belum memilih menu Best Seller. Apakah Anda yakin ingin melanjutkan?')) {
                    e.preventDefault();
                }
            }
        });
    }
});
</script>
</body>
</html> 