<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pembayaran - Coffe Space Cafe</title>
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
        .payments-list {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }
        .payment-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            padding: 28px 32px;
            min-width: 320px;
            max-width: 400px;
            flex: 1 1 320px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            position: relative;
        }
        .payment-header {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .payment-header .verified-label {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #e7dac6;
            color: var(--kopi);
            font-weight: 700;
            font-size: 0.98rem;
            border-radius: 10px;
            padding: 6px 16px;
        }
        .payment-header .verified-label .check {
            color: var(--green);
            font-size: 1.2rem;
        }
        .payment-info {
            color: var(--kopi-dark);
            font-size: 1rem;
            margin-bottom: 4px;
        }
        .payment-info strong {
            color: var(--kopi);
        }
        .payment-actions {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }
        .payment-actions button {
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 12px;
            padding: 10px 22px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
        }
        .payment-actions button:hover {
            background: var(--kopi-dark);
        }
        @media (max-width: 900px) {
            .container { flex-direction: column; }
            .sidebar { width: 100%; border-radius: 0 0 32px 32px; flex-direction: row; padding: 16px 0; }
            .sidebar nav { flex: none; }
            .main { padding: 24px 3vw; }
            .payments-list { flex-direction: column; gap: 18px; }
        }
        @media (max-width: 600px) {
            .main-header h1 { font-size: 1.2rem; }
            .payment-card { padding: 16px; min-width: 0; }
        }
        .modal-overlay {
            display: none;
            position: fixed;
            left: 0; top: 0;
            width: 100vw; height: 100vh;
            background: rgba(0,0,0,0.2);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }
        .modal-overlay.active {
            display: flex;
        }
        .modal-detail {
            background: #fff;
            border-radius: 16px;
            padding: 32px;
            min-width: 320px;
            max-width: 90vw;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .modal-detail .close-btn {
            position: absolute;
            top: 12px;
            right: 18px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #A67C52;
            cursor: pointer;
            line-height: 1;
        }
        .btn-detail {
            background: #A67C52;
            color: #fff !important;
            border: none;
            border-radius: 8px;
            padding: 7px 18px;
            font-size: 0.90rem;
            font-weight: 400;
            text-decoration: none;
            transition: background 0.2s;
            display: inline-block;
            white-space: nowrap;
            cursor: pointer;
        }
        .btn-detail:hover {
            background: #6D4C41;
        }
    </style>
</head>
<body>
<div class="container">
    @include('kasir.partials.sidebar')
    <main class="main">
        <div class="main-header">
            <h1>Verifikasi Pembayaran</h1>
        </div>
        <div class="payments-list">
            @forelse($orders as $order)
                <div class="payment-card">
                    <div class="payment-header">
                        <span class="verified-label"><span class="check">&#x2611;</span> Unpaid</span>
                    </div>
                    <div class="payment-info"><strong>ID Pesanan:</strong> {{ $order->invoice_number ?? 'INV-' . $order->created_at->format('Ymd') . '-' . str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</div>
                    <div class="payment-info"><strong>Nama Pelanggan:</strong> {{ $order->user->name }}</div>
                    <div class="payment-info"><strong>Total Pembayaran:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                    <div class="payment-info"><strong>Metode Pembayaran:</strong> {{ $order->metode_bayar }}</div>
                    <div class="payment-info"><strong>Waktu Pembayaran:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</div>
                    <div class="payment-info"><strong>Bukti Bayar:</strong><br>
                        @if($order->bukti_pembayaran)
                            <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" alt="Bukti Bayar" style="max-width:120px;max-height:120px;border-radius:10px;box-shadow:0 2px 8px #e0d2be;">
                        @else
                            <span style="color:#aaa;">Tidak ada bukti pembayaran</span>
                        @endif
                    </div>
                    <div class="payment-actions">
                        <a href="#" class="btn-detail"
                            data-invoice="{{ $order->invoice_number ?? 'INV-' . $order->created_at->format('Ymd') . '-' . str_pad($order->id, 3, '0', STR_PAD_LEFT) }}"
                            data-nama="{{ $order->user->name }}"
                            data-total="Rp {{ number_format($order->total, 0, ',', '.') }}"
                            data-metode="{{ $order->metode_bayar }}"
                            data-tanggal="{{ $order->created_at->format('Y-m-d H:i') }}"
                            data-bukti="{{ $order->bukti_pembayaran ? asset('storage/' . $order->bukti_pembayaran) : '' }}"
                            data-items="@foreach($order->orderItems as $item){{ $item->menu->nama }} x{{ $item->qty }}@if(!$loop->last), @endif @endforeach"
                            onclick="showPaymentDetail(this); return false;"
                        >Lihat Detail</a>
                        <form action="{{ route('verifikasi.pembayaran.verif', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit">Verifikasi</button>
                        </form>
                    </div>
                </div>
            @empty
                <div>Tidak ada pembayaran yang perlu diverifikasi.</div>
            @endforelse
        </div>
        <div id="paymentDetailModal" class="modal-overlay">
            <div class="modal-detail">
                <button class="close-btn" onclick="closePaymentDetail()">&times;</button>
                <h3 style="color:#A67C52;margin-bottom:18px;">Detail Pembayaran</h3>
                <div><b>No. Pesanan:</b> <span id="modal-invoice"></span></div>
                <div><b>Nama Pelanggan:</b> <span id="modal-nama"></span></div>
                <div><b>Total:</b> <span id="modal-total"></span></div>
                <div><b>Metode Pembayaran:</b> <span id="modal-metode"></span></div>
                <div><b>Tanggal:</b> <span id="modal-tanggal"></span></div>
                <div style="margin-top:18px;"><b>Daftar Item:</b></div>
                <div id="modal-items"></div>
                <div style="margin-top:18px;"><b>Bukti Bayar:</b></div>
                <div id="modal-bukti"></div>
            </div>
        </div>
    </main>
</div>
<script>
function showPaymentDetail(btn) {
    document.getElementById('modal-invoice').innerText = btn.getAttribute('data-invoice');
    document.getElementById('modal-nama').innerText = btn.getAttribute('data-nama');
    document.getElementById('modal-total').innerText = btn.getAttribute('data-total');
    document.getElementById('modal-metode').innerText = btn.getAttribute('data-metode');
    document.getElementById('modal-tanggal').innerText = btn.getAttribute('data-tanggal');
    document.getElementById('modal-items').innerText = btn.getAttribute('data-items');
    var bukti = btn.getAttribute('data-bukti');
    if(bukti) {
        document.getElementById('modal-bukti').innerHTML = '<img src="'+bukti+'" alt="Bukti Bayar" style="max-width:220px;max-height:220px;border-radius:10px;box-shadow:0 2px 8px #e0d2be;">';
    } else {
        document.getElementById('modal-bukti').innerHTML = '<span style="color:#aaa;">Tidak ada bukti pembayaran</span>';
    }
    document.getElementById('paymentDetailModal').classList.add('active');
}
function closePaymentDetail() {
    document.getElementById('paymentDetailModal').classList.remove('active');
}
</script>
</body>
</html> 