<?php
// app/View/partials/admin-head.php
// Partial <head> untuk seluruh halaman Admin BaThrift (XHTML5 Valid)

/**
 * @var string|null $page_title Judul halaman admin
 * @var string|null $extra_css Path CSS tambahan opsional (relatif dari root)
 */
$page_title = $page_title ?? 'Admin Console - BaThrift';
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($page_title, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></title>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..700;1,9..40,400..700&amp;family=Space+Grotesk:wght@500;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <!-- Stylesheet Native Neo-Brutalisme Admin -->
    <link rel="stylesheet" href="<?= htmlspecialchars(url('/assets/css/admin.css'), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" />
    <?php if (!empty($extra_css)): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars(url($extra_css), ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" />
    <?php endif; ?>
</head>
