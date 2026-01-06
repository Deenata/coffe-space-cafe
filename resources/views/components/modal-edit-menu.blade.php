<div id="modalEditMenu" class="modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Edit Menu</h2>
        </div>
        <div class="modal-body">
            <form class="modal-form" method="POST" action="" enctype="multipart/form-data" id="editMenuForm">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-id-menu" />
                <div class="form-inner">
                    <div class="form-group">
                        <label for="edit-nama">Nama Menu</label>
                        <input type="text" id="edit-nama" name="nama" required />
                    </div>
                    <div class="form-group">
                        <label for="edit-kategori">Kategori</label>
                        <select id="edit-kategori" name="kategori" required>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-harga">Harga</label>
                        <input type="number" id="edit-harga" name="harga" min="0" required />
                    </div>
                    <div class="form-group">
                        <label for="edit-deskripsi">Deskripsi</label>
                        <textarea id="edit-deskripsi" name="deskripsi" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit-status">Status</label>
                        <select id="edit-status" name="status" required>
                            <option value="tersedia">Tersedia</option>
                            <option value="habis">Habis</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-gambar">Ganti Gambar (opsional)</label>
                        <input type="file" id="edit-gambar" name="gambar" accept="image/*" />
                    </div>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="hideModalEditMenu()">Batal</button>
                    <button type="submit" class="save-btn-wide">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        #modalEditMenu {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.18);
        }
        .modal-content {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 2px 16px rgba(166,124,82,0.08);
            padding: 32px 0 24px 0;
            max-width: 520px;
            width: 100%;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', 'Inter', sans-serif;
            margin: auto;
            max-height: 90vh;
            overflow-y: auto;
        }
        .modal-header h2 {
            color: #A67C52;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 22px;
            text-align: center;
            letter-spacing: 0.01em;
        }
        .modal-form {
            display: flex;
            flex-direction: column;
            gap: 0;
        }
        .form-inner {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            padding: 0 1rem;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 22px;
            gap: 6px;
        }
        .form-group label {
            font-weight: 500;
            color: #8B6B47;
            font-size: 0.98rem;
            letter-spacing: 0.01em;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            border-radius: 10px;
            border: 1.5px solid #E0C9B2;
            background: #FAF3E0;
            color: #6D4C41;
            font-size: 1rem;
            padding: 13px 16px;
            font-family: 'Poppins', 'Inter', sans-serif;
            transition: border 0.2s, box-shadow 0.2s;
            outline: none;
            margin: 0;
            box-sizing: border-box;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border: 1.5px solid #A67C52;
            box-shadow: 0 0 0 2px #A67C5233;
            background: #fff;
        }
        .modal-actions {
            display: flex;
            gap: 18px;
            justify-content: center;
            margin-top: 8px;
        }
        .btn-cancel, .btn-save {
            padding: 12px 32px;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Poppins', 'Inter', sans-serif;
            box-shadow: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .btn-cancel {
            background: #FAF3E0;
            color: #A67C52;
            border: 1.5px solid #E0C9B2;
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
        .save-btn-wide {
            width: 100%;
            padding: 12px 32px;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Poppins', 'Inter', sans-serif;
            background: #A67C52;
            color: #fff;
            box-shadow: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .save-btn-wide:hover {
            background: #6D4C41;
        }
        @media (max-width: 600px) {
            .modal-content { padding: 14px 0 10px 0; min-width: 0; }
            .modal-header h2 { font-size: 1.08rem; }
            .form-inner { padding: 0 6px; }
            .form-group input,
            .form-group select,
            .form-group textarea {
                font-size: 0.97rem;
                padding: 10px 10px;
            }
            .btn-cancel, .btn-save { padding: 10px 18px; font-size: 0.97rem; }
        }
        .modal-content {
            display: flex;
            flex-direction: column;
            max-width: 600px;
            max-height: 90vh;
            overflow: hidden;
            padding: 40px 0 32px 0;
        }
        .modal-body {
            flex: 1 1 auto;
            overflow-y: auto;
            padding-bottom: 0;
        }
    </style>
</div> 