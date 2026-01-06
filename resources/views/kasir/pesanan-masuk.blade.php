<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Masuk - Coffe Space Cafe</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            margin-bottom: 24px;
        }
        .main-header h1 {
            color: var(--kopi);
            font-size: 2rem;
            font-weight: 700;
        }
        .orders-list {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }
        .order-card {
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
        .order-header {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .order-header .coffee-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5e3d0;
            border-radius: 50%;
        }
        .order-header .coffee-icon svg {
            width: 22px;
            height: 22px;
            color: var(--kopi);
        }
        .order-header .customer-name {
            font-weight: 700;
            color: var(--kopi-dark);
            font-size: 1.1rem;
        }
        .order-time {
            color: #a67c52;
            font-size: 0.95rem;
            font-weight: 600;
        }
        .order-items {
            margin: 8px 0 0 0;
            padding-left: 18px;
            color: var(--kopi-dark);
            font-size: 1rem;
        }
        .order-total {
            font-weight: 700;
            color: var(--kopi);
            font-size: 1.1rem;
        }
        .order-status {
            display: inline-block;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 10px;
            padding: 6px 16px;
            background: #e7dac6;
            color: var(--kopi-dark);
        }
        .order-status.proses {
            background: #f7cfcf;
            color: #b71c1c;
        }
        .order-status.paid {
            background: #d4edda;
            color: #155724;
        }
        .order-actions {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }
        .order-actions button {
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
        .order-actions button:hover {
            background: var(--kopi-dark);
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
        .btn-edit {
            background: #4CAF50;
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
        .btn-edit:hover {
            background: #388E3C;
        }
        .btn-delete {
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-delete:hover {
            background: #c0392b;
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
        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0e6d2;
        }
        .item-row:last-child {
            border-bottom: none;
        }
        .item-info {
            flex: 1;
        }
        .item-actions {
            display: flex;
            gap: 10px;
        }
        .total-section {
            margin-top: 24px;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--kopi);
            text-align: right;
        }
        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        @media (max-width: 900px) {
            .container { flex-direction: column; }
            .sidebar { width: 100%; border-radius: 0 0 32px 32px; flex-direction: row; padding: 16px 0; }
            .sidebar nav { flex: none; }
            .main { padding: 24px 3vw; }
            .orders-list { flex-direction: column; gap: 18px; }
        }
        @media (max-width: 600px) {
            .main-header h1 { font-size: 1.2rem; }
            .order-card { padding: 16px; min-width: 0; }
        }
    </style>
</head>
<body>
<div class="container">
    @include('kasir.partials.sidebar')
    <main class="main">
        <div class="main-header">
            <h1>Pesanan Masuk</h1>
        </div>
        <div class="orders-list">
            @forelse($orders as $order)
                <div class="order-card">
                    <div class="order-header">
                        <b>{{ $order->user->name }}</b>
                        <span>{{ $order->created_at->format('H:i') }}</span>
                    </div>
                    <ul style="margin: 0 0 8px 0; padding-left: 18px;">
                        @foreach($order->orderItems as $item)
                            <li>{{ $item->menu->nama }} x{{ $item->qty }}</li>
                        @endforeach
                    </ul>
                    <div style="font-weight:700; color:#A67C52; margin-bottom:8px;" id="total-{{ $order->id }}">Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                    <div style="margin-bottom:12px;">
                        @if($order->status == 'paid')
                            <span class="order-status paid">Menunggu Proses</span>
                        @elseif($order->status == 'proses')
                            <span class="order-status proses">Sedang Diproses</span>
                        @else
                            <span class="order-status">{{ ucfirst($order->status) }}</span>
                        @endif
                    </div>
                    <div style="display:flex; gap:12px;">
                        <a href="#" class="btn-detail"
                            data-invoice="{{ $order->invoice_number ?? 'INV-' . $order->created_at->format('Ymd') . '-' . str_pad($order->id, 3, '0', STR_PAD_LEFT) }}"
                            data-nama="{{ $order->user->name }}"
                            data-total="Rp {{ number_format($order->total, 0, ',', '.') }}"
                            data-status="{{ $order->status }}"
                            data-tanggal="{{ $order->created_at->format('Y-m-d H:i') }}"
                            data-items="@foreach($order->orderItems as $item){{ $item->menu->nama }} x{{ $item->qty }}@if(!$loop->last), @endif @endforeach"
                            data-action="{{ route('pesanan.masuk.status', $order->id) }}"
                            onclick="showOrderDetail(this); return false;"
                        >Lihat Detail</a>
                        <a href="#" class="btn-edit"
                            data-order-id="{{ $order->id }}"
                            data-invoice="{{ $order->invoice_number ?? 'INV-' . $order->created_at->format('Ymd') . '-' . str_pad($order->id, 3, '0', STR_PAD_LEFT) }}"
                            data-nama="{{ $order->user->name }}"
                            data-tanggal="{{ $order->created_at->format('Y-m-d H:i') }}"
                            data-status="{{ $order->status }}"
                            onclick="showEditModal(this); return false;"
                        >Edit Pesanan</a>
                    </div>
                </div>
            @empty
                <div>Tidak ada pesanan masuk.</div>
            @endforelse
        </div>
    </main>
</div>

<!-- Modal Detail Pesanan -->
<div id="orderDetailModal" class="modal-overlay">
    <div class="modal-detail">
        <button class="close-btn" onclick="closeOrderDetail()">&times;</button>
        <h3 style="color:#A67C52;margin-bottom:18px;">Detail Pesanan</h3>
        <div><b>No. Pesanan:</b> <span id="modal-invoice"></span></div>
        <div><b>Nama Pelanggan:</b> <span id="modal-nama"></span></div>
        <div><b>Status:</b> <span id="modal-status"></span></div>
        <div><b>Tanggal:</b> <span id="modal-tanggal"></span></div>
        <div style="margin-top:18px;"><b>Daftar Item:</b></div>
        <div id="modal-items"></div>
        <div style="margin-top:18px;"><b>Total:</b> <span id="modal-total"></span></div>
        <form id="modal-status-form" method="POST" style="margin-top:18px;">
            @csrf
            @method('PUT')
            <label for="modal-status-select"><b>Ubah Status:</b></label>
            <select name="status" id="modal-status-select" style="border-radius:8px;padding:6px 12px;margin-right:8px;">
                <option value="proses">Mulai Proses</option>
                <option value="selesai">Selesai</option>
                <option value="dibatalkan">Dibatalkan</option>
            </select>
            <button type="submit" class="btn-detail">Update Status</button>
        </form>
    </div>
</div>

<!-- Modal Edit Pesanan -->
<div id="editOrderModal" class="modal-overlay">
    <div class="modal-detail" style="width: 500px;">
        <button class="close-btn" onclick="closeEditModal()">&times;</button>
        <h3 style="color:#A67C52;margin-bottom:18px;">Edit Pesanan</h3>
        <div><b>No. Pesanan:</b> <span id="edit-modal-invoice"></span></div>
        <div><b>Nama Pelanggan:</b> <span id="edit-modal-nama"></span></div>
        <div><b>Tanggal:</b> <span id="edit-modal-tanggal"></span></div>
        <div><b>Status:</b> <span id="edit-modal-status"></span></div>
        
        <div style="margin-top:18px;"><b>Daftar Item:</b></div>
        <div id="edit-modal-items-container">
            <!-- Items will be loaded here dynamically -->
        </div>
        
        <div class="total-section">
            <p>Total: <span id="edit-modal-total">Rp 0</span></p>
        </div>
    </div>
</div>

<script>
function showOrderDetail(btn) {
    document.getElementById('modal-invoice').innerText = btn.getAttribute('data-invoice');
    document.getElementById('modal-nama').innerText = btn.getAttribute('data-nama');
    document.getElementById('modal-status').innerText = btn.getAttribute('data-status');
    document.getElementById('modal-tanggal').innerText = btn.getAttribute('data-tanggal');
    document.getElementById('modal-items').innerText = btn.getAttribute('data-items');
    document.getElementById('modal-total').innerText = btn.getAttribute('data-total');
    // Set form action
    var id = btn.getAttribute('data-invoice');
    var orderId = btn.getAttribute('data-invoice').split('-').pop();
    var form = document.getElementById('modal-status-form');
    form.action = btn.getAttribute('data-action');
    // Set selected status
    var status = btn.getAttribute('data-status');
    var select = document.getElementById('modal-status-select');
    for (var i = 0; i < select.options.length; i++) {
        select.options[i].selected = (select.options[i].value === status);
    }
    document.getElementById('orderDetailModal').classList.add('active');
}

function closeOrderDetail() {
    document.getElementById('orderDetailModal').classList.remove('active');
}

function showEditModal(btn) {
    const orderId = btn.getAttribute('data-order-id');
    document.getElementById('edit-modal-invoice').innerText = btn.getAttribute('data-invoice');
    document.getElementById('edit-modal-nama').innerText = btn.getAttribute('data-nama');
    document.getElementById('edit-modal-tanggal').innerText = btn.getAttribute('data-tanggal');
    document.getElementById('edit-modal-status').innerText = btn.getAttribute('data-status');
    
    // Fetch order items via AJAX
    fetch(`/pesanan-masuk/${orderId}/items`)
        .then(response => response.json())
        .then(data => {
            const itemsContainer = document.getElementById('edit-modal-items-container');
            itemsContainer.innerHTML = '';
            
            if (data.items.length === 0) {
                itemsContainer.innerHTML = '<p>Tidak ada item dalam pesanan ini.</p>';
            } else {
                data.items.forEach(item => {
                    const itemRow = document.createElement('div');
                    itemRow.className = 'item-row';
                    itemRow.id = `item-row-${item.id}`;
                    
                    itemRow.innerHTML = `
                        <div class="item-info">
                            <p><strong>${item.menu.nama}</strong> x${item.qty}</p>
                            <p>Rp ${formatNumber(item.harga_satuan)} / item</p>
                        </div>
                        <div class="item-actions">
                            <button class="btn-delete" onclick="hapusItem(${orderId}, ${item.id})">Hapus</button>
                        </div>
                    `;
                    
                    itemsContainer.appendChild(itemRow);
                });
            }
            
            document.getElementById('edit-modal-total').innerText = data.total_formatted;
        });
    
    document.getElementById('editOrderModal').classList.add('active');
}

function closeEditModal() {
    document.getElementById('editOrderModal').classList.remove('active');
}

function hapusItem(orderId, itemId) {
    if (confirm('Yakin ingin menghapus item ini?')) {
        // Get CSRF token
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Send AJAX request to delete item
        fetch('/pesanan-masuk/hapus-item', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                order_id: orderId,
                item_id: itemId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove item from modal
                document.getElementById(`item-row-${itemId}`).remove();
                
                // Update total in modal
                document.getElementById('edit-modal-total').innerText = data.total_formatted;
                
                // Update total in order card
                document.getElementById(`total-${orderId}`).innerText = data.total_formatted;
                
                // Show success message
                alert(data.message);
                
                // If order was deleted, refresh the page
                if (data.order_deleted) {
                    location.reload();
                }
            } else {
                alert(data.message || 'Terjadi kesalahan saat menghapus item');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus item');
        });
    }
}

function formatNumber(number) {
    return new Intl.NumberFormat('id-ID').format(number);
}
</script>
</body>
</html>