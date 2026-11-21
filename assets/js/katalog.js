/**
 * BaThrift - JavaScript Interaktivitas Katalog Belanja
 * XHTML-Safe, Native DOM Manipulation tanpa Inline Event Handlers
 */

document.addEventListener('DOMContentLoaded', function () {
    // Referensi Elemen DOM
    const actionToast = document.getElementById('action-toast');
    const toastMessage = document.getElementById('toast-message');
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('main-search-input');
    const trendingTags = document.querySelectorAll('.tag-pill');
    const categoryChips = document.querySelectorAll('.category-chip');
    const sizeChips = document.querySelectorAll('.size-chip');
    const condChips = document.querySelectorAll('.cond-chip');
    const sortSelect = document.getElementById('sort-select');
    const btnResetFilters = document.getElementById('btn-reset-filters');
    const btnResetEmpty = document.getElementById('btn-reset-empty');
    const btnWishAlert = document.getElementById('btn-wish-alert');
    const btnToggleEmpty = document.getElementById('btn-toggle-empty');
    const productGrid = document.getElementById('product-grid');
    const emptyStateView = document.getElementById('empty-state-view');
    const resultsCountText = document.getElementById('results-count-text');

    // Dialog Modal Nego
    const negoModal = document.getElementById('nego-modal');
    const negoProductName = document.getElementById('nego-product-name');
    const negoProductPrice = document.getElementById('nego-product-price');
    const negoInputAmount = document.getElementById('nego-input-amount');
    const btnNegoClose = document.getElementById('btn-nego-close');
    const btnNegoCancel = document.getElementById('btn-nego-cancel');
    const btnNegoSubmit = document.getElementById('btn-nego-submit');

    // Keranjang Counter di Header
    const cartBtn = document.querySelector('.action-btn.cart-btn');

    let toastTimeout = null;

    /**
     * Tampilkan Toast Feedback Banner
     * @param {string} msg Pesan yang ingin ditampilkan
     */
    function showToast(msg) {
        if (!actionToast || !toastMessage) return;
        toastMessage.textContent = msg;
        actionToast.classList.add('toast-visible');

        if (toastTimeout) {
            clearTimeout(toastTimeout);
        }

        toastTimeout = setTimeout(function () {
            actionToast.classList.remove('toast-visible');
        }, 2600);
    }

    /**
     * Format angka ke Rupiah
     * @param {number} num
     * @returns {string}
     */
    function formatRupiah(num) {
        return 'Rp ' + Number(num).toLocaleString('id-ID');
    }

    // 1. Submit Form Pencarian Utama
    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const query = searchInput ? searchInput.value.trim() : '';
            if (query === '') {
                showToast('Masukkan kata kunci pencarian...');
                return;
            }
            showToast('Mencari "' + query + '"...');
        });
    }

    // 2. Klik Tag Tren Dicari
    trendingTags.forEach(function (tagBtn) {
        tagBtn.addEventListener('click', function () {
            const tag = this.getAttribute('data-tag') || this.textContent.trim();
            if (searchInput) {
                searchInput.value = tag;
            }
            showToast('Mencari tag: ' + tag);
        });
    });

    // 3. Filter Kategori Chips
    categoryChips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            categoryChips.forEach(function (c) {
                c.classList.remove('chip-active');
            });
            this.classList.add('chip-active');
            const catName = this.textContent.trim();
            showToast('Kategori: ' + catName.toUpperCase());
        });
    });

    // 4. Filter Ukuran (Size Chips)
    sizeChips.forEach(function (sizeBtn) {
        sizeBtn.addEventListener('click', function () {
            sizeChips.forEach(function (s) {
                s.classList.remove('size-active');
            });
            this.classList.add('size-active');
            const size = this.getAttribute('data-size') || this.textContent.trim();
            showToast('Ukuran dipilih: ' + size);
        });
    });

    // 5. Filter Kondisi (Condition Chips)
    condChips.forEach(function (condBtn) {
        condBtn.addEventListener('click', function () {
            const isCurrentlyActive = this.classList.contains('cond-active');
            condChips.forEach(function (c) {
                c.classList.remove('cond-active');
            });
            if (!isCurrentlyActive) {
                this.classList.add('cond-active');
                const cond = this.getAttribute('data-cond') || this.textContent.trim();
                showToast('Kondisi: ' + cond);
            } else {
                showToast('Filter kondisi dimatikan');
            }
        });
    });

    // 6. Urutkan Dropdown (Sort Select)
    if (sortSelect) {
        sortSelect.addEventListener('change', function () {
            const selectedText = this.options[this.selectedIndex].text;
            showToast('Urutan: ' + selectedText);
        });
    }

    // 7. Fungsi Reset Filter
    function resetAllFilters() {
        if (searchInput) {
            searchInput.value = '';
        }

        categoryChips.forEach(function (c, idx) {
            if (idx === 0) {
                c.classList.add('chip-active');
            } else {
                c.classList.remove('chip-active');
            }
        });

        sizeChips.forEach(function (s) {
            s.classList.remove('size-active');
        });

        condChips.forEach(function (c) {
            c.classList.remove('cond-active');
        });

        if (sortSelect) {
            sortSelect.selectedIndex = 0;
        }

        // Kembalikan grid produk normal
        if (emptyStateView && productGrid) {
            emptyStateView.classList.add('is-hidden');
            productGrid.style.display = '';
            if (resultsCountText) {
                resultsCountText.textContent = 'Menampilkan 8 dari 184 Harta Karun Terkurasi';
            }
        }

        showToast('FILTER TELAH DIRESET');
    }

    if (btnResetFilters) {
        btnResetFilters.addEventListener('click', resetAllFilters);
    }
    if (btnResetEmpty) {
        btnResetEmpty.addEventListener('click', resetAllFilters);
    }

    // 8. Wish-Alert Notifikasi di Empty State
    if (btnWishAlert) {
        btnWishAlert.addEventListener('click', function () {
            showToast('Wish-Alert Notifikasi Diaktifkan!');
        });
    }

    // 9. Tombol Tes Kondisi Kosong (Mock Empty State Toggle)
    if (btnToggleEmpty) {
        btnToggleEmpty.addEventListener('click', function () {
            if (!emptyStateView || !productGrid) return;
            const isHidden = emptyStateView.classList.contains('is-hidden');
            if (isHidden) {
                emptyStateView.classList.remove('is-hidden');
                productGrid.style.display = 'none';
                if (resultsCountText) {
                    resultsCountText.textContent = 'Menampilkan 0 Harta Karun (Hasil Nihil)';
                }
                showToast('Preview Kondisi Kosong Aktif');
            } else {
                emptyStateView.classList.add('is-hidden');
                productGrid.style.display = '';
                if (resultsCountText) {
                    resultsCountText.textContent = 'Menampilkan 8 dari 184 Harta Karun Terkurasi';
                }
                showToast('Katalog Normal Ditampilkan');
            }
        });
    }

    // 10. Tambah ke Keranjang (+ Keranjang)
    document.addEventListener('click', function (e) {
        const addBtn = e.target.closest('[data-action="add-cart"]');
        if (addBtn) {
            const productTitle = addBtn.getAttribute('data-title') || 'Barang';
            // Perbarui badge keranjang di header
            if (cartBtn) {
                let badge = cartBtn.querySelector('.cart-badge');
                if (badge) {
                    const currentCount = parseInt(badge.textContent, 10) || 0;
                    badge.textContent = (currentCount + 1).toString();
                } else {
                    const newBadge = document.createElement('span');
                    newBadge.className = 'cart-badge';
                    newBadge.textContent = '1';
                    cartBtn.appendChild(newBadge);
                }
            }
            showToast('+' + productTitle + ' masuk keranjang!');
        }
    });

    // 11. Modal Nego Tipis
    function openNegoModal(title, price) {
        if (!negoModal) return;
        if (negoProductName) negoProductName.textContent = title;
        if (negoProductPrice) negoProductPrice.textContent = formatRupiah(price);
        if (negoInputAmount) {
            // Berikan saran tawar 90% dari harga
            negoInputAmount.value = Math.floor(price * 0.9);
        }

        if (typeof negoModal.showModal === 'function') {
            negoModal.showModal();
        } else {
            negoModal.setAttribute('open', 'open');
        }
    }

    function closeNegoModal() {
        if (!negoModal) return;
        if (typeof negoModal.close === 'function') {
            negoModal.close();
        } else {
            negoModal.removeAttribute('open');
        }
    }

    document.addEventListener('click', function (e) {
        const negoBtn = e.target.closest('[data-action="nego"]');
        if (negoBtn) {
            const title = negoBtn.getAttribute('data-title') || 'Barang Preloved';
            const price = parseInt(negoBtn.getAttribute('data-price'), 10) || 0;
            openNegoModal(title, price);
        }
    });

    if (btnNegoClose) {
        btnNegoClose.addEventListener('click', closeNegoModal);
    }
    if (btnNegoCancel) {
        btnNegoCancel.addEventListener('click', closeNegoModal);
    }

    if (btnNegoSubmit) {
        btnNegoSubmit.addEventListener('click', function () {
            const amount = negoInputAmount ? parseInt(negoInputAmount.value, 10) : 0;
            if (!amount || amount <= 0) {
                showToast('Masukkan tawaran harga yang valid');
                return;
            }
            closeNegoModal();
            showToast('Tawaran ' + formatRupiah(amount) + ' Terkirim ke Penjual!');
        });
    }

    // 12. Navigasi Halaman (Pagination)
    const pageButtons = document.querySelectorAll('.page-btn');
    pageButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            pageButtons.forEach(function (b) {
                b.classList.remove('page-active');
            });
            this.classList.add('page-active');
            const pageNum = this.textContent.trim();
            showToast('Beralih ke Halaman ' + pageNum);
            window.scrollTo({ top: 380, behavior: 'smooth' });
        });
    });

    const nextBtn = document.querySelector('.page-btn-next');
    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            showToast('Beralih ke Halaman Selanjutnya');
            window.scrollTo({ top: 380, behavior: 'smooth' });
        });
    }
});
