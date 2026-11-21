<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

// Memuat fungsi url() dari Core Router jika belum tersedia
if (!function_exists('url')) {
    require_once __DIR__ . '/../../Core/Router.php';
}

// DATA: Variabel kontrol halaman & filter
$page_title = 'Vintage Carhartt Detroit Jacket J97 Tan - BaThrift';
$active_nav = 'belanja';
$cart_count = 3;

// DATA: Detail produk utama
$product = [
    'id' => 1,
    'title' => 'CARHARTT DETROIT CANVAS JACKET J97 TAN (1998)',
    'brand' => 'CARHARTT WORKWEAR',
    'category' => 'Outerwear',
    'category_tag' => 'OUTERWEAR / VINTAGE WORKWEAR',
    'price' => 1450000,
    'price_formatted' => 'Rp 1.450.000',
    'size' => 'SIZE L',
    'condition' => 'minus',
    'condition_label' => 'ADA MINUS (7.5/10)',
    'code' => 'DET-J97-98',
    'description' => 'Arsip asli Carhartt Detroit Jacket kode model J97 warna Tan klasik era 1998. Bahan heavyweight duck canvas 12oz kokoh dengan kerah korduroi cokelat tua dan interior blanket lining bermotif Aztec khas rilisan 90-an. Bukan barang reproduksi modern. Sudah melalui proses pencucian deep-clean profesional, bebas bau apek gudang, dan siap langsung dipakai melangkah di jalanan.',
    'images' => [
        [
            'title' => 'Tampak Depan Lengkap',
            'tag' => 'DEPAN',
            'is_minus' => false,
            'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBanbmgOqvsFqiB1uvtBVN3Xzq65AX7mWYbiwLw8SmTKTTsEjGfhp-jaDPpGw--anzGoPnqpQfBC69cUbi1NVklavmioh_S_thSoXdGy2OJLB8JjUpk4iQ1BKcaGu41PH6FCf0teZIgkuyOmSG64XtmSiB-EkUAkF4lSgqf9cAYrTdsaXza_TT9hDlrpLOfAnBIpsn52nFhW1nZ3OiZ8AuJP-CUOmvtcbJKVBOWYEs'
        ],
        [
            'title' => 'Tag Leher Vintage',
            'tag' => 'TAG USA',
            'is_minus' => false,
            'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC5x71jrFkRJBvUyJwpHEu7IETP_HKK99ICXTjz_QeO4Wn7YSmF9p9Pkeoa2VmV9TJvskU6ZQ3PqhhIbi19jnrY4n0S8bUKcXVgHmh0Dx5ScFoXDX24xTUuDeOofc2PqJfHOVdHd-ts3kahgiLrfNxB3Z9qxFSGoOTQbwQdXWGorAMyQHKIK-S4qoaatnFuiHe6qtL4RXAXeG3F-chjKCcXXgKFf5Wx0WEe06CCmcg'
        ],
        [
            'title' => 'Korduroi Kerah',
            'tag' => 'KERAH',
            'is_minus' => false,
            'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDnXlvF0QjaItIFLo5V8oktaYhaouEePQkgGdhqsbSftJfpqKCaYJ0Id-JEi6oRko5tiNWBO_mZYdtXbYQtQWvXoEAWmXf58YccCbSraxIbhh_RMBia8e-SlKAPsdGb4jnHiUlrE7EgfxUJx-LuuveleuPorwWv-AkXKRNjMS0sggCN_aTOHEoLIUDdipCMxWxNUgIqcCGXcTvO9dXAhv8O5jAf1mLNjM6J649Dagk'
        ],
        [
            'title' => 'Zoom Minus Pinhole',
            'tag' => 'MINUS',
            'is_minus' => true,
            'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBSguNjspFiw8sXQo1hDDA5leQHi9aRaDSvKD3eEflc6UOqr_uY8bP8sFQgHG6Gr9oRYNNQv4Qm4qswOxxA2jz8TpQ_PP5dsg5amgd1kex4BeVKly274HdEOz16KZRHv1CTMkz5K-l8pUZ7wpE1_XkMozuFFzKZ3F_Jtq1Wdz_kwE2LB5ZClGEiZ9VvQp3uAkquW_-WLkHqMonD-RO0KPhizleHitMmeeBgArhx-Fk'
        ]
    ]
];

