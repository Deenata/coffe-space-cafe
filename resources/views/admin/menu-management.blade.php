<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Menu - Coffe Space Cafe</title>
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
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }
        .header h1 {
            color: var(--kopi);
            font-size: 2rem;
            font-weight: 700;
        }
        .add-btn {
            background: var(--kopi);
            color: var(--white);
            border: none;
            border-radius: 16px;
            padding: 12px 32px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            transition: background 0.2s;
        }
        .add-btn:hover {
            background: var(--kopi-dark);
        }
        .menu-tabs {
            display: flex;
            gap: 12px;
            margin-bottom: 18px;
            justify-content: center;
        }
        .menu-tab {
            padding: 10px 32px;
            border-radius: 16px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            background: #FAF3E0;
            color: #A67C52;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .menu-tab.active {
            background: #A67C52;
            color: #fff;
        }
        .menu-tab:hover:not(.active) {
            background: #e7dac6;
        }
        .menu-card-list {
            display: flex;
            flex-direction: column;
            gap: 24px;
            width: 100%;
        }
        .menu-card-horizontal {
            width: 100%;
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(166,124,82,0.10);
            overflow: hidden;
            display: flex;
            position: relative;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .menu-card-horizontal:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(166,124,82,0.15);
        }
        .menu-card-img-hz {
            width: 120px;
            height: 120px;
            object-fit: cover;
            flex-shrink: 0;
        }
        .menu-card-img-hz.noimg {
            background: var(--cream);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--kopi);
            font-weight: 600;
            font-size: 0.9rem;
        }
        .menu-card-content-hz {
            flex: 1;
            padding: 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .menu-card-header-hz {
            position: absolute;
            top: 12px;
            right: 12px;
        }
        .menu-card-status-badge-hz {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .menu-card-status-badge-hz.tersedia {
            background: #e7dac6;
            color: var(--kopi-dark);
        }
        .menu-card-status-badge-hz.habis {
            background: #f7cfcf;
            color: #b71c1c;
        }
        .menu-card-title-hz {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--kopi-dark);
            margin-bottom: 4px;
        }
        .menu-card-label-hz {
            font-size: 0.8rem;
            color: var(--kopi);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            display: block;
        }
        .menu-card-price-hz {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--kopi);
            margin-bottom: 8px;
        }
        .menu-card-desc-hz {
            font-size: 0.9rem;
            color: var(--kopi-dark);
            opacity: 0.8;
            margin-bottom: 16px;
            line-height: 1.4;
        }
        .menu-card-actions-hz {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .menu-card-actions-hz button {
            background: #A67C52;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 8px 18px;
            font-size: 0.97rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 2px 8px rgba(166,124,82,0.10);
            cursor: pointer;
            transition: background 0.18s, box-shadow 0.18s;
            outline: none;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .menu-card-actions-hz button.detail {
            background: #fff;
            color: #A67C52;
            border: 1.5px solid #A67C52;
        }
        .menu-card-actions-hz button.delete {
            background: #e57373;
            color: #fff;
        }
        .menu-card-actions-hz button.delete:hover {
            background: #b71c1c;
        }
        .menu-card-actions-hz button:hover {
            background: #6D4C41;
            color: #fff;
            box-shadow: 0 4px 16px rgba(166,124,82,0.13);
        }
        .menu-card-actions-hz button.detail:hover {
            background: #A67C52;
            color: #fff;
        }
        .error-list {
            margin: 0;
            padding-left: 20px;
        }
        @media (max-width: 700px) {
            .menu-card-horizontal {
                flex-direction: column;
                max-width: 98vw;
                align-items: stretch;
            }
            .menu-card-img-hz, .menu-card-img-hz.noimg {
                width: 100%;
                height: 140px;
                border-radius: 16px 16px 0 0;
                margin: 0;
            }
            .menu-card-content-hz {
                padding: 14px 10px 10px 10px;
            }
            .menu-card-header-hz {
                top: 8px;
                right: 8px;
            }
            .menu-card-status-badge-hz {
                padding: 3px 10px;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    @include('admin.partials.sidebar')
    <main class="main">
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
        @if($errors->any())
            <div class="alert alert-error">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="header">
            <h1>Manajemen Menu</h1>
            <button class="add-btn" type="button" onclick="showModalTambahMenu()">Tambah Menu</button>
        </div>
        <div class="menu-tabs">
            <button type="button" class="menu-tab active" onclick="filterMenu('makanan')">Makanan</button>
            <button type="button" class="menu-tab" onclick="filterMenu('minuman')">Minuman</button>
        </div>
        <div class="menu-card-list">
            @foreach($menus as $menu)
                <div class="menu-card-horizontal" data-menu-id="{{ $menu->id }}" data-menu-nama="{{ $menu->nama }}" data-menu-kategori="{{ $menu->kategori }}" data-menu-harga="{{ $menu->harga }}" data-menu-deskripsi="{{ $menu->deskripsi }}" data-menu-status="{{ $menu->status }}" data-menu-gambar="{{ $menu->gambar }}">
                    @if($menu->gambar)
                        <img src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" class="menu-card-img-hz" />
                    @else
                        <div class="menu-card-img-hz noimg">No Image</div>
                    @endif
                    <div class="menu-card-content-hz">
                        <div class="menu-card-header-hz">
                            <div class="menu-card-status-badge-hz {{ $menu->status }}">
                                {{ ucfirst($menu->status) }}
                            </div>
                        </div>
                        <div>
                            <div class="menu-card-title-hz">{{ $menu->nama }}</div>
                            <span class="menu-card-label-hz">{{ ucfirst($menu->kategori) }}</span>
                            <div class="menu-card-price-hz">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                            <div class="menu-card-desc-hz">{{ $menu->deskripsi }}</div>
                        </div>
                        <div class="menu-card-actions-hz">
                            <button type="button" onclick="handleEditMenu({{ $menu->id }})"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 1 1 2.828 2.828L11.828 15.828a2 2 0 0 1-2.828 0L9 13z"/><path d="M16 7l-1.5-1.5"/></svg> Edit</button>
                            <button type="button" class="delete" onclick="handleDeleteMenu({{ $menu->id }})">Hapus</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</div>
@include('components.modal-tambah-menu')
@include('components.modal-edit-menu')
@include('components.modal-hapus-menu')
<script>
function showModalTambahMenu() {
    document.getElementById('modalTambahMenu').style.display = 'flex';
}
function hideModalTambahMenu() {
    document.getElementById('modalTambahMenu').style.display = 'none';
}
function handleEditMenu(menuId) {
    const menuCard = document.querySelector(`[data-menu-id="${menuId}"]`);
    if (menuCard) {
        const menu = {
            id: menuId,
            nama: menuCard.dataset.menuNama,
            kategori: menuCard.dataset.menuKategori,
            harga: menuCard.dataset.menuHarga,
            deskripsi: menuCard.dataset.menuDeskripsi,
            status: menuCard.dataset.menuStatus
        };
        showModalEditMenu(menu);
    }
}
function showModalEditMenu(menu) {
    document.getElementById('modalEditMenu').style.display = 'flex';
    document.getElementById('edit-id-menu').value = menu.id;
    document.getElementById('edit-nama').value = menu.nama;
    document.getElementById('edit-kategori').value = menu.kategori;
    document.getElementById('edit-harga').value = menu.harga;
    document.getElementById('edit-deskripsi').value = menu.deskripsi || '';
    document.getElementById('edit-status').value = menu.status || 'tersedia';
    document.getElementById('editMenuForm').action = '/menu-management/' + menu.id;
}
function hideModalEditMenu() {
    document.getElementById('modalEditMenu').style.display = 'none';
}
function handleDeleteMenu(menuId) {
    var menuCard = document.querySelector(`[data-menu-id='${menuId}']`);
    var menuNama = menuCard ? menuCard.dataset.menuNama : '';
    showModalHapusMenu(menuId, menuNama);
}
function showModalHapusMenu(menuId, menuNama) {
    var form = document.getElementById('formHapusMenu');
    form.action = '/menu-management/' + menuId;
    document.getElementById('hapusMenuNama').textContent = menuNama;
    document.getElementById('modalHapusMenu').style.display = 'flex';
}
function hideModalHapusMenu() {
    document.getElementById('modalHapusMenu').style.display = 'none';
}
function showModalDetailMenu(menuId) {
    document.getElementById('modalDetailMenu').style.display = 'flex';
}
function hideModalDetailMenu() {
    document.getElementById('modalDetailMenu').style.display = 'none';
}
document.addEventListener('click', function(e) {
    var modalTambah = document.getElementById('modalTambahMenu');
    if (modalTambah && e.target === modalTambah) {
        hideModalTambahMenu();
    }
    var modalEdit = document.getElementById('modalEditMenu');
    if (modalEdit && e.target === modalEdit) {
        hideModalEditMenu();
    }
    var modalHapus = document.getElementById('modalHapusMenu');
    if (modalHapus && e.target === modalHapus) {
        hideModalHapusMenu();
    }
    var modalDetail = document.getElementById('modalDetailMenu');
    if (modalDetail && e.target === modalDetail) {
        hideModalDetailMenu();
    }
});
function filterMenu(kategori) {
    document.querySelectorAll('.menu-tab').forEach(tab => {
        tab.classList.toggle('active', tab.textContent.toLowerCase() === kategori);
    });
    document.querySelectorAll('.menu-card-horizontal').forEach(card => {
        card.style.display = (card.dataset.menuKategori === kategori) ? '' : 'none';
    });
}
document.addEventListener('DOMContentLoaded', function() {
    filterMenu('makanan');
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