<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Coffe Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', 'Inter', sans-serif; background: #FAF3E0; color: #6D4C41; margin: 0; }
        .checkout-container { max-width: 1000px; margin: 40px auto; background: #fff; border-radius: 18px; box-shadow: 0 4px 16px rgba(166,124,82,0.10); padding: 32px 32px; }
        h2 { color: #A67C52; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { padding: 10px 8px; text-align: left; }
        th { background: #FAF3E0; color: #A67C52; font-weight: 700; }
        tr:nth-child(even) { background: #f7f1e6; }
        .total { text-align: right; font-size: 1.2rem; font-weight: 700; color: #A67C52; margin-bottom: 24px; }
        .pay-methods {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 28px;
        }
        .pay-card {
            width: 100%;
            background: #FAF3E0;
            border: 2px solid #e0d2be;
            border-radius: 14px;
            padding: 18px 12px;
            display: flex;
            align-items: center;
            gap: 14px;
            cursor: pointer;
            transition: border 0.2s, box-shadow 0.2s;
            font-size: 1.05rem;
            font-weight: 600;
            color: #6D4C41;
        }
        .pay-card.selected, .pay-card:hover {
            border: 2.5px solid #A67C52;
            box-shadow: 0 2px 12px rgba(166,124,82,0.10);
            background: #fff7e6;
        }
        .pay-radio { display: none; }
        .checkout-btn { background: #A67C52; color: #fff; border: none; border-radius: 12px; padding: 14px 36px; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: background 0.2s; width: 100%; margin-top: 18px; }
        .checkout-btn:hover { background: #6D4C41; }
        @media (max-width: 900px) {
            .checkout-container { padding: 18px 4vw; }
            .pay-card { font-size: 0.97rem; }
        }
        @media (max-width: 600px) {
            .checkout-container { padding: 8px 2vw; }
            table th, table td { font-size: 0.95rem; }
        }
        .custom-file-upload .file-label {
            display: inline-block;
            background: #A67C52;
            color: #fff;
            padding: 12px 28px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: background 0.2s;
        }
        .custom-file-upload .file-label:hover {
            background: #6D4C41;
        }
    </style>
</head>
<body>
<div class="checkout-container">
    <h2>Rincian Pesanan</h2>
    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $item)
            <tr>
                <td>{{ $item->menu->nama }}</td>
                <td>{{ $item->qty }}</td>
                <td>Rp {{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->menu->harga * $item->qty, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total">
        Total: Rp {{ number_format($total, 0, ',', '.') }}
    </div>
    <form action="{{ route('keranjang.bayar') }}" method="POST" id="form-bayar" enctype="multipart/form-data">
        @csrf
        
        <div style="margin-bottom:10px;font-weight:600;">Pilih Metode Pembayaran:</div>
        <div class="pay-methods">
            <label class="pay-card" id="card-atm">
                <input type="radio" name="metode_bayar" value="ATM" class="pay-radio" required>
                <span>ATM Transfer</span>
            </label>
            <div id="atm-banks" style="display:none; margin-left:18px; margin-top:8px; flex-direction:column; gap:10px;">
                <label class="pay-card" style="max-width:340px;">
                    <input type="radio" name="bank_atm" value="BCA" class="pay-radio">
                    <img src="/img/bca-logo.png" alt="BCA" style="width:32px;height:32px;object-fit:contain;margin-right:10px;">
                    <span>Bank BCA</span>
                </label>
                <label class="pay-card" style="max-width:340px;">
                    <input type="radio" name="bank_atm" value="Mandiri" class="pay-radio">
                    <img src="/img/mandiri-logo.png" alt="Mandiri" style="width:32px;height:32px;object-fit:contain;margin-right:10px;">
                    <span>Bank Mandiri</span>
                </label>
                <label class="pay-card" style="max-width:340px;">
                    <input type="radio" name="bank_atm" value="BNI" class="pay-radio">
                    <img src="/img/bni-logo.png" alt="BNI" style="width:32px;height:32px;object-fit:contain;margin-right:10px;">
                    <span>Bank BNI</span>
                </label>
                <label class="pay-card" style="max-width:340px;">
                    <input type="radio" name="bank_atm" value="BRI" class="pay-radio">
                    <img src="/img/bri-logo.png" alt="BRI" style="width:32px;height:32px;object-fit:contain;margin-right:10px;">
                    <span>Bank BRI</span>
                </label>
            </div>
            <label class="pay-card" id="card-qris">
                <input type="radio" name="metode_bayar" value="QRIS" class="pay-radio">
                <img src="/img/qris-logo.png" alt="QRIS" style="width:32px;height:32px;object-fit:contain;margin-right:10px;">
                <span>QRIS</span>
                <div class="qr-img" id="qr-qris" style="display:none;text-align:center;margin:10px 0 0 0;">
                    <img src="/img/qr-qris.jpg" alt="QR QRIS" style="max-width:220px;max-height:220px;border-radius:10px;box-shadow:0 2px 8px #e0d2be;">
                </div>
            </label>
            <label class="pay-card" id="card-gopay">
                <input type="radio" name="metode_bayar" value="GoPay" class="pay-radio">
                <img src="/img/gopay-logo.jpg" alt="GoPay" style="width:32px;height:32px;object-fit:contain;margin-right:10px;">
                <span>GoPay</span>
                <div class="qr-img" id="qr-gopay" style="display:none;text-align:center;margin:10px 0 0 0;">
                    <img src="/img/qr-gopay.jpg" alt="QR GoPay" style="max-width:220px;max-height:220px;border-radius:10px;box-shadow:0 2px 8px #e0d2be;">
                </div>
            </label>
            <label class="pay-card" id="card-dana">
                <input type="radio" name="metode_bayar" value="Dana" class="pay-radio">
                <img src="/img/dana-logo.jpg" alt="Dana" style="width:32px;height:32px;object-fit:contain;margin-right:10px;">
                <span>Dana</span>
                <div class="qr-img" id="qr-dana" style="display:none;text-align:center;margin:10px 0 0 0;">
                    <img src="/img/qr-dana.jpg" alt="QR Dana" style="max-width:220px;max-height:220px;border-radius:10px;box-shadow:0 2px 8px #e0d2be;">
                </div>
            </label>
            <div style="margin:18px 0 10px 0;font-weight:600;">Bukti Pembayaran:</div>
            <div class="custom-file-upload">
                <div id="preview-bukti" style="margin-top:12px;"></div>
                <span id="file-chosen" style="margin-left:12px;color:#A67C52;font-weight:600;"></span>
                <br>
                <br>
                <label for="bukti" class="file-label">
                    <span id="file-label-text">Upload Disini</span>
                    <input type="file" name="bukti" id="bukti" accept="image/*" required style="display:none;">
                </label>
            </div>
        </div>
        <button type="submit" class="checkout-btn">Pesan</button>
    </form>
</div>
<script>
    // Card radio UI
    document.querySelectorAll('.pay-card').forEach(card => {
        card.addEventListener('click', function(e) {
            // Metode bayar
            if (this.querySelector('input[name=metode_bayar]')) {
                document.querySelectorAll('.pay-card').forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                this.querySelector('input[type=radio]').checked = true;
                // ATM
                document.getElementById('atm-banks').style.display = 'none';
                // Hide all QR
                document.querySelectorAll('.qr-img').forEach(qr => qr.style.display = 'none');
                // Uncheck all bank radio
                document.querySelectorAll('input[name=bank_atm]').forEach(b => b.checked = false);
                const val = this.querySelector('input[type=radio]').value;
                if(val === 'ATM') {
                    document.getElementById('atm-banks').style.display = '';
                } else if(val === 'Dana') {
                    this.querySelector('.qr-img').style.display = 'block';
                } else if(val === 'GoPay') {
                    this.querySelector('.qr-img').style.display = 'block';
                } else if(val === 'QRIS') {
                    this.querySelector('.qr-img').style.display = 'block';
                }
            } else if (this.querySelector('input[name=bank_atm]')) {
                // Pilih bank ATM
                document.querySelectorAll('#atm-banks .pay-card').forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                this.querySelector('input[type=radio]').checked = true;
            }
        });
    });
    document.getElementById('bukti').addEventListener('change', function(){
        const fileName = this.files[0] ? this.files[0].name : '';
        document.getElementById('file-chosen').textContent = fileName;
        // Preview image
        const preview = document.getElementById('preview-bukti');
        preview.innerHTML = '';
        if (this.files && this.files[0]) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(this.files[0]);
            img.style.maxWidth = '220px';
            img.style.maxHeight = '180px';
            img.style.marginTop = '8px';
            img.style.borderRadius = '10px';
            img.onload = function() { URL.revokeObjectURL(img.src); }
            preview.appendChild(img);
        }
    });
</script>
</body>
</html> 