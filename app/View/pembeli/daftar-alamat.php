<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

// DATA: Variabel kontrol halaman & navigasi
$active_nav = 'akun';
$cart_count = 3;

// DATA: user (dummy fallback bila belum disuplai dari controller)
$user = $model['user'] ?? [
    'name'       => 'Dimas Ramadhan',
    'username'   => 'dimas_vintage',
    'created_at' => '2023-01-15',
    'status'     => 'TERVERIFIKASI'
];
$saldo = $model['saldo'] ?? 1450000;
$has_store = !empty($model['store'] ?? true);

// DATA: addresses (daftar alamat dummy untuk tampilan awal)
$addresses = $model['addresses'] ?? [
    [
        'id'            => 1,
        'is_utama'      => true,
        'badges'        => [
            ['text' => 'ALAMAT UTAMA', 'icon' => 'stars', 'variant' => 'primary'],
            ['text' => 'RUMAH', 'icon' => '', 'variant' => 'neutral'],
            ['text' => 'TERVERIFIKASI KURIR', 'icon' => 'check_circle', 'variant' => 'lime']
        ],
        'label'         => 'Rumah Utama (Tebet)',
        'penerima'      => 'Dimas Ramadhan',
        'telepon'       => '0812-3456-7890',
        'wa_aktif'      => true,
        'alamat'        => 'Jl. Tebet Timur Dalam Raya No. 42B, RT 04 / RW 05, Kel. Tebet Timur, Kec. Tebet, Kota Jakarta Selatan, DKI Jakarta 12820.',
        'patokan_label' => 'Patokan:',
        'patokan'       => 'Pagar besi hitam horizontal, persis di seberang Warung Kopi Makmur Tebet. Ada bel hitam di pagar.',
        'patokan_icon'  => 'signpost',
        'patokan_tone'  => 'primary',
        'kota'          => 'JAKARTA SELATAN',
        'kota_kec'      => 'Kota Jakarta Selatan - Tebet (DKI Jakarta)',
        'kode_pos'      => '12820',
        'meta_label'    => 'COVERAGE:',
        'meta_value'    => 'INSTANT / SAMEDAY',
        'meta_tone'     => 'tertiary',
        'geo_coords'    => '-6.2341, 106.8529',
        'catatan_bawah' => ''
    ],
    [
        'id'            => 2,
        'is_utama'      => false,
        'badges'        => [
            ['text' => 'KANTOR / STUDIO', 'icon' => '', 'variant' => 'neutral'],
            ['text' => 'ALAMAT KEDUA', 'icon' => '', 'variant' => 'muted']
        ],
        'label'         => 'Studio BaThrift & Creative Space',
        'penerima'      => 'Dimas R. (Studio)',
        'telepon'       => '0819-8765-4321',
        'wa_aktif'      => false,
        'alamat'        => 'Gedung Colony 6 Lt. 3 Unit 302, Jl. Kemang Raya No. 6, Kel. Bangka, Kec. Mampang Prapatan, Kota Jakarta Selatan, DKI Jakarta 12730.',
        'patokan_label' => 'Patokan:',
        'patokan'       => 'Masuk lobby barat, naik lift ke lantai 3. Jika kurir tiba di luar jam operasional (10.00 - 19.00), titip security lobby utama.',
        'patokan_icon'  => 'info',
        'patokan_tone'  => 'primary',
        'kota'          => 'JAKARTA SELATAN',
        'kota_kec'      => 'Kota Jakarta Selatan - Mampang Prapatan (DKI Jakarta)',
        'kode_pos'      => '12730',
        'meta_label'    => 'JAM TERIMA:',
        'meta_value'    => '10:00 - 19:00 WIB',
        'meta_tone'     => 'default',
        'geo_coords'    => '-6.2589, 106.8152',
        'catatan_bawah' => ''
    ],
    [
        'id'            => 3,
        'is_utama'      => false,
        'badges'        => [
            ['text' => 'GUDANG LAPAK SELLER', 'icon' => 'warehouse', 'variant' => 'pink'],
            ['text' => 'TITIK DROP-OFF / PICK-UP', 'icon' => '', 'variant' => 'primary']
        ],
        'label'         => 'Workshop ArchiveJakarta',
        'penerima'      => 'Dimas (Admin Gudang)',
        'telepon'       => '0812-9988-7711',
        'wa_aktif'      => false,
        'alamat'        => 'Jl. Melawai Raya No. 18A, Lantai 2 (Atas Toko Kaset Vintage), RT 03 / RW 01, Kramat Pela, Kebayoran Baru, Jakarta Selatan, DKI Jakarta 12130.',
        'patokan_label' => 'Khusus Kurir Ekspedisi:',
        'patokan'       => 'Tempat penyerahan paket thrift pesanan pembeli (Pick-Up J&T Express / JNE Trucking). Tangga samping sebelah kiri ruko.',
        'patokan_icon'  => 'local_shipping',
        'patokan_tone'  => 'secondary',
        'kota'          => 'JAKARTA SELATAN',
        'kota_kec'      => 'Kota Jakarta Selatan - Kebayoran Baru (DKI Jakarta)',
        'kode_pos'      => '12130',
        'meta_label'    => 'FUNGSI:',
        'meta_value'    => 'ORIGIN PENGIRIMAN',
        'meta_tone'     => 'secondary',
        'geo_coords'    => '-6.2442, 106.7981',
        'catatan_bawah' => 'Alamat ini terhubung sebagai lokasi asal paket toko Anda'
    ]
];

