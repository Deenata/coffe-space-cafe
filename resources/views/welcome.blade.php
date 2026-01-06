<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee Space Cafe - Nikmati Secangkir Kenyamanan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #FAF3E0;
            --white: #FFFFFF;
            --kopi: #A67C52;
            --kopi-dark: #6D4C41;
            --badge: #FFE0B2;
            --promo: #FFF3E0;
            --shadow-light: rgba(166, 124, 82, 0.08);
            --shadow-medium: rgba(166, 124, 82, 0.12);
            --shadow-heavy: rgba(166, 124, 82, 0.18);
        }
        
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }
        
        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: var(--cream);
            color: var(--kopi-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Header Styles */
        .header {
            background: var(--white);
            box-shadow: 0 4px 20px var(--shadow-light);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 32px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--kopi);
            letter-spacing: 0.5px;
        }
        
        .logo svg {
            width: 36px;
            height: 36px;
        }
        
        .nav {
            display: flex;
            gap: 40px;
        }
        
        .nav a {
            color: var(--kopi-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            padding: 8px 0;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav a:hover, .nav a.active {
            color: var(--kopi);
            border-bottom: 2px solid var(--kopi);
        }
        
        .nav-auth {
            display: flex;
            gap: 16px;
        }
        
        .nav-btn {
            background: transparent;
            color: var(--kopi-dark);
            border: 2px solid var(--kopi);
            border-radius: 12px;
            padding: 12px 28px;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            outline: none;
            cursor: pointer;
            display: inline-block;
        }
        
        .nav-btn.login {
            background: transparent;
            color: var(--kopi-dark);
        }
        
        .nav-btn.login:hover {
            background: var(--kopi);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--shadow-medium);
        }
        
        .nav-btn.register {
            background: var(--kopi);
            color: var(--white);
        }
        
        .nav-btn.register:hover {
            background: var(--kopi-dark);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--shadow-medium);
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--cream) 0%, #F5E6D3 50%, var(--kopi) 100%);
            padding: 80px 0 100px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23A67C52" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23A67C52" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="%23A67C52" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 32px;
        }
        
        .hero-img {
            width: 400px;
            max-width: 90vw;
            margin-bottom: 48px;
            border-radius: 24px;
            box-shadow: 0 20px 60px var(--shadow-heavy);
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .hero-img:hover {
            transform: scale(1.02);
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--kopi-dark);
            margin-bottom: 24px;
            line-height: 1.2;
        }
        
        .hero-tagline {
            font-size: 1.25rem;
            color: var(--kopi);
            margin-bottom: 48px;
            font-weight: 400;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero-btn {
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 16px;
            padding: 18px 48px;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 8px 30px var(--shadow-medium);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .hero-btn:hover {
            background: var(--kopi-dark);
            box-shadow: 0 12px 40px var(--shadow-heavy);
            transform: translateY(-3px);
        }
        
        /* Section Styles */
        .section {
            padding: 80px 0;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 32px;
            padding-right: 32px;
        }
        
        .section-title {
            color: var(--kopi);
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--kopi);
            border-radius: 2px;
        }
        
		/* Promo Section removed */
        
        /* Menu Section */
        
        .menu-carousel {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 32px;
            margin-top: 40px;
        }
        
        .menu-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 8px 30px var(--shadow-light);
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
            border: 1px solid rgba(166, 124, 82, 0.1);
        }
        
        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 50px var(--shadow-medium);
        }
        
        .menu-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            background: var(--cream);
            margin-bottom: 20px;
            box-shadow: 0 8px 25px var(--shadow-light);
            border: 4px solid var(--white);
        }
        
        .menu-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--kopi-dark);
            margin-bottom: 8px;
            text-align: center;
        }
        
        .menu-price {
            color: var(--kopi);
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }
        
        /* Best Seller Section */
        
        .best-seller-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
            margin-top: 40px;
        }
        
        .best-seller-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 8px 30px var(--shadow-light);
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
            border: 1px solid rgba(166, 124, 82, 0.1);
        }
        
        .best-seller-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 50px var(--shadow-medium);
        }
        
        .best-seller-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--badge);
            color: var(--kopi-dark);
            font-size: 0.85rem;
            font-weight: 700;
            border-radius: 12px;
            padding: 6px 16px;
            box-shadow: 0 4px 15px var(--shadow-medium);
        }
        
        .best-seller-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            background: var(--cream);
            margin-bottom: 20px;
            box-shadow: 0 8px 25px var(--shadow-light);
            border: 4px solid var(--white);
        }
        
        .best-seller-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--kopi-dark);
            margin-bottom: 8px;
            text-align: center;
        }
        
        .best-seller-price {
            color: var(--kopi);
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }
        
        .coffee-illustration {
            width: 24px;
            height: 24px;
            color: var(--kopi);
            margin-top: 8px;
        }
        
        /* Footer */
        .footer {
            background: var(--kopi-dark);
            color: var(--white);
            padding: 60px 0 40px 0;
            text-align: center;
            margin-top: 80px;
        }
        
        .footer-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 32px;
        }
        
        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--kopi);
            display: flex;
            align-items: center;
            gap: 12px;
            justify-content: center;
            margin-bottom: 24px;
        }
        
        .footer-social {
            margin: 32px 0 24px 0;
            display: flex;
            gap: 24px;
            justify-content: center;
        }
        
        .footer-social a {
            color: var(--white);
            font-size: 1.5rem;
            transition: all 0.3s ease;
            padding: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .footer-social a:hover {
            color: var(--kopi);
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        .footer p {
            opacity: 0.9;
            font-size: 1rem;
            margin-bottom: 8px;
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-title { font-size: 3rem; }
            .section-title { font-size: 2.25rem; }
        }
        
        @media (max-width: 768px) {
            .header-content { padding: 16px 20px; }
            .nav { gap: 24px; }
            .hero { padding: 60px 0 80px 0; }
            .hero-title { font-size: 2.5rem; }
            .hero-tagline { font-size: 1.1rem; }
            .section { padding: 60px 0; padding-left: 20px; padding-right: 20px; }
            .section-title { font-size: 2rem; }
            .promo-cards, .menu-carousel, .best-seller-cards { 
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 24px;
            }
            .nav-auth { gap: 12px; }
            .nav-btn { padding: 10px 20px; font-size: 0.9rem; }
        }
        
        @media (max-width: 480px) {
            .header-content { flex-wrap: wrap; }
            .nav { gap: 16px; }
            .hero-title { font-size: 2rem; }
            .hero-tagline { font-size: 1rem; }
            .section-title { font-size: 1.75rem; }
            .promo-cards, .menu-carousel, .best-seller-cards { 
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .nav-auth { width: 100%; justify-content: center; margin-top: 12px; }
            .nav-btn { padding: 8px 16px; font-size: 0.85rem; }
            .hero-img { width: 280px; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                    <line x1="6" y1="1" x2="6" y2="4"></line>
                    <line x1="10" y1="1" x2="10" y2="4"></line>
                    <line x1="14" y1="1" x2="14" y2="4"></line>
                </svg>
                Coffee Space Cafe
            </div>
			<nav class="nav">
                <a href="#" class="active">Beranda</a>
                <a href="#menu">Menu</a>
                <a href="#kontak">Kontak</a>
            </nav>
            <div class="nav-auth">
                <a href="{{ route('login') }}" class="nav-btn login">Masuk</a>
                <a href="{{ route('register') }}" class="nav-btn register">Daftar</a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80" alt="Suasana Coffee Space Cafe" class="hero-img" />
            <div class="hero-title">Nikmati Secangkir Kenyamanan di Coffee Space Cafe</div>
            <div class="hero-tagline">Perpaduan sempurna antara cita rasa kopi premium dan suasana yang nyaman untuk melengkapi hari-hari Anda dengan pengalaman yang tak terlupakan.</div>
            <a href="{{ route('login') }}" class="hero-btn">Lihat Menu</a>
        </div>
    </section>

	<!-- Promo section removed -->

    <section class="section" id="menu">
        <div class="section-title">Menu Baru</div>
        <div class="menu-carousel">
            @forelse($menus as $menu)
            <div class="menu-card">
                    @if($menu->gambar)
                        <img class="menu-img" src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" />
                    @else
                    <img class="menu-img" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=200&q=80" alt="{{ $menu->nama }}" />
                    @endif
                    <div class="menu-name">{{ $menu->nama }}</div>
                    <div class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
            </div>
            @empty
            <div class="menu-card">
                <img class="menu-img" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=200&q=80" alt="Menu Spesial" />
                    <div class="menu-name">Menu Spesial</div>
                <div class="menu-price">Segera Hadir</div>
            </div>
            @endforelse
        </div>
    </section>

    <section class="section">
        <div class="section-title">Best Seller</div>
        <div class="best-seller-cards">
            @forelse($bestSellers as $menu)
            <div class="best-seller-card">
                <span class="best-seller-badge">Best Seller</span>
                    @if($menu->gambar)
                        <img class="best-seller-img" src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" />
                    @else
                    <img class="best-seller-img" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=200&q=80" alt="{{ $menu->nama }}" />
                    @endif
                    <div class="best-seller-name">{{ $menu->nama }}</div>
                    <div class="best-seller-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                <div class="coffee-illustration">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 19c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V7H6v12z"/>
                        <path d="M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                    </svg>
                </div>
                </div>
            @empty
            <div class="best-seller-card">
                <span class="best-seller-badge">Best Seller</span>
                <img class="best-seller-img" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=200&q=80" alt="Menu Favorit" />
                    <div class="best-seller-name">Menu Favorit</div>
                <div class="best-seller-price">Segera Hadir</div>
                <div class="coffee-illustration">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 19c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V7H6v12z"/>
                        <path d="M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                    </svg>
                </div>
                </div>
            @endforelse
        </div>
    </section>

    <footer class="footer" id="kontak">
        <div class="footer-content">
            <div class="footer-logo">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 28px; height: 28px;">
                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                    <line x1="6" y1="1" x2="6" y2="4"></line>
                    <line x1="10" y1="1" x2="10" y2="4"></line>
                    <line x1="14" y1="1" x2="14" y2="4"></line>
                </svg>
                Coffee Space Cafe
            </div>
            <div class="footer-social">
                <a href="#" title="Instagram">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/>
                    </svg>
                </a>
                <a href="mailto:info@coffeespacecafe.com" title="Email">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </a>
                <a href="https://wa.me/6281234567890" title="WhatsApp">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                    </svg>
                </a>
            </div>
            <p>Jl. Kopi No. 1, Bandung | Telp: 0812-3456-7890 | Email: info@coffeespacecafe.com</p>
            <p>Jam Buka: Senin - Minggu | 07:00 - 22:00 WIB</p>
            <p>&copy; 2024 Coffee Space Cafe. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
