<div id="modalHapusMenu" class="modal" style="display:none;">
    <div class="modal-content">
        <form id="formHapusMenu" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h2>Konfirmasi Hapus Menu</h2>
                <button type="button" class="close-btn" onclick="hideModalHapusMenu()">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <p style="font-size:1.1rem; color:#6D4C41; margin-bottom:18px;">Apakah Anda yakin ingin menghapus menu ini?</p>
                <div class="hapus-menu-info">
                    <span class="hapus-menu-label">Nama Menu:</span>
                    <span class="hapus-menu-nama" id="hapusMenuNama">-</span>
                </div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="hideModalHapusMenu()">Batal</button>
                <button type="submit" class="btn-delete">Hapus</button>
            </div>
        </form>
    </div>
    <style>
        #modalHapusMenu {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.18);
            overflow-y: auto;
            padding: 32px 0;
        }
        .modal-content {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 16px 48px rgba(166,124,82,0.18);
            min-width: 320px;
            max-width: 95vw;
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', 'Inter', sans-serif;
            overflow: hidden;
        }
        .modal-header {
            background: linear-gradient(135deg, #A67C52 0%, #8B6B47 100%);
            color: #fff;
            padding: 20px 28px 16px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }
        .modal-header h2 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 700;
            margin: 0;
            text-align: left;
        }
        .close-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: rgba(255,255,255,0.18);
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            backdrop-filter: blur(10px);
        }
        .close-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.05);
        }
        .modal-body {
            padding: 24px 28px 8px 28px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .hapus-menu-info {
            background: #FAF3E0;
            border-radius: 12px;
            padding: 14px 18px;
            border: 2px solid #E0C9B2;
            margin-bottom: 8px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .hapus-menu-label {
            color: #A67C52;
            font-weight: 600;
            font-size: 1rem;
        }
        .hapus-menu-nama {
            color: #6D4C41;
            font-size: 1.1rem;
            font-weight: 700;
            margin-left: 2px;
        }
        .modal-actions {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            padding: 18px 28px 24px 28px;
            border-top: 2px solid #E0C9B2;
        }
        .btn-cancel {
            padding: 12px 28px;
            border-radius: 12px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Poppins', 'Inter', sans-serif;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            background: #FAF3E0;
            color: #A67C52;
        }
        .btn-cancel:hover {
            background: #f3e3c7;
        }
        .btn-delete {
            padding: 12px 28px;
            border-radius: 12px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Poppins', 'Inter', sans-serif;
            box-shadow: 0 2px 8px rgba(244,67,54,0.10);
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: #fff;
        }
        .btn-delete:hover {
            background: linear-gradient(135deg, #d32f2f 0%, #b71c1c 100%);
        }
        @media (max-width: 600px) {
            .modal-content { max-width: 98vw; }
            .modal-header, .modal-body, .modal-actions { padding-left: 14px; padding-right: 14px; }
        }
    </style>
</div>
<script>
function hideModalHapusMenu() {
    document.getElementById('modalHapusMenu').style.display = 'none';
}
// Fungsi ini dipanggil dari handleDeleteMenu(menuId, menuNama)
function showModalHapusMenu(menuId, menuNama) {
    var form = document.getElementById('formHapusMenu');
    form.action = '/menu-management/' + menuId;
    document.getElementById('hapusMenuNama').textContent = menuNama;
    document.getElementById('modalHapusMenu').style.display = 'flex';
}
</script> 