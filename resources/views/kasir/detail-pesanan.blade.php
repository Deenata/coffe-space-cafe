<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Coffe Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #FAF3E0;
            --white: #FFFFFF;
            --kopi: #A67C52;
            --kopi-dark: #6D4C41;
        }
        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: var(--cream);
            min-height: 100vh;
            color: var(--kopi-dark);
        }
        .detail-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: var(--cream);
            padding: 24px 8px;
        }
        .order-detail-card {
            background: var(--white);
            border-radius: 24px;
            box-shadow: 0 6px 32px rgba(166,124,82,0.13);
            padding: 36px 28px 24px 28px;
            max-width: 420px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .order-detail-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--kopi);
            margin-bottom: 8px;
            text-align: center;
        }
        .order-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .order-info-label {
            font-weight: 600;
            color: var(--kopi-dark);
            font-size: 1rem;
        }
        .order-info-value {
            font-weight: 500;
            color: var(--kopi-dark);
            font-size: 1.05rem;
            margin-bottom: 4px;
        }
        .order-items-list {
            background: #f5e3d0;
            border-radius: 12px;
            padding: 12px 16px;
            margin: 0 0 8px 0;
        }
        .order-items-list li {
            color: var(--kopi-dark);
            font-size: 1rem;
            margin-bottom: 4px;
        }
        .order-total {
            font-weight: 700;
            color: var(--kopi);
            font-size: 1.2rem;
            text-align: right;
            margin-top: 8px;
        }
        .card-actions {
            display: flex;
            gap: 12px;
            margin-top: 18px;
            justify-content: space-between;
        }
        .card-actions button {
            flex: 1 1 0;
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 16px;
            padding: 12px 0;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
        }
        .card-actions button.edit {
            background: var(--kopi-dark);
        }
        .card-actions button.delete {
            background: #e57373;
        }
        .card-actions button.delete:hover {
            background: #b71c1c;
        }
        .card-actions button:active {
            opacity: 0.9;
        }
        @media (max-width: 600px) {
            .order-detail-card {
                padding: 18px 6px 16px 6px;
                max-width: 98vw;
            }
            .order-detail-title {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
<div class="detail-container">
    <div class="order-detail-card">
        <div class="order-detail-title">Detail Pesanan</div>
        <div class="order-info">
            <div>
                <span class="order-info-label">Nama Pelanggan:</span><br>
                <span class="order-info-value">{{ $order->customer_name ?? 'Rina Pratiwi' }}</span>
            </div>
            <div>
                <span class="order-info-label">Waktu Pemesanan:</span><br>
                <span class="order-info-value">{{ $order->order_time ?? '2024-06-01 10:15' }}</span>
            </div>
            <div>
                <span class="order-info-label">Item Pesanan:</span>
                <ul class="order-items-list">
                    @if(isset($order) && isset($order->items))
                        @foreach($order->items as $item)
                            <li>{{ $item['name'] }} x{{ $item['qty'] }}</li>
                        @endforeach
                    @else
                        <li>Cappuccino Caramel x2</li>
                        <li>Affogato x1</li>
                    @endif
                </ul>
            </div>
            <div class="order-total">
                Total: Rp {{ $order->total_price ?? '85.000' }}
            </div>
        </div>
        <div class="card-actions">
            <button onclick="window.location='{{ route('pesanan.masuk') }}'">Kembali</button>
            <button class="edit" onclick="window.location='{{ route('pesanan.edit', $order->id ?? 1) }}'">Edit</button>
            <button class="delete" onclick="if(confirm('Yakin ingin menghapus pesanan ini?')){ window.location='{{ route('pesanan.delete', $order->id ?? 1) }}'; }">Hapus</button>
        </div>
    </div>
</div>
</body>
</html> 