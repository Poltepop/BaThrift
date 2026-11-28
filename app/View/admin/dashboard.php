<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

// Memuat fungsi url() dari Core Router jika belum tersedia
if (!function_exists('url')) {
    require_once __DIR__ . '/../../Core/Router.php';
}

// DATA: Variabel kontrol halaman & navigasi
$page_title = 'Dashboard Platform - Admin BaThrift';
$active_admin_nav = 'dashboard';
$topbar_breadcrumb = 'ADMIN CONSOLE > DASHBOARD';
$topbar_title = 'PANEL KENDALI UTAMA';
$topbar_date = $topbar_date ?? 'SENIN, 22 SEP 2025';
$pending_report_count = $pending_report_count ?? 14;

// DATA: admin_user
$admin_user = $admin_user ?? [
    'username' => 'SUPERADMIN_BAYU',
    'role_label' => 'MASTER CONTROL'
];

// DATA: platform_status
$platform_status = $platform_status ?? [
    'versi' => 'SISTEM LIVE // V3.4.2',
    'server_health' => 'SERVER HEALTH: 99.98%'
];

// DATA: stats (4 kartu metrik utama)
$stats = $stats ?? [
    'total_pengguna' => '48.250',
    'total_pembeli' => '41.120',
    'pertumbuhan_pembeli' => '+12% bln ini',
    'total_penjual' => '7.130',
    'pertumbuhan_penjual' => '+8% bln ini',
    'total_katalog' => '12.480',
    'barang_tersedia' => '8.920',
    'barang_dipesan' => '1.140',
    'barang_terjual' => '2.420',
    'total_pesanan' => '18.940',
    'pesanan_bulan_ini' => '3.420',
    'sukses_rekber_pct' => '99.1',
    'gmv_total' => 'Rp 4,82 M',
    'gmv_bulan_berjalan' => 'Rp 842 Juta',
    'komisi_rekber' => 'Rp 48,2 Juta'
];

// DATA: distribusi_pesanan
$distribusi_pesanan = $distribusi_pesanan ?? [
    'periode' => '7 HARI TERAKHIR',
    'total_mingguan' => '1.840',
    'escrow_retention_rate' => '96.2%',
    'rata_pickup' => '6.4 JAM',
    'segments' => [
        ['key' => 'menunggu', 'label' => 'Menunggu', 'jumlah' => 142, 'persen' => 8],
        ['key' => 'diproses', 'label' => 'Diproses', 'jumlah' => 385, 'persen' => 21],
        ['key' => 'dikirim', 'label' => 'Dikirim', 'jumlah' => 520, 'persen' => 28],
        ['key' => 'selesai', 'label' => 'Selesai', 'jumlah' => 715, 'persen' => 39],
        ['key' => 'dibatalkan', 'label' => 'Dibatalkan', 'jumlah' => 78, 'persen' => 4]
    ]
];

// DATA: perlu_tindakan
$perlu_tindakan = $perlu_tindakan ?? [
    'laporan_count' => '14 LAPORAN',
    'laporan_ringkasan' => 'Indikasi barang palsu/KW merek hypebeast & nomor kontak scammer di chat.',
    'sengketa_count' => '6 KLAIM',
    'sengketa_ringkasan' => 'Klaim paket sobek, minus noda jamur tak tertera, dan bukti unboxing terlampir.',
    'target_sla' => '< 2 JAM (PERFORMA 94%)'
];

// LOOP: aktivitas_terbaru (3 contoh baris audit trail)
$aktivitas_terbaru = $aktivitas_terbaru ?? [
    [
        'waktu' => '10 Menit lalu',
        'is_live' => true,
        'role' => 'SUPERADMIN',
        'role_class' => 'role-superadmin',
        'admin' => 'BAYU',
        'aksi' => 'DI-TAKE DOWN',
        'aksi_class' => 'aksi-takedown',
        'objek' => 'Jaket Bape KW Super',
        'tag' => 'ID: #PRD-9902',
        'tag_danger' => false,
        'keterangan' => 'Penjual melanggar klausul autentisitas streetwear tanpa tag bawaan.'
    ],
    [
        'waktu' => '25 Menit lalu',
        'is_live' => false,
        'role' => 'MODERATOR',
        'role_class' => 'role-moderator',
        'admin' => 'TIARA',
        'aksi' => 'DISUSPEND',
        'aksi_class' => 'aksi-suspend',
        'objek' => 'User @scammer_thrift',
        'tag' => 'IP BLOCKED',
        'tag_danger' => true,
        'keterangan' => 'Email terindikasi spam bot & mencoba bypass rekber via WA external.'
    ],
    [
        'waktu' => '1 Jam lalu',
        'is_live' => false,
        'role' => 'SUPERADMIN',
        'role_class' => 'role-superadmin',
        'admin' => 'BAYU',
        'aksi' => 'DISETUJUI',
        'aksi_class' => 'aksi-disetujui',
        'objek' => 'Pencairan Manual Rekber',
        'tag' => '#BTHRF-2025-0881',
        'tag_danger' => false,
        'keterangan' => 'Nominal Rp 3.450.000 dilepaskan ke penjual setelah konfirmasi kurir JNE Trucking valid.'
    ]
];

