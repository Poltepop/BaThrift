/**
 * BaThrift - JavaScript Interaktivitas Daftar Alamat Pengiriman
 * XHTML-Safe, Native DOM Manipulation tanpa Inline Event Handlers
 */

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal-tambah-alamat');
    const modalTitle = document.getElementById('modal-alamat-title');
    const formAlamat = document.getElementById('form-alamat');

    const btnTambahAlamat = document.getElementById('btn-tambah-alamat');
    const btnCloseModal = document.getElementById('btn-close-modal-alamat');
    const btnBatalModal = document.getElementById('btn-batal-modal-alamat');

    const searchInput = document.getElementById('alamat-search-input');
    const emptyState = document.getElementById('alamat-empty-state');

    const toastSuccess = document.getElementById('toast-success');
    const toastMessage = document.getElementById('toast-message');

    const btnLogout = document.getElementById('btn-sidebar-logout');
    const logoutOverlay = document.getElementById('logout-confirm-overlay');
    const btnCancelLogout = document.getElementById('btn-cancel-logout');

    // Input fields di modal
    const inputId = document.getElementById('alamat-id-input');
    const inputLabel = document.getElementById('input-label-alamat');
    const inputPenerima = document.getElementById('input-nama-penerima');
    const inputNoWa = document.getElementById('input-no-wa');
    const inputKotaKec = document.getElementById('input-kota-kec');
    const inputKodePos = document.getElementById('input-kode-pos');
    const inputAlamatLengkap = document.getElementById('input-alamat-lengkap');
    const inputPatokan = document.getElementById('input-patokan');
    const inputIsUtama = document.getElementById('input-is-utama');

    let toastTimeout = null;

    function showToast(msg) {
        if (!toastSuccess || !toastMessage) return;
        toastMessage.textContent = msg;
        toastSuccess.classList.add('toast-visible');

        if (toastTimeout) {
            clearTimeout(toastTimeout);
        }
        toastTimeout = setTimeout(function () {
            toastSuccess.classList.remove('toast-visible');
        }, 3000);
    }

    function openModal() {
        if (modal) {
            modal.classList.remove('is-hidden');
        }
    }

    function closeModal() {
        if (modal) {
            modal.classList.add('is-hidden');
        }
    }

    function updateCounter() {
        const cards = document.querySelectorAll('.alamat-card');
        const countText = document.getElementById('alamat-count-text');
        const statusPill = document.getElementById('alamat-status-pill');
        if (countText) {
            countText.textContent = cards.length + ' Alamat Tersimpan';
        }
        if (statusPill) {
            statusPill.textContent = 'STATUS: ' + cards.length + ' ALAMAT AKTIF';
        }
    }

    // 1. Buka Modal untuk Tambah Alamat Baru
    if (btnTambahAlamat) {
        btnTambahAlamat.addEventListener('click', function () {
            if (modalTitle) {
                modalTitle.textContent = 'TAMBAH ALAMAT PENGIRIMAN';
            }
            if (formAlamat) {
                formAlamat.reset();
            }
            if (inputId) inputId.value = '';
            if (inputLabel) inputLabel.value = '';
            if (inputPenerima) inputPenerima.value = '';
            if (inputNoWa) inputNoWa.value = '';
            if (inputKodePos) inputKodePos.value = '';
            if (inputAlamatLengkap) inputAlamatLengkap.value = '';
            if (inputPatokan) inputPatokan.value = '';
            if (inputIsUtama) inputIsUtama.checked = false;
            openModal();
        });
    }

    // 2. Buka Modal untuk Ubah Alamat (pre-fill dari data-* card)
    document.querySelectorAll('.btn-ubah-alamat').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const card = btn.closest('.alamat-card');
            if (!card) return;

            if (modalTitle) {
                modalTitle.textContent = 'UBAH ALAMAT PENGIRIMAN';
            }
            if (inputId) inputId.value = card.getAttribute('data-address-id') || '';
            if (inputLabel) inputLabel.value = card.getAttribute('data-label') || '';
            if (inputPenerima) inputPenerima.value = card.getAttribute('data-penerima') || '';
            if (inputNoWa) {
                var rawPhone = card.getAttribute('data-telepon') || '';
                inputNoWa.value = rawPhone.indexOf('0') === 0 ? rawPhone.slice(1) : rawPhone;
            }
            if (inputKotaKec) {
                var kotaVal = card.getAttribute('data-kota-kec') || '';
                if (kotaVal) inputKotaKec.value = kotaVal;
            }
            if (inputKodePos) inputKodePos.value = card.getAttribute('data-kode-pos') || '';
            if (inputAlamatLengkap) inputAlamatLengkap.value = card.getAttribute('data-alamat') || '';
            if (inputPatokan) inputPatokan.value = card.getAttribute('data-patokan') || '';
            if (inputIsUtama) inputIsUtama.checked = card.getAttribute('data-utama') === '1';

            openModal();
        });
    });

    // 3. Tutup Modal
    if (btnCloseModal) {
        btnCloseModal.addEventListener('click', closeModal);
    }
    if (btnBatalModal) {
        btnBatalModal.addEventListener('click', closeModal);
    }
    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    // 4. Submit Form Modal (Front-end preview feedback; siap disambung ke action POST backend)
    if (formAlamat) {
        formAlamat.addEventListener('submit', function (e) {
            if (!formAlamat.getAttribute('action')) {
                e.preventDefault();
                closeModal();
                showToast('ALAMAT PENGIRIMAN BERHASIL DISIMPAN!');
            }
        });
    }

    // 5. Pencarian Alamat Real-time
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const keyword = searchInput.value.trim().toLowerCase();
            const cards = document.querySelectorAll('.alamat-card');
            let visibleCount = 0;

            cards.forEach(function (card) {
                const haystack = card.getAttribute('data-search') || '';
                if (!keyword || haystack.indexOf(keyword) !== -1) {
                    card.classList.remove('is-hidden');
                    visibleCount += 1;
                } else {
                    card.classList.add('is-hidden');
                }
            });

            if (emptyState) {
                if (visibleCount === 0) {
                    emptyState.classList.remove('is-hidden');
                } else {
                    emptyState.classList.add('is-hidden');
                }
            }
        });
    }

    // 6. Tombol Jadikan Alamat Utama & Hapus Alamat (UI Feedback)
    document.querySelectorAll('.btn-set-utama').forEach(function (btn) {
        btn.addEventListener('click', function () {
            showToast('ALAMAT BERHASIL DIJADIKAN ALAMAT UTAMA!');
        });
    });

    document.querySelectorAll('.btn-hapus-alamat').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const card = btn.closest('.alamat-card');
            if (!card) return;
            const label = card.getAttribute('data-label') || 'alamat ini';
            if (window.confirm('Hapus "' + label + '" dari daftar alamat?')) {
                card.remove();
                updateCounter();
                showToast('ALAMAT BERHASIL DIHAPUS.');
            }
        });
    });

    // 7. Modal Konfirmasi Logout
    if (btnLogout && logoutOverlay) {
        btnLogout.addEventListener('click', function () {
            logoutOverlay.classList.remove('is-hidden');
        });
    }
    if (btnCancelLogout && logoutOverlay) {
        btnCancelLogout.addEventListener('click', function () {
            logoutOverlay.classList.add('is-hidden');
        });
    }
    if (logoutOverlay) {
        logoutOverlay.addEventListener('click', function (e) {
            if (e.target === logoutOverlay) {
                logoutOverlay.classList.add('is-hidden');
            }
        });
    }
});
