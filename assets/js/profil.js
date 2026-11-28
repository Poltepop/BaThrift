/**
 * BaThrift - JavaScript Interaktivitas Profil Saya
 * XHTML-Safe, Native DOM Manipulation tanpa Inline Event Handlers
 */

document.addEventListener('DOMContentLoaded', function () {
    // Referensi Elemen DOM
    const toastSuccess = document.getElementById('toast-success');
    const toastMessage = document.getElementById('toast-message');

    const formProfile = document.getElementById('profile-form');
    const btnEditProfile = document.getElementById('btn-edit-profile');
    const btnSaveProfile = document.getElementById('save-profile-btn');
    const btnCancelProfile = document.getElementById('btn-cancel-profile');

    const avatarFileInput = document.getElementById('avatar-file-input');
    const avatarPreviewImg = document.getElementById('avatar-preview-img');
    const btnDeleteAvatar = document.getElementById('btn-delete-avatar');

    const btnLogout = document.getElementById('btn-sidebar-logout');

    let toastTimeout = null;
    let isEditMode = false;

    /**
     * Tampilkan Toast Feedback Banner
     * @param {string} msg Pesan toast
     */
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

    // 1. Toggle Mode Edit Data Profil (User Request Feature)
    if (btnEditProfile) {
        btnEditProfile.addEventListener('click', function () {
            isEditMode = !isEditMode;
            var editableInputs = document.querySelectorAll('.profil-editable');

            if (isEditMode) {
                editableInputs.forEach(function (input) {
                    input.removeAttribute('readonly');
                });
                btnEditProfile.innerHTML = '<span class="material-symbols-outlined">edit_note</span><span>MODE EDIT AKTIF</span>';
                btnEditProfile.style.backgroundColor = 'var(--warna-aksen-pink)';

                var firstInput = document.getElementById('prof-nama-lengkap');
                if (firstInput) {
                    firstInput.focus();
                }
                showToast('Mode Edit Aktif: Silakan perbarui data profil Anda.');
            } else {
                editableInputs.forEach(function (input) {
                    input.setAttribute('readonly', 'readonly');
                });
                btnEditProfile.innerHTML = '<span class="material-symbols-outlined">edit</span><span>EDIT DATA PROFIL</span>';
                btnEditProfile.style.backgroundColor = '';
                showToast('Mode Edit Dinonaktifkan.');
            }
        });
    }

    // 2. Simpan Perubahan Form
    //    FIX: preventDefault dulu, hapus semua readonly, baru submit manual.
    //    Tanpa ini, browser sudah snapshot nilai field SEBELUM readonly dilepas,
    //    sehingga field readonly tidak ikut terkirim ke POST.
    if (formProfile) {
        formProfile.addEventListener('submit', function (e) {
            e.preventDefault();

            var editableInputs = document.querySelectorAll('.profil-editable');
            editableInputs.forEach(function (input) {
                input.removeAttribute('readonly');
                // <select> tidak mengenal atribut readonly secara native,
                // pastikan disabled juga tidak terpasang
                if (input.tagName.toLowerCase() === 'select') {
                    input.removeAttribute('disabled');
                }
            });

            // Submit programatik setelah semua readonly sudah dilepas
            formProfile.submit();
        });
    }

    // 3. Tombol Batal
    if (btnCancelProfile) {
        btnCancelProfile.addEventListener('click', function () {
            if (formProfile) {
                formProfile.reset();
            }
            if (isEditMode && btnEditProfile) {
                isEditMode = false;
                var editableInputs = document.querySelectorAll('.profil-editable');
                editableInputs.forEach(function (input) {
                    input.setAttribute('readonly', 'readonly');
                });
                btnEditProfile.innerHTML = '<span class="material-symbols-outlined">edit</span><span>EDIT DATA PROFIL</span>';
                btnEditProfile.style.backgroundColor = '';
            }
            showToast('Perubahan dibatalkan.');
        });
    }

    // 4. Upload Foto Profil Baru
    if (avatarFileInput) {
        avatarFileInput.addEventListener('change', function () {
            var file = this.files && this.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    showToast('Ukuran file maksimal 2MB!');
                    return;
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = document.getElementById('avatar-preview-img');
                    var initialsBox = document.getElementById('avatar-preview-initials');

                    if (initialsBox) {
                        initialsBox.style.display = 'none';
                    }
                    if (img) {
                        img.src = e.target.result;
                        img.style.display = '';
                    }
                    showToast('Foto profil baru siap disimpan!');
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // 5. Hapus Foto Profil — hapus file di server & database, lalu kembalikan ke initials
    function resetAvatarPreview() {
        var img = document.getElementById('avatar-preview-img');
        var initialsBox = document.getElementById('avatar-preview-initials');

        if (img) {
            img.src = '';
            img.style.display = 'none';
        }
        if (initialsBox) {
            initialsBox.style.display = '';
        }
        if (avatarFileInput) {
            avatarFileInput.value = '';
        }
    }

    var deleteAvatarOverlay = document.getElementById('delete-avatar-confirm-overlay');
    var btnCancelDeleteAvatar = document.getElementById('btn-cancel-delete-avatar');
    var btnConfirmDeleteAvatar = document.getElementById('btn-confirm-delete-avatar');

    function closeDeleteAvatarModal() {
        if (deleteAvatarOverlay) {
            deleteAvatarOverlay.classList.add('is-hidden');
        }
    }

    if (btnDeleteAvatar) {
        btnDeleteAvatar.addEventListener('click', function () {
            var hasSavedPhoto = btnDeleteAvatar.getAttribute('data-has-photo') === '1';
            var hasSelectedFile = avatarFileInput && avatarFileInput.files && avatarFileInput.files.length > 0;

            if (!hasSavedPhoto && !hasSelectedFile) {
                showToast('Tidak ada foto profil untuk dihapus.');
                return;
            }

            if (deleteAvatarOverlay) {
                deleteAvatarOverlay.classList.remove('is-hidden');
            }
        });
    }

    if (btnCancelDeleteAvatar) {
        btnCancelDeleteAvatar.addEventListener('click', function () {
            closeDeleteAvatarModal();
        });
    }

    if (deleteAvatarOverlay) {
        deleteAvatarOverlay.addEventListener('click', function (e) {
            if (e.target === deleteAvatarOverlay) {
                closeDeleteAvatarModal();
            }
        });
    }

    if (btnConfirmDeleteAvatar && btnDeleteAvatar) {
        btnConfirmDeleteAvatar.addEventListener('click', function () {
            var hasSavedPhoto = btnDeleteAvatar.getAttribute('data-has-photo') === '1';
            closeDeleteAvatarModal();

            if (!hasSavedPhoto) {
                resetAvatarPreview();
                showToast('Foto profil dikembalikan ke inisial.');
                return;
            }

            var deleteUrl = btnDeleteAvatar.getAttribute('data-delete-url');
            if (!deleteUrl) {
                return;
            }

            btnDeleteAvatar.disabled = true;

            fetch(deleteUrl, {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(function (response) {
                    return response.json().then(function (data) {
                        if (!response.ok || !data.success) {
                            throw new Error((data && data.message) || 'Gagal menghapus foto profil.');
                        }
                        return data;
                    });
                })
                .then(function (data) {
                    resetAvatarPreview();
                    btnDeleteAvatar.setAttribute('data-has-photo', '0');
                    showToast(data.message || 'Foto profil berhasil dihapus!');
                })
                .catch(function (err) {
                    showToast(err.message || 'Terjadi kesalahan saat menghapus foto profil.');
                })
                .finally(function () {
                    btnDeleteAvatar.disabled = false;
                });
        });
    }

    // 6. Tombol Keluar dari Akun (Logout Dialog)
    var logoutOverlay = document.getElementById('logout-confirm-overlay');
    var btnCancelLogout = document.getElementById('btn-cancel-logout');
    var btnConfirmLogout = document.getElementById('btn-confirm-logout');

    if (btnLogout && logoutOverlay) {
        btnLogout.addEventListener('click', function () {
            logoutOverlay.classList.remove('is-hidden');
        });
    }

    if (btnCancelLogout && logoutOverlay) {
        btnCancelLogout.addEventListener('click', function () {
            logoutOverlay.classList.add('is-hidden');
            showToast('Batal keluar dari akun.');
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
