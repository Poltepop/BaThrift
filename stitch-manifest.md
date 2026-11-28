# Stitch Screen Manifest - BaThrift

> **Project ID Stitch**: `6546986283096142054`  
> **Total Screen di Stitch**: 30  
> **Total Halaman yang Dikerjakan**: 29 (auth: 2, pembeli: 9, penjual: 8, admin: 10)  
> **Diabaikan**: 1 (Masuk Admin)  
> **Status**: Perencanaan Front End (Tanpa konversi kode/logika backend)

---

## Tabel Pemetaan Screen Stitch ke Halaman Target

| ID screen | Nama di Stitch | Halaman target | Kategori | Path tujuan | Status | Catatan |
|---|---|---|---|---|---|---|
| `7aefdb05d9524004a6162eda8db0015f` | Masuk - BaThrift | Login | auth | `app/view/auth/login.php` | pakai | Satu form login untuk semua peran (pembeli, penjual, admin). Pengalihan sesuai peran ditangani backend |
| `e9a2c714a6bc49ab8ccd070690c408c4` | Daftar - BaThrift | Register | auth | `app/view/auth/register.php` | pakai | Form registrasi akun baru |
| `11ba748041bf49858de227d27b5f6ab8` | Masuk Admin - BaThrift | - | auth | - | abaikan | Tidak dipakai. Admin login lewat halaman Login umum, lalu diarahkan ke dashboard admin oleh backend |
| `173c232d64974d64a14f05034b663277` | Katalog Belanja - BaThrift | Katalog Belanja | pembeli | `app/view/pembeli/katalog-belanja.php` | pakai | Halaman utama eksplorasi produk |
| `b524e60e87cb4a58b7b7650c586279b2` | Detail Barang - BaThrift | Detail Barang | pembeli | `app/view/pembeli/detail-barang.php` | pakai | Halaman rincian barang |
| `2ca37ac9a64f458ebf54d664f035e743` | Detail Barang (Laporkan Barang) - BaThrift | Laporan Barang (form dari Detail Barang) | pembeli | `app/view/pembeli/laporan-barang.php` | pakai | Modal/form pelaporan barang bermasalah |
| `7828bfd6c3f34d0f9db4d20498c246b7` | Keranjang Belanja - BaThrift | Keranjang Belanja | pembeli | `app/view/pembeli/keranjang-belanja.php` | pakai | Daftar barang dalam keranjang |
| `a4f5babcd1964653967314fca7740a36` | Checkout - BaThrift | Checkout | pembeli | `app/view/pembeli/checkout.php` | pakai | Alur pembayaran dan pemilihan pengiriman |
| `13a5b7a5fa58490b8581cbf4a518436c` | Riwayat Pembelian - BaThrift | Riwayat Pembelian | pembeli | `app/view/pembeli/riwayat-pembelian.php` | pakai | Daftar transaksi pembeli terdahulu |
| `bbe8b5c9532e4bdebab25f440fba8173` | Detail Pesanan - BaThrift | Detail Pesanan | pembeli | `app/view/pembeli/detail-pesanan.php` | pakai | Rincian status pengiriman dan invoice pesanan pembeli |
| `1831ee573f2d4d71a5a3880c08e1c150` | Profil Saya - BaThrift | Profil Saya | pembeli | `app/view/pembeli/profil-saya.php` | pakai | Halaman biodata dan pengaturan akun |
| `1b5407e070e6472188613ab9a4516841` | Daftar Alamat Pengiriman - BaThrift | Daftar Alamat | pembeli | `app/view/pembeli/daftar-alamat.php` | pakai | Manajemen alamat pengiriman pembeli |
| `b424f19026e14c29aa2f8aa13f1c2e90` | Buka Toko - BaThrift | Buka Toko | penjual | `app/view/penjual/buka-toko.php` | pakai | Form aktivasi pendaftaran toko penjual |
| `c1b4d24ef3c64f0796b90cca2b0786f5` | Profil Toko Penjual - BaThrift | Profil Toko | penjual | `app/view/penjual/profil-toko.php` | pakai | Tampilan etalase dan informasi publik toko |
| `63314841226843d4a573142b0ae9889f` | Dashboard Toko - BaThrift | Dashboard Toko | penjual | `app/view/penjual/dashboard-toko.php` | pakai | Ringkasan performa dan navigasi penjual |
| `80dc9d26d41d46059a80fcd9d8c687d3` | Form Barang - BaThrift | Form Update/Delete Barang | penjual | `app/view/penjual/form-update-delete-barang.php` | pakai | Form input/edit/hapus produk toko |
| `f55b9ecd07324755917556299714c806` | Barang Saya - BaThrift | Barang Saya | penjual | `app/view/penjual/barang-saya.php` | pakai | Daftar inventaris barang milik penjual |
| `b14ca9181d0345ee98eef29ce977aac3` | Pesanan Masuk - BaThrift | Pesanan Masuk | penjual | `app/view/penjual/pesanan-masuk.php` | pakai | Daftar pesanan yang masuk ke toko |
| `5f6d158288704aa1acf8738308bf4d9e` | Detail Pesanan Masuk - BaThrift | Detail Pesanan Masuk | penjual | `app/view/penjual/detail-pesanan-masuk.php` | pakai | Rincian pesanan masuk dan update resi pengiriman |
| `a7d5794f54b942598bc2c7f1acd1cd1c` | Daftar Pembeli - BaThrift | Daftar Pembeli | penjual | `app/view/penjual/daftar-pembeli.php` | pakai | Daftar pelanggan toko |
| `621d9d54184e494a91cecf0ded22374a` | Dashboard Platform - Admin BaThrift | Dashboard | admin | `app/view/admin/dashboard.php` | pakai | Dashboard statistik platform admin. Tujuan redirect setelah admin login |
| `5c81810c16b34a5591326e71e0631807` | Kelola Kategori - Admin BaThrift | Kelola Kategori | admin | `app/view/admin/kelola-kategori.php` | pakai | CRUD kategori produk |
| `b8c41e8ee7d0482a8ce5594b8247791f` | Kelola Pengguna - Admin BaThrift | Kelola Pengguna | admin | `app/view/admin/kelola-pengguna.php` | pakai | Manajemen akun pengguna dan status blokir |
| `a6e778d5692247e4a3c0991d9e36712b` | Detail Pengguna - Admin BaThrift | Detail Pengguna | admin | `app/view/admin/detail-pengguna.php` | pakai | Detail profil individual pengguna di sisi admin |
| `c42ab7bebca24dc3b3604fa2873a5a39` | Moderasi Barang - Admin BaThrift | Moderasi Barang | admin | `app/view/admin/moderasi-barang.php` | pakai | Persetujuan/penolakan produk penjual |
| `78e1b0d3066d4eff80d5d4e2f790bebc` | Laporan Barang - Admin BaThrift | Laporan Barang | admin | `app/view/admin/laporan-barang.php` | pakai | Daftar laporan pelanggaran barang dari pembeli |
| `b8c88ef8e63e4749996ccb51a8640623` | Tinjau Laporan - Admin BaThrift | Tinjau Laporan | admin | `app/view/admin/tinjau-laporan.php` | pakai | Aksi investigasi dan tindak lanjut laporan |
| `bc734c1bac4e4c31b4042c649568602b` | Pantau Pesanan - Admin BaThrift | Pantau Pesanan | admin | `app/view/admin/pantau-pesanan.php` | pakai | Pemantauan transaksi seluruh platform |
| `a76d9078b8a443bab5eda586973e432c` | Detail Pesanan - Admin BaThrift | Pantau Pesanan (detail) | admin | `app/view/admin/pantau-pesanan-detail.php` | pakai | Rincian transaksi di sisi admin |
| `97529f2c17354d1387ffe69c36fcb0e7` | Log Aktivitas Admin - BaThrift | Log Aktivitas Admin | admin | `app/view/admin/log-aktivitas-admin.php` | pakai | Audit trail riwayat tindakan admin |

---

## (a) Halaman Target yang Belum Memiliki Screen

*Tidak ada.* Seluruh 29 halaman terpetakan ke screen di Stitch.

---

## (b) Screen Stitch yang Tidak Dikerjakan

1. **`11ba748041bf49858de227d27b5f6ab8`** - `Masuk Admin - BaThrift`  
   *Keterangan*: Sengaja diabaikan. Tidak ada halaman login admin terpisah. Admin login lewat halaman Login umum, lalu backend mengalihkan ke `app/view/admin/dashboard.php`.

---

## Ringkasan per Kategori

| Kategori | Jumlah halaman |
|---|---|
| auth | 2 |
| pembeli | 9 |
| penjual | 8 |
| admin | 10 |
| **Total dikerjakan** | **29** |
| Diabaikan | 1 |
| **Total screen di Stitch** | **30** |


