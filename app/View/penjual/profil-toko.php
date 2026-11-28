<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

if (!function_exists('url')) {
    require_once __DIR__ . '/../../Core/Router.php';
}

require_once __DIR__ . '/../components/card.php';

$active_nav = '';
$cart_count = $cart_count ?? 0;

$store = $model['store'] ?? [];
$storeName = $store['name'] ?? 'Toko BaThrift';
$storeSlug = $store['slug'] ?? '';
$storeDesc = $store['description'] ?? 'Kurasi preloved &amp; streetwear terpercaya di ekosistem Rekber BaThrift.';
$storeInitials = $model['storeInitials'] ?? 'TH';
$locationLabel = $model['locationLabel'] ?? 'Indonesia';
$city = $model['city'] ?? 'Indonesia';
$stats = $model['stats'] ?? ['ready_count' => 0, 'sold_count' => 0, 'total_count' => 0];
$products = $model['products'] ?? [];
$categories = $model['categories'] ?? [];
$joinedAt = !empty($store['created_at']) ? date('M Y', strtotime($store['created_at'])) : '2025';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" xml:lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($model['title'] ?? ($storeName . ' - BaThrift'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?></title>

    <!-- Google Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&amp;family=Space+Grotesk:wght@500;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <!-- Pure Native Stylesheets (Neo-Brutalisme BaThrift) -->
    <link rel="stylesheet" href="<?= url('/assets/css/katalog.css') ?>" />
    <link rel="stylesheet" href="<?= url('/assets/css/profil-toko.css') ?>?v=<?= filemtime(__DIR__ . '/../../../assets/css/profil-toko.css') ?>" />
</head>

