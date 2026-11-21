<?php
// app/View/components/header.php
// Reusable Header Component untuk BaThrift (XHTML5 Valid)

/**
 * @var string|null $active_nav Active navigation item ('belanja', 'jual', 'pesanan')
 * @var int|null $cart_count Total items in cart (default: 3)
 */
$active_nav = $active_nav ?? 'belanja';
$cart_count = $cart_count ?? 3;
?>
<header class="main-header">
    <!-- Pita Pengumuman Atas -->
    <div class="header-announcement">
        <div class="announcement-track">
            <span>&#9889; REKBER 100% AMAN &#8226; GARANSI ASLI ATAU UANG KEMBALI &#8226; KLAIM VOUCHER ONGKIR HARI INI &#9889;</span>
        </div>
    </div>

    <!-- Bar Navigasi Utama -->
    <div class="header-navbar">
        <div class="header-left">
            <a class="header-logo" href="<?= url('/') ?>">
                <span class="logo-text">BATHRIFT</span>
                <span class="logo-badge">PRELOVED</span>
            </a>
        </div>

        <nav class="header-nav">
            <a class="nav-link <?= $active_nav === 'belanja' ? 'nav-active' : '' ?>" href="<?= url('/') ?>">Belanja</a>
            <a class="nav-link <?= $active_nav === 'jual' ? 'nav-active' : '' ?>" href="<?= url('/buka-toko') ?>">Jual</a>
            <a class="nav-link <?= $active_nav === 'pesanan' ? 'nav-active' : '' ?>" href="<?= url('/pesanan') ?>">Pesanan</a>
        </nav>

        <div class="header-actions">
            <!-- Tombol Keranjang Belanja -->
            <a class="action-btn cart-btn" href="<?= url('/keranjang') ?>" title="Keranjang Belanja">
                <span class="material-symbols-outlined">shopping_bag</span>
                <?php if ($cart_count > 0): ?>
                    <span class="cart-badge"><?= htmlspecialchars((string)$cart_count, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                <?php endif; ?>
            </a>

            <!-- Tombol CTA Jual Barang -->
            <a class="btn-sell-cta" href="<?= url('/buka-toko') ?>">
                <span class="material-symbols-outlined">add_box</span>
                <span>Jual Barang</span>
            </a>

            <!-- Avatar Profil Pengguna -->
            <a class="profile-avatar-btn" href="<?= url('/profil') ?>" title="Profil Saya">
                <div class="avatar-circle">
                    <span class="material-symbols-outlined">person</span>
                </div>
            </a>
        </div>
    </div>
</header>
