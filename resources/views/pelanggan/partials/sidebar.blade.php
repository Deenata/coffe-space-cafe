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
:root { color-scheme: light; }
html, body { background: #FAF3E0 !important; }
/* Global CSS untuk layout pelanggan */
.pelanggan-container {
    display: flex;
    min-height: 100vh;
    gap: 0;
}

.pelanggan-sidebar {
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

.pelanggan-main {
    flex: 1;
    padding: 40px 5vw 40px 5vw;
    display: flex;
    flex-direction: column;
    gap: 32px;
    min-width: 0;
}

/* Sidebar styling */
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
}

.logout-btn:hover .logout-icon {
    transform: translateX(2px);
}

/* Responsive Design */
@media (max-width: 900px) {
    .pelanggan-container,
    .container { 
        flex-direction: column; 
        gap: 0;
    }
    .pelanggan-sidebar,
    .sidebar { 
        width: 100%; 
        border-radius: 0 0 24px 24px; 
        flex-direction: row; 
        padding: 16px 0; 
        margin-bottom: 20px;
        min-height: auto;
    }
    .pelanggan-main,
    .main { 
        padding: 24px 3vw; 
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
    .pelanggan-sidebar,
    .sidebar {
        width: 100%;
        border-radius: 0 0 20px 20px;
    }
    .brand-text {
        font-size: 1.1rem;
    }
    .nav-link {
        padding: 12px 14px;
        font-size: 0.85rem;
    }
}