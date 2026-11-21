<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" xml:lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $model['title'] ?? '' ?></title>
    <!-- Fonts Google (Satu-satunya sumber eksternal yang diizinkan) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Space+Grotesk:wght@700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <!-- Stylesheet Utama (CSS Native dengan CSS Variables) -->
    <link rel="stylesheet" href="<?= url('/assets/css/login.css') ?>" />
</head>
<body class="auth-wrapper">
    <main class="auth-container">
        <!-- Marquee Berjalan Aksen Atas -->
        <div class="auth-marquee">
            <div class="marquee-track">
                <span class="marquee-item">&#9889; PASAR LOAK DIGITAL INDONESIA</span>
                <span>&#8226;</span>
                <span class="marquee-item">&#128293; DROP CURATED JAM 19:00 WIB</span>
                <span>&#8226;</span>
                <span class="marquee-item">&#127991;&#65039; 1 AKUN BISA BELI &amp; JUAL</span>
                <span>&#8226;</span>
                <span class="marquee-item">&#128230; GARANSI SIAP BUNGKUS</span>
                <span>&#8226;</span>
                <span class="marquee-item">&#10024; STREETWEAR &#8226; VINTAGE &#8226; Y2K</span>
            </div>
        </div>

        <!-- Area Konten Utama Terbagi Dua Kolom -->
        <div class="auth-grid">
            <!-- Panel Kiri: Poster Neo-Brutalis Vintage -->
            <div class="auth-poster">
                <!-- Stempel Watermark Cap Toko -->
                <div class="poster-watermark">
                    <span>ORIGINAL<br />THRIFT<br />AUTH</span>
                </div>

                <!-- Baris Label Header Poster -->
                <div class="poster-header">
                    <div class="poster-pill">
                        <span class="poster-pill-indicator"></span>
                        <span>BATHRIFT HQ // ARCHIVE 24</span>
                    </div>
                    <div class="poster-tag">
                        #01 CURATED
                    </div>
                </div>

                <!-- Bagian Tipografi Pernyataan Utama -->
                <div class="poster-content">
                    <div class="poster-badge">
                        HUNTING GAK PAKE RUGI
                    </div>
                    <h1 class="poster-title">
                        THRIFT.<br />
                        <span class="poster-highlight">JUAL.</span><br />
                        BELI.
                    </h1>
                    <p class="poster-desc">
                        Platform p2p preloved streetwear tanah air. Nego tipis, amankan stok arsip, dan cuankan lemari bajumu langsung dalam 1 akun.
                    </p>
                </div>

                <!-- Kumpulan Lencana Stiker Fitur -->
                <div class="poster-stickers">
                    <div class="sticker-item sticker-white">
                        <span class="material-symbols-outlined icon-fill">local_fire_department</span>
                        <span>100% PRELOVED CURATED</span>
                    </div>
                    <div class="sticker-item sticker-blue">
                        <span class="material-symbols-outlined">sync_alt</span>
                        <span>1 AKUN: BUYER &amp; SELLER</span>
                    </div>
                    <div class="sticker-item sticker-pink">
                        <span class="material-symbols-outlined">checkroom</span>
                        <span>STREETWEAR &#8226; VINTAGE &#8226; Y2K</span>
                    </div>
                </div>

                <!-- Barcode Bawah dan Segel Resi -->
                <div class="poster-footer">
                    <div>
                        <div class="barcode-lines">
                            <span class="barcode-bar bar-sm"></span>
                            <span class="barcode-bar bar-xs"></span>
                            <span class="barcode-bar bar-md"></span>
                            <span class="barcode-bar bar-lg"></span>
                            <span class="barcode-bar bar-xs"></span>
                            <span class="barcode-bar bar-sm"></span>
                            <span class="barcode-bar bar-xl"></span>
                            <span class="barcode-bar bar-xs"></span>
                            <span class="barcode-bar bar-md"></span>
                            <span class="barcode-bar bar-sm"></span>
                            <span class="barcode-bar bar-xs"></span>
                            <span class="barcode-bar bar-lg"></span>
                        </div>
                        <p class="barcode-label">ID-JKT-88290-THRIFT</p>
                    </div>
                    <div class="receipt-seal">
                        <p class="receipt-seal-top">PASAR LOAK DIGITAL</p>
                        <p class="receipt-seal-bottom">NO. 1</p>
                    </div>
                </div>
            </div>

            <!-- Panel Kanan: Kartu Form Masuk Kontras Tinggi -->
            <div class="auth-card-panel">
                <div class="auth-card">
                    <!-- Status Bar Atas Kartu -->
                    <div class="card-topbar">
                        <div class="card-topbar-left">
                            <span class="status-pill">GERBANG MASUK</span>
                            <span class="status-code">#AUTH-02</span>
                        </div>
                        <div class="card-topbar-dots">
                            <span class="status-dot dot-pink"></span>
                            <span class="status-dot dot-yellow"></span>
                            <span class="status-dot dot-blue"></span>
                        </div>
                    </div>

                    <!-- Judul dan Subjudul Form -->
                    <div class="card-header">
                        <h2 class="card-title">MASUK KE BATHRIFT</h2>
                        <p class="card-subtitle">
                            Lanjutkan sesi hunting rilisan langka atau pantau pesanan lapakmu.
                        </p>
                    </div>

                    <!-- DATA: error_message -->
                    <?php if (!empty($model['errors']['email'])): ?>
                    <div class="alert-error">
                        <?= 'Email: ' . htmlspecialchars($model['errors']['email']) ?>
                    </div>
                    <?php elseif (!empty($model['errors']['password'])): ?>
                        <div class="alert-error">
                            <?= 'Password: ' . htmlspecialchars($model['errors']['password']) ?>
                        </div>
                    <?php elseif (!empty($model['errors']['error_login'])): ?>
                        <div class="alert-error">
                            <?= $model['errors']['error_login'] ?>
                        </div>
                    <?php endif; ?>

                    <!-- Form Kredensial Autentikasi -->
                    <form class="form-auth" id="loginForm" action="<?= url('/auth/authenticate') ?>" method="post">
                        <!-- Input 1: Email / No. WhatsApp -->
                        <div class="form-group">
                            <label class="form-label" for="email">
                                Email
                            </label>
                            <div class="input-wrapper">
                                <!-- DATA: old_identifier -->
                                <input class="form-input" id="email" name="email" placeholder="nama@email.com" type="text" value="<?= htmlspecialchars($model['old']['email'] ?? '') ?>" />
                                <span class="material-symbols-outlined input-icon">alternate_email</span>
                            </div>
                        </div>

                        <!-- Input 2: Kata Sandi -->
                        <div class="form-group">
                            <div class="form-label-row">
                                <label class="form-label" for="password">
                                    Kata Sandi
                                </label>
                                <!-- DATA: link_lupa_sandi -->
                                <a class="link-lupa-sandi" href="<?= url('/auth/lupa-sandi') ?>">
                                    Lupa Sandi?
                                </a>
                            </div>
                            <div class="input-wrapper">
                                <input class="form-input" id="password" name="password" placeholder="Minimal 8 karakter"  type="password" />
                                <button aria-label="Toggle password visibility" class="btn-toggle-password" id="togglePassword" type="button">
                                    <span class="material-symbols-outlined" id="eyeIcon">visibility</span>
                                </button>
                            </div>
                        </div>

                        <!-- Checkbox: Ingat Saya -->
                        <div class="form-remember-row">
                            <label class="checkbox-label" for="remember">
                                <input class="checkbox-bathrift" id="remember" name="remember" type="checkbox" value="1" />
                                <span>Ingat Saya di Perangkat Ini</span>
                            </label>
                            <span class="secure-badge">SECURE 256-BIT</span>
                        </div>

                        <!-- Tombol CTA Masuk Utama -->
                        <div>
                            <button class="btn-submit" type="submit">
                                <span>MASUK SEKARANG</span>
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </button>
                        </div>
                    </form>

                    <!-- Garis Pembatas "Atau Masuk Dengan" -->
                    <div class="auth-divider">
                        <div class="auth-divider-line"></div>
                        <span class="auth-divider-text">ATAU MASUK DENGAN</span>
                    </div>

                    <!-- Tombol Masuk Pihak Ketiga (OAuth) -->
                    <div class="social-grid">
                        <!-- Google Auth -->
                        <!-- DATA: google_auth_url -->
                        <a class="btn-social" href="<?= $google_auth_url ?? url('/auth/google') ?>">
                            <svg class="social-icon" viewBox="0 0 24 24">
                                <path d="M12.24 10.285V13.4h6.887C18.2 16.14 15.645 18 12.24 18c-3.315 0-6-2.685-6-6s2.685-6 6-6c1.48 0 2.83.54 3.87 1.435l2.42-2.42C16.945 3.53 14.74 2.6 12.24 2.6 7.025 2.6 2.8 6.825 2.8 12.04c0 5.215 4.225 9.44 9.44 9.44 5.455 0 9.1-3.835 9.1-9.28 0-.62-.065-1.225-.175-1.915H12.24z"></path>
                            </svg>
                            <span>GOOGLE</span>
                        </a>

                        <!-- TikTok Auth -->
                        <!-- DATA: tiktok_auth_url -->
                        <a class="btn-social" href="<?= $tiktok_auth_url ?? url('/auth/tiktok') ?>">
                            <svg class="social-icon" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-2.891 2.891 2.896 2.896 0 0 1-2.892-2.891 2.896 2.896 0 0 1 2.892-2.892c.383 0 .748.067 1.087.189V9.452a6.34 6.34 0 0 0-1.087-.095C5.973 9.357 3 12.33 3 16c0 3.67 2.973 6.643 6.643 6.643 3.67 0 6.643-2.973 6.643-6.643V8.835a8.175 8.175 0 0 0 4.887 1.605V6.995a4.79 4.79 0 0 1-1.584-.309z"></path>
                            </svg>
                            <span>TIKTOK</span>
                        </a>
                    </div>

                    <!-- Kotak Banner Ajakan Pendaftaran Akun -->
                    <div class="register-banner">
                        <div>
                            <p class="register-banner-title">Belum Punya Akun BaThrift?</p>
                            <p class="register-banner-desc">Daftar gratis langsung dapat kupon ongkir 10K</p>
                        </div>
                        <!-- DATA: register_url -->
                        <a class="btn-register" href="<?= url('/auth/register') ?>">
                            DAFTAR SEKARANG
                        </a>
                    </div>

                    <!-- Tag Barcode Terminal Bawah Kartu -->
                    <div class="card-micro-footer">
                        <span>TERMINAL: WEB-CL-99</span>
                        <span>ID.BATHRIFT.CC // 2025</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pita Rekening Bersama & Bantuan -->
        <div class="baggage-tape">
            <div class="tape-info">
                <span class="tape-dot"></span>
                <span>REKENING BERSAMA AMAN 100% &#8212; UANG DITERUSKAN SETELAH BARANG TIBA</span>
            </div>
            <div class="tape-links">
                <!-- DATA: link_bantuan -->
                <a class="tape-link" href="<?= url('/bantuan') ?>">Pusat Bantuan</a>
                <span>&#8226;</span>
                <!-- DATA: link_syarat_ketentuan -->
                <a class="tape-link" href="<?= url('/syarat-ketentuan') ?>">Aturan Lapak</a>
                <span>&#8226;</span>
                <!-- DATA: link_keamanan -->
                <a class="tape-link" href="<?= url('/keamanan') ?>">Anti-Fraud</a>
            </div>
        </div>
    </main>

    <!-- Script Interaktif DOM Eksternal -->
    <script src="<?= url('/assets/js/auth.js') ?>"></script>
</body>
</html>
