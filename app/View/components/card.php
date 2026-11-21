<?php
// app/View/components/card.php
// Reusable Product Card Component untuk BaThrift (XHTML5 Valid)

if (!function_exists('renderProductCard')) {
    /**
     * Render satu kartu produk katalog bergaya Neo-Brutalist
     *
     * @param array $product Data produk
     */
    function renderProductCard(array $product): void
    {
        $id = htmlspecialchars((string)($product['id'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $title = htmlspecialchars((string)($product['title'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $brand = htmlspecialchars((string)($product['brand'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $image = htmlspecialchars((string)($product['image'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $alt = htmlspecialchars((string)($product['alt'] ?? $title), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $size = htmlspecialchars((string)($product['size'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $condition = htmlspecialchars((string)($product['condition'] ?? 'good'), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $condition_label = htmlspecialchars((string)($product['condition_label'] ?? 'Baik'), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $price = (int)($product['price'] ?? 0);
        $price_formatted = htmlspecialchars((string)($product['price_formatted'] ?? ('Rp ' . number_format($price, 0, ',', '.'))), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $specs = $product['specs'] ?? [];
        $is_sold = !empty($product['is_sold']);

        $seller = $product['seller'] ?? [];
        $seller_name = htmlspecialchars((string)($seller['name'] ?? 'Penjual'), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $seller_initials = htmlspecialchars((string)($seller['initials'] ?? 'TH'), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $seller_city = htmlspecialchars((string)($seller['city'] ?? 'Indonesia'), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $seller_verified = !empty($seller['verified']);

        // CSS class berdasarkan kondisi
        $cond_class = 'cond-badge-good';
        $cond_icon = 'check_circle';
        if ($condition === 'mint') {
            $cond_class = 'cond-badge-mint';
            $cond_icon = 'verified';
        } elseif ($condition === 'minus') {
            $cond_class = 'cond-badge-minus';
            $cond_icon = 'warning';
        } elseif ($is_sold) {
            $cond_class = 'cond-badge-sold';
            $cond_icon = 'block';
        }
        ?>
        <article class="product-card <?= $is_sold ? 'product-card-sold' : '' ?>" data-product-id="<?= $id ?>">
            <!-- Bagian Gambar & Badge -->
            <div class="product-media-wrapper">
                <?php if ($is_sold): ?>
                    <!-- Cap Terjual Diagonal -->
                    <div class="sold-stamp-overlay">
                        <div class="sold-stamp-badge">TERJUAL !</div>
                    </div>
                <?php endif; ?>

                <img class="product-image" src="<?= $image ?>" alt="<?= $alt ?>" loading="lazy" />

                <!-- Badge Kondisi (Kiri Atas) -->
                <div class="badge-corner badge-top-left">
                    <span class="badge-pill <?= $cond_class ?>">
                        <span class="material-symbols-outlined icon-mini"><?= $cond_icon ?></span>
                        <span><?= $condition_label ?></span>
                    </span>
                </div>

                <!-- Badge Ukuran (Kanan Atas) -->
                <div class="badge-corner badge-top-right">
                    <span class="badge-pill badge-size"><?= $size ?></span>
                </div>

                <!-- Badge Harga (Kanan Bawah) -->
                <div class="badge-corner badge-bottom-right">
                    <span class="badge-pill <?= $is_sold ? 'badge-price-sold' : 'badge-price' ?>">
                        <?= $price_formatted ?>
                    </span>
                </div>
            </div>

            <!-- Konten Informasi Produk -->
            <div class="product-body">
                <div class="product-meta">
                    <div class="product-brand"><?= $brand ?></div>
                    <h3 class="product-title" title="<?= $title ?>">
                        <a href="<?= url('/detail-barang/' . $id) ?>" class="product-link">
                            <?= $title ?>
                        </a>
                    </h3>
                    <?php if (!empty($specs)): ?>
                        <div class="product-specs">
                            <?php
                            $spec_items = [];
                            foreach ($specs as $spec) {
                                $spec_items[] = htmlspecialchars((string)$spec, ENT_QUOTES | ENT_XML1, 'UTF-8');
                            }
                            echo implode(' &#8226; ', $spec_items);
                            ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Informasi Seller / Lapak -->
                <div class="product-seller-row">
                    <div class="seller-info">
                        <div class="seller-avatar"><?= $seller_initials ?></div>
                        <div class="seller-details">
                            <span class="seller-name"><?= $seller_name ?></span>
                            <span class="seller-city"><?= $seller_city ?></span>
                        </div>
                    </div>
                    <?php if ($seller_verified): ?>
                        <span class="material-symbols-outlined seller-verified" title="Penjual Terverifikasi">verified</span>
                    <?php endif; ?>
                </div>

                <!-- Tombol Aksi Bawah -->
                <div class="product-actions">
                    <?php if ($is_sold): ?>
                        <button type="button" class="btn-sold-out" disabled="disabled">
                            Barang Telah Terjual
                        </button>
                    <?php else: ?>
                        <button type="button" class="btn-add-cart" data-action="add-cart" data-title="<?= $title ?>">
                            + Keranjang
                        </button>
                        <button type="button" class="btn-nego" data-action="nego" data-title="<?= $title ?>" data-price="<?= $price ?>">
                            Nego
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </article>
        <?php
    }
}
