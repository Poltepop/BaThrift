<?php
// app/View/partials/admin-topbar.php
// Partial Topbar Header untuk halaman Admin BaThrift (XHTML5 Valid)

/**
 * @var string|null $topbar_breadcrumb Teks breadcrumb (contoh: 'ADMIN CONSOLE > DASHBOARD')
 * @var string|null $topbar_title Judul bar atas (contoh: 'PANEL KENDALI UTAMA')
 * @var string|null $topbar_date Tanggal hari ini untuk strip kanan
 */
$topbar_breadcrumb = $topbar_breadcrumb ?? 'ADMIN CONSOLE > DASHBOARD';
$topbar_title = $topbar_title ?? 'PANEL KENDALI UTAMA';
$topbar_date = $topbar_date ?? 'SENIN, 22 SEP 2025';
?>
<header class="admin-topbar">
    <div class="admin-topbar-inner">
        <div class="topbar-left">
            <button type="button" class="topbar-menu-btn" id="sidebar-toggle-btn" aria-label="Buka Menu Admin" aria-controls="admin-sidebar" aria-expanded="false">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="topbar-titles">
                <!-- DATA: topbar_breadcrumb -->
                <div class="topbar-breadcrumb"><?= htmlspecialchars($topbar_breadcrumb, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                <!-- DATA: topbar_title -->
                <span class="topbar-heading"><?= htmlspecialchars($topbar_title, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
            </div>
        </div>

        <div class="topbar-right">
            <!-- DATA: topbar_date -->
            <div class="topbar-date-pill">
                <span class="material-symbols-outlined topbar-date-icon">calendar_today</span>
                <span><?= htmlspecialchars($topbar_date, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
            </div>
            <div class="topbar-avatar" title="Akun Admin Aktif">
                <span class="material-symbols-outlined">person</span>
            </div>
        </div>
    </div>
</header>
