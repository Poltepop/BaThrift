/**
 * BaThrift - JavaScript Interaktivitas Profil Toko Penjual
 * XHTML-Safe, Native DOM Manipulation tanpa Inline Event Handlers
 */

document.addEventListener('DOMContentLoaded', function () {
    var statusButtons = document.querySelectorAll('.btn-status-tab');
    var searchInput = document.getElementById('shopSearchInput');
    var categoryFilter = document.getElementById('categoryFilter');
    var priceFilter = document.getElementById('priceFilter');
    var sortSelector = document.getElementById('sortSelector');
    var productGrid = document.getElementById('productGrid');
    var countLabel = document.getElementById('productCountLabel');
    var emptyState = document.getElementById('emptySearchState');
    var resetFilterBtn = document.getElementById('btnResetFilters');

    var followBtn = document.getElementById('followBtn');
    var followText = document.getElementById('followText');
    var shareBtn = document.getElementById('shareShopBtn');

    var toastBanner = document.getElementById('toast-profil-toko');
    var toastMessage = document.getElementById('toko-toast-message');
    var toastTimer = null;

    var currentStatus = 'all';
    var currentCategory = 'all';
    var currentPriceRange = 'all';
    var isFollowing = false;

    function showToast(msg) {
        if (!toastBanner || !toastMessage) return;
        toastMessage.textContent = msg;
        toastBanner.classList.remove('is-hidden');

        if (toastTimer) {
            clearTimeout(toastTimer);
        }
        toastTimer = setTimeout(function () {
            toastBanner.classList.add('is-hidden');
        }, 3000);
    }

    function applyFilters() {
        var query = searchInput ? searchInput.value.toLowerCase().trim() : '';
        var items = document.querySelectorAll('.shop-product-item');
        var visibleCount = 0;

        items.forEach(function (item) {
            var itemStatus = item.getAttribute('data-status') || '';
            var itemCat = item.getAttribute('data-category') || '';
            var itemPrice = parseInt(item.getAttribute('data-price') || '0', 10);
            var title = (item.getAttribute('data-title') || '').toLowerCase();

            var matchStatus = (currentStatus === 'all') || (currentStatus === itemStatus);
            var matchCat = (currentCategory === 'all') || (currentCategory === itemCat);
            var matchQuery = !query || title.indexOf(query) !== -1;

            var matchPrice = true;
            if (currentPriceRange === 'under-500') {
                matchPrice = itemPrice < 500000;
            } else if (currentPriceRange === '500-1500') {
                matchPrice = itemPrice >= 500000 && itemPrice <= 1500000;
            } else if (currentPriceRange === 'over-1500') {
                matchPrice = itemPrice > 1500000;
            }

            if (matchStatus && matchCat && matchQuery && matchPrice) {
                item.classList.remove('is-hidden');
                visibleCount++;
            } else {
                item.classList.add('is-hidden');
            }
        });

        if (countLabel) {
            countLabel.textContent = 'Menampilkan ' + visibleCount + ' Produk';
        }

        if (emptyState) {
            if (visibleCount === 0) {
                emptyState.classList.remove('is-hidden');
            } else {
                emptyState.classList.add('is-hidden');
            }
        }
    }

    statusButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            currentStatus = btn.getAttribute('data-status') || 'all';
            statusButtons.forEach(function (b) {
                b.classList.remove('is-active');
            });
            btn.classList.add('is-active');
            applyFilters();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    if (categoryFilter) {
        categoryFilter.addEventListener('change', function () {
            currentCategory = categoryFilter.value || 'all';
            applyFilters();
        });
    }

    if (priceFilter) {
        priceFilter.addEventListener('change', function () {
            currentPriceRange = priceFilter.value || 'all';
            applyFilters();
        });
    }

    if (sortSelector && productGrid) {
        sortSelector.addEventListener('change', function () {
            var criteria = sortSelector.value;
            var items = Array.prototype.slice.call(document.querySelectorAll('.shop-product-item'));

            items.sort(function (a, b) {
                var priceA = parseInt(a.getAttribute('data-price') || '0', 10);
                var priceB = parseInt(b.getAttribute('data-price') || '0', 10);
                var orderA = parseInt(a.getAttribute('data-order') || '0', 10);
                var orderB = parseInt(b.getAttribute('data-order') || '0', 10);

                if (criteria === 'price-asc') return priceA - priceB;
                if (criteria === 'price-desc') return priceB - priceA;
                return orderA - orderB;
            });

            items.forEach(function (el) {
                productGrid.appendChild(el);
            });
        });
    }

    if (resetFilterBtn) {
        resetFilterBtn.addEventListener('click', function () {
            if (searchInput) searchInput.value = '';
            if (categoryFilter) categoryFilter.value = 'all';
            if (priceFilter) priceFilter.value = 'all';
            currentCategory = 'all';
            currentPriceRange = 'all';
            currentStatus = 'all';

            statusButtons.forEach(function (b) {
                if (b.getAttribute('data-status') === 'all') {
                    b.classList.add('is-active');
                } else {
                    b.classList.remove('is-active');
                }
            });
            applyFilters();
        });
    }

    if (followBtn && followText) {
        followBtn.addEventListener('click', function () {
            isFollowing = !isFollowing;
            if (isFollowing) {
                followBtn.classList.add('is-following');
                followText.textContent = 'MENGIKUTI TOKO';
                showToast('Berhasil mengikuti toko ini!');
            } else {
                followBtn.classList.remove('is-following');
                followText.textContent = '+ IKUTI TOKO';
                showToast('Berhenti mengikuti toko.');
            }
        });
    }

    if (shareBtn) {
        shareBtn.addEventListener('click', function () {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(window.location.href).then(function () {
                    showToast('Tautan profil toko disalin ke clipboard!');
                }).catch(function () {
                    showToast('Salin URL toko dari address bar browser.');
                });
            } else {
                showToast('Salin URL toko dari address bar browser.');
            }
        });
    }

    applyFilters();
});
