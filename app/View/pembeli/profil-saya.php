<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

// Memuat fungsi url() dari Core Router jika belum tersedia
if (!function_exists('url')) {
    require_once __DIR__ . '/../../Core/Router.php';
}

// Memuat Komponen Reusable
require_once __DIR__ . '/../components/input.php';

// DATA: Variabel kontrol halaman & navigasi
$page_title = 'Profil Saya & Pengaturan Akun - BaThrift';
$active_nav = 'akun';
$cart_count = 3;

// DATA: Informasi Pengguna (Profil Pembeli)
$user = [
    'id' => 7,
    'nama_lengkap' => 'Dimas Ramadhan',
    'username' => 'dimas_vintage',
    'email' => 'dimas.ramadhan@email.com',
    'no_whatsapp' => '+62 812-3456-7890',
    'tanggal_lahir' => '1998-08-17',
    'initials' => 'DR',
    'avatar_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAgXU-2WRUfQVn6nCC9X6ezrDTAi5Ilk6cJ9K9_nEMCIUhKy9psMnSVAHcV8Uv-Us1xStqeBDsFUqvcyNouoUfxotX_-jiWt1MrrsloOhZ5hiTeVqTZDtfkvooP4iYFwEPxAs7Rqrh-sIc1qYB6Bk_fGviS2MLQDXTDyy_0eOlFSWuGo9NhB2_Z8UWucjnq_VPUdfc4sNPu5GwujCv-1Wg_A0ESClWvuO6VZQAdOkU',
    'member_since' => '2023',
    'tier' => 'POWER THRIFTER • TIER GOLD',
    'tier_desc' => 'Fee rekber hemat 1% untuk semua transaksi',
    'bio' => 'Hunting vintage garments sejak 2018. Kolektor Carhartt Detroit J97 & 90s band tees fade natural. Let’s talk vintage!',
    'rekber_balance' => 1450000,
    'rekber_balance_formatted' => 'Rp 1.450.000',
    'kyc_status' => 'REKBER AKTIF • KYC APPROVED'
];

// DATA: Informasi Toko / Penjual Pengguna
$toko = [
    'id' => 12,
    'nama_toko' => 'ARCHIVEJAKARTA',
    'slug' => 'archivejakarta',
    'status' => 'AKTIF (SELLER LEVEL 2)',
    'deskripsi' => 'Spesialis kurasi outerwear vintage, Carhartt workwear era 90-an, Stüssy archive, & Japanese denim. Semua barang 100% original thrift luar negeri, sudah deep-cleaned & steamed steril. Nego tipis via chat dipersilakan!',
    'kota_pengiriman' => 'Kebayoran Baru, Jakarta Selatan (DKI Jakarta)',
    'stats' => [
        ['label' => 'Barang Terjual', 'value' => '148', 'icon' => ''],
        ['label' => 'Rating Ulasan', 'value' => '4.9', 'icon' => 'star'],
        ['label' => 'Kecepatan Respon', 'value' => '&lt; 15 Menit', 'icon' => ''],
        ['label' => 'Produk Aktif', 'value' => '24 Drop', 'icon' => '']
    ]
];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" xml:lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($model['title'] ?? '') ?></title>

    <!-- Google Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&amp;family=Space+Grotesk:wght@500;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <!-- Pure Native Stylesheets (Neo-Brutalisme BaThrift) -->
    <link rel="stylesheet" href="<?= url('/assets/css/katalog.css') ?>" />
    <link rel="stylesheet" href="<?= url('/assets/css/profil.css') ?>" />
