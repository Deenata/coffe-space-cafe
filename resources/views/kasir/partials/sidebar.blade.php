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
                <a href="{{ route('dashboard.kasir') }}" class="nav-link {{ request()->routeIs('dashboard.kasir') ? 'active' : '' }}">
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
                <a href="{{ route('verifikasi.pembayaran') }}" class="nav-link {{ request()->routeIs('verifikasi.pembayaran') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="7" width="20" height="10" rx="2"/>
                        <path d="M2 9l10 6 10-6"/>
                    </svg>
                    <span class="nav-text">Verifikasi Pembayaran</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('pesanan.masuk') }}" class="nav-link {{ request()->routeIs('pesanan.masuk') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                    <span class="nav-text">Pesanan Masuk</span>
                </a>
            </li>
            
            
            
            <li class="nav-item">
                <a href="{{ route('riwayat.transaksi.kasir') }}" class="nav-link {{ request()->routeIs('riwayat.transaksi.kasir') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3"/>
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <span class="nav-text">Riwayat Transaksi</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('pengaturan.kasir') }}" class="nav-link {{ request()->routeIs('pengaturan.kasir') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                    </svg>
                    <span class="nav-text">Pengaturan</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                <svg class="logout-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16,17 21,12 16,7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<style>
.sidebar {
    width: 240px;
    height: auto;
    min-height: 100vh;
    background: linear-gradient(135deg, #FAF3E0 0%, #F5E6D3 50%, #E8D5C4 100%);
    box-shadow: 4px 0 20px rgba(166, 124, 82, 0.15);
    border-radius: 0 24px 24px 0;
    display: flex;
    flex-direction: column;
    position: relative;
    left: auto;
    top: auto;
    z-index: 1;
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

.sidebar-footer {
    padding: 24px 16px 32px 16px;
    border-top: 1px solid rgba(166, 124, 82, 0.1);
}

.logout-form {
    margin: 0;
}

.logout-btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 20px;
    background: linear-gradient(135deg, #6D4C41 0%, #8B6F47 100%);
    color: #FFFFFF;
    border: none;
    border-radius: 16px;
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(109, 76, 65, 0.2);
}

.logout-btn:hover {
    background: linear-gradient(135deg, #5A3F35 0%, #7A5F3F 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(109, 76, 65, 0.3);
}

.logout-icon {
    width: 20px;
    height: 20px;
    transition: transform 0.3s ease;
}

.logout-btn:hover .logout-icon {
    transform: translateX(2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        border-radius: 0;
    }
    
    .brand-text {
        font-size: 1.25rem;
    }
    
    .nav-link {
        padding: 14px 16px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .sidebar {
        width: 100%;
        border-radius: 0;
    }
    
    .brand-text {
        font-size: 1.1rem;
    }
    
    .nav-link {
        padding: 12px 14px;
        font-size: 0.85rem;
    }
}
</style> 