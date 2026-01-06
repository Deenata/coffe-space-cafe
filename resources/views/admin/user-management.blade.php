<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Coffee Space Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #FAF3E0;
            --white: #FFFFFF;
            --kopi: #A67C52;
            --kopi-dark: #6D4C41;
            --kopi-light: #C4A484;
            --shadow-light: rgba(166, 124, 82, 0.08);
            --shadow-medium: rgba(166, 124, 82, 0.12);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', 'Inter', sans-serif;
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
        .card {
            background: var(--white);
            border-radius: 24px;
            box-shadow: 0 8px 30px var(--shadow-light);
            padding: 32px 28px;
            margin-bottom: 32px;
            border: 1px solid rgba(166, 124, 82, 0.08);
            overflow: hidden;
        }
        .header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            gap: 16px;
            min-height: 60px;
        }
        .header h1 {
            color: var(--kopi);
            font-size: 2rem;
            font-weight: 700;
        }
        .filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
        }
        .filter-bar input[type="text"], .filter-bar select {
            padding: 10px 16px;
            border-radius: 12px;
            border: 1px solid #e7dac6;
            background: var(--white);
            font-size: 1rem;
            font-family: inherit;
            box-shadow: 0 2px 8px var(--shadow-light);
            transition: border 0.2s;
        }
        .filter-bar input[type="text"]:focus, .filter-bar select:focus {
            border: 1.5px solid var(--kopi);
            outline: none;
        }
        .add-btn {
            background: linear-gradient(135deg, var(--kopi) 0%, var(--kopi-light) 100%);
            color: var(--white);
            border: none;
            border-radius: 16px;
            padding: 14px 36px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 16px var(--shadow-light);
            transition: background 0.2s, transform 0.2s;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .add-btn:hover {
            background: linear-gradient(135deg, var(--kopi-dark) 0%, var(--kopi) 100%);
            transform: translateY(-2px) scale(1.03);
        }
        .user-table-wrapper {
            overflow-x: auto;
            border-radius: 20px;
            box-shadow: 0 4px 16px var(--shadow-light);
            background: var(--white);
            margin-top: 16px;
        }
        .user-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 700px;
        }
        .user-table th, .user-table td {
            padding: 18px 14px;
            background: transparent;
            text-align: left;
            vertical-align: middle;
        }
        .user-table th {
            color: var(--kopi);
            font-size: 1rem;
            font-weight: 700;
            background: var(--cream);
            position: sticky;
            top: 0;
            z-index: 2;
        }
        .user-table tbody tr:nth-child(even) {
            background: #f7f1e3;
        }
        .user-table tbody tr:nth-child(odd) {
            background: var(--white);
        }
        .user-table tbody tr:hover {
            background: #f3e3d0;
            transition: background 0.2s;
        }
        .user-table td {
            color: var(--kopi-dark);
            font-size: 1rem;
            font-weight: 500;
            border-radius: 12px;
        }
        
        .user-table th:first-child,
        .user-table td:first-child {
            min-width: 120px;
            max-width: 200px;
            word-wrap: break-word;
        }
        .status {
            display: inline-block;
            padding: 7px 20px;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
        }
        .status.aktif {
            background: #e7dac6;
            color: var(--kopi-dark);
        }
        .status.nonaktif {
            background: #f7cfcf;
            color: #b71c1c;
        }
        .aksi-col {
            text-align: center !important;
        }
        .user-table td.aksi-col {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            background: transparent;
            border-radius: 12px;
        }
        .action-btn {
            background: linear-gradient(135deg, var(--cream) 0%, #f7f1e3 100%);
            color: var(--kopi-dark);
            border: none;
            border-radius: 10px;
            padding: 10px 22px;
            font-size: 0.98rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, transform 0.2s;
            box-shadow: 0 2px 8px var(--shadow-light);
            display: flex;
            align-items: center;
            gap: 7px;
        }
        .action-btn.edit {
            color: var(--kopi);
        }
        .action-btn.edit:hover {
            background: linear-gradient(135deg, var(--kopi) 0%, var(--kopi-light) 100%);
            color: var(--white);
            transform: translateY(-2px) scale(1.04);
        }
        .action-btn.detail {
            color: var(--kopi-dark);
        }
        .action-btn.detail:hover {
            background: #e7dac6;
            color: var(--kopi-dark);
            transform: translateY(-2px) scale(1.04);
        }
        .action-btn.delete {
            color: #b71c1c;
        }
        .action-btn.delete:hover {
            background: #f7cfcf;
            color: #b71c1c;
            transform: translateY(-2px) scale(1.04);
        }
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-weight: 600;
            transition: opacity 0.4s;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        @media (max-width: 700px) {
            .header h1 { font-size: 1.2rem; }
            .add-btn { padding: 10px 18px; font-size: 0.95rem; }
            .user-table th, .user-table td { padding: 10px 6px; font-size: 0.95rem; }
            .card { padding: 12px 4px; }
        }
        @media (max-width: 500px) {
            .container { padding: 8px 0; }
            .header { flex-direction: column; gap: 12px; align-items: flex-start; }
            .user-table th, .user-table td { font-size: 0.9rem; }
            .filter-bar { flex-direction: column; gap: 10px; }
        }
    </style>
</head>
<body>
<div class="container">
    @include('admin.partials.sidebar')
    <main class="main">
        <div class="card">
            <div class="header">
                <h1>Manajemen User</h1>
                <button class="add-btn" type="button" onclick="showModalTambahUser()">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Tambah User
                </button>
            </div>
            <div class="filter-bar">
                <input type="text" placeholder="Cari nama/email..." style="min-width:180px;">
                <select>
                    <option value="">Semua Peran</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    <option value="pelanggan">Pelanggan</option>
                </select>
                <select>
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            <div class="user-table-wrapper">
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="aksi-col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role ?? '-' }}</td>
                            <td><span class="status {{ $user->status == 'aktif' ? 'aktif' : 'nonaktif' }}">{{ ucfirst($user->status ?? 'aktif') }}</span></td>
                            <td class="aksi-col">
                                <button class="action-btn edit" onclick="showModalEditUser({{ $user->id }})">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19.5 3 21l1.5-4L16.5 3.5z"/></svg>
                                    Edit
                                </button>
                                <button class="action-btn detail" onclick="showModalDetailUser({{ $user->id }})">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="8"/></svg>
                                    Detail
                                </button>
                                <button class="action-btn delete" onclick="showModalHapusUser({{ $user->id }})">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('components.modal-tambah-user')
        @include('components.modal-edit-user')
        @include('components.modal-hapus-user')
        <div id="modalDetailUser" style="display:none; position:fixed; z-index:999; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.15); align-items:center; justify-content:center;">
            <div style="background:#fff; border-radius:20px; padding:32px; min-width:320px; max-width:90vw; box-shadow:0 4px 32px rgba(166,124,82,0.15); position:relative;">
                <button onclick="hideModalDetailUser()" style="position:absolute; top:16px; right:16px; background:none; border:none; font-size:1.5rem; color:#A67C52; cursor:pointer;">&times;</button>
                <h2 style="color:#A67C52; margin-bottom:24px;">Detail User</h2>
                <div id="userDetailContent">
                    <!-- Konten detail user akan diisi oleh JS -->
                </div>
            </div>
        </div>
    </main>
</div>
<script>
function showModalTambahUser() {
    document.getElementById('modalTambahUser').style.display = 'flex';
}
function hideModalTambahUser() {
    document.getElementById('modalTambahUser').style.display = 'none';
}
function showModalEditUser(id) {
    const user = users.find(u => u.id === id);
    if (!user) return;
    document.getElementById('modalEditUser').style.display = 'flex';
    document.getElementById('edit-nama-user').value = user.name;
    document.getElementById('edit-email-user').value = user.email;
    document.getElementById('edit-role-user').value = user.role;
    document.getElementById('edit-status-user').value = user.status;
    document.getElementById('editUserForm').action = '/user-management/' + user.id;
}
function hideModalEditUser() {
    document.getElementById('modalEditUser').style.display = 'none';
}
function showModalHapusUser(id) {
    document.getElementById('hapusUserForm').action = '/user-management/' + id;
    document.getElementById('modalHapusUser').style.display = 'flex';
}
function hideModalHapusUser() {
    document.getElementById('modalHapusUser').style.display = 'none';
}
const users = @json($users);
function showModalDetailUser(id) {
    fetch('/user-management/' + id)
        .then(response => response.json())
        .then(user => {
            document.getElementById('userDetailContent').innerHTML = `
                <div style="margin-bottom:12px;"><strong>Nama:</strong> ${user.name}</div>
                <div style="margin-bottom:12px;"><strong>Email:</strong> ${user.email}</div>
                <div style="margin-bottom:12px;"><strong>Role:</strong> ${user.role}</div>
                <div style="margin-bottom:12px;"><strong>Status:</strong> ${user.status.charAt(0).toUpperCase() + user.status.slice(1)}</div>
            `;
            document.getElementById('modalDetailUser').style.display = 'flex';
        });
}
function hideModalDetailUser() {
    document.getElementById('modalDetailUser').style.display = 'none';
}
document.addEventListener('click', function(e) {
    var modalTambahUser = document.getElementById('modalTambahUser');
    if (modalTambahUser && e.target === modalTambahUser) {
        hideModalTambahUser();
    }
    var modalEditUser = document.getElementById('modalEditUser');
    if (modalEditUser && e.target === modalEditUser) {
        hideModalEditUser();
    }
    var modalHapusUser = document.getElementById('modalHapusUser');
    if (modalHapusUser && e.target === modalHapusUser) {
        hideModalHapusUser();
    }
    var modalDetail = document.getElementById('modalDetailUser');
    if (modalDetail && e.target === modalDetail) {
        hideModalDetailUser();
    }
});
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.transition = 'opacity 0.4s';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 400);
        });
    }, 1000);
});
</script>
</body>
</html> 