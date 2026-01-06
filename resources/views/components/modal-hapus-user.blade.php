<div id="modalHapusUser" class="modal" style="display:none;position:fixed;z-index:1000;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);align-items:center;justify-content:center;">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Hapus User</h2>
        </div>
        <div class="modal-body">
            <p style="font-size:1.08rem;color:#6D4C41;text-align:center;margin-bottom:18px;">Yakin ingin menghapus user ini?<br><span style="font-weight:600;color:#A67C52;">Tindakan ini tidak dapat dibatalkan.</span></p>
        </div>
        <form id="hapusUserForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="hideModalHapusUser()">Batal</button>
                <button type="submit" class="btn-delete">Hapus</button>
            </div>
        </form>
    </div>
    <style>
        #modalHapusUser {
            display: flex;
        }
        .modal-content {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(166,124,82,0.13);
            padding: 36px 28px 28px 28px;
            min-width: 320px;
            max-width: 95vw;
            width: 100%;
            max-width: 370px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            font-family: 'Poppins', 'Inter', sans-serif;
        }
        .modal-header h2 {
            color: #A67C52;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 8px;
            text-align: center;
        }
        .modal-body p {
            color: #6D4C41;
            font-size: 1.08rem;
            margin-bottom: 18px;
        }
        .modal-actions {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .btn-cancel, .btn-delete {
            padding: 11px 28px;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Poppins', 'Inter', sans-serif;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .btn-cancel {
            background: #FAF3E0;
            color: #A67C52;
        }
        .btn-cancel:hover {
            background: #f3e3c7;
        }
        .btn-delete {
            background: #e57373;
            color: #fff;
        }
        .btn-delete:hover {
            background: #b71c1c;
        }
        @media (max-width: 600px) {
            .modal-content { padding: 16px 4vw; min-width: 0; }
            .modal-header h2 { font-size: 1.05rem; }
        }
    </style>
</div> 