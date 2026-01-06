<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Coffe Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #FAF3E0;
            --white: #FFFFFF;
            --kopi: #A67C52;
            --kopi-dark: #6D4C41;
            --green: #43a047;
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
            margin-bottom: 24px;
        }
        .main-header h1 {
            color: var(--kopi);
            font-size: 2rem;
            font-weight: 700;
        }
        .filter-bar {
            display: flex;
            gap: 16px;
            align-items: center;
            margin: 0 0 24px 0;
            flex-wrap: wrap;
        }
        .filter-bar input[type="date"],
        .filter-bar select {
            padding: 8px 16px;
            border-radius: 10px;
            border: 1px solid #e0d3c0;
            background: var(--white);
            color: var(--kopi-dark);
            font-size: 1rem;
        }
        .filter-bar .filter-btn {
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
        }
        .filter-bar .filter-btn:hover {
            background: var(--kopi-dark);
        }
        .transactions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 20px;
        }
        .transaction-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 24px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .transaction-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(166,124,82,0.15);
        }
        .transaction-card .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #f0e6d2;
        }
        .transaction-card .invoice {
            font-weight: 700;
            color: var(--kopi);
            font-size: 1.1rem;
        }
        .transaction-card .status {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        .transaction-card .status.selesai {
            background: #d4edda;
            color: #388e3c;
        }
        .transaction-card .status.pending {
            background: #fff3cd;
            color: #856404;
        }
        .transaction-card .status.dibatalkan {
            background: #f8d7da;
            color: #721c24;
        }
        .transaction-card .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        .transaction-card .info-row:last-child {
            margin-bottom: 0;
        }
        .transaction-card .label {
            font-weight: 600;
            color: var(--kopi-dark);
        }
        .transaction-card .value {
            color: var(--kopi-dark);
        }
        .transaction-card .total {
            font-weight: 700;
            color: var(--kopi);
            font-size: 1.1rem;
        }
        @media (max-width: 900px) {
            .container { flex-direction: column; }
            .sidebar { width: 100%; border-radius: 0 0 32px 32px; flex-direction: row; padding: 16px 0; }
            .sidebar nav { flex: none; }
            .main { padding: 24px 3vw; }
            .transactions-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 600px) {
            .main-header h1 { font-size: 1.2rem; }
            .transaction-card { padding: 16px; }
        }
    </style>
</head>
<body>
    <div class="container">
        @include('kasir.partials.sidebar')
        <main class="main">
            <div class="main-header">
                <h1>Riwayat Transaksi</h1>
            </div>
            
            <form method="GET" action="{{ route('riwayat.transaksi.kasir') }}" class="filter-bar">
                <input type="date" name="from-date" placeholder="Dari" value="{{ $fromDate }}">
                <input type="date" name="to-date" placeholder="Sampai" value="{{ $toDate }}">
                <select name="payment-method">
                    <option value="">Metode Pembayaran</option>
                    <option value="QRIS" {{ $paymentMethod === 'QRIS' ? 'selected' : '' }}>QRIS</option>
                    <option value="VA" {{ $paymentMethod === 'VA' ? 'selected' : '' }}>VA</option>
                    <option value="tunai" {{ $paymentMethod === 'tunai' ? 'selected' : '' }}>Tunai</option>
                </select>
                <button type="submit" class="filter-btn">Filter</button>
            </form>

            <div class="transactions-grid">
                @foreach($orders as $order)
                    <div class="transaction-card">
                        <div class="card-header">
                            <div class="invoice">{{ $order->invoice_number ?? 'INV-' . $order->created_at->format('Ymd') . '-' . str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</div>
                            <div class="status {{ strtolower($order->status) }}">{{ $order->status }}</div>
                        </div>
                        <div class="info-row">
                            <span class="label">Nama Pelanggan:</span>
                            <span class="value">{{ $order->user->name }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Metode Pembayaran:</span>
                            <span class="value">{{ $order->metode_bayar }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Waktu:</span>
                            <span class="value">{{ $order->created_at->format('Y-m-d H:i') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Total:</span>
                            <span class="value total">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>