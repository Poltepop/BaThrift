<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

// Memuat fungsi url() dari Core Router jika belum tersedia
if (!function_exists('url')) {
    require_once __DIR__ . '/../../Core/Router.php';
}

// Memuat Komponen Reusable
require_once __DIR__ . '/../components/input.php';

// DATA: Variabel kontrol halaman & navigasi
$page_title = 'Buka Toko (Become a Seller) - BaThrift';
$active_nav = 'jual';
$cart_count = 3;

// DATA: Informasi pengguna aktif (untuk catatan satu akun)
$user = $model['user'] ?? ($_SESSION['user'] ?? []);

// DATA: Nilai lama input form (jika ada validasi server / reload)
$old_nama_toko = $model['old']['nama_toko'] ?? '';
$old_slug_toko = $model['old']['slug_toko'] ?? 'nama-toko-kamu';
$old_deskripsi = $model['old']['deskripsi_toko'] ?? '';
$old_kota_asal = $model['old']['kota_asal'] ?? '';
$errors = $model['errors'] ?? [];


// DATA: Daftar kota asal pengiriman
$kota_list = [
    ['value' => 'Jakarta Selatan, DKI Jakarta', 'label' => 'Jakarta Selatan, DKI Jakarta'],
    ['value' => 'Jakarta Barat, DKI Jakarta', 'label' => 'Jakarta Barat, DKI Jakarta'],
    ['value' => 'Jakarta Pusat, DKI Jakarta', 'label' => 'Jakarta Pusat, DKI Jakarta'],
    ['value' => 'Bandung, Jawa Barat', 'label' => 'Bandung, Jawa Barat'],
    ['value' => 'Surabaya, Jawa Timur', 'label' => 'Surabaya, Jawa Timur'],
    ['value' => 'Yogyakarta, DI Yogyakarta', 'label' => 'Yogyakarta, DI Yogyakarta'],
    ['value' => 'Semarang, Jawa Tengah', 'label' => 'Semarang, Jawa Tengah'],
    ['value' => 'Denpasar, Bali', 'label' => 'Denpasar, Bali'],
    ['value' => 'Medan, Sumatera Utara', 'label' => 'Medan, Sumatera Utara']
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
    <link rel="stylesheet" href="<?= url('/assets/css/buka-toko.css') ?>" />
</head>

<body>
    <!-- Komponen Header BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/header.php'; ?>

    <!-- Konten Utama Buka Toko -->
    <main class="buka-toko-main">
        <div class="buka-toko-wrapper">
            <!-- Breadcrumb -->
            <nav class="breadcrumb-bar" aria-label="Breadcrumb">
                <a class="breadcrumb-link" href="<?= url('/') ?>">BERANDA</a>
                <span class="breadcrumb-sep">/</span>
                <a class="breadcrumb-link" href="<?= url('/profil') ?>">AKUN SAYA</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">BUKA TOKO (BECOME A SELLER)</span>
            </nav>

            <!-- Main Grid Split: Kiri Promo & Benefit, Kanan Form Aktivasi -->
            <div class="buka-toko-grid">
                <!-- KOLOM KIRI: PROMO & BENEFITS -->
                <div class="promo-column">
                    <!-- Hero Visual Box -->
                    <section class="hero-promo-card">
                        <div class="hero-dot-bg"></div>

                        <div class="hero-eyebrow-row">
                            <span class="hero-eyebrow-badge">ONBOARDING SELLER 2024</span>
                            <span class="material-symbols-outlined hero-fire-icon">local_fire_department</span>
                        </div>

                        <div class="hero-headline-block">
                            <p class="hero-kicker">LEMARI PENUH JADI CUAN</p>
                            <h1 class="hero-title">
                                MAU JUALAN? <br />
                                <span class="hero-title-highlight">BUKA TOKOMU!</span>
                            </h1>
                        </div>

                        <!-- Neo-Brutalist Sticker Badges -->
                        <div class="sticker-group">
                            <div class="sticker-badge sticker-yellow">
                                <span>&#128293; 0% KOMISI PERDANA!</span>
                            </div>
                            <div class="sticker-badge sticker-green">
                                <span>&#9889; DANA CAIR CEPAT VIA ESCROW</span>
                            </div>
                            <div class="sticker-badge sticker-pink">
                                <span>&#128230; REKBER AMAN 100%</span>
                            </div>
                            <div class="sticker-badge sticker-blue">
                                <span>&#128087; JUAL CLOTHING &amp; VINTAGE THRIFT</span>
                            </div>
                        </div>

                        <!-- 3 Mini Feature Spots -->
                        <div class="hero-mini-features">
                            <div class="mini-feature-card">
                                <span class="material-symbols-outlined mini-feature-icon icon-blue">photo_camera</span>
                                <span class="mini-feature-label">FOTO MUDAH</span>
                            </div>
                            <div class="mini-feature-card">
                                <span class="material-symbols-outlined mini-feature-icon icon-pink">sell</span>
                                <span class="mini-feature-label">PASANG HARGA</span>
                            </div>
                            <div class="mini-feature-card">
                                <span class="material-symbols-outlined mini-feature-icon icon-gold">payments</span>
                                <span class="mini-feature-label">LANGSUNG CUAN</span>
                            </div>
                        </div>
                    </section>

                    <!-- 3 Quick Benefits List -->
                    <section class="benefits-card">
                        <div class="benefits-header">
                            <h2 class="benefits-title">MENGAPA JUALAN DI BATHRIFT?</h2>
                            <span class="benefits-badge">BENEFIT SELLER</span>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-number benefit-num-yellow">1</div>
                            <div class="benefit-content">
                                <h3 class="benefit-item-title">Komunitas Niche Aktif</h3>
                                <p class="benefit-item-desc">
                                    Jangkau 50.000+ pembeli vintage &amp; streetwear kurasi di seluruh pelosok Indonesia tanpa perlu beriklan sendiri.
                                </p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-number benefit-num-pink">2</div>
                            <div class="benefit-content">
                                <h3 class="benefit-item-title">Anti Hit &amp; Run (Escrow Safe)</h3>
                                <p class="benefit-item-desc">
                                    Sistem Rekening Bersama (Escrow) otomatis. Uang pembeli ditampung dulu sebelum Anda mengirim paket.
                                </p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-number benefit-num-blue">3</div>
                            <div class="benefit-content">
                                <h3 class="benefit-item-title">Resi Logistik Otomatis</h3>
                                <p class="benefit-item-desc">
                                    Manajemen pesanan gampang dengan cetak label instan dan integrasi pick-up JNE, J&amp;T Express, dan SiCepat.
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Mini Community Proof Card -->
                    <div class="community-proof-card">
                        <div class="proof-icon-box">
                            <span class="material-symbols-outlined proof-icon">storefront</span>
                        </div>
                        <div class="proof-text-box">
                            <p class="proof-title">1.480+ Lapak Thrift Aktif</p>
                            <p class="proof-subtitle">Bergabunglah dengan ekosistem thrift preloved paling terpercaya.</p>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: FORMULIR PENDAFTARAN LAPAK -->
                <div class="form-column">
                    <section class="form-card">
                        <!-- Top Accent Header Bar -->
                        <div class="form-card-topbar">
                            <div class="topbar-left">
                                <span class="window-dot dot-red"></span>
                                <span class="window-dot dot-yellow"></span>
                                <span class="window-dot dot-green"></span>
                                <span class="topbar-title">FORMULIR PENDAFTARAN LAPAK</span>
                            </div>
                            <div class="topbar-step-badge">
                                <span>LANGKAH 1 DARI 1: AKTIVASI KILAT</span>
                            </div>
                        </div>

                        <div class="form-card-body">
                            <!-- Intro Text -->
                            <div class="form-intro">
                                <h2 class="form-intro-title">LENGKAPI IDENTITAS LAPAKMU</h2>
                                <p class="form-intro-desc">
                                    Cukup 2 menit. Toko online pribadimu langsung tayang dan dapat menerima order pertama hari ini.
                                </p>
                            </div>

                            <!-- Form Pendaftaran Toko -->
                            <form class="store-form" id="store-form" action="<?= htmlspecialchars(url('/buka-toko'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" method="post">
                                <!-- Field 1: Nama Toko (Reusable Input Component) -->
                                <!-- DATA: old_nama_toko -->
                                <div class="field-block">
                                    <?php
                                    renderInput([
                                        'name'        => 'nama_toko',
                                        'id'          => 'store-name',
                                        'label'       => 'Nama Toko / Lapak',
                                        'type'        => 'text',
                                        'placeholder' => 'Contoh: VintageVault_JKT / StreetwearArchive',
                                        'hint'        => 'Maks. 30 Karakter',
                                        'required'    => true,
                                        'value'       => $old_nama_toko,
                                        'error'       => $errors['nama_toko'] ?? ''
                                    ]);
                                    ?>
                                    <p class="field-helper-info">
                                        <span class="material-symbols-outlined field-helper-icon">info</span>
                                        <span>Nama lapak akan menjadi identitas branding utama dan tautan profil tokomu.</span>
                                    </p>
                                </div>

                                <!-- Field 2: Slug Otomatis (Reusable Input Component) -->
                                <!-- DATA: old_slug_toko -->
                                <div class="field-block">
                                    <?php
                                    renderInput([
                                        'name'        => 'slug_toko',
                                        'id'          => 'store-slug',
                                        'label'       => 'Domain / Slug Lapak (Dibuat Otomatis)',
                                        'type'        => 'text',
                                        'prefix'      => 'bathrift.id/toko/',
                                        'badge'       => 'LIVE PREVIEW',
                                        'badge_type'  => 'preview',
                                        'icon'        => 'check',
                                        'readonly'    => true,
                                        'required'    => false,
                                        'class'       => 'input-slug-readonly',
                                        'value'       => $old_slug_toko,
                                        'error'       => $errors['slug_toko'] ?? ''
                                    ]);
                                    ?>
                                </div>

                                <!-- Field 4: Deskripsi Singkat Toko -->
                                <!-- DATA: old_deskripsi -->
                                <div class="form-group">
                                    <div class="form-label-row">
                                        <label class="form-label" for="store-desc">
                                            Deskripsi Singkat Toko <span class="text-required">*</span>
                                        </label>
                                    </div>
                                    <textarea class="form-textarea"
                                              id="store-desc"
                                              name="deskripsi_toko"
                                              rows="3"
                                              placeholder="Ceritakan kurasi thrift yang kamu jual, standar kondisi barang, jadwal packing harian, dan kebijakan respon chat..."
                                              required="required"><?= htmlspecialchars($old_deskripsi, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></textarea>
                                    <?php if (!empty($errors['deskripsi_toko'])): ?>
                                        <div class="input-error-box">
                                            <span class="material-symbols-outlined icon-fill">error</span>
                                            <span class="error-text"><?= htmlspecialchars($errors['deskripsi_toko'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Field 5: Kota Asal Pengiriman -->
                                <!-- DATA: old_kota_asal -->
                                <div class="form-group">
                                    <div class="form-label-row">
                                        <label class="form-label" for="origin-city">
                                            Kota Asal Pengiriman <span class="text-required">*</span>
                                        </label>
                                    </div>
                                    <div class="select-wrapper">
                                        <select class="form-select" id="origin-city" name="kota_asal" required="required">
                                            <option value="" disabled="disabled" <?php if ($old_kota_asal === ''): ?>selected="selected"<?php endif; ?>>
                                                Pilih Kota / Kabupaten Pengiriman...
                                            </option>
                                            <!-- LOOP: kota_list -->
                                            <?php foreach ($kota_list as $kota): ?>
                                                <option value="<?= htmlspecialchars($kota['value'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                                                        <?php if ($old_kota_asal === $kota['value']): ?>selected="selected"<?php endif; ?>>
                                                    <?= htmlspecialchars($kota['label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="select-arrow-box">
                                            <span class="material-symbols-outlined">expand_more</span>
                                        </div>
                                    </div>
                                    <p class="field-helper-plain">
                                        Digunakan mesin kalkulator ongkos kirim otomatis untuk pembeli dari seluruh Indonesia.
                                    </p>
                                    <?php if (!empty($errors['kota_asal'])): ?>
                                        <div class="input-error-box">
                                            <span class="material-symbols-outlined icon-fill">error</span>
                                            <span class="error-text"><?= htmlspecialchars($errors['kota_asal'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Checkbox Kode Etik -->
                                <div class="terms-row">
                                    <label class="terms-label" for="terms-check">
                                        <input class="terms-checkbox-input"
                                               id="terms-check"
                                               name="setuju_kode_etik"
                                               type="checkbox"
                                               value="1"
                                               required="required" />
                                        <span class="terms-checkbox-box">
                                            <span class="material-symbols-outlined terms-check-icon">check</span>
                                        </span>
                                        <span class="terms-text">
                                            Saya menyatakan bersedia mematuhi
                                            <a class="terms-link" href="<?= url('/syarat-ketentuan') ?>">Kode Etik Penjual BaThrift</a>,
                                            mendeskripsikan minus produk dengan jujur, dan tidak memperjualbelikan barang curian.
                                        </span>
                                    </label>
                                </div>

                                <!-- Primary Submit CTA Button -->
                                <div class="submit-row">
                                    <button class="btn-submit-toko" id="btn-submit-toko" type="submit">
                                        <span class="btn-submit-label">BUKA TOKO SEKARANG</span>
                                        <span class="material-symbols-outlined btn-submit-icon">bolt</span>
                                    </button>
                                </div>
                            </form>

                            <!-- Crucial Note Box -->
                            <!-- DATA: user -->
                            <div class="crucial-note-box">
                                <div class="note-icon-box">
                                    <span class="material-symbols-outlined">lightbulb</span>
                                </div>
                                <div class="note-content">
                                    <h3 class="note-title">SATU AKUN UNTUK SEMUA KEPERLUAN</h3>
                                    <p class="note-desc">
                                        Tanpa daftar ulang! Akun
                                        <strong class="note-user-name"><?= htmlspecialchars($user['name'] ?? 'Pengguna', ENT_QUOTES | ENT_XML1, 'UTF-8') ?></strong>
                                        langsung aktif berjualan dan tetap bebas dipakai checkout belanja seperti biasa. Tidak perlu login-logout akun terpisah.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Decorative Shipping Barcode Strip on Bottom -->
                        <div class="form-card-footer-strip">
                            <span class="strip-left">BATHRIFT MERCHANT SYSTEM // ONBOARDING GATEWAY</span>
                            <span class="strip-right">BATCH: #ID-2024-SELL-882</span>
                        </div>
                    </section>
                </div>
            </div>

            <!-- BELOW THE MAIN GRID: 3-STEP SELLING PROCESS BANNER -->
            <section class="steps-banner-card">
                <div class="steps-banner-header">
                    <div>
                        <span class="steps-eyebrow-badge">ALUR PRAKTIS</span>
                        <h2 class="steps-banner-title">CARA KERJA JUALAN DI BATHRIFT</h2>
                    </div>
                    <p class="steps-banner-subtitle">
                        Tidak ribet, tidak perlu sewa lapak fisik. Semua terlindungi jaminan keamanan pembayaran.
                    </p>
                </div>

                <div class="steps-grid">
                    <!-- STEP 1 -->
                    <article class="step-card">
                        <div>
                            <div class="step-card-top">
                                <span class="step-number step-num-yellow">01</span>
                                <span class="material-symbols-outlined step-icon">add_a_photo</span>
                            </div>
                            <h3 class="step-title">UPLOAD FOTO &amp; DESKRIPSI</h3>
                            <p class="step-desc">
                                Ambil foto barang thrift dari berbagai sisi (tag, ukuran riil, detail jahitan, dan minus). Tentukan harga pas atau aktifkan fitur <em>Nego Tipis</em>.
                            </p>
                        </div>
                        <div class="step-meta">
                            <span>DURASI: ~2 MENIT PER ITEM</span>
                        </div>
                    </article>

                    <!-- STEP 2 -->
                    <article class="step-card">
                        <div>
                            <div class="step-card-top">
                                <span class="step-number step-num-pink">02</span>
                                <span class="material-symbols-outlined step-icon">local_shipping</span>
                            </div>
                            <h3 class="step-title">PEMBELI BAYAR &amp; KIRIM BARANG</h3>
                            <p class="step-desc">
                                Pembeli mentransfer ke Rekening Bersama BaThrift. Anda menerima notifikasi siap kirim dengan resi logistik instan tanpa perlu bayar ongkir manual.
                            </p>
                        </div>
                        <div class="step-meta">
                            <span>PROTEKSI: 100% ANTI HIT &amp; RUN</span>
                        </div>
                    </article>

                    <!-- STEP 3 -->
                    <article class="step-card">
                        <div>
                            <div class="step-card-top">
                                <span class="step-number step-num-green">03</span>
                                <span class="material-symbols-outlined step-icon">account_balance_wallet</span>
                            </div>
                            <h3 class="step-title">PAKET TIBA, DANA MASUK SALDO!</h3>
                            <p class="step-desc">
                                Begitu pembeli mengonfirmasi barang diterima sesuai kondisi deskripsi, saldo langsung cair ke dompet BaThrift dan siap ditarik ke rekening bank manapun.
                            </p>
                        </div>
                        <div class="step-meta">
                            <span>PENARIKAN: BEBAS BIAYA ADMIN</span>
                        </div>
                    </article>
                </div>
            </section>
        </div>

        <!-- Toast Feedback Banner (JS DOM) -->
        <div class="toast-feedback-banner is-hidden" id="toast-buka-toko" role="status" aria-live="polite">
            <div class="toast-feedback-box">
                <span class="material-symbols-outlined toast-feedback-icon" id="toast-icon">check_circle</span>
                <div>
                    <p class="toast-feedback-title" id="toast-title">TOKO BERHASIL DIBUKA!</p>
                    <p class="toast-feedback-message" id="toast-message">Lapak kamu sudah siap digunakan.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Komponen Footer BaThrift (Reusable) -->
    <?php require __DIR__ . '/../components/footer.php'; ?>

    <!-- JavaScript Interaktif DOM -->
    <script src="<?= url('/assets/js/buka-toko.js') ?>"></script>
</body>

</html>
