/**
 * BaThrift - Admin Console Interactive DOM Script
 * Pure Vanilla JS (XHTML5 Safe)
 */
(function () {
    'use strict';

    var sidebar = document.getElementById('admin-sidebar');
    var backdrop = document.getElementById('admin-sidebar-backdrop');
    var toggleBtn = document.getElementById('sidebar-toggle-btn');
    var closeBtn = document.getElementById('sidebar-close-btn');

    function openSidebar() {
        if (!sidebar || !backdrop) {
            return;
        }
        sidebar.classList.add('is-open');
        backdrop.classList.add('is-open');
        if (toggleBtn) {
            toggleBtn.setAttribute('aria-expanded', 'true');
        }
    }

    function closeSidebar() {
        if (!sidebar || !backdrop) {
            return;
        }
        sidebar.classList.remove('is-open');
        backdrop.classList.remove('is-open');
        if (toggleBtn) {
            toggleBtn.setAttribute('aria-expanded', 'false');
        }
    }

    if (toggleBtn) {
        toggleBtn.addEventListener('click', openSidebar);
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }
    if (backdrop) {
        backdrop.addEventListener('click', closeSidebar);
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeSidebar();
        }
    });

    /* Toast Feedback Helper */
    var toastEl = document.getElementById('admin-toast');
    var toastTitleEl = document.getElementById('admin-toast-title');
    var toastMsgEl = document.getElementById('admin-toast-msg');
    var toastTimer = null;

    function showToast(title, message) {
        if (!toastEl || !toastTitleEl || !toastMsgEl) {
            return;
        }
        toastTitleEl.textContent = title;
        toastMsgEl.textContent = message;
        toastEl.classList.remove('is-hidden');

        if (toastTimer) {
            window.clearTimeout(toastTimer);
        }
        toastTimer = window.setTimeout(function () {
            toastEl.classList.add('is-hidden');
        }, 3200);
    }

    /* Tombol Unduh Rekap & Sinkron */
    var btnExport = document.getElementById('btn-unduh-rekap');
    var btnSync = document.getElementById('btn-sinkron-data');
    var syncIcon = document.getElementById('icon-sinkron');

    if (btnExport) {
        btnExport.addEventListener('click', function () {
            showToast('REKAP DISIAPKAN', 'Ringkasan metrik platform siap diunduh.');
        });
    }

    if (btnSync) {
        btnSync.addEventListener('click', function () {
            if (syncIcon) {
                syncIcon.classList.add('is-spinning');
            }
            window.setTimeout(function () {
                if (syncIcon) {
                    syncIcon.classList.remove('is-spinning');
                }
                showToast('DATA TERSINKRON', 'Metrik dashboard diperbarui ke status terbaru.');
            }, 600);
        });
    }

    /* Demo Pagination Audit Trail */
    var pageButtons = document.querySelectorAll('.js-audit-page');
    var prevBtn = document.getElementById('btn-audit-prev');
    var nextBtn = document.getElementById('btn-audit-next');
    var currentPage = 1;
    var totalPages = pageButtons.length || 3;

    function updatePaginationUI(targetPage) {
        currentPage = targetPage;
        pageButtons.forEach(function (btn) {
            var p = parseInt(btn.getAttribute('data-page') || '1', 10);
            if (p === currentPage) {
                btn.classList.add('is-current');
            } else {
                btn.classList.remove('is-current');
            }
        });
        if (prevBtn) {
            prevBtn.disabled = currentPage <= 1;
        }
        if (nextBtn) {
            nextBtn.disabled = currentPage >= totalPages;
        }
    }

    pageButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = parseInt(btn.getAttribute('data-page') || '1', 10);
            updatePaginationUI(target);
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            if (currentPage > 1) {
                updatePaginationUI(currentPage - 1);
            }
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            if (currentPage < totalPages) {
                updatePaginationUI(currentPage + 1);
            }
        });
    }
})();
