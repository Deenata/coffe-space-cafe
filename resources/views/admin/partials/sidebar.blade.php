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
                <a href="{{ route('dashboard.admin') }}" class="nav-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
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
                <a href="{{ route('user.management') }}" class="nav-link {{ request()->routeIs('user.management') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                    <span class="nav-text">Manajemen User</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('menu.management') }}" class="nav-link {{ request()->routeIs('menu.management') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 19h12a2 2 0 0 0 2-2V7H4v10a2 2 0 0 0 2 2z"/>
                        <path d="M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                    </svg>
                    <span class="nav-text">Manajemen Menu</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('promo_best_seller.index') }}" class="nav-link {{ request()->routeIs('promo_best_seller.*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span class="nav-text">Best Seller</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('sales.report') }}" class="nav-link {{ request()->routeIs('sales.report') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14,2 14,8 20,8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10,9 9,9 8,9"/>
                    </svg>
                    <span class="nav-text">Laporan Penjualan</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('transaction.history') }}" class="nav-link {{ request()->routeIs('transaction.history') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3"/>
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <span class="nav-text">Riwayat Transaksi</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('settings') }}" class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">
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
    width: 280px;
    height: auto;
    min-height: 100vh;
    background: #FAF3E0;
    box-shadow: 2px 0 12px rgba(166, 124, 82, 0.08);
    border-radius: 0 20px 20px 0;
    display: flex;
    flex-direction: column;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 1000;
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
    margin: 0;
    padding: 0;
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
    padding: 20px 16px;
    overflow-y: auto;
}

.nav-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.nav-item {
    margin: 0;
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
    width: 22px;
    height: 22px;
    flex-shrink: 0;
    transition: transform 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.nav-link:hover .nav-icon {
    transform: scale(1.1);
}

.nav-link.active .nav-icon {
    transform: scale(1.05);
}

.nav-text {
    font-weight: 500;
    transition: font-weight 0.3s ease;
    line-height: 1.4;
    display: flex;
    align-items: center;
}

.nav-link:hover .nav-text {
    font-weight: 600;
}

.nav-link.active .nav-text {
    font-weight: 600;
}

.sidebar-footer {
    padding: 20px 16px 24px 16px;
    border-top: 1px solid rgba(166, 124, 82, 0.1);
    background: transparent;
    margin-top: auto;
}

.logout-form {
    margin: 0;
}

.logout-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 14px 20px;
    background: #A67C52;
    color: #FFFFFF;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 2px 8px rgba(166, 124, 82, 0.2);
    min-height: 48px;
}

.logout-btn:hover {
    background: #8B6F47;
    box-shadow: 0 4px 12px rgba(166, 124, 82, 0.3);
}

.logout-icon {
    width: 20px;
    height: 20px;
    transition: transform 0.3s ease;
    flex-shrink: 0;
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
        min-height: 52px;
    }
    
    .logout-btn {
        min-height: 52px;
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
        min-height: 48px;
    }
    
    .logout-btn {
        min-height: 48px;
    }
}
</style> 