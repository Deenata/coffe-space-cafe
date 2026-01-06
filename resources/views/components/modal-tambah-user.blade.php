<div id="modalTambahUser" class="modal" style="display:none;position:fixed;z-index:1000;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);align-items:center;justify-content:center;">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Tambah User</h2>
        </div>
        <form class="modal-form" method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="form-group">
                <label for="nama-user">Nama</label>
                <input type="text" id="nama-user" name="name" placeholder="Masukkan nama user" required />
            </div>
            <div class="form-group">
                <label for="email-user">Email</label>
                <input type="email" id="email-user" name="email" placeholder="Masukkan email user" required />
            </div>
            <div class="form-group">
                <label for="role-user">Role</label>
                <select id="role-user" name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Pelanggan">Pelanggan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status-user">Status</label>
                <select id="status-user" name="status" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="hideModalTambahUser()">Batal</button>
                <button type="submit" class="btn-save">Simpan</button>
            </div>
        </form>
    </div>
    <style>
        #modalTambahUser {
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
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            font-family: 'Poppins', 'Inter', sans-serif;
        }
        .modal-header h2 {
            color: #A67C52;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
            text-align: center;
        }
        .modal-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .form-group label {
            color: #6D4C41;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 2px;
        }
        .form-group input,
        .form-group select {
            padding: 12px 16px;
            border-radius: 12px;
            border: 1.5px solid #E0C9B2;
            background: #FAF3E0;
            color: #6D4C41;
            font-size: 1rem;
            font-family: 'Poppins', 'Inter', sans-serif;
            transition: border 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .form-group input:focus,
        .form-group select:focus {
            border: 1.5px solid #A67C52;
            box-shadow: 0 0 0 2px #A67C5233;
            background: #fff;
        }
        .modal-actions {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .btn-cancel, .btn-save {
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
        .btn-save {
            background: #A67C52;
            color: #fff;
        }
        .btn-save:hover {
            background: #6D4C41;
        }
        @media (max-width: 600px) {
            .modal-content { padding: 16px 4vw; min-width: 0; }
            .modal-header h2 { font-size: 1.1rem; }
        }
    </style>
</div> 