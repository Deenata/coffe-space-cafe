# Flowchart: Promo & Best Seller

```mermaid
flowchart TD
  A[Mulai] --> B[Admin buka halaman Promo & Best Seller<br/>GET route: promo_best_seller.index]
  B --> C{Aksi?}
  C -->|Tambah Promo| D[Form Tambah Promo<br/>isi: judul, deskripsi, gambar?, status, kode, tanggal berakhir]
  C -->|Edit Promo| E[Form Edit Promo (per promo)]
  C -->|Hapus Promo| H[Konfirmasi Hapus Promo]

  D --> F[Submit Tambah<br/>POST promo_best_seller.promo.store]
  E --> G[Submit Edit<br/>PUT promo_best_seller.promo.update]
  H --> I[Submit Hapus<br/>DELETE promo_best_seller.promo.delete]

  F --> J{Validasi OK?}
  G --> K{Validasi OK?}

  J -->|Tidak| D
  J -->|Ya| L[Jika ada gambar → simpan ke storage/public/promo]
  L --> M[Create Promo di DB]
  M --> N[Redirect Back + flash success]

  K -->|Tidak| E
  K -->|Ya| O[Jika ada gambar → replace file]
  O --> P[Update Promo di DB]
  P --> N

  I --> Q[Delete Promo di DB]
  Q --> N

  N --> R[Pengguna melihat daftar Promo terbarui]
  R --> S[Landing Page menampilkan Promo aktif]
  S --> T[Dashboard Pelanggan menampilkan Promo aktif & belum kedaluwarsa]
  T --> U[Selesai]
```

```mermaid
flowchart TD
  A[Mulai] --> B[Admin buka halaman Promo & Best Seller<br/>GET route: promo_best_seller.index]
  B --> C[Checklist Menu Best Seller]
  C --> D[Submit Simpan Best Seller<br/>POST promo_best_seller.best_seller.update]
  D --> E[Ambil daftar ID terpilih: best_seller[]]
  E --> F[Set semua Menu.is_best_seller = false]
  F --> G[Set is_best_seller = true untuk ID terpilih]
  G --> H[Redirect Back + flash success]
  H --> I[Landing Page menampilkan Menu dengan is_best_seller = true]
  I --> J[Section “Menu Baru” exclude best seller, status tersedia, 4 terbaru]
  J --> K[Selesai]
``` 