</head>
<body>
    <!-- Komponen Header BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/header.php'; ?>

    <!-- Konten Utama Profil Saya -->
    <main class="profil-main">
        <div class="profil-wrapper">
            <!-- Top Breadcrumb & Page Header -->
            <div class="profil-header-section">
                <div class="profil-breadcrumbs">
                    <span class="badge-breadcrumb">
                        <span class="material-symbols-outlined">manage_accounts</span>
                        <span>#AKUN-SAYA &#8226; PENGATURAN PROFIL</span>
                    </span>
                    <span class="breadcrumb-trail">/ SETELAN IDENTITAS &amp; TOKO</span>
                </div>

                <div class="profil-title-row">
                    <div>
                        <h1 class="profil-title">PROFIL &amp; PENGATURAN AKUN</h1>
                        <p class="profil-subtitle">
                            Kelola data pribadi, informasi kontak autentik, dan identitas etalase tokomu di ekosistem terpercaya BaThrift.
                        </p>
                    </div>
                    <div class="badge-kyc-status">
                        <span class="kyc-pulse-dot"></span>
                        <span class="kyc-text"><?= htmlspecialchars($user['kyc_status'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                    </div>
                </div>
            </div>

            <!-- Main Layout: Sidebar Kiri + Konten Kanan -->
            <div class="profil-content-grid">
                <!-- LEFT SIDEBAR -->
                <aside class="profil-sidebar">
                    <!-- Profile Mini Passport Card -->
                    <!-- DATA: user -->
                    <div class="passport-card">
                        <div class="passport-verified-ribbon">VERIFIED</div>
                        <div class="passport-user-row">
                            <div class="passport-avatar-box">
                                <div class="passport-avatar-initials">
                                    <span><?= htmlspecialchars($user['initials'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                                <span class="passport-pro-tag">PRO</span>
                            </div>
                            <div class="passport-user-info">
                                <h2 class="passport-user-name"><?= htmlspecialchars($user['nama_lengkap'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></h2>
                                <p class="passport-user-handle">@<?= htmlspecialchars($user['username'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></p>
                                <span class="passport-since-tag">MEMBER SEJAK <?= htmlspecialchars($user['member_since'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                            </div>
                        </div>

                        <!-- Dompet Rekber Box -->
                        <div class="rekber-wallet-box">
                            <div class="rekber-wallet-header">
                                <span>Saldo Dompet Rekber</span>
                                <span class="material-symbols-outlined">lock</span>
                            </div>
                            <div class="rekber-wallet-balance-row">
                                <span class="rekber-balance-amount"><?= htmlspecialchars($user['rekber_balance_formatted'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                <span class="rekber-status-badge">Tersedia</span>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="sidebar-menu-nav" aria-label="Menu Akun">
                        <!-- Menu 1: Profil Saya (Aktif) -->
                        <a class="sidebar-menu-item menu-active" href="<?= url('/profil') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">person</span>
                                <span>Profil Saya</span>
                            </div>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>

                        <!-- Menu 2: Daftar Alamat -->
                        <a class="sidebar-menu-item" href="<?= url('/daftar-alamat') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">location_on</span>
                                <span>Daftar Alamat</span>
                            </div>
                            <span class="menu-badge-pill menu-badge-pink">2 ALAMAT</span>
                        </a>

                        <!-- Menu 3: Dashboard Toko (Toko Saya) -->
                        <a class="sidebar-menu-item" href="<?= url('/dashboard-toko') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">storefront</span>
                                <span>Dashboard Toko</span>
                            </div>
                            <span class="menu-badge-pill menu-badge-green">SELLER MODE</span>
                        </a>

                        <!-- Menu 4: Pesanan Saya -->
                        <a class="sidebar-menu-item" href="<?= url('/pesanan') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">receipt_long</span>
                                <span>Pesanan Saya</span>
                            </div>
                            <span class="menu-badge-pill menu-badge-blue">3 OTW</span>
                        </a>

                        <!-- Menu 5: Wishlist -->
                        <a class="sidebar-menu-item" href="<?= url('/wishlist') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">favorite</span>
                                <span>Favorit / Wishlist</span>
                            </div>
                            <span class="menu-badge-pill">14</span>
                        </a>

                        <!-- Menu 6: Keamanan -->
                        <a class="sidebar-menu-item" href="<?= url('/keamanan') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">security</span>
                                <span>Keamanan &amp; Sandi</span>
                            </div>
                            <span class="material-symbols-outlined text-[#4ECCA3]">verified</span>
                        </a>

                        <!-- Tombol Keluar Akun -->
                        <button type="button" class="btn-sidebar-logout" id="btn-sidebar-logout">
                            <span class="material-symbols-outlined">logout</span>
                            <span>KELUAR DARI AKUN</span>
                        </button>
                    </nav>

                    <!-- Quick Help Note -->
                    <div class="sidebar-help-box">
                        <div class="sidebar-help-title">
                            <span class="material-symbols-outlined">info</span>
                            <span>Bantuan Support Lapak</span>
                        </div>
                        <p class="sidebar-help-desc">
                            Ada kendala verifikasi data KTP atau no. rekening? Hubungi tim Rekber BaThrift 24/7.
                        </p>
                    </div>
                </aside>

                <!-- MAIN FORM COLUMN -->
                <main class="profil-main-col">
                    <form id="profile-form" action="" method="post">
                        <!-- SECTION 1: DATA PROFIL -->
                        <section class="content-card-box">
                            <div class="card-header-bar">
                                <div class="card-header-left">
                                    <span class="card-section-number">01. DATA PROFIL</span>
                                    <span class="card-section-sub">IDENTITAS PENGGUNA</span>
                                </div>
                                <div class="card-header-badge">
                                    <span class="material-symbols-outlined">verified_user</span>
                                    <span>TERVERIFIKASI KTP &amp; WA</span>
                                </div>
                            </div>

                            <!-- Avatar Upload Row -->
                            <div class="avatar-upload-row">
                                <div class="avatar-preview-container">
                                    <div class="avatar-preview-box">
                                        <img id="avatar-preview-img" class="avatar-preview-img" src="<?= htmlspecialchars($user['avatar_url'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" alt="Foto Profil" />
                                    </div>
                                    <span class="avatar-real-sticker">AVATAR ASLI</span>
                                </div>

                                <div class="avatar-upload-meta">
                                    <h3 class="avatar-meta-title">Foto Profil Publik</h3>
                                    <p class="avatar-meta-desc">
                                        Format JPG/PNG maks. 2MB. Disarankan foto portrait jelas untuk membangun rasa percaya antar sesama pembeli dan penjual di ekosistem Rekber.
                                    </p>
                                    <div class="avatar-actions-buttons">
                                        <label class="btn-avatar-upload" for="avatar-file-input">
                                            <span class="material-symbols-outlined">upload</span>
                                            <span>GANTI FOTO</span>
                                            <input id="avatar-file-input" class="hidden-file-input" style="display:none;" type="file" accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn-avatar-delete" id="btn-delete-avatar">
                                            <span class="material-symbols-outlined">delete</span>
                                            <span>Hapus</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Inputs Menggunakan Reusable renderInput() Component -->
                            <div class="form-two-col-grid">
                                <!-- Input 1: Nama Lengkap -->
                                <?php
                                renderInput([
                                    'name' => 'nama_lengkap',
                                    'label' => 'NAMA LENGKAP',
                                    'id' => 'prof-nama-lengkap',
                                    'class' => 'profil-editable',
                                    'placeholder' => 'Nama lengkap sesuai KTP',
                                    'value' => $user['nama_lengkap'],
                                    'required' => true,
                                    'readonly' => true,
                                    'hint' => 'Sesuai nama rekening bank penarikan dana rekber'
                                ]);
                                ?>

                                <!-- Input 2: Username BaThrift -->
                                <?php
                                renderInput([
                                    'name' => 'username',
                                    'label' => 'USERNAME BATHRIFT',
                                    'id' => 'prof-username',
                                    'class' => 'profil-editable',
                                    'placeholder' => 'Username BaThrift',
                                    'value' => $user['username'],
                                    'prefix' => '@',
                                    'required' => true,
                                    'readonly' => true,
                                    'badge' => 'URL: bathrift.id/' . $user['username'],
                                    'badge_type' => 'valid'
                                ]);
                                ?>

                                <!-- Input 3: Email Aktif -->
                                <?php
                                renderInput([
                                    'name' => 'email',
                                    'type' => 'email',
                                    'label' => 'EMAIL AKTIF',
                                    'id' => 'prof-email',
                                    'class' => 'profil-editable',
                                    'placeholder' => 'alamat.email@domain.com',
                                    'value' => $user['email'],
                                    'required' => true,
                                    'readonly' => true,
                                    'badge' => 'TERVERIFIKASI',
                                    'badge_type' => 'valid',
                                    'hint' => 'Digunakan untuk nota digital invoice &amp; reset kata sandi'
                                ]);
                                ?>

                                <!-- Input 4: No. WhatsApp -->
                                <?php
                                renderInput([
                                    'name' => 'no_whatsapp',
                                    'label' => 'NO. WHATSAPP (AKTIF)',
                                    'id' => 'prof-whatsapp',
                                    'class' => 'profil-editable',
                                    'placeholder' => '+62 8xx-xxxx-xxxx',
                                    'value' => $user['no_whatsapp'],
                                    'required' => true,
                                    'readonly' => true,
                                    'badge' => 'TERHUBUNG WA',
                                    'badge_type' => 'valid',
                                    'hint' => 'Notifikasi otomatis tawar-menawar &amp; resi pengiriman'
                                ]);
                                ?>

                                <!-- Input 5: Tanggal Lahir -->
                                <?php
                                renderInput([
                                    'name' => 'tanggal_lahir',
                                    'type' => 'date',
                                    'label' => 'TANGGAL LAHIR',
                                    'id' => 'prof-tanggal-lahir',
                                    'class' => 'profil-editable',
                                    'value' => $user['tanggal_lahir'],
                                    'required' => false,
                                    'readonly' => true
                                ]);
                                ?>

                                <!-- Status Tipe Keanggotaan -->
                                <div class="form-group">
                                    <div class="form-label-row">
                                        <label class="form-label" for="prof-tier-display">TIPE KEANGGOTAAN</label>
                                    </div>
                                    <div class="tier-membership-box" id="prof-tier-display">
                                        <span class="material-symbols-outlined tier-icon-star">workspace_premium</span>
                                        <div>
                                            <div class="tier-title"><?= htmlspecialchars($user['tier'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                                            <div class="tier-desc"><?= htmlspecialchars($user['tier_desc'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bio Penggemar Thrift -->
                            <div class="form-group" style="margin-top: 16px;">
                                <div class="form-label-row">
                                    <label class="form-label" for="prof-bio">BIO PENGGEMAR THRIFT (PROFIL)</label>
                                </div>
                                <textarea id="prof-bio" class="form-textarea profil-editable" name="bio" rows="3" readonly="readonly"><?= htmlspecialchars($user['bio'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></textarea>
                            </div>

                            <!-- BUTTON TAMBAHAN: Edit Data Profil (User Request) -->
                            <div class="profile-edit-toggle-bar">
                                <span class="label-hint">* Klik tombol di samping untuk membuka mode pengeditan data profil.</span>
                                <button type="button" class="btn-edit-profile-action" id="btn-edit-profile">
                                    <span class="material-symbols-outlined">edit</span>
                                    <span>EDIT DATA PROFIL</span>
                                </button>
                            </div>
                        </section>

                        <!-- SECTION 2: TOKO SAYA (SELLER PROFILE & CONFIG) -->
                        <!-- DATA: toko -->
                        <section class="content-card-box" style="margin-top: 28px;">
                            <div class="card-header-bar">
                                <div class="card-header-left">
                                    <span class="card-section-number number-green">02. TOKO SAYA</span>
                                    <span class="card-section-sub">PENGATURAN ETALASE LAPAK</span>
                                </div>
                                <div class="card-header-badge badge-yellow">
                                    <span class="material-symbols-outlined">verified</span>
                                    <span>STATUS LAPAK: <?= htmlspecialchars($toko['status'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                            </div>

                            <!-- Public Alert Notice -->
                            <div class="toko-notice-box">
                                <span class="material-symbols-outlined">campaign</span>
                                <p class="toko-notice-text">
                                    <strong>CATATAN PUBLIK:</strong> Informasi identitas toko berikut ditampilkan secara terbuka di kartu barang, pencarian pasar loak, serta halaman etalase publik toko kamu.
                                </p>
                            </div>

                            <!-- BUTTON TAMBAHAN: Toko Saya (User Request) -->
                            <div class="toko-action-buttons-row">
                                <a class="btn-manage-shop" id="btn-manage-shop" href="<?= url('/dashboard-toko') ?>">
                                    <span class="material-symbols-outlined">storefront</span>
                                    <span>KELOLA TOKO SAYA (DASHBOARD)</span>
                                </a>
                                <a class="btn-view-public-shop" id="btn-view-public-shop" href="<?= url('/profil-toko/' . $toko['id']) ?>">
                                    <span class="material-symbols-outlined">visibility</span>
                                    <span>LIHAT PROFIL TOKO PUBLIK</span>
                                    <span class="material-symbols-outlined" style="font-size: 16px;">open_in_new</span>
                                </a>
                            </div>

                            <!-- Toko Form Fields Menggunakan Reusable renderInput() Component -->
                            <div class="form-two-col-grid" style="margin-top: 20px;">
                                <!-- Input Toko 1: Nama Toko -->
                                <?php
                                renderInput([
                                    'name' => 'nama_toko',
                                    'label' => 'NAMA LAPAK / TOKO',
                                    'id' => 'prof-nama-toko',
                                    'class' => 'profil-editable',
                                    'placeholder' => 'Nama lapak thrifting kamu',
                                    'value' => $toko['nama_toko'],
                                    'required' => true,
                                    'readonly' => true
                                ]);
                                ?>

                                <!-- Input Toko 2: Slug Toko URL -->
                                <?php
                                renderInput([
                                    'name' => 'slug_toko',
                                    'label' => 'TAUTAN SLUG TOKO',
                                    'id' => 'prof-slug-toko',
                                    'class' => 'profil-editable',
                                    'prefix' => 'bathrift.id/',
                                    'placeholder' => 'slug-toko',
                                    'value' => $toko['slug'],
                                    'required' => true,
                                    'readonly' => true
                                ]);
                                ?>
                            </div>

                            <!-- Deskripsi Toko -->
                            <div class="form-group" style="margin-top: 16px;">
                                <div class="form-label-row">
                                    <label class="form-label" for="prof-toko-desc">DESKRIPSI TOKO &amp; SPESIALISASI CURATION</label>
                                    <span class="label-hint">Maks. 300 Karakter</span>
                                </div>
                                <textarea id="prof-toko-desc" class="form-textarea profil-editable" name="deskripsi_toko" rows="4" readonly="readonly"><?= htmlspecialchars($toko['deskripsi'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></textarea>
                            </div>

                            <!-- Lokasi Gudang / Origin Pengiriman -->
                            <div class="form-group" style="margin-top: 16px;">
                                <div class="form-label-row">
                                    <label class="form-label" for="prof-asal-kota">ASAL KOTA PENGIRIMAN (GUDANG LAPAK) <span class="text-required">*</span></label>
                                </div>
                                <div class="form-select-wrapper">
                                    <select id="prof-asal-kota" class="form-select profil-editable" name="kota_pengiriman">
                                        <option value="jaksel" selected="selected"><?= htmlspecialchars($toko['kota_pengiriman'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></option>
                                        <option value="bandung">Bandung Wetan, Kota Bandung (Jawa Barat)</option>
                                        <option value="surabaya">Tegalsari, Kota Surabaya (Jawa Timur)</option>
                                        <option value="sleman">Kec. Sleman, D.I. Yogyakarta</option>
                                    </select>
                                    <span class="material-symbols-outlined select-arrow">expand_more</span>
                                </div>
                                <span class="label-hint">Penting: Penentu hitungan tarif ongkos kirim ekspedisi otomatis</span>
                            </div>

                            <!-- Bento Mini-Stats Toko -->
                            <!-- LOOP: stats -->
                            <div class="toko-stats-strip">
                                <?php foreach ($toko['stats'] as $stat): ?>
                                    <div class="stat-bento-card">
                                        <div class="stat-bento-label"><?= htmlspecialchars($stat['label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                                        <div class="stat-bento-value">
                                            <span><?= $stat['value'] ?></span>
                                            <?php if ($stat['icon'] === 'star'): ?>
                                                <span class="material-symbols-outlined stat-star-icon">star</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </section>

                        <!-- STICKY ACTION FOOTER BAR -->
                        <div class="profil-save-footer-bar" style="margin-top: 28px;">
                            <div class="save-bar-info">
                                <span class="material-symbols-outlined save-bar-icon">sync</span>
                                <div>
                                    <h4 class="save-bar-title">SINKRONISASI DATA AKUN</h4>
                                    <p class="save-bar-desc">Pastikan nomor kontak WhatsApp &amp; alamat asal gudang lapak sudah tepat.</p>
                                </div>
                            </div>
                            <div class="save-bar-actions">
                                <button type="button" class="btn-save-cancel" id="btn-cancel-profile">
                                    BATAL
                                </button>
                                <button type="submit" class="btn-save-submit" id="save-profile-btn">
                                    <span class="material-symbols-outlined">save</span>
                                    <span>SIMPAN PERUBAHAN</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>

        <!-- Toast Feedback Banner -->
        <div class="toast-success-banner" id="toast-success">
            <div class="toast-success-box">
                <span class="material-symbols-outlined">check_circle</span>
                <span id="toast-message">DATA PROFIL &amp; LAPAK BERHASIL DIPERBARUI!</span>
            </div>
        </div>

        <!-- Modal Dialog Konfirmasi Logout Neo-Brutalist -->
        <div class="logout-confirm-overlay is-hidden" id="logout-confirm-overlay">
            <div class="logout-confirm-card">
                <div class="logout-confirm-header">
                    <span class="material-symbols-outlined icon-logout-warning">logout</span>
                    <span class="logout-confirm-title">KONFIRMASI KELUAR</span>
                </div>
                <p class="logout-confirm-message">
                    Apakah Anda yakin ingin keluar dari akun BaThrift? Anda perlu masuk kembali untuk mengakses keranjang dan etalase toko.
                </p>
                <div class="logout-confirm-actions">
                    <button type="button" class="btn-logout-cancel" id="btn-cancel-logout">
                        BATAL
                    </button>
                    <a class="btn-logout-confirm" id="btn-confirm-logout" href="<?= url('/logout') ?>">
                        <span class="material-symbols-outlined">check</span>
                        <span>YA, KELUAR</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Komponen Footer BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/footer.php'; ?>

    <!-- JavaScript Interaktif DOM -->
    <script src="<?= url('/assets/js/profil.js') ?>"></script>
</body>
</html>
