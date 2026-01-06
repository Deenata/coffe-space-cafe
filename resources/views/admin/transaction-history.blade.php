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
        .filter-bar input[type="text"],
        .filter-bar input[type="date"],
        .filter-bar select {
            padding: 8px 16px;
            border-radius: 10px;
            border: 1px solid #e0d3c0;
            background: var(--white);
            color: var(--kopi-dark);
            font-size: 1rem;
            margin-right: 4px;
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
        .table-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 28px 32px;
            margin-top: 24px;
        }
        .transaction-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }
        .transaction-table th, .transaction-table td {
            padding: 14px 10px;
            background: var(--white);
            text-align: left;
        }
        .transaction-table th {
            color: var(--kopi);
            font-size: 1rem;
            font-weight: 700;
            border-bottom: 2px solid #f0e6d2;
        }
        .transaction-table td {
            color: var(--kopi-dark);
            font-size: 1rem;
            font-weight: 500;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(166,124,82,0.07);
        }
        .status {
            display: inline-block;
            padding: 6px 18px;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
        }
        .status.lunas {
            background: #e7dac6;
            color: var(--kopi-dark);
        }
        .status.belum {
            background: #f7cfcf;
            color: #b71c1c;
        }
        .status.dibatalkan {
            background: #f8d7da;
            color: #721c24;
        }
        .status.pending {
            background: #fff3cd;
            color: #856404;
        }
        .status.menunggu {
            background: #fff3cd;
            color: #856404;
        }
        .pagination-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .no-data-message {
            color: #666;
            text-align: center;
            padding: 20px;
        }
        @media (max-width: 700px) {
            .main-header h1 { font-size: 1.2rem; }
            .filter-bar { flex-direction: column; align-items: stretch; }
            .filter-bar input[type="text"],
            .filter-bar input[type="date"],
            .filter-bar select { margin-right: 0; margin-bottom: 8px; }
            .transaction-table th, .transaction-table td { padding: 10px 6px; font-size: 0.95rem; }
        }
        @media (max-width: 500px) {
            .container { padding: 8px 0; }
            .main-header { flex-direction: column; gap: 12px; align-items: flex-start; }
            .transaction-table th, .transaction-table td { font-size: 0.9rem; }
        }
    </style>
</head>
<body>
<div class="container">
    @include('admin.partials.sidebar')
    <main class="main">
        <div class="main-header">
            <h1>Riwayat Transaksi</h1>
        </div>
        <form method="GET" action="{{ route('transaction.history') }}" class="filter-bar">
            <input type="text" name="search" placeholder="Cari ID/Nama Pelanggan..." value="{{ $search }}">
            <input type="date" name="from-date" placeholder="Dari" value="{{ $fromDate }}">
            <input type="date" name="to-date" placeholder="Sampai" value="{{ $toDate }}">
            <select name="status">
                <option value="">Status</option>
                <option value="lunas" {{ $status === 'lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="belum" {{ $status === 'belum' ? 'selected' : '' }}>Belum Lunas</option>
            </select>
            <button type="submit" class="filter-btn">Filter</button>
        </form>
        <div class="table-card">
            @if($transactions->count() > 0)
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total Pembayaran</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->invoice_number ?? 'INV-' . $transaction->created_at->format('Ymd') . '-' . str_pad($transaction->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                                <td>{{ $transaction->metode_bayar }}</td>
                                <td>
                                    @if($transaction->status === 'selesai')
                                        <span class="status lunas">Lunas</span>
                                    @elseif(in_array($transaction->status, ['pending', 'menunggu']))
                                        <span class="status belum">Belum Lunas</span>
                                    @else
                                        <span class="status {{ strtolower($transaction->status) }}">{{ ucfirst($transaction->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="pagination-container">
                    {{ $transactions->appends(request()->query())->links() }}
                </div>
            @else
                <p class="no-data-message">Tidak ada transaksi ditemukan</p>
            @endif
        </div>
    </main>
</div>
</body>
</html> 