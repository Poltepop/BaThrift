<?php
// app/View/components/footer.php
// Reusable Footer Component untuk BaThrift (XHTML5 Valid)

/**
 * @var string|null $active_nav Active navigation item ('belanja', 'cari', 'jual', 'pesanan', 'akun')
 */
$active_nav = $active_nav ?? 'belanja';
?>
<!-- Navigasi Bawah Khusus Mobile (Sticky Bottom Nav) -->
<nav class="mobile-bottom-nav" aria-label="Navigasi Mobile">
    <a class="mobile-nav-item <?= $active_nav === 'belanja' ? 'mobile-nav-active' : '' ?>" href="<?= url('/katalog') ?>">
        <span class="material-symbols-outlined">storefront</span>
        <span class="mobile-nav-label">Belanja</span>
    </a>
    <a class="mobile-nav-item <?= $active_nav === 'cari' ? 'mobile-nav-active' : '' ?>" href="<?= url('/katalog#search-form') ?>">
        <span class="material-symbols-outlined">search</span>
        <span class="mobile-nav-label">Cari</span>
    </a>
    <a class="mobile-nav-item mobile-nav-floating" href="<?= url('/buka-toko') ?>">
        <div class="floating-btn-circle">
            <span class="material-symbols-outlined">add</span>
        </div>
        <span class="mobile-nav-label floating-label">Jual</span>
    </a>
    <a class="mobile-nav-item <?= $active_nav === 'pesanan' ? 'mobile-nav-active' : '' ?>" href="<?= url('/pesanan') ?>">
        <span class="material-symbols-outlined">receipt_long</span>
        <span class="mobile-nav-label">Pesanan</span>
    </a>
    <a class="mobile-nav-item <?= $active_nav === 'akun' ? 'mobile-nav-active' : '' ?>" href="<?= url('/profil') ?>">
        <span class="material-symbols-outlined">account_circle</span>
        <span class="mobile-nav-label">Akun</span>
    </a>
</nav>

<!-- Footer Utama BaThrift (Desktop & Tablet) -->
<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Kolom 1-2: Brand & Rekber Info -->
            <div class="footer-brand-col">
                <div class="footer-logo">
                    <span class="footer-logo-title">BATHRIFT</span>
                    <span class="footer-logo-badge">PASAR LOAK DIGITAL</span>
                </div>
                <p class="footer-description">
                    Pusat thrifting kurasi streetwear vintage, outerwear langka, dan arsip mode second-hand Indonesia. Tawar-menawar santai, barang dijamin selamat sampai lemari.
                </p>
                <div class="footer-rekber-card">
                    <span class="material-symbols-outlined icon-rekber">verified_user</span>
                    <div class="rekber-text">Sistem Rekber Aman &#8226; Garansi Retur 2x24 Jam</div>
                </div>
            </div>

            <!-- Kolom 3: Navigasi Cepat -->
            <div class="footer-nav-col">
                <h3 class="footer-nav-title">Navigasi Cepat</h3>
                <ul class="footer-nav-list">
                    <li><a class="footer-link" href="<?= url('/katalog') ?>">Katalog Pakaian</a></li>
                    <li><a class="footer-link" href="<?= url('/buka-toko') ?>">Mulai Berjualan</a></li>
                    <li><a class="footer-link" href="<?= url('/panduan-ukuran') ?>">Panduan Size &amp; Kondisi</a></li>
                    <li><a class="footer-link" href="<?= url('/keranjang') ?>">Cek Keranjang</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Bantuan & Info -->
            <div class="footer-nav-col">
                <h3 class="footer-nav-title">Bantuan &amp; Info</h3>
                <ul class="footer-nav-list">
                    <li><a class="footer-link" href="<?= url('/faq') ?>">Pusat Bantuan / FAQ</a></li>
                    <li><a class="footer-link" href="<?= url('/kebijakan-rekber') ?>">Mekanisme Rekening Bersama</a></li>
                    <li><a class="footer-link" href="<?= url('/syarat-ketentuan') ?>">Syarat &amp; Ketentuan Thrift</a></li>
                    <li><a class="footer-link" href="<?= url('/kontak') ?>">Hubungi Admin Lapak</a></li>
                </ul>
            </div>
        </div>

        <!-- Baris Bawah: Hak Cipta & Status Sistem -->
        <div class="footer-bottom-bar">
            <div class="footer-copyright">
                &#169; 2025 BATHRIFT INDONESIA &#8226; HAK CIPTA DILINDUNGI
            </div>
            <div class="footer-server-status">
                <span class="status-item">STATUS: SERVER NORMAL</span>
                <span class="status-item">LOKASI: JAKARTA, ID</span>
            </div>
        </div>
    </div>
</footer>
