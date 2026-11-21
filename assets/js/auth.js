document.addEventListener('DOMContentLoaded', function() {
    // Support toggle password tunggal di form login
    const toggleBtn = document.getElementById('togglePassword');
    const passInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (toggleBtn && passInput && eyeIcon) {
        toggleBtn.addEventListener('click', function() {
            const isPassword = passInput.getAttribute('type') === 'password';
            passInput.setAttribute('type', isPassword ? 'text' : 'password');
            eyeIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
        });
    }

    // Support toggle password generik untuk component input (data-target)
    const toggleButtons = document.querySelectorAll('.btn-toggle-password[data-target]');
    toggleButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const targetId = btn.getAttribute('data-target');
            const targetInput = document.getElementById(targetId);
            const iconSpan = btn.querySelector('.material-symbols-outlined');
            if (targetInput && iconSpan) {
                const isPass = targetInput.getAttribute('type') === 'password';
                targetInput.setAttribute('type', isPass ? 'text' : 'password');
                iconSpan.textContent = isPass ? 'visibility_off' : 'visibility';
            }
        });
    });
});
