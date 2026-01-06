<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Coffee Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --cream: #FAF3E0;
            --white: #FFFFFF;
            --kopi: #A67C52;
            --kopi-dark: #6D4C41;
            --kopi-light: #C4A484;
            --shadow-light: rgba(166, 124, 82, 0.08);
            --shadow-medium: rgba(166, 124, 82, 0.12);
            --shadow-heavy: rgba(166, 124, 82, 0.18);
        }
        
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--cream) 0%, #F5E6D3 100%);
            min-height: 100vh;
            color: var(--kopi-dark);
            line-height: 1.6;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
            position: relative;
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
        
        /* Ensure main content adjusts properly */
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
        

        
        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--white);
            border-radius: 20px;
            padding: 24px 32px;
            box-shadow: 0 4px 20px var(--shadow-light);
            border: 1px solid rgba(166, 124, 82, 0.1);
        }
        
        .main-header h1 {
            color: var(--kopi);
            font-size: 2.25rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .main-header .admin-info {
            background: linear-gradient(135deg, var(--kopi) 0%, var(--kopi-light) 100%);
            color: var(--white);
            border-radius: 16px;
            padding: 12px 24px;
            box-shadow: 0 4px 12px var(--shadow-medium);
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }
        
        .stat-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 8px 30px var(--shadow-light);
            padding: 32px 28px;
            border: 1px solid rgba(166, 124, 82, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--kopi) 0%, var(--kopi-light) 100%);
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px var(--shadow-medium);
        }
        
        .stat-card h2 {
            color: var(--kopi);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .stat-card .stat-icon {
            width: 20px;
            height: 20px;
            color: var(--kopi);
        }
        
        .stat-card .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--kopi-dark);
            margin-bottom: 8px;
        }
        
        .stat-card .stat-change {
            font-size: 0.9rem;
            color: #10B981;
            font-weight: 500;
        }
        
        .dashboard-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 32px;
        }
        
        .chart-card, .menu-list-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 8px 30px var(--shadow-light);
            padding: 32px 28px;
            border: 1px solid rgba(166, 124, 82, 0.1);
            transition: all 0.3s ease;
        }
        
        .chart-card:hover, .menu-list-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px var(--shadow-medium);
        }
        
        .chart-card h2, .menu-list-card h2 {
            color: var(--kopi);
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .chart-icon {
            width: 24px;
            height: 24px;
            color: var(--kopi);
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            margin-top: 20px;
        }
        
        .menu-list {
            list-style: none;
            padding: 0;
        }
        
        .menu-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid rgba(166, 124, 82, 0.1);
            transition: all 0.3s ease;
        }
        
        .menu-list li:hover {
            background: rgba(166, 124, 82, 0.05);
            border-radius: 12px;
            padding-left: 12px;
            padding-right: 12px;
            margin-left: -12px;
            margin-right: -12px;
        }
        
        .menu-list li:last-child {
            border-bottom: none;
        }
        
        .menu-list .menu-name {
            font-weight: 600;
            color: var(--kopi-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .menu-list .menu-price {
            color: var(--kopi);
            font-weight: 600;
            background: rgba(166, 124, 82, 0.1);
            padding: 4px 12px;
            border-radius: 8px;
        }
        
        .empty-message {
            text-align: center;
            color: var(--kopi);
            font-style: italic;
            padding: 40px 20px;
        }
        
        .stats-overview {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 8px 30px var(--shadow-light);
            padding: 32px 28px;
            border: 1px solid rgba(166, 124, 82, 0.1);
            margin-top: 32px;
        }
        
        .stats-overview h2 {
            color: var(--kopi);
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .stat-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            background: rgba(166, 124, 82, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(166, 124, 82, 0.1);
        }
        
        .stat-item .stat-label {
            font-weight: 500;
            color: var(--kopi-dark);
        }
        
        .stat-item .stat-value {
            font-weight: 700;
            color: var(--kopi);
            font-size: 1.1rem;
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
        

        

        

    </style>
</head>

<body>
<div class="container">
    @include('admin.partials.sidebar')
    
    <main class="main">
        <div class="main-header">
            <h1>Dashboard Admin</h1>
            <div class="admin-info">Admin Coffee Space Cafe</div>
        </div>
        
        <div class="stats">
            <div class="stat-card">
                <h2>
                    <svg class="stat-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                    Total Penjualan Hari Ini
                </h2>
                <div class="stat-value">Rp {{ number_format($salesToday, 0, ',', '.') }}</div>
                <div class="stat-change">+12.5% dari kemarin</div>
            </div>
            
            <div class="stat-card">
                <h2>
                    <svg class="stat-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Pemesanan Hari Ini
                </h2>
                <div class="stat-value">{{ $ordersToday }}</div>
                <div class="stat-change">+8.3% dari kemarin</div>
            </div>
            
            <div class="stat-card">
                <h2>
                    <svg class="stat-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                        <path d="M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                    Pelanggan Baru
                </h2>
                <div class="stat-value">{{ $newCustomersToday }}</div>
                <div class="stat-change">+15.2% dari kemarin</div>
            </div>
            
            <div class="stat-card">
                <h2>
                    <svg class="stat-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 19h12a2 2 0 002-2V7H4v10a2 2 0 002 2z"/>
                        <path d="M6 7V5a2 2 0 012-2h8a2 2 0 012 2v2"/>
                    </svg>
                    Total Menu
                </h2>
                <div class="stat-value">{{ $totalMenus }}</div>
                <div class="stat-change">+2 menu baru</div>
            </div>
        </div>
        
        <div class="dashboard-content">
            <div class="chart-card">
                <h2>
                    <svg class="chart-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M8 13v-1m4 1v-3m4 3V8M12 21l9-9-9-9-9 9 9 9z"/>
                    </svg>
                    Grafik Penjualan 7 Hari
                </h2>
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
            
            <div class="menu-list-card">
                <h2>
                    <svg class="chart-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Menu Terbaru
                </h2>
                <ul class="menu-list">
                    @forelse($latestMenus as $menu)
                        <li>
                            <span class="menu-name">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M6 19h12a2 2 0 002-2V7H4v10a2 2 0 002 2z"/>
                                    <path d="M6 7V5a2 2 0 012-2h8a2 2 0 012 2v2"/>
                                </svg>
                                {{ $menu->nama }}
                            </span>
                            <span class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                        </li>
                    @empty
                        <li class="empty-message">Belum ada menu</li>
                    @endforelse
                </ul>
            </div>
        </div>
        
        <div class="dashboard-content">
            <div class="menu-list-card">
                <h2>
                    <svg class="chart-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    Menu Terlaris
                </h2>
                <ul class="menu-list">
                    @forelse($topMenus as $menu)
                        <li>
                            <span class="menu-name">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                {{ $menu->nama }}
                            </span>
                            <span class="menu-price">{{ $menu->total_sold }} terjual</span>
                        </li>
                    @empty
                        <li class="empty-message">Belum ada data penjualan</li>
                    @endforelse
                </ul>
            </div>
            
            <div class="stats-overview">
                <h2>
                    <svg class="chart-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Statistik Keseluruhan
                </h2>
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-label">Total Pendapatan</span>
                        <span class="stat-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Total Pesanan</span>
                        <span class="stat-value">{{ $totalOrders }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Total Pelanggan</span>
                        <span class="stat-value">{{ $totalCustomers }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Rata-rata Order</span>
                        <span class="stat-value">Rp {{ number_format($totalRevenue / max($totalOrders, 1), 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
// Chart.js Configuration
const ctx = document.getElementById('salesChart').getContext('2d');

const chartData = @json($chartData);
const labels = chartData.map(item => item.date);
const salesData = chartData.map(item => item.sales);

const salesChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Penjualan (Rp)',
            data: salesData,
            borderColor: '#A67C52',
            backgroundColor: 'rgba(166, 124, 82, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#A67C52',
            pointBorderColor: '#FFFFFF',
            pointBorderWidth: 2,
            pointRadius: 6,
            pointHoverRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(166, 124, 82, 0.9)',
                titleColor: '#FFFFFF',
                bodyColor: '#FFFFFF',
                borderColor: '#A67C52',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false,
                callbacks: {
                    label: function(context) {
                        return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(166, 124, 82, 0.1)',
                    drawBorder: false
                },
                ticks: {
                    color: '#6D4C41',
                    font: {
                        family: 'Poppins',
                        size: 12
                    },
                    callback: function(value) {
                        return 'Rp ' + value.toLocaleString('id-ID');
                    }
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: '#6D4C41',
                    font: {
                        family: 'Poppins',
                        size: 12
                    }
                }
            }
        },
        interaction: {
            intersect: false,
            mode: 'index'
        }
    }
});

// Add smooth animations
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.stat-card, .chart-card, .menu-list-card, .stats-overview');
    
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});



// Sidebar toggle functionality
// Hapus seluruh kode toggle button, class collapsed, main.expanded, dan JavaScript toggle sidebar
// Pastikan .main pakai margin-left: 280px di desktop
// Pastikan responsive di mobile/tablet (sidebar horizontal di bawah 1024px)

// Add hover effects for menu items
const menuItems = document.querySelectorAll('.menu-list li');
menuItems.forEach(item => {
    item.addEventListener('mouseenter', function() {
        this.style.transform = 'translateX(4px)';
    });
    
    item.addEventListener('mouseleave', function() {
        this.style.transform = 'translateX(0)';
    });
});
</script>
</body>
</html> 