// DATA: Daftar spesifikasi ukuran dimensi
$dimensions = [
    'Panjang: 68 cm',
    'Lebar Dada: 59 cm',
    'Lengan: 62 cm'
];

// DATA: Catatan transparansi cacat/minus
$defects = [
    [
        'title' => '1. Faded Alami (Patina):',
        'desc' => 'Sun-faded merata di bagian siku luar dan punuk bahu kiri khas usia pakaian 25+ tahun, menambah karakter vintage workwear.'
    ],
    [
        'title' => '2. Lubang Mikro (Pinhole 2mm):',
        'desc' => 'Ada lubang mikro di saku bawah kanan, sudah diperbaiki rapi dengan bordir teknik sashiko vintage agar serat kain tidak merembet.'
    ],
    [
        'title' => '3. Hardware / Hardware Zipper:',
        'desc' => 'Tarikan zipper YKK kuningan berfungsi lancar. Kancing snap pergelangan tangan memiliki sedikit oksidasi alami (khas vintage).'
    ]
];

// DATA: Informasi toko / penjual
$seller = [
    'id' => 12,
    'name' => 'ArchiveJakarta',
    'initials' => 'AJ',
    'badge' => 'PRO VERIFIED',
    'rating' => '4.9',
    'successful_transactions' => 124,
    'city' => 'Jaksel'
];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" xml:lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($page_title, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></title>

    <!-- Google Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&amp;family=Space+Grotesk:wght@500;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <!-- Pure Native Stylesheets (Neo-Brutalisme BaThrift) -->
    <link rel="stylesheet" href="<?= url('/assets/css/katalog.css') ?>" />
    <link rel="stylesheet" href="<?= url('/assets/css/detail-barang.css') ?>" />
