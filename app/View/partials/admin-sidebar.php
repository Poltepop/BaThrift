<?php
// app/View/partials/admin-sidebar.php
// Partial Sidebar Navigasi Admin BaThrift (XHTML5 Valid)

/**
 * @var string|null $active_admin_nav Menu aktif ('dashboard', 'kategori', 'pengguna', 'barang', 'laporan', 'pesanan', 'log-aktivitas')
 * @var int|null $pending_report_count Jumlah laporan menunggu tinjauan
 * @var array|null $admin_user Informasi akun admin aktif
 */
$active_admin_nav = $active_admin_nav ?? 'dashboard';
$pending_report_count = $pending_report_count ?? 14;
$admin_user = $admin_user ?? [
    'username' => 'SUPERADMIN_BAYU',
    'role_label' => 'MASTER CONTROL'
];

$nav_items = [
    ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'dashboard', 'path' => '/admin/dashboard'],
    ['key' => 'kategori', 'label' => 'Kategori', 'icon' => 'category', 'path' => '/admin/kategori'],
    ['key' => 'pengguna', 'label' => 'Pengguna', 'icon' => 'group', 'path' => '/admin/pengguna'],
    ['key' => 'barang', 'label' => 'Barang', 'icon' => 'checkroom', 'path' => '/admin/barang'],
    ['key' => 'laporan', 'label' => 'Laporan', 'icon' => 'report', 'path' => '/admin/laporan', 'badge' => $pending_report_count],
    ['key' => 'pesanan', 'label' => 'Pesanan', 'icon' => 'receipt_long', 'path' => '/admin/pesanan'],
    ['key' => 'log-aktivitas', 'label' => 'Log Aktivitas', 'icon' => 'history', 'path' => '/admin/log-aktivitas'],
];
?>
<!-- Backdrop Mobile Drawer -->
<div class="admin-sidebar-backdrop" id="admin-sidebar-backdrop"></div>

<aside class="admin-sidebar" id="admin-sidebar" aria-label="Navigasi Admin">
    <div class="sidebar-top">
        <div class="sidebar-brand-row">
            <a class="sidebar-brand" href="<?= htmlspecialchars(url('/admin/dashboard'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                <span class="sidebar-brand-name">BaThrift</span>
                <span class="sidebar-brand-badge">ADMIN</span>
            </a>
            <button type="button" class="sidebar-close-btn" id="sidebar-close-btn" aria-label="Tutup Menu">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <nav class="sidebar-nav" aria-label="Menu Utama Admin">
            <?php foreach ($nav_items as $item):
                $is_active = ($active_admin_nav === $item['key']);
                $item_class = 'sidebar-nav-link' . ($is_active ? ' is-active' : '');
            ?>
                <a class="<?= $item_class ?>"
                   href="<?= htmlspecialchars(url($item['path']), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
                   <?= $is_active ? 'aria-current="page"' : '' ?>>
                    <span class="sidebar-nav-label-wrap">
                        <span class="material-symbols-outlined sidebar-nav-icon"><?= htmlspecialchars($item['icon'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                        <span><?= htmlspecialchars($item['label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                    </span>
                    <?php if (isset($item['badge']) && (int)$item['badge'] > 0): ?>
                        <span class="sidebar-nav-badge"><?= htmlspecialchars((string)$item['badge'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>

    <div class="sidebar-footer">
        <!-- DATA: admin_user -->
        <div class="sidebar-admin-card">
            <div class="sidebar-admin-avatar">
                <span class="material-symbols-outlined">shield_person</span>
            </div>
            <div class="sidebar-admin-info">
                <span class="sidebar-admin-name"><?= htmlspecialchars((string)$admin_user['username'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                <span class="sidebar-admin-role"><?= htmlspecialchars((string)$admin_user['role_label'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
            </div>
        </div>

        <a class="sidebar-logout-btn" href="<?= htmlspecialchars(url('/logout'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
            <span class="material-symbols-outlined sidebar-logout-icon">logout</span>
            <span>KELUAR</span>
        </a>
    </div>
</aside>