<body>
    <!-- Komponen Header BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/header.php'; ?>

    <main class="toko-main">
        <div class="toko-wrapper">
            <!-- Hero Banner Profil Toko -->
            <section class="shop-hero-card">
                <div class="shop-hero-cover">
                    <div class="cover-top-row">
                        <div class="cover-badges-left">
                            <span class="badge-neo badge-neo-green">
                                <span class="material-symbols-outlined">verified</span>
                                <span>PRO VERIFIED SELLER</span>
                            </span>
                            <span class="badge-neo badge-neo-yellow">
                                <span class="material-symbols-outlined">star</span>
                                <span>REKBER AMAN 100%</span>
                            </span>
                        </div>
                        <div class="badge-neo badge-neo-white">
                            <span class="material-symbols-outlined">location_on</span>
                            <span><?= htmlspecialchars($locationLabel, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                        </div>
                    </div>
                    <div class="cover-bottom-row">
                        <div class="badge-neo badge-neo-pink">
                            <span>EST. <?= htmlspecialchars($joinedAt, ENT_QUOTES | ENT_XML1, 'UTF-8') ?> &#8226; CURATED THRIFT ARCHIVE</span>
                        </div>
                        <div class="badge-neo badge-neo-white">
                            <span>bathrift.id/toko/<?= htmlspecialchars($storeSlug, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                        </div>
                    </div>
                </div>

                <div class="shop-identity-body">
                    <div class="shop-identity-top">
                        <div class="shop-identity-left">
                            <div class="shop-avatar-wrap">
                                <div class="shop-avatar-frame">
                                    <div class="shop-avatar-inner">
                                        <span class="shop-avatar-initials"><?= htmlspecialchars($storeInitials, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                        <span class="shop-avatar-tag"><?= htmlspecialchars($city, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                    </div>
                                </div>
                                <div class="shop-avatar-verified" title="Terverifikasi Resmi">
                                    <span class="material-symbols-outlined">check_circle</span>
                                </div>
                            </div>

                            <div class="shop-title-area">
                                <div class="shop-name-row">
                                    <h1 class="shop-name-heading"><?= htmlspecialchars($storeName, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></h1>
                                    <span class="shop-tagline-sticker">CURATED THRIFT STORE</span>
                                </div>
                                <p class="shop-description">
                                    <?= htmlspecialchars($storeDesc !== '' ? $storeDesc : 'Lapak kurasi barang preloved &amp; streetwear original.', ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                </p>
                            </div>
                        </div>

                        <div class="shop-actions-col">
                            <div class="shop-cta-row">
                                <button type="button" class="btn-shop-follow" id="followBtn">
                                    <span class="material-symbols-outlined">add_circle</span>
                                    <span id="followText">+ IKUTI TOKO</span>
                                </button>
                                <button type="button" class="btn-shop-secondary" id="shareShopBtn" title="Bagikan Lapak">
                                    <span class="material-symbols-outlined">share</span>
                                    <span>BAGIKAN</span>
                                </button>
                            </div>
                            <div class="rekber-guarantee-box">
                                <span class="material-symbols-outlined">verified_user</span>
                                <div>
                                    <div class="rekber-guarantee-title">REKBER BATHRIFT AKTIF</div>
                                    <div class="rekber-guarantee-sub">Uang diteruskan setelah barang tiba &amp; dicek</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 5 Metric Stat Cards -->
                    <div class="shop-stats-grid">
                        <div class="shop-stat-card">
                            <div class="shop-stat-top">
                                <span>READY STOCK</span>
                                <span class="toko-live-dot"></span>
                            </div>
                            <div class="shop-stat-value"><?= htmlspecialchars((string) $stats['ready_count'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> <span class="shop-stat-unit">ITEMS</span></div>
                            <div class="shop-stat-sub">Koleksi Siap Kirim</div>
                        </div>
                        <div class="shop-stat-card">
                            <div class="shop-stat-top">
                                <span>SUDAH TERJUAL</span>
                                <span class="material-symbols-outlined">sell</span>
                            </div>
                            <div class="shop-stat-value"><?= htmlspecialchars((string) $stats['sold_count'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> <span class="shop-stat-unit">ITEMS</span></div>
                            <div class="shop-stat-sub">Arsip Terjual Habis</div>
                        </div>
                        <div class="shop-stat-card">
                            <div class="shop-stat-top">
                                <span>TOTAL ETALASE</span>
                                <span class="material-symbols-outlined">inventory_2</span>
                            </div>
                            <div class="shop-stat-value"><?= htmlspecialchars((string) $stats['total_count'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> <span class="shop-stat-unit">ITEMS</span></div>
                            <div class="shop-stat-sub">Total Produk Terdaftar</div>
                        </div>
                        <div class="shop-stat-card">
                            <div class="shop-stat-top">
                                <span>LOKASI LAPAK</span>
                                <span class="material-symbols-outlined">local_shipping</span>
                            </div>
                            <div class="shop-stat-value"><?= htmlspecialchars($city, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                            <div class="shop-stat-sub">Asal Pengiriman</div>
                        </div>
                        <div class="shop-stat-card">
                            <div class="shop-stat-top">
                                <span>BERGABUNG SEJAK</span>
                                <span class="material-symbols-outlined">calendar_today</span>
                            </div>
                            <div class="shop-stat-value"><?= htmlspecialchars($joinedAt, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                            <div class="shop-stat-sub">Rekan Rekber BaThrift</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Toolbar Filter & Search -->
            <section class="shop-toolbar-card">
                <div class="toolbar-top-row">
                    <div class="status-tabs-row" id="filterStatusContainer">
                        <button type="button" class="btn-status-tab is-active" data-status="all">
                            SEMUA (<?= htmlspecialchars((string) $stats['total_count'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>)
                        </button>
                        <button type="button" class="btn-status-tab" data-status="ready">
                            TERSEDIA (<?= htmlspecialchars((string) $stats['ready_count'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>)
                        </button>
                        <button type="button" class="btn-status-tab" data-status="sold">
                            TERJUAL (<?= htmlspecialchars((string) $stats['sold_count'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>)
                        </button>
                    </div>

                    <div class="shop-search-wrap">
                        <span class="material-symbols-outlined shop-search-icon">search</span>
                        <input class="shop-search-input" id="shopSearchInput" type="text" placeholder="Cari di etalase <?= htmlspecialchars($storeName, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>..." />
                    </div>
                </div>

                <div class="toolbar-bottom-row">
                    <div class="toolbar-select-group">
                        <select class="toolbar-select" id="categoryFilter">
                            <option value="all">Semua Kategori (Etalase)</option>
                            <?php foreach ($categories as $catSlug => $catLabel): ?>
                                <option value="<?= htmlspecialchars($catSlug, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                                    <?= htmlspecialchars($catLabel, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select class="toolbar-select" id="priceFilter">
                            <option value="all">Semua Rentang Harga</option>
                            <option value="under-500">&lt; Rp 500.000</option>
                            <option value="500-1500">Rp 500.000 - Rp 1.500.000</option>
                            <option value="over-1500">&gt; Rp 1.500.000</option>
                        </select>
                    </div>

                    <div>
                        <select class="toolbar-select" id="sortSelector">
                            <option value="newest">Terbaru Ditambahkan</option>
                            <option value="price-asc">Harga Terendah</option>
                            <option value="price-desc">Harga Tertinggi</option>
                        </select>
                    </div>
                </div>
            </section>

            <!-- Etalase Produk (Menggunakan Reusable renderProductCard() Component) -->
            <section>
                <div class="catalog-section-header">
                    <div class="catalog-title-group">
                        <span class="catalog-eyebrow">ETALASE KOLEKSI</span>
                        <h2 class="catalog-heading">KATALOG RESMI LAPAK</h2>
                    </div>
                    <span class="catalog-count-label" id="productCountLabel">Menampilkan <?= count($products) ?> Produk</span>
                </div>

                <div class="shop-product-grid" id="productGrid">
                    <?php foreach ($products as $index => $product): ?>
                        <div class="shop-product-item"
                             data-order="<?= (int) $index ?>"
                             data-status="<?= !empty($product['is_sold']) ? 'sold' : 'ready' ?>"
                             data-category="<?= htmlspecialchars($product['category_slug'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                             data-price="<?= (int) $product['price'] ?>"
                             data-title="<?= htmlspecialchars($product['title'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                            <?php renderProductCard($product); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="empty-shop-state <?= !empty($products) ? 'is-hidden' : '' ?>" id="emptySearchState">
                    <span class="material-symbols-outlined empty-shop-icon">inventory_2</span>
                    <h3 class="empty-shop-title">Belum Ada Produk yang Ditampilkan</h3>
                    <p class="empty-shop-desc">
                        Belum ada produk pada etalase ini atau tidak ada item yang cocok dengan filter pencarianmu.
                    </p>
                    <button type="button" class="btn-reset-filter" id="btnResetFilters">Reset Semua Filter</button>
                </div>
            </section>

            <!-- Catatan Ketentuan Lapak -->
            <section class="shop-rules-card">
                <div class="shop-rules-header">
                    <div class="shop-rules-title-group">
                        <span class="shop-rules-badge">RULES &amp; FAQ</span>
                        <h2 class="shop-rules-title">KETENTUAN TRANSAKSI LAPAK <?= htmlspecialchars($storeName, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></h2>
                    </div>
                </div>

                <div class="shop-rules-grid">
                    <article class="shop-rule-box">
                        <div class="shop-rule-head">
                            <span class="shop-rule-num rule-num-yellow">1</span>
                            <span>Jadwal Ekspedisi &amp; Kirim</span>
                        </div>
                        <p class="shop-rule-desc">
                            Paket diproses dari <strong><?= htmlspecialchars($locationLabel, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></strong> dengan sistem resi terlacak melalui Rekening Bersama BaThrift.
                        </p>
                    </article>

                    <article class="shop-rule-box">
                        <div class="shop-rule-head">
                            <span class="shop-rule-num rule-num-pink">2</span>
                            <span>Kejujuran Kondisi Item</span>
                        </div>
                        <p class="shop-rule-desc">
                            Detail ukuran dan minus produk dijelaskan secara terbuka pada halaman detail barang sebelum checkout.
                        </p>
                    </article>

                    <article class="shop-rule-box">
                        <div class="shop-rule-head">
                            <span class="shop-rule-num rule-num-green">3</span>
                            <span>Proteksi Rekber BaThrift</span>
                        </div>
                        <p class="shop-rule-desc">
                            Dana pembayaran ditahan sementara oleh BaThrift dan diteruskan ke penjual setelah barang dikonfirmasi tiba dengan aman.
                        </p>
                    </article>
                </div>

                <div class="shop-trust-strip">
                    <div>
                        <div class="shop-trust-title">KODE VERIFIKASI TOKO: #BATHRIFT-STORE-<?= htmlspecialchars((string) ($store['id'] ?? '0'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                        <div class="shop-trust-sub">Terdaftar resmi di platform BaThrift sejak <?= htmlspecialchars($joinedAt, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Toast Feedback Banner -->
        <div class="toko-toast-banner is-hidden" id="toast-profil-toko">
            <div class="toko-toast-box">
                <span class="material-symbols-outlined">check_circle</span>
                <span id="toko-toast-message">TAUTAN TOKO BERHASIL DISALIN!</span>
            </div>
        </div>
    </main>

    <!-- Komponen Footer BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/footer.php'; ?>

    <!-- JavaScript Interaktif DOM -->
    <script src="<?= url('/assets/js/profil-toko.js') ?>?v=<?= filemtime(__DIR__ . '/../../../assets/js/profil-toko.js') ?>"></script>
</body>

</html>