$total_addresses = count($addresses);
$initials = function_exists('getInitials')
    ? getInitials($user['name'] ?? 'DR')
    : 'DR';
$saldo_formatted = function_exists('formatRupiah')
    ? formatRupiah($saldo)
    : 'Rp 1.450.000';
$member_year = !empty($user['created_at'])
    ? date('Y', strtotime($user['created_at']))
    : '2023';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" xml:lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($model['title'] ?? 'Daftar Alamat Pengiriman - BaThrift', ENT_QUOTES | ENT_XML1, 'UTF-8') ?></title>

    <!-- Google Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&amp;family=Space+Grotesk:wght@500;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <!-- Pure Native Stylesheets (Neo-Brutalisme BaThrift) -->
    <link rel="stylesheet" href="<?= url('/assets/css/katalog.css') ?>" />
    <link rel="stylesheet" href="<?= url('/assets/css/profil.css') ?>" />
    <link rel="stylesheet" href="<?= url('/assets/css/daftar-alamat.css') ?>" />
</head>

<body>
    <!-- Komponen Header BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/header.php'; ?>

    <!-- Konten Utama Daftar Alamat -->
    <main class="profil-main">
        <div class="profil-wrapper alamat-wrapper">
            <!-- Top Breadcrumb Ticker Bar -->
            <div class="alamat-ticker-bar">
                <div class="alamat-ticker-left">
                    <span class="alamat-ticker-square"></span>
                    <span class="alamat-ticker-muted">#AKUN-SAYA</span>
                    <span>&#8226;</span>
                    <span class="alamat-ticker-bold">BUKU ALAMAT &amp; LOGISTIK P2P</span>
                </div>
                <div class="alamat-ticker-right">
                    <span class="alamat-courier-pill">
                        <span class="material-symbols-outlined">local_shipping</span>
                        <span>JNE &#8226; J&amp;T &#8226; SICEPAT &#8226; GOSEND</span>
                    </span>
                    <span class="alamat-status-pill" id="alamat-status-pill">STATUS: <?= htmlspecialchars((string)$total_addresses, ENT_QUOTES | ENT_XML1, 'UTF-8') ?> ALAMAT AKTIF</span>
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
                                    <span><?= htmlspecialchars($initials, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                                <span class="passport-pro-tag">PRO</span>
                            </div>
                            <div class="passport-user-info">
                                <h2 class="passport-user-name"><?= htmlspecialchars($user['name'] ?? 'Dimas Ramadhan', ENT_QUOTES | ENT_XML1, 'UTF-8') ?></h2>
                                <p class="passport-user-handle">@<?= htmlspecialchars($user['username'] ?? 'dimas_vintage', ENT_QUOTES | ENT_XML1, 'UTF-8') ?></p>
                                <span class="passport-since-tag">MEMBER SEJAK <?= htmlspecialchars($member_year, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                            </div>
                        </div>

                        <!-- Dompet Rekber Box -->
                        <?php if ($has_store): ?>
                            <div class="rekber-wallet-box">
                                <div class="rekber-wallet-header">
                                    <span>Saldo Dompet Rekber</span>
                                    <span class="material-symbols-outlined">lock</span>
                                </div>
                                <div class="rekber-wallet-balance-row">
                                    <span class="rekber-balance-amount"><?= htmlspecialchars($saldo_formatted, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                    <span class="rekber-status-badge">Tersedia</span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="sidebar-menu-nav" aria-label="Menu Akun">
                        <!-- Menu 1: Profil Saya -->
                        <a class="sidebar-menu-item" href="<?= url('/profil') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">person</span>
                                <span>Profil Saya</span>
                            </div>
                            <span class="material-symbols-outlined">chevron_right</span>
                        </a>

                        <!-- Menu 2: Daftar Alamat (Aktif) -->
                        <a class="sidebar-menu-item menu-active" href="<?= url('/daftar-alamat') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">location_on</span>
                                <span>Daftar Alamat</span>
                            </div>
                            <span class="menu-badge-pill menu-badge-dark">AKTIF</span>
                        </a>

                        <!-- Menu 3: Dashboard Toko -->
                        <a class="sidebar-menu-item" href="<?= url('/dashboard-toko') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">storefront</span>
                                <span>Dashboard Toko</span>
                            </div>
                            <span class="menu-badge-pill menu-badge-pink">SELLER</span>
                        </a>

                        <!-- Menu 4: Pesanan Saya -->
                        <a class="sidebar-menu-item" href="<?= url('/pesanan') ?>">
                            <div class="sidebar-menu-left">
                                <span class="material-symbols-outlined">receipt_long</span>
                                <span>Pesanan Saya</span>
                            </div>
                            <span class="menu-badge-pill menu-badge-pink">3 OTW</span>
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
                                <span class="material-symbols-outlined">lock_reset</span>
                                <span>Keamanan &amp; Sandi</span>
                            </div>
                            <span class="material-symbols-outlined">chevron_right</span>
                        </a>

                        <!-- Tombol Keluar Akun -->
                        <button type="button" class="btn-sidebar-logout" id="btn-sidebar-logout">
                            <span class="material-symbols-outlined">logout</span>
                            <span>KELUAR DARI AKUN</span>
                        </button>
                    </nav>

                    <!-- Quick Info Box: Tips Ongkir Cepat -->
                    <div class="sidebar-tips-box">
                        <div class="sidebar-tips-title">
                            <span class="material-symbols-outlined">local_shipping</span>
                            <span>TIPS ONGKIR CEPAT</span>
                        </div>
                        <p class="sidebar-tips-desc">
                            Gunakan patokan detail &amp; pastikan titik maps sesuai agar kurir sameday (GoSend / GrabExpress) bisa langsung sampai tanpa salah gang.
                        </p>
                    </div>
                </aside>

                <!-- RIGHT MAIN CONTENT: Manajemen Alamat -->
                <section class="alamat-main-col" aria-label="Daftar Alamat Pengiriman">
                    <!-- Header Section Card -->
                    <div class="alamat-header-card">
                        <div class="alamat-header-top">
                            <div>
                                <div class="alamat-hero-badge">LOGISTIK STREETWEAR &#8226; P2P ESCROW</div>
                                <h1 class="alamat-hero-title">DAFTAR ALAMAT PENGIRIMAN</h1>
                                <p class="alamat-hero-desc">
                                    Kelola alamat kirim untuk transaksi P2P, kalkulasi ongkos kirim otomatis kurir, dan lokasi drop-off seller lapak thrift Anda.
                                </p>
                            </div>
                            <div class="alamat-counter-tag">
                                <span class="material-symbols-outlined">pin_drop</span>
                                <span id="alamat-count-text"><?= htmlspecialchars((string)$total_addresses, ENT_QUOTES | ENT_XML1, 'UTF-8') ?> Alamat Tersimpan</span>
                            </div>
                        </div>

                        <!-- Action & Search Bar -->
                        <div class="alamat-action-bar">
                            <div class="alamat-search-box">
                                <span class="material-symbols-outlined alamat-search-icon">search</span>
                                <input id="alamat-search-input" class="alamat-search-input" type="text" placeholder="Cari alamat, kecamatan, atau nama penerima..." />
                            </div>
                            <button type="button" class="btn-tambah-alamat" id="btn-tambah-alamat">
                                <span class="material-symbols-outlined">add_circle</span>
                                <span>+ TAMBAH ALAMAT BARU</span>
                            </button>
                        </div>
                    </div>

                    <!-- ADDRESS LIST -->
                    <!-- LOOP: addresses -->
                    <div class="alamat-list" id="alamat-list">
                        <?php foreach ($addresses as $addr): ?>
                            <article class="alamat-card"
                                     data-address-id="<?= htmlspecialchars((string)$addr['id'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-search="<?= htmlspecialchars(strtolower($addr['label'] . ' ' . $addr['penerima'] . ' ' . $addr['alamat'] . ' ' . $addr['kota']), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-label="<?= htmlspecialchars($addr['label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-penerima="<?= htmlspecialchars($addr['penerima'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-telepon="<?= htmlspecialchars(preg_replace('/[^0-9]/', '', $addr['telepon']), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-kota-kec="<?= htmlspecialchars($addr['kota_kec'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-kode-pos="<?= htmlspecialchars($addr['kode_pos'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-alamat="<?= htmlspecialchars($addr['alamat'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-patokan="<?= htmlspecialchars($addr['patokan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                     data-utama="<?= $addr['is_utama'] ? '1' : '0' ?>">

                                <?php if (!empty($addr['is_utama'])): ?>
                                    <div class="alamat-corner-ribbon-wrap">
                                        <div class="alamat-corner-ribbon">UTAMA</div>
                                    </div>
                                <?php endif; ?>

                                <!-- Badges Row -->
                                <div class="alamat-badges-row <?= !empty($addr['is_utama']) ? 'has-ribbon' : '' ?>">
                                    <?php foreach ($addr['badges'] as $badge): ?>
                                        <span class="alamat-badge alamat-badge-<?= htmlspecialchars($badge['variant'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                                            <?php if (!empty($badge['icon'])): ?>
                                                <span class="material-symbols-outlined"><?= htmlspecialchars($badge['icon'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            <?php endif; ?>
                                            <span><?= htmlspecialchars($badge['text'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                        </span>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Header Info -->
                                <div class="alamat-card-head">
                                    <div class="alamat-card-title-group">
                                        <h2 class="alamat-card-title"><?= htmlspecialchars($addr['label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></h2>
                                        <span class="alamat-card-recipient">| <?= htmlspecialchars($addr['penerima'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                    </div>
                                    <div class="alamat-card-contact">
                                        <span class="alamat-card-phone"><?= htmlspecialchars($addr['telepon'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                        <?php if (!empty($addr['wa_aktif'])): ?>
                                            <span class="alamat-wa-tag">
                                                <span class="material-symbols-outlined">chat</span>
                                                <span>WhatsApp Aktif</span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Address Text & Metadata -->
                                <div class="alamat-card-body">
                                    <div class="alamat-card-text-col">
                                        <p class="alamat-full-text"><?= htmlspecialchars($addr['alamat'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></p>
                                        <div class="alamat-patokan-box">
                                            <span class="material-symbols-outlined patokan-icon-<?= htmlspecialchars($addr['patokan_tone'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"><?= htmlspecialchars($addr['patokan_icon'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            <div class="alamat-patokan-text">
                                                <strong><?= htmlspecialchars($addr['patokan_label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></strong>
                                                <?= htmlspecialchars($addr['patokan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Location Metadata Mini-Table -->
                                    <div class="alamat-meta-box">
                                        <div class="alamat-meta-rows">
                                            <div class="alamat-meta-row">
                                                <span class="alamat-meta-key">KOTA:</span>
                                                <span class="alamat-meta-val"><?= htmlspecialchars($addr['kota'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            </div>
                                            <div class="alamat-meta-row">
                                                <span class="alamat-meta-key">KODE POS:</span>
                                                <span class="alamat-meta-val"><?= htmlspecialchars($addr['kode_pos'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            </div>
                                            <div class="alamat-meta-row">
                                                <span class="alamat-meta-key"><?= htmlspecialchars($addr['meta_label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                                <span class="alamat-meta-val meta-tone-<?= htmlspecialchars($addr['meta_tone'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"><?= htmlspecialchars($addr['meta_value'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            </div>
                                        </div>
                                        <div class="alamat-geo-coords">
                                            GEO-COORDS: <?= htmlspecialchars($addr['geo_coords'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions Row -->
                                <div class="alamat-card-actions">
                                    <?php if (!empty($addr['is_utama'])): ?>
                                        <div class="alamat-default-pill">
                                            <span class="material-symbols-outlined">check_box</span>
                                            <span>Alamat Pengiriman Default</span>
                                        </div>
                                    <?php elseif (!empty($addr['catatan_bawah'])): ?>
                                        <span class="alamat-origin-note">
                                            <span class="material-symbols-outlined">info</span>
                                            <span><?= htmlspecialchars($addr['catatan_bawah'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                        </span>
                                    <?php else: ?>
                                        <button type="button" class="btn-set-utama">
                                            <span class="material-symbols-outlined">radio_button_unchecked</span>
                                            <span>Jadikan Alamat Utama</span>
                                        </button>
                                    <?php endif; ?>

                                    <div class="alamat-action-btns">
                                        <button type="button" class="btn-ubah-alamat">
                                            <span class="material-symbols-outlined">edit</span>
                                            <span>Ubah</span>
                                        </button>
                                        <?php if (!empty($addr['is_utama'])): ?>
                                            <button type="button" class="btn-locked-utama" disabled="disabled" title="Alamat default tidak dapat dihapus. Jadikan alamat lain sebagai default terlebih dahulu.">
                                                Utama (Terkunci)
                                            </button>
                                        <?php else: ?>
                                            <button type="button" class="btn-hapus-alamat">
                                                <span class="material-symbols-outlined">delete</span>
                                                <span>Hapus</span>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <!-- Empty search state -->
                    <div class="alamat-empty-state is-hidden" id="alamat-empty-state">
                        <span class="material-symbols-outlined">location_off</span>
                        <p>Tidak ada alamat yang cocok dengan pencarian Anda.</p>
                    </div>

                    <!-- Courier Integration Partner Footer Strip -->
                    <div class="courier-sync-strip">
                        <div class="courier-sync-left">
                            <span class="material-symbols-outlined courier-sync-icon">sync_alt</span>
                            <div>
                                <div class="courier-sync-title">SINKRONISASI API LOGISTIK AKTIF</div>
                                <div class="courier-sync-desc">Ongkir dihitung real-time berdasarkan titik koordinat dan berat volumetrik streetwear.</div>
                            </div>
                        </div>
                        <div class="courier-sync-tags">
                            <span class="courier-tag">JNE REG/YES</span>
                            <span class="courier-tag">SICEPAT</span>
                            <span class="courier-tag">GOSEND</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- NEO-BRUTALIST MODAL: TAMBAH / UBAH ALAMAT PENGIRIMAN -->
        <div class="alamat-modal-overlay is-hidden" id="modal-tambah-alamat">
            <div class="alamat-modal-card">
                <div class="alamat-modal-top-strip"></div>

                <!-- Modal Header -->
                <div class="alamat-modal-header">
                    <div>
                        <div class="alamat-modal-badge">FORM LOGISTIK P2P</div>
                        <h2 class="alamat-modal-title" id="modal-alamat-title">TAMBAH / UBAH ALAMAT PENGIRIMAN</h2>
                        <p class="alamat-modal-subtitle">
                            Pastikan alamat presisi agar kurir instan &amp; reguler tidak salah alamat atau tersasar di gang.
                        </p>
                    </div>
                    <button type="button" class="btn-modal-close" id="btn-close-modal-alamat" title="Tutup Form">&#10005;</button>
                </div>

                <!-- Modal Form Body -->
                <form class="alamat-modal-form" id="form-alamat" action="<?= url('/add-alamat') ?>" method="post">
                    <input type="hidden" id="alamat-id-input" name="address_id" value="" />

                    <!-- Field 1: Label Alamat -->
                    <div class="form-group">
                        <div class="form-label-row">
                            <label class="form-label" for="input-label-alamat">
                                Label Alamat <span class="text-required">*</span>
                                <span class="label-hint-inline">(contoh: Rumah, Kantor, Kos, Studio)</span>
                            </label>
                        </div>
                        <input id="input-label-alamat" class="form-input" name="label_alamat" type="text" required="required" placeholder="Contoh: Rumah Utama / Kost Senayan / Studio Thrift" value="Rumah Utama (Tebet)" />
                    </div>

                    <!-- Field 2 & 3: Penerima & WhatsApp Phone -->
                    <div class="form-grid-2">
                        <div class="form-group">
                            <div class="form-label-row">
                                <label class="form-label" for="input-nama-penerima">Nama Penerima <span class="text-required">*</span></label>
                            </div>
                            <input id="input-nama-penerima" class="form-input" name="nama_penerima" type="text" required="required" placeholder="Nama Lengkap Penerima Paket" value="Dimas Ramadhan" />
                        </div>
                        <div class="form-group">
                            <div class="form-label-row">
                                <label class="form-label" for="input-no-wa">Nomor WhatsApp / HP <span class="text-required">*</span></label>
                            </div>
                            <div class="alamat-phone-group">
                                <span class="alamat-phone-prefix">+62</span>
                                <input id="input-no-wa" class="form-input alamat-phone-input" name="no_wa" type="tel" required="required" placeholder="812-3456-7890" value="81234567890" />
                            </div>
                            <span class="label-hint">Kurir akan mengirim notifikasi drop via WhatsApp ini.</span>
                        </div>
                    </div>

                    <!-- Field 4 & 5: Kota/Kecamatan & Kode Pos -->
                    <div class="alamat-grid-3">
                        <div class="form-group alamat-col-span-2">
                            <div class="form-label-row">
                                <label class="form-label" for="input-kota-kec">Kota &amp; Kecamatan <span class="text-required">*</span></label>
                            </div>
                            <div class="form-select-wrapper">
                                <select id="input-kota-kec" class="form-select" name="kota_kecamatan">
                                    <option value="Kota Jakarta Selatan - Tebet (DKI Jakarta)" selected="selected">Kota Jakarta Selatan - Tebet (DKI Jakarta)</option>
                                    <option value="Kota Jakarta Selatan - Kebayoran Baru (DKI Jakarta)">Kota Jakarta Selatan - Kebayoran Baru (DKI Jakarta)</option>
                                    <option value="Kota Jakarta Selatan - Mampang Prapatan (DKI Jakarta)">Kota Jakarta Selatan - Mampang Prapatan (DKI Jakarta)</option>
                                    <option value="Kota Jakarta Pusat - Menteng (DKI Jakarta)">Kota Jakarta Pusat - Menteng (DKI Jakarta)</option>
                                    <option value="Kota Bandung - Coblong (Jawa Barat)">Kota Bandung - Coblong (Jawa Barat)</option>
                                    <option value="Kota Surabaya - Gubeng (Jawa Timur)">Kota Surabaya - Gubeng (Jawa Timur)</option>
                                </select>
                                <span class="material-symbols-outlined select-arrow">expand_more</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-row">
                                <label class="form-label" for="input-kode-pos">Kode Pos <span class="text-required">*</span></label>
                            </div>
                            <input id="input-kode-pos" class="form-input alamat-mono-input" name="kode_pos" type="text" required="required" placeholder="12820" value="12820" />
                        </div>
                    </div>

                    <!-- Field 6: Alamat Lengkap & Patokan -->
                    <div class="form-group">
                        <div class="form-label-row">
                            <label class="form-label" for="input-alamat-lengkap">Alamat Lengkap &amp; Nomor Bangunan <span class="text-required">*</span></label>
                        </div>
                        <textarea id="input-alamat-lengkap" class="form-textarea" name="alamat_lengkap" rows="3" required="required" placeholder="Nama jalan, nomor rumah, RT/RW, blok atau nomor unit kamar kos...">Jl. Tebet Timur Dalam Raya No. 42B, RT 04 / RW 05, Kelurahan Tebet Timur</textarea>
                    </div>

                    <div class="form-group">
                        <div class="form-label-row">
                            <label class="form-label" for="input-patokan">Catatan Driver / Patokan Kurir (Opsional)</label>
                        </div>
                        <input id="input-patokan" class="form-input" name="patokan" type="text" placeholder="Contoh: Pagar besi hitam, cat tembok abu-abu, seberang warung Madura..." value="Pagar besi hitam persis depan Warung Kopi Makmur" />
                    </div>

                    <!-- Checkbox: Jadikan Utama -->
                    <div class="alamat-checkbox-box">
                        <label class="alamat-checkbox-label" for="input-is-utama">
                            <input id="input-is-utama" class="alamat-checkbox-input" name="is_utama" type="checkbox" checked="checked" value="1" />
                            <span>Jadikan sebagai Alamat Utama pengiriman &amp; penagihan BaThrift</span>
                        </label>
                    </div>

                    <!-- Modal Footer Actions -->
                    <div class="alamat-modal-footer">
                        <button type="button" class="btn-modal-cancel" id="btn-batal-modal-alamat">BATAL</button>
                        <button type="submit" class="btn-modal-save" id="btn-simpan-modal-alamat">
                            <span class="material-symbols-outlined">save</span>
                            <span>SIMPAN ALAMAT</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Toast Feedback Banner -->
        <div class="toast-success-banner" id="toast-success">
            <div class="toast-success-box">
                <span class="material-symbols-outlined">check_circle</span>
                <span id="toast-message">ALAMAT PENGIRIMAN BERHASIL DISIMPAN!</span>
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
                    <button type="button" class="btn-logout-cancel" id="btn-cancel-logout">BATAL</button>
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
    <script src="<?= url('/assets/js/daftar-alamat.js') ?>"></script>
</body>

</html>
