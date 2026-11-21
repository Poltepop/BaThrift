<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

// Memuat fungsi url() dari Core Router jika belum tersedia
if (!function_exists('url')) {
    require_once __DIR__ . '/../../Core/Router.php';
}

// Memuat Komponen
require_once __DIR__ . '/../components/card.php';

// DATA: Variabel kontrol halaman & filter
$page_title = 'Katalog Belanja - BaThrift';
$active_nav = 'belanja';
$cart_count = 3;

// DATA: Daftar produk dummy (8 produk terkurasi)
$products = [
    [
        'id' => 1,
        'title' => 'Detroit Duck Canvas Jacket J97 Tan',
        'brand' => 'CARHARTT WORKWEAR',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDs90M0Nx7C0wHJf3k-5DAcPbckcHRuJsQAG7lOJ_kyHRiGDNNd57Bs9ncVJfTYoFEYwThFdHwgz8PCxAeWJcIPH-2FyZzW37EJWXo7IMT6CetjA-TkT2zpdLJwH6OnmlyNFAptJai5_KEFUfcqTaoT11vNduMkaq-VaZeQpCysaN_mpamSfMQ2BNtkau1rq4j2bRQ7gqXcvPXDrJbZ3CIVDchYhnSXSZE-HDcoeTk',
        'alt' => 'Detroit Duck Canvas Jacket J97 Tan',
        'condition' => 'mint',
        'condition_label' => 'Seperti Baru',
        'size' => 'SIZE L',
        'price' => 1450000,
        'price_formatted' => 'Rp 1.450.000',
        'specs' => ['P: 68cm', 'L: 59cm'],
        'seller' => [
            'name' => 'ArchiveJakarta',
            'initials' => 'AJ',
            'city' => 'Jakarta Selatan',
            'verified' => true
        ],
        'is_sold' => false
    ],
    [
        'id' => 2,
        'title' => 'Nirvana In Utero 1993 Single Stitch Tee',
        'brand' => 'GIANT / BROCKUM TAG',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuChhH2WKKUqU5j49t5FsS71NFtIwP1kx8dOejdwU4arhUAvFrDR2HoKDI8ISRZunIWCD47myXm4Efv7dDgSm6dbWhGGKsklQKSFtTh2za-gPWah6NRx6z3z-xWqtr7N6o9iszm6hwAYU9iRLOAR4YIosmNPr-2grsAUh1I-PcqDknUZMb1SYh3T9WpJ_fnqs_rvn8wnf9KKuZDJPKuN0z9cMbM83_DjM17m5VgwiNc',
        'alt' => 'Nirvana In Utero 1993 Single Stitch Tee',
        'condition' => 'good',
        'condition_label' => 'Baik (8.5/10)',
        'size' => 'SIZE XL',
        'price' => 890000,
        'price_formatted' => 'Rp 890.000',
        'specs' => ['P: 74cm', 'L: 58cm'],
        'seller' => [
            'name' => 'BandungThriftGod',
            'initials' => 'BG',
            'city' => 'Kota Bandung',
            'verified' => true
        ],
        'is_sold' => false
    ],
    [
        'id' => 3,
        'title' => "Levi's 501 Selvedge Big E Redline USA",
        'brand' => 'LEVI STRAUSS &amp; CO.',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA9rerCZnJelJn4-rqP7gRjr7StlWaIq1UG7I7-PvvNZWWYcIFg9hMDlLS132So1kiZQ9BrWbuBMBrvjJQ4HOC1z9_aOu_251vs2KYzoJSFL-Hh0mG1JKRG8jP-mWE6hno30JisXu-iWqLATerONZ0tyVv6zcpVFnTY5o13f2QJU8TrmEmMjKf3e49kZXwBO6t95LniDkDbZVZm452MxnuKh3gt8Zc6n8DUEbVNpYA',
        'alt' => "Levi's 501 Selvedge Big E Redline USA",
        'condition' => 'sold',
        'condition_label' => 'TERJUAL',
        'size' => 'SIZE 32',
        'price' => 110000,
        'price_formatted' => 'Rp 1.100.000',
        'specs' => ['W: 32', 'L: 34', 'Chainstitch'],
        'seller' => [
            'name' => 'KoleksiOpa',
            'initials' => 'KO',
            'city' => 'Yogyakarta',
            'verified' => false
        ],
        'is_sold' => true
    ],
    [
        'id' => 4,
        'title' => 'Stussy Fuzzy Dice Knit Jacquard Ivory',
        'brand' => 'STUSSY TRIBE',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBdm-g0H6wE_E91HKCDLvTBZCzHERX1q4sJIMcp5943UD122p4iftN2pOeT4MFQNixoNfCIVkVL0sbLxQq0e6OyiOra3FBXgwB3vHYKs3eld3sGUsFJGouAy1oOYSLhBYAfrmE_t_v0QXxPIwiLAUIM232BlTcUI8lncfuHDw6nz_2YBgF5V75UCqdigXjbcEEmtLrxusd6dmW-nyEnr22jyCdpZ8D6_o0BxB0P4-4',
        'alt' => 'Stussy Fuzzy Dice Knit Jacquard Ivory',
        'condition' => 'mint',
        'condition_label' => 'Seperti Baru',
        'size' => 'SIZE M',
        'price' => 1150000,
        'price_formatted' => 'Rp 1.150.000',
        'specs' => ['P: 66cm', 'L: 56cm', 'Full Tag'],
        'seller' => [
            'name' => 'VintageSub',
            'initials' => 'VS',
            'city' => 'Surabaya',
            'verified' => true
        ],
        'is_sold' => false
    ],
    [
        'id' => 5,
        'title' => 'Nike Dunk Low Varsity Green 2021',
        'brand' => 'NIKE SPORTSWEAR',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBOzkWB6ApSK0QjK-_Y4oJibXLvEcGVmn9VyKzeOBQUU6QpDr2d_Lvm3hX4xr8CFsRLyvLatctu-1CeGormtCiBaig5IPqQhOxUi5FFw8xN3AwKvZSqC8OXndrkWbY3IysfBNYG6Lji5jKPDKHfzn3LK0COZX0xUez0oxVt8bfEHdOv0xbsehVyEfMLHbzYTiNfcCvEnXXFHZ_rzqC8klzLEJXT7uRdGsCQnz_fsw8',
        'alt' => 'Nike Dunk Low Varsity Green 2021',
        'condition' => 'minus',
        'condition_label' => 'Minus Box',
        'size' => 'EUR 42.5',
        'price' => 720000,
        'price_formatted' => 'Rp 720.000',
        'specs' => ['US 9 / 27cm', 'Rep Box'],
        'seller' => [
            'name' => 'SneakerPasar',
            'initials' => 'SP',
            'city' => 'Tangerang',
            'verified' => true
        ],
        'is_sold' => false
    ],
    [
        'id' => 6,
        'title' => 'Dickies 874 Original Workpants Dark Navy',
        'brand' => 'DICKIES SKATE',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCWizZYo1DCdOzMR4LcqkEr2jmqYopXplcj3IzuHvrjyrRO_9vKTE0WTjyudU9te9dfrQpqIcKS6HcEgwuvmz6eOTFDuSUelV-U-rYZTK6NzsczuYsMNw5Bod1mvYCcir3PNZvM9w3X4J4fjKdl4c_nfmc-UGtssnklcWd-7PN0YiBx77fwYDaSzYlpiJLmBNLpbnfx1-hZ0tNRQIoW1f9Th_J3b0YNuqQqLLTdU6k',
        'alt' => 'Dickies 874 Original Workpants Dark Navy',
        'condition' => 'good',
        'condition_label' => 'Baik (8/10)',
        'size' => 'SIZE 30',
        'price' => 320000,
        'price_formatted' => 'Rp 320.000',
        'specs' => ['W: 30', 'L: 30', 'No Alteration'],
        'seller' => [
            'name' => 'LapakRojak',
            'initials' => 'LR',
            'city' => 'Semarang',
            'verified' => true
        ],
        'is_sold' => false
    ],
    [
        'id' => 7,
        'title' => 'Harley Davidson 3D Emblem Eagle 1996',
        'brand' => 'HARLEY MOTORCYCLES',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA4HCaB0LiGkXKvUwIGGG2SMqQqeednU-5CCtz7-am6i4ZwZmJ0hUcGJDYFR18AhU3Ty_1BfJ0xgwmK5ux8ONz8p1KzfmJoeP55-tyJlHagxD0QAYislK_9YhnBfA1wG9thl7AJ6534oGZ1fqcWmN_sH8JIobsg6X8KjXPfQXY3TzGUhbItY-rYCTaQnxIY9vtWca3_cXjBfUQJokRVz79uGdm-AKEqiyROEkB9SOI',
        'alt' => 'Harley Davidson 3D Emblem Eagle 1996',
        'condition' => 'mint',
        'condition_label' => 'Seperti Baru',
        'size' => 'SIZE XL',
        'price' => 650000,
        'price_formatted' => 'Rp 650.000',
        'specs' => ['P: 73cm', 'L: 60cm', 'USA Tag'],
        'seller' => [
            'name' => 'BikersThrift',
            'initials' => 'BT',
            'city' => 'Bekasi',
            'verified' => true
        ],
        'is_sold' => false
    ],
    [
        'id' => 8,
        'title' => 'Vintage Indigo Sashiko Haori Outerwear',
        'brand' => 'JAPANESE ARCHIVE',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCX6KzLgOCz10R1s33CBzd4mR7MuIoxrKnYNnljdXZWf2ETB-Vvm0aKqqBg5oWh81xWhj34E5U7iTxUo4EXdOW5R0ZR47df8nRxwRjDDyCKp_yISgSzWlIL1WJGYVBLLBbiV9KIoMK8i9RsiH4_vBegtHOgFwAtjSNue2udHGIhHPHWOxDxPpj3vSmFb0DbfSNt8dgk-e9erVJ-iuos1_pOIdalbj3k_XHDwOhPYnI',
        'alt' => 'Vintage Indigo Sashiko Haori Outerwear',
        'condition' => 'mint',
        'condition_label' => 'Seperti Baru',
        'size' => 'FREE SIZE',
        'price' => 480000,
        'price_formatted' => 'Rp 480.000',
        'specs' => ['P: 80cm', 'L: Oversized', '100% Cotton'],
        'seller' => [
            'name' => 'KoleksiOpa',
            'initials' => 'KO',
            'city' => 'Yogyakarta',
            'verified' => true
        ],
        'is_sold' => false
    ]
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

    <!-- Pure Native Stylesheet (Neo-Brutalisme BaThrift) -->
    <link rel="stylesheet" href="<?= url('/assets/css/katalog.css') ?>" />
</head>
<body>
    <!-- Komponen Header BaThrift -->
    <?php require __DIR__ . '/../components/header.php'; ?>

    <!-- Konten Utama Katalog -->
    <main class="katalog-main">
        <!-- Ticker Marquee Strip -->
        <!-- <div class="ticker-marquee">
            <div class="marquee-content">
                <span class="marquee-item">&#128293; DROP CURATED SETIAP HARI</span>
                <span class="marquee-bullet">&#8226;</span>
                <span class="marquee-item">&#128230; REKBER 100% AMAN &#8226; GARANSI ASLI</span>
                <span class="marquee-bullet">&#8226;</span>
                <span class="marquee-item">&#127991;&#65039; NEGO TIPIS LANGSUNG DENGAN SELLER</span>
                <span class="marquee-bullet">&#8226;</span>
                <span class="marquee-item">&#9889; P2P THRIFT STREETWEAR NO. 1 DI INDONESIA</span>
                <span class="marquee-bullet">&#8226;</span>
                <span class="marquee-item">&#128293; DROP CURATED SETIAP HARI</span>
                <span class="marquee-bullet">&#8226;</span>
                <span class="marquee-item">&#128230; REKBER 100% AMAN</span>
                <span class="marquee-bullet">&#8226;</span>
                <span class="marquee-item">&#127991;&#65039; NEGO TIPIS LANGSUNG DENGAN SELLER</span>
            </div>
        </div> -->

        <div class="katalog-wrapper">
            <!-- Hero Banner Container -->
            <section class="hero-banner">
                <!-- Background Grid Dekoratif -->
                <div class="hero-grid-pattern"></div>

                <!-- Tagline Atas -->
                <div class="hero-top-badges">
                    <span class="hero-badge-tag">
                        <span class="material-symbols-outlined icon-fire">local_fire_department</span>
                        <span>PASAR LOAK DIGITAL INDONESIA</span>
                    </span>
                    <span class="hero-badge-rotate">
                        KURASI HARIAN &#8226; 100% ASLI
                    </span>
                </div>

                <div class="hero-content">
                    <h1 class="hero-title">
                        TEMUKAN HARTA KARUN <span class="hero-sticker">PRELOVED</span>
                    </h1>
                    <p class="hero-desc">
                        Arsip streetwear vintage, denim langka, dan rilisan Y2K terbaik langsung dari lemari thrift hunter se-Indonesia. Rekber resmi, bebas was-was.
                    </p>
                </div>

                <!-- Formulir Pencarian Utama -->
                <div class="hero-search-container">
                    <form class="hero-search-form" id="search-form" action="" method="post">
                        <div class="search-input-group">
                            <span class="material-symbols-outlined search-icon">search</span>
                            <input class="search-input" id="main-search-input" name="keyword" type="text" placeholder="Cari nama barang, brand (cth: Carhartt, Stussy, Levi&apos;s), atau seller..." />
                        </div>
                        <button class="btn-search-submit" type="submit">
                            <span>Cari Barang</span>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </form>
                </div>

                <!-- Tag Tren Pencarian -->
                <div class="hero-trending-tags">
                    <span class="trending-label">
                        <span class="material-symbols-outlined">trending_up</span>
                        <span>TREN DICARI:</span>
                    </span>
                    <button type="button" class="tag-pill tag-white" data-tag="#VINTAGETEE">#VINTAGETEE</button>
                    <button type="button" class="tag-pill tag-pink" data-tag="#CARHARTTJACKET">#CARHARTTJACKET</button>
                    <button type="button" class="tag-pill tag-blue" data-tag="#LEVIS501">#LEVIS501</button>
                    <button type="button" class="tag-pill tag-yellow" data-tag="#Y2KHOODIE">#Y2KHOODIE</button>
                    <button type="button" class="tag-pill tag-white" data-tag="#CORPCORE">#CORPCORE</button>
                </div>
            </section>

            <!-- Bagian Kontrol Filter -->
            <section class="filter-section">
                <!-- Baris Atas: Kategori & Tombol Reset -->
                <div class="filter-top-row">
                    <div class="category-group">
                        <div class="filter-label-group">
                            <span class="material-symbols-outlined">tune</span>
                            <span>KATEGORI:</span>
                        </div>
                        <div class="category-chips-list" id="category-chips">
                            <button type="button" class="category-chip chip-active">Semua</button>
                            <button type="button" class="category-chip">Atasan</button>
                            <button type="button" class="category-chip">Bawahan</button>
                            <button type="button" class="category-chip">Outer</button>
                            <button type="button" class="category-chip">Dress</button>
                            <button type="button" class="category-chip">Sepatu</button>
                            <button type="button" class="category-chip">Aksesori</button>
                        </div>
                    </div>

                    <button type="button" class="btn-reset-filters" id="btn-reset-filters">
                        <span class="material-symbols-outlined">restart_alt</span>
                        <span>RESET FILTER</span>
                    </button>
                </div>

                <!-- Baris Bawah: Ukuran, Kondisi, Urutan -->
                <div class="filter-bottom-row">
                    <!-- Filter Ukuran -->
                    <div class="subfilter-item">
                        <span class="subfilter-label">UKURAN:</span>
                        <div class="subfilter-chips">
                            <button type="button" class="size-chip" data-size="S">S</button>
                            <button type="button" class="size-chip" data-size="M">M</button>
                            <button type="button" class="size-chip size-active" data-size="L">L</button>
                            <button type="button" class="size-chip" data-size="XL">XL</button>
                            <button type="button" class="size-chip" data-size="ALL">ALL SIZE</button>
                        </div>
                    </div>

                    <!-- Filter Kondisi -->
                    <div class="subfilter-item">
                        <span class="subfilter-label">KONDISI:</span>
                        <div class="subfilter-chips">
                            <button type="button" class="cond-chip" data-cond="mint">
                                <span class="cond-indicator ind-mint"></span>
                                <span>Seperti Baru</span>
                            </button>
                            <button type="button" class="cond-chip" data-cond="good">
                                <span class="cond-indicator ind-good"></span>
                                <span>Baik</span>
                            </button>
                            <button type="button" class="cond-chip" data-cond="minus">
                                <span class="cond-indicator ind-minus"></span>
                                <span>Ada Minus</span>
                            </button>
                        </div>
                    </div>

                    <!-- Urutkan Sort Dropdown -->
                    <div class="sort-container">
                        <span class="subfilter-label">URUTKAN:</span>
                        <div class="sort-select-wrapper">
                            <select class="sort-select" id="sort-select" name="sort">
                                <option value="newest">Paling Baru Diunggah</option>
                                <option value="price-low">Harga Terendah</option>
                                <option value="price-high">Harga Tertinggi</option>
                                <option value="popular">Paling Populer &#128293;</option>
                            </select>
                            <span class="material-symbols-outlined sort-arrow-icon">expand_more</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sub-bar Status Hasil & Tombol Mock Empty State -->
            <div class="results-subbar">
                <div class="results-count">
                    <span class="count-square"></span>
                    <span id="results-count-text">Menampilkan 8 dari 184 Harta Karun Terkurasi</span>
                </div>
                <div>
                    <button type="button" class="btn-toggle-empty" id="btn-toggle-empty">
                        [Tes Kondisi Kosong / Nihil]
                    </button>
                </div>
            </div>

            <!-- Product Grid: 4 Kolom Desktop, 2 Kolom Mobile -->
            <!-- LOOP: products -->
            <div class="product-grid" id="product-grid">
                <?php foreach ($products as $product): ?>
                    <?php renderProductCard($product); ?>
                <?php endforeach; ?>
            </div>

            <!-- Tampilan Kosong (Empty State - disembunyikan secara default) -->
            <div class="empty-state-view is-hidden" id="empty-state-view">
                <div class="empty-state-content">
                    <div class="empty-state-icon-box">
                        <span class="material-symbols-outlined search-off-icon">search_off</span>
                    </div>
                    <span class="empty-badge-pill">KOSONG BRO &#8226; TIDAK ADA HASIL</span>
                    <h2 class="empty-title">WADUH! BARANG TIDAK DITEMUKAN</h2>
                    <p class="empty-desc">
                        Kata kunci atau kombinasi filtermu belum ada di lapak manapun saat ini. Coba ganti kata kunci pencarian atau reset filter untuk kembali melihat harta karun lainnya.
                    </p>
                    <div class="empty-actions">
                        <button type="button" class="btn-empty-reset" id="btn-reset-empty">
                            RESET SEMUA FILTER
                        </button>
                        <button type="button" class="btn-empty-alert" id="btn-wish-alert">
                            <span class="material-symbols-outlined">notifications_active</span>
                            <span>PASANG WISH-ALERT (NOTIF)</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigasi Halaman (Pagination) -->
            <nav class="pagination-nav" aria-label="Navigasi Halaman">
                <div class="pagination-info">
                    HALAMAN 1 DARI 16 &#8226; <span class="info-dim">TOTAL 184 HARTA KARUN</span>
                </div>
                <div class="pagination-controls">
                    <button type="button" class="page-btn-nav" disabled="disabled">
                        <span class="material-symbols-outlined">chevron_left</span>
                        <span>SEBELUMNYA</span>
                    </button>
                    <button type="button" class="page-btn page-active">1</button>
                    <button type="button" class="page-btn">2</button>
                    <button type="button" class="page-btn">3</button>
                    <span class="page-ellipsis">&#8230;</span>
                    <button type="button" class="page-btn">16</button>
                    <button type="button" class="page-btn-nav page-btn-next">
                        <span>SELANJUTNYA</span>
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </nav>

            <!-- Strip Jaminan & Keamanan (Guarantee Callout Strip) -->
            <section class="guarantee-strip">
                <div class="guarantee-item">
                    <div class="guarantee-icon-box icon-box-yellow">
                        <span class="material-symbols-outlined">security</span>
                    </div>
                    <div>
                        <h4 class="guarantee-title">100% REKBER BATHRIFT</h4>
                        <p class="guarantee-desc">Uang pembeli hanya cair ke penjual setelah paket mendarat dan diverifikasi pembeli.</p>
                    </div>
                </div>

                <div class="guarantee-item">
                    <div class="guarantee-icon-box icon-box-pink">
                        <span class="material-symbols-outlined">verified_user</span>
                    </div>
                    <div>
                        <h4 class="guarantee-title">JAMINAN KEASLIAN</h4>
                        <p class="guarantee-desc">Foto detail tag, jahitan tunggal (single stitch), dan minus difoto transparan tanpa filter.</p>
                    </div>
                </div>

                <div class="guarantee-item">
                    <div class="guarantee-icon-box icon-box-blue">
                        <span class="material-symbols-outlined">handshake</span>
                    </div>
                    <div>
                        <h4 class="guarantee-title">FITUR NEGO TIPIS</h4>
                        <p class="guarantee-desc">Ajukan tawaran langsung ke seller. Tawar santai, deal tercapai langsung bungkus!</p>
                    </div>
                </div>
            </section>
        </div>

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
                    <div class="nego-product-name" id="nego-product-name">Carhartt Detroit Jacket</div>
                    <div class="nego-original-price">
                        Harga Lapak: <strong id="nego-product-price">Rp 1.450.000</strong>
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

    <!-- Komponen Footer BaThrift -->
    <?php require_once __DIR__ . '/../components/footer.php'; ?>

    <!-- JavaScript Interaktif DOM -->
    <script src="<?= url('/assets/js/katalog.js') ?>"></script>
</body>
</html>
