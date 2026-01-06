<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir - Coffe Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #FAF3E0;
            --white: #FFFFFF;
            --kopi: #A67C52;
            --kopi-dark: #6D4C41;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--cream);
            min-height: 100vh;
            color: var(--kopi-dark);
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            background: var(--white);
            box-shadow: 2px 0 16px rgba(166,124,82,0.07);
            border-radius: 0 32px 32px 0;
            padding: 32px 0 24px 0;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .sidebar .brand {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--kopi);
            text-align: center;
            margin-bottom: 36px;
            letter-spacing: 1px;
        }
        .sidebar nav {
            flex: 1;
        }
        .sidebar ul {
            list-style: none;
            padding: 0 0 0 18px;
        }
        .sidebar ul li {
            margin-bottom: 18px;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: var(--kopi-dark);
            font-weight: 600;
            font-size: 1rem;
            padding: 10px 18px;
            border-radius: 12px 0 0 12px;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar ul li a.active, .sidebar ul li a:hover {
            background: var(--cream);
            color: var(--kopi);
        }
        .sidebar ul li svg {
            width: 22px;
            height: 22px;
            color: var(--kopi-dark);
        }
        .sidebar ul li a.active svg, .sidebar ul li a:hover svg {
            color: var(--kopi);
        }
        .sidebar .logout {
            margin-top: 32px;
            text-align: center;
        }
        .sidebar .logout form button {
            background: var(--kopi);
            color: var(--white);
            border: none;
            padding: 10px 32px;
            border-radius: 20px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
        }
        .sidebar .logout form button:hover {
            background: var(--kopi-dark);
        }
        .main {
            flex: 1;
            padding: 40px 5vw 40px 5vw;
            display: flex;
            flex-direction: column;
            gap: 32px;
        }
        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .main-header h1 {
            color: var(--kopi);
            font-size: 2rem;
            font-weight: 700;
        }
        .stats {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }
        .stat-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 28px 32px;
            min-width: 220px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        .stat-card h2 {
            color: var(--kopi);
            font-size: 1.1rem;
            font-weight: 600;
        }
        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--kopi-dark);
        }
        .orders-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 28px 32px;
            margin-top: 24px;
        }
        .orders-card h2 {
            color: var(--kopi);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 18px;
        }
        .orders-list {
            list-style: none;
            padding: 0;
        }
        .orders-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0e6d2;
        }
        .orders-list li:last-child {
            border-bottom: none;
        }
        .orders-list .order-menu {
            font-weight: 600;
            color: var(--kopi-dark);
        }
        .orders-list .order-status {
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 10px;
            padding: 6px 16px;
        }
        .orders-list .order-status.selesai {
            background: #d4edda;
            color: #155724;
        }
        .orders-list .order-status.menunggu {
            background: #fff3cd;
            color: #856404;
        }
        .orders-list .order-status.dibatalkan {
            background: #f8d7da;
            color: #721c24;
        }
        .orders-list .order-status.pending {
            background: #e7dac6;
            color: var(--kopi-dark);
        }
        @media (max-width: 900px) {
            .container { flex-direction: column; }
            .sidebar { width: 100%; border-radius: 0 0 32px 32px; flex-direction: row; padding: 16px 0; }
            .sidebar nav { flex: none; }
            .main { padding: 24px 3vw; }
        }
        @media (max-width: 600px) {
            .main-header h1 { font-size: 1.2rem; }
            .stat-card, .orders-card { padding: 16px; min-width: 0; }
        }
    </style>
</head>
<body>
<div class="container">
    @include('kasir.partials.sidebar')
    <main class="main">
        <div class="main-header">
            <h1>Dashboard Kasir</h1>
        </div>
        <div class="stats">
            <div class="stat-card">
                <h2>Pesanan Hari Ini</h2>
                <div class="stat-value">{{ $ordersToday }}</div>
            </div>
            <div class="stat-card">
                <h2>Total Pembayaran</h2>
                <div class="stat-value">Rp {{ number_format($totalPaymentToday, 0, ',', '.') }}</div>
            </div>
        </div>
        <div class="orders-card">
            <h2>Pesanan Terbaru</h2>
            @if(count($formattedOrders) > 0)
                <ul class="orders-list">
                    @foreach($formattedOrders as $order)
                        <li>
                            <span class="order-menu">{{ $order['items'] }}</span> 
                            <span class="order-status {{ strtolower($order['status']) }}">
                                {{ $order['status'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p style="color: #666; text-align: center; padding: 20px;">Belum ada pesanan</p>
            @endif
        </div>
    </main>
</div>
</body>
</html> 