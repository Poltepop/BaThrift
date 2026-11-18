<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url() ?>/assets/css/Admin/dashboard.css">
    <title><?= $model['title'] ?? '' ?></title>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="brand">
                <h1>BaThrift</h1>
                <span>ADMIN</span>
            </div>

            <ul>
                <li class="active"><a href="<?= url() ?>dashboard">Dashboard</a></li>
                <li><a href="<?= url() ?>dashboard/kategori">Kategori</a></li>
                <li><a href="<?= url() ?>dashboard/pengguna">Pengguna</a></li>
                <li><a href="<?= url() ?>dashboard/barang">Barang</a></li>
                <li><a href="<?= url() ?>dashboard/laporan">Laporan</a></li>
                <li><a href="<?= url() ?>dashboard/pesanan">Pesanan</a></li>
                <li><a href="<?= url() ?>dashboard/log_aktivitas">Log Aktivitas</a></li>
            </ul>
        </div>
        <!-- Content -->
         <div class="content">
            <h1>DASHBOARD</h1>
         </div>
    </div>
</body>
</html>