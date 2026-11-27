// assets/js/buka-toko.js
// Interaktivitas Halaman Buka Toko BaThrift (Pure DOM, XHTML-safe)

document.addEventListener('DOMContentLoaded', () => {
    const storeNameInput = document.getElementById('store-name');
    const storeSlugInput = document.getElementById('store-slug');
    const storeDescInput = document.getElementById('store-desc');
    const originCitySelect = document.getElementById('origin-city');
    const termsCheckbox = document.getElementById('terms-check');
    const storeForm = document.getElementById('store-form');
    const submitBtn = document.getElementById('btn-submit-toko');

    const toastBanner = document.getElementById('toast-buka-toko');
    const toastBox = toastBanner ? toastBanner.querySelector('.toast-feedback-box') : null;
    const toastIcon = document.getElementById('toast-icon');
    const toastTitle = document.getElementById('toast-title');
    const toastMessage = document.getElementById('toast-message');

    let toastTimer = null;

    function showToast(type, title, message) {
        if (!toastBanner || !toastBox) return;

        if (toastTimer) {
            clearTimeout(toastTimer);
        }

        if (type === 'error') {
            toastBox.classList.add('is-error');
            if (toastIcon) toastIcon.textContent = 'error';
        } else {
            toastBox.classList.remove('is-error');
            if (toastIcon) toastIcon.textContent = 'check_circle';
        }

        if (toastTitle) toastTitle.textContent = title;
        if (toastMessage) toastMessage.textContent = message;

        toastBanner.classList.remove('is-hidden');

        toastTimer = setTimeout(() => {
            toastBanner.classList.add('is-hidden');
        }, 4000);
    }

    function updateSlugPreview(value) {
        if (!storeSlugInput) return;

        const trimmed = (value || '').trim();
        if (trimmed === '') {
            storeSlugInput.value = 'nama-toko-kamu';
            return;
        }

        const cleanSlug = trimmed
            .toLowerCase()
            .replace(/[^a-z0-9_-]/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');

        storeSlugInput.value = cleanSlug || 'nama-toko-kamu';
    }

    if (storeNameInput) {
        storeNameInput.addEventListener('input', () => {
            if (storeNameInput.value.length > 30) {
                storeNameInput.value = storeNameInput.value.slice(0, 30);
            }
            updateSlugPreview(storeNameInput.value);
        });
    }

    if (storeForm) {
        storeForm.addEventListener('submit', (event) => {
            const storeName = storeNameInput ? storeNameInput.value.trim() : '';
            const storeDesc = storeDescInput ? storeDescInput.value.trim() : '';
            const city = originCitySelect ? originCitySelect.value : '';
            const termsAccepted = termsCheckbox ? termsCheckbox.checked : false;

            if (!storeName || !storeDesc || !city || !termsAccepted) {
                event.preventDefault();
                showToast(
                    'error',
                    'DATA BELUM LENGKAP!',
                    'Harap lengkapi semua kolom bertanda bintang (*) dan setujui Kode Etik Penjual.'
                );
                return;
            }

            if (submitBtn) {
                const labelEl = submitBtn.querySelector('.btn-submit-label');
                if (labelEl) {
                    labelEl.textContent = 'MENYIAPKAN LAPAK...';
                }
            }
        });
    }
});