// DATA: audit_summary
$audit_summary = $audit_summary ?? [
    'ditampilkan' => 3,
    'total_hari_ini' => 420
];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" xml:lang="id">

<?php require __DIR__ . '/../partials/admin-head.php'; ?>

<body class="admin-body">
    <!-- Partial Sidebar Admin -->
    <?php require __DIR__ . '/../partials/admin-sidebar.php'; ?>

    <div class="admin-shell">
        <!-- Partial Topbar Admin -->
        <?php require __DIR__ . '/../partials/admin-topbar.php'; ?>

        <main class="admin-main">
            <div class="admin-container">
                <div class="dashboard-stack">
                    <!-- BAGIAN 1: PAGE HEADER & STATUS STRIP -->
                    <section class="page-header-section">
                        <div class="status-strip-row">
                            <div class="breadcrumb-trail">
                                <span class="breadcrumb-square"></span>
                                <span>ADMIN CONSOLE</span>
                                <span>&gt;</span>
                                <span class="breadcrumb-current">OVERVIEW PLATFORM</span>
                            </div>

                            <div class="status-badges-group">
                                <!-- DATA: platform_status -->
                                <div class="status-pill-live">
                                    <span class="live-dot"></span>
                                    <span><?= htmlspecialchars($platform_status['versi'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                                <div class="status-pill-health">
                                    <?= htmlspecialchars($platform_status['server_health'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                </div>
                            </div>
                        </div>

                        <div class="page-title-row">
                            <div>
                                <h1 class="page-title">DASHBOARD PLATFORM</h1>
                                <p class="page-subtitle">
                                    Pantauan metrik transaksi, audit katalog thrift, dan sengketa rekber real-time se-Indonesia.
                                </p>
                            </div>

                            <div class="page-actions">
                                <button type="button" class="btn-brutal btn-brutal-white" id="btn-unduh-rekap">
                                    <span class="material-symbols-outlined btn-icon">download</span>
                                    <span>UNDUH REKAP</span>
                                </button>
                                <button type="button" class="btn-brutal btn-brutal-yellow" id="btn-sinkron-data">
                                    <span class="material-symbols-outlined btn-icon" id="icon-sinkron">refresh</span>
                                    <span>SINKRON</span>
                                </button>
                            </div>
                        </div>
                    </section>

                    <!-- BAGIAN 2: EMPAT KARTU METRIK UTAMA -->
                    <!-- DATA: stats -->
                    <section class="stat-grid" aria-label="Metrik Utama Platform">
                        <!-- Kartu 1: Total Pengguna -->
                        <article class="stat-card stat-card-white">
                            <div class="stat-corner-tag tag-yellow-cw">#01</div>
                            <div>
                                <div class="stat-label-row">
                                    <span class="material-symbols-outlined stat-label-icon">group</span>
                                    <span>TOTAL PENGGUNA</span>
                                </div>
                                <div class="stat-value"><?= htmlspecialchars($stats['total_pengguna'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                            </div>
                            <div class="stat-footer">
                                <div class="stat-meta-row">
                                    <span class="mini-chip chip-surface">Pembeli: <?= htmlspecialchars($stats['total_pembeli'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                    <span class="mini-chip chip-blue-text"><?= htmlspecialchars($stats['pertumbuhan_pembeli'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                                <div class="stat-meta-row">
                                    <span class="mini-chip chip-surface">Penjual: <?= htmlspecialchars($stats['total_penjual'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                    <span class="mini-chip chip-blue-text"><?= htmlspecialchars($stats['pertumbuhan_penjual'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                            </div>
                        </article>

                        <!-- Kartu 2: Katalog Thrift -->
                        <article class="stat-card stat-card-blue">
                            <div class="stat-corner-tag tag-white-ccw">#02</div>
                            <div>
                                <div class="stat-label-row">
                                    <span class="material-symbols-outlined stat-label-icon">checkroom</span>
                                    <span>KATALOG THRIFT</span>
                                </div>
                                <div class="stat-value"><?= htmlspecialchars($stats['total_katalog'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                            </div>
                            <div class="stat-footer stat-footer-wrap">
                                <span class="mini-chip mini-chip-2 chip-mint">Tersedia: <?= htmlspecialchars($stats['barang_tersedia'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                <span class="mini-chip mini-chip-2 chip-yellow">Dipesan: <?= htmlspecialchars($stats['barang_dipesan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                <span class="mini-chip mini-chip-2 chip-black">Terjual: <?= htmlspecialchars($stats['barang_terjual'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                            </div>
                        </article>

                        <!-- Kartu 3: Total Pesanan -->
                        <article class="stat-card stat-card-pink">
                            <div class="stat-corner-tag tag-yellow-cw-sm">#03</div>
                            <div>
                                <div class="stat-label-row">
                                    <span class="material-symbols-outlined stat-label-icon">receipt_long</span>
                                    <span>TOTAL PESANAN</span>
                                </div>
                                <div class="stat-value"><?= htmlspecialchars($stats['total_pesanan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                            </div>
                            <div class="stat-footer">
                                <div class="stat-meta-row">
                                    <span class="mini-chip mini-chip-2 chip-white">Bulan Ini: <?= htmlspecialchars($stats['pesanan_bulan_ini'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                    <span class="mini-chip chip-black">Sukses Rekber <?= htmlspecialchars($stats['sukses_rekber_pct'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>%</span>
                                </div>
                                <div class="stat-progress-track">
                                    <div class="stat-progress-fill" style="width: <?= htmlspecialchars($stats['sukses_rekber_pct'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>%;"></div>
                                </div>
                            </div>
                        </article>

                        <!-- Kartu 4: GMV Terselesaikan -->
                        <article class="stat-card stat-card-mint">
                            <div class="stat-corner-tag tag-white-ccw-lg">#04</div>
                            <div>
                                <div class="stat-label-row">
                                    <span class="material-symbols-outlined stat-label-icon">payments</span>
                                    <span>GMV TERSELESAIKAN</span>
                                </div>
                                <div class="stat-value"><?= htmlspecialchars($stats['gmv_total'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></div>
                            </div>
                            <div class="stat-footer">
                                <div class="stat-row-box stat-row-box-white">
                                    <span>Bln Berjalan:</span>
                                    <span><?= htmlspecialchars($stats['gmv_bulan_berjalan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                                <div class="stat-row-box stat-row-box-yellow">
                                    <span>Komisi Rekber:</span>
                                    <span><?= htmlspecialchars($stats['komisi_rekber'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                            </div>
                        </article>
                    </section>

                    <!-- BAGIAN 3: SPLIT CONTAINER (DISTRIBUSI PESANAN vs PERLU TINDAKAN) -->
                    <section class="split-grid">
                        <!-- KIRI: Distribusi Pesanan per Status -->
                        <!-- DATA: distribusi_pesanan -->
                        <div class="panel-card">
                            <div class="panel-header">
                                <div>
                                    <div class="panel-title-wrap">
                                        <span class="panel-title-square"></span>
                                        <h2 class="panel-title">DISTRIBUSI PESANAN PER STATUS</h2>
                                    </div>
                                    <p class="panel-subtitle">
                                        Total <?= htmlspecialchars($distribusi_pesanan['total_mingguan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> pesanan aktif &amp; selesai minggu ini pada escrow rekber
                                    </p>
                                </div>
                                <div class="panel-period-badge">
                                    <?= htmlspecialchars($distribusi_pesanan['periode'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                </div>
                            </div>

                            <!-- Stacked Segmented Bar Chart -->
                            <div class="chart-block">
                                <div class="stacked-bar">
                                    <!-- LOOP: distribusi_pesanan_segments -->
                                    <?php foreach ($distribusi_pesanan['segments'] as $seg):
                                        $seg_key = htmlspecialchars($seg['key'], ENT_QUOTES | ENT_XML1, 'UTF-8');
                                        $seg_label = htmlspecialchars($seg['label'], ENT_QUOTES | ENT_XML1, 'UTF-8');
                                        $seg_pct = (int)$seg['persen'];
                                    ?>
                                        <div class="stacked-segment seg-<?= $seg_key ?>"
                                             style="width: <?= $seg_pct ?>%;"
                                             title="<?= $seg_label ?>: <?= $seg_pct ?>%">
                                            <?= $seg_pct ?>%
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="chart-scale-row">
                                    <span>0%</span>
                                    <span>VOLUME TOTAL: <?= htmlspecialchars($distribusi_pesanan['total_mingguan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> TRANSAKSI</span>
                                    <span>100%</span>
                                </div>
                            </div>

                            <!-- Segment Grid Cards -->
                            <div class="segment-grid">
                                <!-- LOOP: distribusi_pesanan_cards -->
                                <?php
                                $total_segments = count($distribusi_pesanan['segments']);
                                foreach ($distribusi_pesanan['segments'] as $idx => $seg):
                                    $seg_key = htmlspecialchars($seg['key'], ENT_QUOTES | ENT_XML1, 'UTF-8');
                                    $seg_label = htmlspecialchars($seg['label'], ENT_QUOTES | ENT_XML1, 'UTF-8');
                                    $seg_jumlah = htmlspecialchars((string)$seg['jumlah'], ENT_QUOTES | ENT_XML1, 'UTF-8');
                                    $seg_pct = htmlspecialchars((string)$seg['persen'], ENT_QUOTES | ENT_XML1, 'UTF-8');
                                    $is_last = ($idx === $total_segments - 1);
                                ?>
                                    <div class="segment-card seg-<?= $seg_key ?><?= $is_last ? ' segment-card-last' : '' ?>">
                                        <div class="segment-name"><?= $seg_label ?></div>
                                        <div class="segment-count"><?= $seg_jumlah ?></div>
                                        <div class="segment-pct"><?= $seg_pct ?>% TOTAL</div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Micro Visual Summary Strip -->
                            <div class="summary-strip">
                                <div class="summary-strip-item">
                                    <span class="material-symbols-outlined summary-strip-icon">verified_user</span>
                                    <span>REKBER ESCROW RETENTION RATE: <?= htmlspecialchars($distribusi_pesanan['escrow_retention_rate'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                                <div class="summary-strip-item">
                                    <span class="material-symbols-outlined summary-strip-icon">local_shipping</span>
                                    <span>RATA-RATA KURIR PICKUP: <?= htmlspecialchars($distribusi_pesanan['rata_pickup'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- KANAN: Perlu Tindakan Segera -->
                        <!-- DATA: perlu_tindakan -->
                        <div class="panel-card">
                            <div class="panel-header panel-header-inline">
                                <div class="panel-title-wrap">
                                    <span class="material-symbols-outlined priority-icon">warning</span>
                                    <h2 class="panel-title">PERLU TINDAKAN</h2>
                                </div>
                                <span class="priority-badge">PRIORITAS</span>
                            </div>

                            <!-- Action Card 1: Laporan Pengguna -->
                            <div class="action-card">
                                <div class="action-card-top">
                                    <div class="action-card-title-wrap">
                                        <span class="dot-square dot-yellow"></span>
                                        <span class="action-card-title">Laporan Pengguna</span>
                                    </div>
                                    <span class="action-count-badge badge-yellow">
                                        <?= htmlspecialchars($perlu_tindakan['laporan_count'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                    </span>
                                </div>
                                <p class="action-card-desc">
                                    <?= htmlspecialchars($perlu_tindakan['laporan_ringkasan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                </p>
                                <a class="action-card-btn action-btn-yellow" href="<?= htmlspecialchars(url('/admin/laporan'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                                    <span>TINJAU LAPORAN</span>
                                    <span class="material-symbols-outlined action-btn-icon">arrow_forward</span>
                                </a>
                            </div>

                            <!-- Action Card 2: Sengketa Rekber -->
                            <div class="action-card">
                                <div class="action-card-top">
                                    <div class="action-card-title-wrap">
                                        <span class="dot-square dot-red"></span>
                                        <span class="action-card-title">Sengketa Rekber</span>
                                    </div>
                                    <span class="action-count-badge badge-error-soft">
                                        <?= htmlspecialchars($perlu_tindakan['sengketa_count'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                    </span>
                                </div>
                                <p class="action-card-desc">
                                    <?= htmlspecialchars($perlu_tindakan['sengketa_ringkasan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                </p>
                                <a class="action-card-btn action-btn-pink" href="<?= htmlspecialchars(url('/admin/pesanan'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                                    <span>MEDIASI REKBER</span>
                                    <span class="material-symbols-outlined action-btn-icon">gavel</span>
                                </a>
                            </div>

                            <!-- Extra Quick SLA Banner -->
                            <div class="sla-banner">
                                <span class="material-symbols-outlined sla-icon">timer</span>
                                <div class="sla-text-wrap">
                                    <span class="sla-label">TARGET SLA ESKALASI</span>
                                    <span class="sla-value"><?= htmlspecialchars($perlu_tindakan['target_sla'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- BAGIAN 4: AKTIVITAS ADMIN TERBARU (AUDIT TRAIL TABLE) -->
                    <section class="audit-card">
                        <div class="audit-toolbar">
                            <div class="audit-toolbar-left">
                                <span class="material-symbols-outlined audit-toolbar-icon">history_edu</span>
                                <h2 class="panel-title">AKTIVITAS ADMIN TERBARU</h2>
                                <span class="audit-live-badge">LIVE AUDIT</span>
                            </div>
                            <a class="audit-all-link" href="<?= htmlspecialchars(url('/admin/log-aktivitas'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                                <span>LIHAT SEMUA LOG</span>
                                <span class="material-symbols-outlined audit-all-icon">arrow_forward</span>
                            </a>
                        </div>

                        <div class="audit-table-scroll">
                            <table class="audit-table">
                                <thead>
                                    <tr>
                                        <th class="col-waktu">WAKTU</th>
                                        <th class="col-admin">ADMIN</th>
                                        <th class="col-aksi">AKSI</th>
                                        <th>OBJEK TINDAKAN &amp; KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- LOOP: aktivitas_terbaru -->
                                    <?php foreach ($aktivitas_terbaru as $log): ?>
                                        <tr>
                                            <td class="cell-waktu">
                                                <?php if (!empty($log['is_live'])): ?>
                                                    <span class="waktu-live-wrap">
                                                        <span class="waktu-dot"></span>
                                                        <span><?= htmlspecialchars($log['waktu'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                                    </span>
                                                <?php else: ?>
                                                    <?= htmlspecialchars($log['waktu'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="admin-cell-wrap">
                                                    <span class="role-badge <?= htmlspecialchars($log['role_class'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                                                        <?= htmlspecialchars($log['role'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                                    </span>
                                                    <span class="admin-cell-name"><?= htmlspecialchars($log['admin'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="aksi-badge <?= htmlspecialchars($log['aksi_class'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                                                    <?= htmlspecialchars($log['aksi'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="objek-title"><?= htmlspecialchars($log['objek'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                                <span class="objek-tag<?= !empty($log['tag_danger']) ? ' objek-tag-danger' : '' ?>">
                                                    <?= htmlspecialchars($log['tag'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
                                                </span>
                                                <span class="objek-desc"><?= htmlspecialchars($log['keterangan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Footer / Mini Pagination -->
                        <!-- DATA: audit_summary -->
                        <div class="audit-footer">
                            <span class="audit-footer-info">
                                MENAMPILKAN <?= htmlspecialchars((string)$audit_summary['ditampilkan'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> DARI <?= htmlspecialchars((string)$audit_summary['total_hari_ini'], ENT_QUOTES | ENT_XML1, 'UTF-8') ?> AKTIVITAS TERCATAT HARI INI
                            </span>
                            <div class="pagination-group">
                                <button type="button" class="page-btn" id="btn-audit-prev" disabled="disabled">&lt; SEBELUMNYA</button>
                                <button type="button" class="page-btn is-current js-audit-page" data-page="1">1</button>
                                <button type="button" class="page-btn js-audit-page" data-page="2">2</button>
                                <button type="button" class="page-btn js-audit-page" data-page="3">3</button>
                                <button type="button" class="page-btn" id="btn-audit-next">SELANJUTNYA &gt;</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <!-- Toast Feedback (JS DOM) -->
    <div class="admin-toast is-hidden" id="admin-toast" role="status" aria-live="polite">
        <span class="material-symbols-outlined">check_circle</span>
        <div>
            <div class="admin-toast-title" id="admin-toast-title">SUKSES</div>
            <div class="admin-toast-msg" id="admin-toast-msg">Aksi berhasil diproses.</div>
        </div>
    </div>

    <!-- JavaScript Interaktif DOM -->
    <script src="<?= htmlspecialchars(url('/assets/js/admin.js'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"></script>
</body>

</html>
