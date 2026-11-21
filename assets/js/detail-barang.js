/**
 * BaThrift - JavaScript Interaktivitas Detail Barang
 * XHTML-Safe, Native DOM Manipulation tanpa Inline Event Handlers
 */

document.addEventListener('DOMContentLoaded', function () {
    // Referensi Elemen DOM
    const actionToast = document.getElementById('action-toast');
    const toastMessage = document.getElementById('toast-message');

    // Gallery & Thumbnails
    const mainImg = document.getElementById('main-product-img');
    const thumbButtons = document.querySelectorAll('.thumb-item');
    const btnZoomImage = document.getElementById('btn-zoom-image');
    const btnShareItem = document.getElementById('btn-share-item');

    // Zoom Dialog
    const zoomDialog = document.getElementById('zoom-dialog');
    const zoomFullImg = document.getElementById('zoom-full-img');
    const btnZoomClose = document.getElementById('btn-zoom-close');

    // State Simulation Elements
    const btnStateAvailable = document.getElementById('btn-state-available');
    const btnStateSold = document.getElementById('btn-state-sold');
    const btnStateOwner = document.getElementById('btn-state-owner');

    const bannerSold = document.getElementById('banner-sold');
    const bannerOwner = document.getElementById('banner-owner');
    const soldStamp = document.getElementById('sold-stamp');

    const badgeAvailability = document.getElementById('badge-status-availability');

    const actionsAvailable = document.getElementById('actions-available');
    const actionsSold = document.getElementById('actions-sold');
    const actionsOwner = document.getElementById('actions-owner');

    // Action Buttons
    const btnAddCart = document.getElementById('btn-add-cart');
    const btnBuyNow = document.getElementById('btn-buy-now');
    const btnOpenNego = document.getElementById('btn-open-nego');
    const btnAlertSimilar = document.getElementById('btn-alert-similar');
    const btnOwnerEdit = document.getElementById('btn-owner-edit');
    const btnOwnerStats = document.getElementById('btn-owner-stats');
    const btnOwnerDelete = document.getElementById('btn-owner-delete');

    // Dialog Nego Tipis
    const negoModal = document.getElementById('nego-modal');
    const negoProductName = document.getElementById('nego-product-name');
    const negoProductPrice = document.getElementById('nego-product-price');
    const negoInputAmount = document.getElementById('nego-input-amount');
    const btnNegoClose = document.getElementById('btn-nego-close');
    const btnNegoCancel = document.getElementById('btn-nego-cancel');
    const btnNegoSubmit = document.getElementById('btn-nego-submit');

    // Header Cart Badge
    const cartBtn = document.querySelector('.action-btn.cart-btn');

    let toastTimeout = null;

    /**
     * Tampilkan Toast Feedback Banner
     * @param {string} msg Pesan toast
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

    // 1. Pergantian Foto Galeri (Thumbnail Click)
    thumbButtons.forEach(function (thumbBtn) {
        thumbBtn.addEventListener('click', function () {
            const imgSrc = this.getAttribute('data-image');
            const imgAlt = this.getAttribute('data-alt') || '';

            if (mainImg && imgSrc) {
                mainImg.style.opacity = '0.4';
                setTimeout(function () {
                    mainImg.src = imgSrc;
                    mainImg.alt = imgAlt;
                    mainImg.style.opacity = '1';
                }, 120);
            }

            thumbButtons.forEach(function (btn) {
                btn.classList.remove('thumb-active');
            });
            this.classList.add('thumb-active');
        });
    });

    // 2. Zoom Foto Lightbox
    if (btnZoomImage && zoomDialog && zoomFullImg && mainImg) {
        btnZoomImage.addEventListener('click', function () {
            zoomFullImg.src = mainImg.src;
            zoomFullImg.alt = mainImg.alt;
            if (typeof zoomDialog.showModal === 'function') {
                zoomDialog.showModal();
            } else {
                zoomDialog.setAttribute('open', 'open');
            }
        });
    }

    if (btnZoomClose && zoomDialog) {
        btnZoomClose.addEventListener('click', function () {
            if (typeof zoomDialog.close === 'function') {
                zoomDialog.close();
            } else {
                zoomDialog.removeAttribute('open');
            }
        });
    }

    // 3. Tombol Bagikan (Salin Tautan)
    if (btnShareItem) {
        btnShareItem.addEventListener('click', function () {
            if (navigator.clipboard && window.location.href) {
                navigator.clipboard.writeText(window.location.href);
            }
            showToast('Tautan barang berhasil disalin!');
        });
    }

    // 4. Simulasi Status Barang (Testing Bar)
    function switchState(stateName) {
        [btnStateAvailable, btnStateSold, btnStateOwner].forEach(function (btn) {
            if (btn) btn.classList.remove('sim-active');
        });

        if (stateName === 'sold') {
            if (btnStateSold) btnStateSold.classList.add('sim-active');

            if (bannerSold) bannerSold.classList.remove('is-hidden');
            if (bannerOwner) bannerOwner.classList.add('is-hidden');
            if (soldStamp) soldStamp.classList.remove('is-hidden');

            if (actionsAvailable) actionsAvailable.classList.add('is-hidden');
            if (actionsSold) actionsSold.classList.remove('is-hidden');
            if (actionsOwner) actionsOwner.classList.add('is-hidden');

            if (badgeAvailability) {
                badgeAvailability.className = 'badge-availability avail-sold';
                badgeAvailability.textContent = 'SUDAH TERJUAL';
            }

            showToast('Status: Barang Terjual (Sold Out)');
        } else if (stateName === 'owner') {
            if (btnStateOwner) btnStateOwner.classList.add('sim-active');

            if (bannerSold) bannerSold.classList.add('is-hidden');
            if (bannerOwner) bannerOwner.classList.remove('is-hidden');
            if (soldStamp) soldStamp.classList.add('is-hidden');

            if (actionsAvailable) actionsAvailable.classList.add('is-hidden');
            if (actionsSold) actionsSold.classList.add('is-hidden');
            if (actionsOwner) actionsOwner.classList.remove('is-hidden');

            if (badgeAvailability) {
                badgeAvailability.className = 'badge-availability avail-owner';
                badgeAvailability.textContent = 'BARANG MILIK ANDA';
            }

            showToast('Status: Mode Penjual / Milik Sendiri');
        } else {
            // Default Available
            if (btnStateAvailable) btnStateAvailable.classList.add('sim-active');

            if (bannerSold) bannerSold.classList.add('is-hidden');
            if (bannerOwner) bannerOwner.classList.add('is-hidden');
            if (soldStamp) soldStamp.classList.add('is-hidden');

            if (actionsAvailable) actionsAvailable.classList.remove('is-hidden');
            if (actionsSold) actionsSold.classList.add('is-hidden');
            if (actionsOwner) actionsOwner.classList.add('is-hidden');

            if (badgeAvailability) {
                badgeAvailability.className = 'badge-availability avail-ready';
                badgeAvailability.innerHTML = '<span class="ping-dot"></span><span>TERSEDIA (READY)</span>';
            }

            showToast('Status: Barang Tersedia (Ready)');
        }
    }

    if (btnStateAvailable) {
        btnStateAvailable.addEventListener('click', function () {
            switchState('available');
        });
    }

    if (btnStateSold) {
        btnStateSold.addEventListener('click', function () {
            switchState('sold');
        });
    }

    if (btnStateOwner) {
        btnStateOwner.addEventListener('click', function () {
            switchState('owner');
        });
    }

    // 5. Tambah ke Keranjang (+ Keranjang)
    if (btnAddCart) {
        btnAddCart.addEventListener('click', function () {
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
            showToast('✓ Barang dimasukkan ke keranjang belanja!');
        });
    }

    // 6. Beli Sekarang
    if (btnBuyNow) {
        btnBuyNow.addEventListener('click', function () {
            showToast('Mengalihkan ke Checkout Aman BaThrift...');
        });
    }

    // 7. Modal Nego Tipis
    function openNegoModal(title, price) {
        if (!negoModal) return;
        if (negoProductName) negoProductName.textContent = title;
        if (negoProductPrice) negoProductPrice.textContent = formatRupiah(price);
        if (negoInputAmount) {
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

    if (btnOpenNego) {
        btnOpenNego.addEventListener('click', function () {
            const title = this.getAttribute('data-title') || 'Carhartt Detroit Jacket';
            const price = parseInt(this.getAttribute('data-price'), 10) || 1450000;
            openNegoModal(title, price);
        });
    }

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

    // 8. Notifikasi Barang Serupa (State Sold)
    if (btnAlertSimilar) {
        btnAlertSimilar.addEventListener('click', function () {
            showToast('Notifikasi barang serupa diaktifkan!');
        });
    }

    // 9. Tombol Pengaturan Owner
    if (btnOwnerEdit) {
        btnOwnerEdit.addEventListener('click', function () {
            showToast('Membuka formulir sunting barang...');
        });
    }

    if (btnOwnerStats) {
        btnOwnerStats.addEventListener('click', function () {
            showToast('Statistik Lapak: 412 Dilihat • 38 Disukai • 5 Pengajuan Nego');
        });
    }

    if (btnOwnerDelete) {
        btnOwnerDelete.addEventListener('click', function () {
            const confirmed = window.confirm('Yakin ingin menghapus postingan thrift ini dari katalog?');
            if (confirmed) {
                showToast('Postingan berhasil dihapus dari etalase!');
            }
        });
    }
});
