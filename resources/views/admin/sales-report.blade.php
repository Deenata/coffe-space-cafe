<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Coffe Space Cafe</title>
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
        @media (max-width: 1024px) {
            .main { 
                margin-left: 0 !important;
                padding-left: 5vw !important;
            }
            .container { 
                flex-direction: column; 
            }
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
        .filter-bar {
            display: flex;
            gap: 16px;
            align-items: center;
            margin: 24px 0 0 0;
            flex-wrap: wrap;
        }
        .filter-bar label {
            font-weight: 600;
            color: var(--kopi-dark);
        }
        .filter-bar input[type="date"] {
            padding: 8px 16px;
            border-radius: 10px;
            border: 1px solid #e0d3c0;
            background: var(--white);
            color: var(--kopi-dark);
            font-size: 1rem;
        }
        .filter-bar .filter-btn, .filter-bar .export-btn {
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
        .filter-bar .filter-btn:hover, .filter-bar .export-btn:hover {
            background: var(--kopi-dark);
        }
        .summary-cards {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }
        .summary-card {
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
        .summary-card h2 {
            color: var(--kopi);
            font-size: 1.2rem;
            font-weight: 600;
        }
        .summary-card .summary-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--kopi-dark);
        }
        .chart-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 28px 32px;
            margin: 24px 0;
        }
        .chart-card h2 {
            color: var(--kopi);
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 18px;
        }
        .chart-placeholder {
            width: 100%;
            height: 220px;
            background: var(--white);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 20px;
            border: 2px solid #f0e6d2;
        }
        .chart-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 15px;
            border-radius: 12px;
            background: var(--cream);
            min-width: 80px;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
        }
        .chart-date {
            font-size: 0.8rem;
            color: var(--kopi);
            font-weight: 600;
            margin-bottom: 4px;
        }
        .chart-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--kopi-dark);
        }
        .no-data-message {
            color: #666;
            text-align: center;
            padding: 20px;
        }
        .table-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 28px 32px;
            margin: 24px 0;
        }
        .table-card h2 {
            color: var(--kopi);
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .sales-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        .sales-table thead {
            background: var(--cream);
        }
        .sales-table th {
            padding: 16px 20px;
            text-align: left;
            font-weight: 700;
            color: var(--kopi);
            font-size: 0.95rem;
            border-bottom: 2px solid #e0d3c0;
        }
        .sales-table tbody tr {
            border-bottom: 1px solid #f0e6d2;
            transition: background 0.2s;
        }
        .sales-table tbody tr:hover {
            background: #faf7f0;
        }
        .sales-table tbody tr:last-child {
            border-bottom: none;
        }
        .sales-table td {
            padding: 16px 20px;
            color: var(--kopi-dark);
            font-size: 0.95rem;
        }
        .sales-table tbody td:last-child {
            font-weight: 600;
            color: var(--kopi);
        }
        @media (max-width: 600px) {
            .main-header h1 { font-size: 1.2rem; }
            .summary-card { min-width: auto; padding: 20px 24px; }
            .summary-card .summary-value { font-size: 1.5rem; }
            .chart-card { padding: 20px 24px; }
            .chart-placeholder { height: 180px; flex-direction: column; gap: 16px; }
            .chart-item { min-width: 60px; padding: 10px; }
            .table-card { padding: 20px 16px; }
            .sales-table { font-size: 0.85rem; }
            .sales-table th,
            .sales-table td { padding: 12px 10px; }
        }
    </style>
</head>
<body>
<div class="container">
    @include('admin.partials.sidebar')
    <main class="main">
        <div class="main-header">
            <h1>Laporan Penjualan</h1>
        </div>
        <form method="GET" action="{{ route('sales.report') }}" class="filter-bar">
            <label for="from-date">Dari</label>
            <input type="date" id="from-date" name="from-date" value="{{ $fromDate }}">
            <label for="to-date">Sampai</label>
            <input type="date" id="to-date" name="to-date" value="{{ $toDate }}">
            <button type="submit" class="filter-btn">Filter</button>
            <button type="button" class="export-btn">Export PDF</button>
            <button type="button" class="export-btn">Export Excel</button>
        </form>
        <div class="summary-cards">
            <div class="summary-card">
                <h2>Total Penjualan Hari Ini</h2>
                <div class="summary-value">Rp {{ number_format($salesToday, 0, ',', '.') }}</div>
            </div>
            <div class="summary-card">
                <h2>Total Penjualan Bulan Ini</h2>
                <div class="summary-value">Rp {{ number_format($salesThisMonth, 0, ',', '.') }}</div>
            </div>
        </div>
        <div class="chart-card">
            <h2>Grafik Penjualan 7 Hari Terakhir</h2>
            <div class="chart-placeholder">
                @foreach($chartData as $data)
                    <div class="chart-item">
                        <div class="chart-date">{{ $data['date'] }}</div>
                        <div class="chart-amount">Rp {{ number_format($data['sales'], 0, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="table-card">
            <h2>Rincian Transaksi</h2>
            @if(count($formattedTransactions) > 0)
                <table class="sales-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Menu</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formattedTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction['tanggal'] }}</td>
                                <td>{{ $transaction['menu'] }}</td>
                                <td>{{ $transaction['jumlah'] }}</td>
                                <td>Rp {{ number_format($transaction['total_harga'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="no-data-message">Tidak ada transaksi untuk periode yang dipilih</p>
            @endif
        </div>
    </main>
</div>
</body>
</html> 