</head>
<body>
    <!-- Komponen Header BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/header.php'; ?>

    <!-- Konten Utama Detail Barang -->
    <main class="detail-main">
        <div class="detail-wrapper">
            <!-- SIMULATION CONTROLLER (PREVIEW TESTING BAR) -->
            <div class="sim-controller">
                <div class="sim-info">
                    <span class="sim-tag">MODE PREVIEW</span>
                    <span class="sim-label">Simulasi Tampilan Status Barang:</span>
                </div>
                <div class="sim-buttons" id="state-toggle-group">
                    <button type="button" class="btn-sim-state sim-active" id="btn-state-available">
                        1. Tersedia (Default)
                    </button>
                    <button type="button" class="btn-sim-state" id="btn-state-sold">
                        2. Barang Terjual (Sold)
                    </button>
                    <button type="button" class="btn-sim-state" id="btn-state-owner">
                        3. Milik Sendiri (Owner)
                    </button>
                </div>
            </div>

            <!-- BREADCRUMBS -->
            <nav class="breadcrumb-nav" aria-label="Breadcrumb">
                <a class="breadcrumb-link" href="<?= url('/katalog') ?>">
                    <span class="material-symbols-outlined">storefront</span>
                    <span>Katalog Belanja</span>
                </a>
                <span class="breadcrumb-sep">/</span>
                <a class="breadcrumb-link" href="<?= url('/katalog') ?>">
                    <span><?= htmlspecialchars($product['category'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                </a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">
                    <?= htmlspecialchars($product['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                </span>
            </nav>

            <!-- STATE NOTIFICATION BANNERS -->
            <!-- (Banner State 2: Terjual / Sold) -->
            <div class="state-banner banner-sold is-hidden" id="banner-sold">
                <div class="banner-sold-icon">
                    <span class="material-symbols-outlined font-bold">block</span>
                </div>
                <div>
                    <div class="banner-sold-title">BARANG SUDAH TERJUAL! (HARTA KARUN HABIS)</div>
                    <p class="banner-sold-desc">
                        Harta karun vintage ini sudah diamankan dan dibayar oleh thrift hunter lain. Pantau lapak <?= htmlspecialchars($seller['name'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> untuk restock rilisan berikutnya!
                    </p>
                </div>
            </div>

            <!-- (Banner State 3: Milik Sendiri / Owner) -->
            <div class="state-banner banner-owner is-hidden" id="banner-owner">
                <div class="banner-owner-left">
                    <div class="banner-owner-icon">
                        <span class="material-symbols-outlined">inventory_2</span>
                    </div>
                    <div>
                        <div class="banner-owner-title">&#127991;&#65039; INI POSTINGAN BARANG MILIKMU</div>
                        <p class="banner-owner-desc">
                            Lapak Toko: <strong><?= htmlspecialchars($seller['name'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></strong>. Anda dapat menyunting rincian deskripsi, harga tawar, atau mengarsipkan arsip thrift ini.
                        </p>
                    </div>
                </div>
                <div class="banner-owner-status-badge">
                    STATUS: AKTIF TAYANG
                </div>
            </div>

            <!-- MAIN PRODUCT DETAIL CONTAINER (DUAL-COLUMN LAYOUT) -->
            <div class="product-detail-card">
                <div class="product-detail-grid">
                    <!-- LEFT COLUMN: PRODUCT GALLERY & SELLER CARD -->
                    <div class="gallery-column">
                        <!-- Main Hero Image Frame -->
                        <div class="main-image-viewport">
                            <img id="main-product-img" class="main-product-img" src="<?= htmlspecialchars($product['images'][0]['url'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" alt="<?= htmlspecialchars($product['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" />

                            <!-- Sticker Kondisi (Top-Left) -->
                            <div class="gallery-badge-cond">
                                <span class="material-symbols-outlined icon-defect">report_problem</span>
                                <span><?= htmlspecialchars($product['condition_label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                            </div>

                            <!-- Watermark Keaslian (Top-Right) -->
                            <div class="gallery-badge-auth">
                                <span class="material-symbols-outlined icon-auth">verified</span>
                                <span>VERIFIKASI ASLI</span>
                            </div>

                            <!-- Cap Terjual Overlay (State 2 Active) -->
                            <div class="gallery-sold-stamp is-hidden" id="sold-stamp">
                                <div class="stamp-box">
                                    <span class="stamp-main-text">TERJUAL!</span>
                                    <span class="stamp-sub-text">SOLD OUT &#8226; 24 MENIT LALU</span>
                                </div>
                            </div>

                            <!-- Floating Action Buttons on Image -->
                            <div class="gallery-floating-actions">
                                <button type="button" class="btn-gallery-action" id="btn-zoom-image" title="Perbesar Foto">
                                    <span class="material-symbols-outlined">zoom_in</span>
                                    <span>Perbesar</span>
                                </button>
                                <button type="button" class="btn-gallery-action" id="btn-share-item" title="Bagikan Tautan">
                                    <span class="material-symbols-outlined">share</span>
                                    <span>Bagikan</span>
                                </button>
                            </div>
                        </div>

                        <!-- Thumbnail Strip (4 Slot Detail) -->
                        <!-- LOOP: thumbnails -->
                        <div class="thumbnail-strip">
                            <?php foreach ($product['images'] as $idx => $img): ?>
                                <button type="button" class="thumb-item <?= $idx === 0 ? 'thumb-active' : '' ?>" data-image="<?= htmlspecialchars($img['url'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" data-alt="<?= htmlspecialchars($img['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                                    <img class="thumb-img" src="<?= htmlspecialchars($img['url'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" alt="<?= htmlspecialchars($img['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" loading="lazy" />
                                    <span class="thumb-tag-badge <?= $img['is_minus'] ? 'badge-tag-minus' : '' ?>">
                                        <?= htmlspecialchars($img['tag'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                    </span>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <!-- Seller Profile Card -->
                        <!-- DATA: seller -->
                        <div class="seller-profile-card">
                            <div class="seller-row">
                                <div class="seller-profile-left">
                                    <div class="seller-avatar-badge">
                                        <span><?= htmlspecialchars($seller['initials'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                        <span class="seller-verify-check" title="Terverifikasi">&#10003;</span>
                                    </div>
                                    <div class="seller-meta-info">
                                        <div class="seller-name-row">
                                            <span class="seller-shop-name"><?= htmlspecialchars($seller['name'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            <span class="seller-pro-tag"><?= htmlspecialchars($seller['badge'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                        </div>
                                        <div class="seller-stats-sub">
                                            <span class="seller-rating-star">&#9733; <?= htmlspecialchars($seller['rating'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            <span>&#8226;</span>
                                            <span><?= htmlspecialchars((string)$seller['successful_transactions'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> Transaksi Sukses</span>
                                            <span>&#8226;</span>
                                            <span class="seller-loc-pill">
                                                <span class="material-symbols-outlined">location_on</span>
                                                <span><?= htmlspecialchars($seller['city'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn-visit-shop" href="<?= url('/profil-toko/' . $seller['id']) ?>">
                                    <span>Lihat Toko</span>
                                    <span class="material-symbols-outlined">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: PRODUCT SPECS, PRICE, DEFECT NOTICE & ACTIONS -->
                    <div class="specs-column">
                        <!-- Header Category Tag & Availability -->
                        <div class="category-availability-row">
                            <span class="badge-cat-tag">
                                <?= htmlspecialchars($product['category_tag'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                            </span>
                            <span class="badge-availability avail-ready" id="badge-status-availability">
                                <span class="ping-dot"></span>
                                <span>TERSEDIA (READY)</span>
                            </span>
                        </div>

                        <!-- Product Title -->
                        <h1 class="product-detail-title">
                            <?= htmlspecialchars($product['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                        </h1>

                        <!-- Quick Specifications Badges -->
                        <div class="quick-spec-pills">
                            <span class="spec-pill pill-surface">
                                <?= htmlspecialchars($product['size'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> (P: 68cm &#8226; L: 59cm)
                            </span>
                            <span class="spec-pill pill-minus">
                                KONDISI: <?= htmlspecialchars($product['condition_label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                            </span>
                            <span class="spec-pill pill-surface">
                                USA TAG VINTAGE
                            </span>
                            <span class="spec-pill pill-yellow">
                                &#128293; HANYA 1 PCS (THRIFT ARCHIVE)
                            </span>
                        </div>

                        <!-- Price Section -->
                        <div class="price-display-box">
                            <div class="price-meta">
                                <span class="price-label">Harga Pasaran Arsip:</span>
                                <span class="price-number"><?= htmlspecialchars($product['price_formatted'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                            </div>
                            <div class="badge-nego-tipis">
                                &#128172; BISA NEGO TIPIS
                            </div>
                        </div>

                        <!-- Catatan Minus / Cacat (Transparansi Thrift) -->
                        <!-- LOOP: defects -->
                        <div class="defect-warning-box">
                            <div class="defect-header">
                                <div class="defect-title-group">
                                    <span class="material-symbols-outlined icon-warning">warning</span>
                                    <span>CATATAN MINUS / CACAT (TRANSPARANSI THRIFT)</span>
                                </div>
                                <span class="defect-real-photo-tag">
                                    100% FOTO RIIL TANPA FILTER
                                </span>
                            </div>
                            <ul class="defect-list">
                                <?php foreach ($defects as $defect): ?>
                                    <li class="defect-item">
                                        <span class="defect-bullet">&#8226;</span>
                                        <span>
                                            <strong><?= htmlspecialchars($defect['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></strong>
                                            <?= htmlspecialchars($defect['desc'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Product Description Box -->
                        <div class="product-desc-box">
                            <div class="desc-box-header">
                                <span class="desc-box-title">RINCIAN &amp; RIWAYAT PAKAIAN</span>
                                <span class="desc-code">KODE: <?= htmlspecialchars($product['code'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                            </div>
                            <p class="desc-content">
                                <?= htmlspecialchars($product['description'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                            </p>
                            <!-- LOOP: dimensions -->
                            <div class="dimensions-grid">
                                <?php foreach ($dimensions as $dim): ?>
                                    <div class="dim-pill">
                                        <?= htmlspecialchars($dim, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- ACTION BUTTONS: 1. State Available (Default) -->
                        <div class="actions-container" id="actions-available">
                            <div class="actions-row-grid">
                                <button type="button" class="btn-act-cart" id="btn-add-cart">
                                    <span class="material-symbols-outlined">add_shopping_cart</span>
                                    <span>+ KERANJANG</span>
                                </button>
                                <button type="button" class="btn-act-buy" id="btn-buy-now">
                                    <span class="material-symbols-outlined">bolt</span>
                                    <span>BELI SEKARANG &#9889;</span>
                                </button>
                            </div>
                            <button type="button" class="btn-act-nego" id="btn-open-nego" data-title="<?= htmlspecialchars($product['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" data-price="<?= $product['price'] ?>">
                                <span class="material-symbols-outlined">chat</span>
                                <span>AJUKAN PENAWARAN (NEGO TIPIS DENGAN PENJUAL)</span>
                            </button>
                            <div class="report-item-row">
                                <a class="link-report-item" href="<?= url('/laporan-barang') ?>">
                                    <span class="material-symbols-outlined">flag</span>
                                    <span>Laporkan Barang ini</span>
                                </a>
                            </div>
                        </div>

                        <!-- ACTION BUTTONS: 2. State Sold -->
                        <div class="actions-container is-hidden" id="actions-sold">
                            <div class="actions-row-grid">
                                <button type="button" class="btn-disabled-sold" disabled="disabled">
                                    <span class="material-symbols-outlined">shopping_cart_off</span>
                                    <span>KERANJANG (HABIS)</span>
                                </button>
                                <button type="button" class="btn-disabled-sold" disabled="disabled">
                                    <span class="material-symbols-outlined">block</span>
                                    <span>SUDAH TERJUAL</span>
                                </button>
                            </div>
                            <button type="button" class="btn-alert-similar" id="btn-alert-similar">
                                <span class="material-symbols-outlined">notifications</span>
                                <span>CARI &amp; BERI TAHU SAYA BARANG SERUPA</span>
                            </button>
                        </div>

                        <!-- ACTION BUTTONS: 3. State Owner -->
                        <div class="actions-container is-hidden" id="actions-owner">
                            <div class="owner-panel-tag">
                                Panel Pengaturan Lapak Penjual
                            </div>
                            <div class="actions-row-grid">
                                <button type="button" class="btn-owner-edit" id="btn-owner-edit">
                                    <span class="material-symbols-outlined">edit</span>
                                    <span>&#9999;&#65039; EDIT BARANG</span>
                                </button>
                                <button type="button" class="btn-owner-stats" id="btn-owner-stats">
                                    <span class="material-symbols-outlined">monitoring</span>
                                    <span>&#128202; STATISTIK (412 VIEW)</span>
                                </button>
                            </div>
                            <button type="button" class="btn-owner-delete" id="btn-owner-delete">
                                <span class="material-symbols-outlined">delete</span>
                                <span>&#128465;&#65039; HAPUS POSTINGAN DARI KATALOG</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BUYER PROTECTION & GUARANTEE TRIPLE BADGE -->
            <div class="buyer-protection-grid">
                <!-- Badge 1: Rekber 100% -->
                <div class="protection-card">
                    <div class="protection-icon-box icon-yellow">
                        <span class="material-symbols-outlined">shield</span>
                    </div>
                    <div>
                        <h4 class="protection-title">REKBER AMAN 100%</h4>
                        <p class="protection-desc">Dana ditahan sistem BaThrift hingga barang sampai dan Anda verifikasi kondisinya.</p>
                    </div>
                </div>

                <!-- Badge 2: Baju Dicuci & Steril -->
                <div class="protection-card">
                    <div class="protection-icon-box icon-pink">
                        <span class="material-symbols-outlined">local_laundry_service</span>
                    </div>
                    <div>
                        <h4 class="protection-title">BAJU DICUCI &amp; STERIL</h4>
                        <p class="protection-desc">Deep laundry uap suhu tinggi bebas kuman. Wangi, bersih, siap pakai pamer.</p>
                    </div>
                </div>

                <!-- Badge 3: Pengiriman Cepat -->
                <div class="protection-card">
                    <div class="protection-icon-box icon-blue">
                        <span class="material-symbols-outlined">local_shipping</span>
                    </div>
                    <div>
                        <h4 class="protection-title">PENGIRIMAN H+1 CEPAT</h4>
                        <p class="protection-desc">Kemas kardus ekstra aman dengan bubble wrap ganda dan stiker proteksi.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lightbox Zoom Modal Dialog -->
        <dialog class="zoom-dialog" id="zoom-dialog">
            <div class="zoom-modal-card">
                <div class="zoom-header">
                    <span class="zoom-title">&#128269; PREVIEW RESOLUSI TINGGI</span>
                    <button type="button" class="btn-zoom-close" id="btn-zoom-close">&#10005;</button>
                </div>
                <div class="zoom-body">
                    <img id="zoom-full-img" class="zoom-full-img" src="" alt="Perbesar Gambar" />
                </div>
            </div>
        </dialog>

        <!-- Dialog Modal Nego Tipis -->
        <dialog class="nego-dialog" id="nego-modal">
            <div class="nego-modal-card">
                <div class="nego-header">
                    <div class="nego-title">
                        <span>&#127991;&#65039;</span>
                        <span>NEGO TIPIS BARANG</span>
                    </div>
                    <button type="button" class="nego-btn-close" id="btn-nego-close">&#10005;</button>
                </div>

                <div class="nego-product-preview">
                    <div class="nego-label-tag">PRODUK:</div>
                    <div class="nego-product-name" id="nego-product-name"><?= htmlspecialchars($product['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                    <div class="nego-original-price">
                        Harga Lapak: <strong id="nego-product-price"><?= htmlspecialchars($product['price_formatted'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></strong>
                    </div>
                </div>

                <div class="nego-input-group">
                    <label class="nego-input-label" for="nego-input-amount">TAWARAN HARGA KAMU (RP):</label>
                    <input class="nego-input-field" id="nego-input-amount" name="nego_amount" type="number" placeholder="cth: 1300000" />
                    <p class="nego-hint">* Tips: Seller rata-rata menerima nego dengan potongan 5% - 15%.</p>
                </div>

                <div class="nego-modal-actions">
                    <button type="button" class="btn-nego-submit" id="btn-nego-submit">
                        KIRIM TAWARAN &#10140;
                    </button>
                    <button type="button" class="btn-nego-cancel" id="btn-nego-cancel">
                        BATAL
                    </button>
                </div>
            </div>
        </dialog>

        <!-- Feedback Toast Banner Floating -->
        <div class="toast-container" id="action-toast">
            <div class="toast-box">
                <span class="material-symbols-outlined toast-icon">check_circle</span>
                <span class="toast-text" id="toast-message">BARANG DITAMBAHKAN!</span>
            </div>
        </div>
    </main>

    <!-- Komponen Footer BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/footer.php'; ?>

    <!-- JavaScript Interaktif DOM -->
    <script src="<?= url('/assets/js/detail-barang.js') ?>"></script>
</body>
</html>
