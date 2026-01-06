# FITUR APLIKASI COFFEE SPACE CAFE
## Dokumentasi Fitur untuk Presentasi PPT

---

## 📋 RINGKASAN APLIKASI
Aplikasi **Coffee Space Cafe** adalah sistem manajemen cafe berbasis web dengan 3 (tiga) role pengguna:
1. **Admin** - Mengelola seluruh sistem
2. **Kasir** - Mengelola pesanan dan pembayaran
3. **Pelanggan** - Melakukan pemesanan dan pembayaran

---

## 🔐 FITUR AUTHENTICATION (AUTENTIKASI)

### 1. Login & Register
- **Halaman Login** dengan autentikasi user
- **Halaman Register** untuk pendaftaran akun baru pelanggan
- **Logout** untuk keluar dari sistem
- Sistem autentikasi berbasis role (Admin, Kasir, Pelanggan)

---

## 👤 FITUR PELANGGAN (CUSTOMER)

### 1. Dashboard Pelanggan
- Tampilan utama setelah login
- Ringkasan informasi pesanan

### 2. Lihat Menu
- Menampilkan daftar menu cafe
- Filter berdasarkan kategori
- Tampilan menu Best Seller
- Informasi detail menu (nama, harga, deskripsi, gambar)

### 3. Keranjang Belanja (Shopping Cart)
- **Tambah Item** ke keranjang
- **Lihat Isi Keranjang**
- **Edit Quantity** (tambah/kurang jumlah)
- **Hapus Item** dari keranjang
- Perhitungan total otomatis

### 4. Checkout & Pembayaran
- **Halaman Checkout** dengan rincian pesanan
- **Metode Pembayaran**:
  - **ATM Transfer** (BCA, Mandiri, BNI, BRI)
  - **QRIS**
  - **GoPay**
  - **Dana**
- **Upload Bukti Pembayaran** (gambar)
- Validasi pembayaran

### 5. Status Pesanan
- Melihat status pesanan real-time
- Status: Unpaid, Paid, Processed, Completed, dll
- Detail pesanan lengkap

### 6. Riwayat Pesanan
- Daftar semua pesanan yang pernah dibuat
- **Filter berdasarkan:**
  - Tanggal (dari - sampai)
  - Status pesanan
- Informasi detail setiap pesanan

### 7. Pengaturan Akun
- **Update Profil** (nama, email, foto, dll)
- **Ubah Password**
- Update informasi akun

---

## 👨‍💼 FITUR ADMIN

### 1. Dashboard Admin
- Tampilan utama admin
- Statistik penjualan
- Grafik dan ringkasan data

### 2. Manajemen Menu
- **Tambah Menu** baru (nama, kategori, harga, deskripsi, gambar)
- **Edit Menu** (update informasi menu)
- **Hapus Menu**
- **Lihat Daftar Menu**
- Set status menu (aktif/tidak aktif)

### 3. Manajemen Pengguna (User Management)
- **Tambah User** baru (Admin, Kasir, Pelanggan)
- **Lihat Daftar User**
- **Edit User** (update informasi)
- **Hapus User**
- **Detail User** (lihat informasi lengkap)
- Set status user (aktif/tidak aktif)

### 4. Promo & Best Seller Management
- **Manajemen Promo:**
  - Tambah promo baru
  - Edit promo
  - Hapus promo
  - Set status promo (aktif/nonaktif)
  - Kode promo
  - Tanggal berakhir promo
- **Manajemen Best Seller:**
  - Set menu sebagai Best Seller
  - Update daftar Best Seller

### 5. Laporan Penjualan (Sales Report)
- Laporan penjualan periode tertentu
- Statistik penjualan
- Grafik penjualan
- Export data (jika tersedia)

### 6. Riwayat Transaksi (Transaction History)
- Daftar semua transaksi
- Filter berdasarkan periode
- Detail transaksi lengkap
- Status pembayaran

### 7. Pengaturan Sistem (Settings)
- Konfigurasi sistem
- Pengaturan umum aplikasi

---

## 💰 FITUR KASIR (CASHIER)

### 1. Dashboard Kasir
- Tampilan utama kasir
- Ringkasan pesanan hari ini
- Statistik cepat

### 2. Pesanan Masuk
- **Lihat Pesanan Masuk** (order baru)
- **Update Status Pesanan** (proses, selesai, dll)
- **Lihat Detail Pesanan** (item-item yang dipesan)
- **Hapus Item Pesanan** (jika diperlukan)
- Real-time update status

### 3. Verifikasi Pembayaran
- **Daftar Pembayaran** yang perlu diverifikasi
- **Lihat Bukti Pembayaran** yang diupload pelanggan
- **Verifikasi Pembayaran** (setujui/tolak)
- Validasi pembayaran sebelum memproses pesanan

### 4. Riwayat Transaksi Kasir
- Daftar semua transaksi yang ditangani
- Filter berdasarkan periode
- Detail transaksi lengkap

### 5. Pengaturan Kasir
- **Update Profil Kasir**
- **Ubah Password**
- Pengaturan akun kasir

---

## 🎨 FITUR TAMBAHAN

### 1. Sistem Role-Based Access
- Setiap role memiliki akses fitur berbeda
- Keamanan berbasis role

### 2. Upload & Manajemen File
- Upload gambar menu
- Upload gambar promo
- Upload bukti pembayaran
- Storage management

### 3. Status Management
- Status pesanan (unpaid, paid, processed, completed)
- Status menu (aktif/nonaktif)
- Status user (aktif/nonaktif)
- Status promo (aktif/nonaktif)

### 4. Filter & Pencarian
- Filter menu berdasarkan kategori
- Filter pesanan berdasarkan tanggal
- Filter pesanan berdasarkan status
- Pencarian data

### 5. Responsive Design
- Desain yang responsif untuk berbagai device
- User-friendly interface

---

## 📊 RINGKASAN FITUR PER ROLE

| Role | Fitur Utama | Jumlah Fitur |
|------|-------------|--------------|
| **Pelanggan** | Lihat Menu, Keranjang, Checkout, Status Pesanan, Riwayat, Pengaturan | 7 fitur utama |
| **Admin** | Manajemen Menu, Manajemen User, Promo, Laporan, Riwayat, Settings | 7 fitur utama |
| **Kasir** | Dashboard, Pesanan Masuk, Verifikasi Pembayaran, Riwayat, Pengaturan | 5 fitur utama |
| **Umum** | Login, Register, Logout | 3 fitur |

**Total: 22+ Fitur Utama**

---

## 💡 POIN PENTING UNTUK PRESENTASI

1. **Sistem Manajemen Lengkap** - Dari pesanan hingga pembayaran
2. **Multi-Role System** - Admin, Kasir, dan Pelanggan
3. **Berbagai Metode Pembayaran** - ATM, QRIS, GoPay, Dana
4. **Real-time Status** - Update status pesanan secara real-time
5. **Manajemen Promo & Best Seller** - Fitur marketing terintegrasi
6. **Laporan & Analitik** - Laporan penjualan untuk admin
7. **User-Friendly** - Interface yang mudah digunakan

---

## 🎯 ALUR KERJA SISTEM

1. **Pelanggan** → Register/Login → Lihat Menu → Tambah ke Keranjang → Checkout → Upload Bukti Bayar
2. **Kasir** → Lihat Pesanan Masuk → Verifikasi Pembayaran → Update Status Pesanan
3. **Admin** → Kelola Menu/User/Promo → Lihat Laporan → Monitor Transaksi

---

**Dokumen ini dibuat untuk keperluan presentasi aplikasi Coffee Space Cafe**

