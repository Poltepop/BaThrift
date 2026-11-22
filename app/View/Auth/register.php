<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<?php require_once __DIR__ . '/../components/input.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" xml:lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $model['title'] ?? '' ?></title>
    <!-- Fonts Google (Satu-satunya sumber eksternal yang diizinkan) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Space+Grotesk:wght@700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <!-- Stylesheet Register (CSS Native dengan CSS Variables) -->
    <link rel="stylesheet" href="<?= url('/assets/css/register.css') ?>" />
</head>
<body class="auth-wrapper">
    <main class="auth-register-container">
        <!-- Lencana / Stiker Melayang Dekoratif Retro Canvas -->
        <div class="floating-badge badge-top-left">
            <span class="material-symbols-outlined icon-fill">local_mall</span>
            <span>100% AMAN &amp; VERIFIKASI</span>
        </div>
        <div class="floating-badge badge-top-right">
            <span class="material-symbols-outlined">local_fire_department</span>
            <span>THRIFT HUNTER CLUB</span>
        </div>
        <div class="floating-badge badge-mid-right">
            <span>GRATIS BIAYA ADMIN!</span>
        </div>

        <!-- Kartu Utama Form Pendaftaran Akun -->
        <div class="register-card">
            <!-- Lencana Miring Atas Kartu -->
            <div class="card-slanted-badge-row">
                <div class="card-slanted-badge">
                    <span class="material-symbols-outlined icon-fill">star</span>
                    <span>GABUNG KOMUNITAS THRIFT</span>
                </div>
            </div>

            <!-- Bagian Header Kartu -->
            <div class="register-header">
                <div class="register-title-row">
                    <h1 class="register-title">BUAT AKUN BATHRIFT</h1>
                    <span class="register-step-badge">#01 DAFTAR</span>
                </div>
                <!-- Subtitle Highlight Pill -->
                <div class="register-subtitle-pill">
                    <span class="material-symbols-outlined">sell</span>
                    <span>Satu akun bisa <strong>beli</strong> &amp; <strong>jual</strong> barang preloved favoritmu!</span>
                </div>
            </div>

            <!-- Kartu Pemberitahuan / Highlight Banner -->
            <div class="register-notice">
                <span class="material-symbols-outlined icon-fill">bolt</span>
                <p class="register-notice-text">
                    INFO PENTING: Cukup 1 ID untuk check-out hunting vintage atau posting lapak baju preloved langsung!
                </p>
            </div>

            <!-- Form Pendaftaran -->
            <form class="form-register" action="<?= url('/storeRegister') ?>" method="post">
                <!-- Field 1: Nama Lengkap -->
                <!-- DATA: old_nama_lengkap -->
                <?php
                renderInput([
                    'name'        => 'nama_lengkap',
                    'label'       => 'NAMA LENGKAP',
                    'id'          => 'reg-name',
                    'placeholder' => 'cth. Dimas Ramadhan',
                    'hint'        => 'Sesuai KTP/Rekening',
                    'icon'        => 'badge',
                    'required'    => false,
                    'value'       => $old_nama_lengkap ?? '',
                    'error'       => $model['errors']['nama_lengkap'] ?? ''
                ]);
                ?>

                <!-- Field 2: Alamat Email -->
                <!-- DATA: old_email -->
                <?php
                renderInput([
                    'name'        => 'email',
                    'label'       => 'ALAMAT EMAIL',
                    'type'        => 'email',
                    'id'          => 'reg-email',
                    'placeholder' => 'nama@email.com',
                    'badge'       => 'VALID',
                    'badge_type'  => 'valid',
                    'icon'        => 'check',
                    'required'    => false,
                    'value'       => $old_email ?? '',
                    'error'       => $model['errors']['email'] ?? ''
                ]);
                ?>

                <!-- Field 3: Nomor WhatsApp / HP -->
                <!-- DATA: old_phone -->
                <?php
                renderInput([
                    'name'        => 'phone',
                    'label'       => 'NOMOR WHATSAPP / HP',
                    'type'        => 'tel',
                    'id'          => 'reg-phone',
                    'prefix'      => '+62',
                    'placeholder' => '812-xxxx-xxxx',
                    'required'    => false,
                    'value'       => $old_phone ?? '',
                    'error'       => $model['errors']['phone'] ?? ''
                ]);
                ?>

                <!-- Field 4: Kata Sandi -->
                <?php
                renderInput([
                    'name'        => 'password',
                    'label'       => 'KATA SANDI',
                    'type'        => 'password',
                    'id'          => 'reg-pwd',
                    'placeholder' => 'Minimal 8 karakter',
                    'hint'        => 'Min. 8 karakter',
                    'required'    => false,
                    'is_password' => true,
                    'value'       => $old_password ?? '',
                    'error'       => $model['errors']['password'] ?? ''
                ]);
                ?>

                <!-- Field 5: Konfirmasi Kata Sandi (Contoh Error State dari Desain) -->
                <?php
                renderInput([
                    'name'        => 'password-re',
                    'label'       => 'KONFIRMASI KATA SANDI',
                    'type'        => 'password',
                    'id'          => 'reg-pwd-confirm',
                    'placeholder' => 'Ulangi kata sandi',
                    'required'    => false,
                    'is_password' => true,
                    'value'       => $old_password_re ?? '',
                    'error'       => $model['errors']['password-re'] ?? ''
                ]);
                ?>

                <!-- Checkbox Syarat & Ketentuan -->
                <div class="terms-wrapper">
                    <label class="terms-label" for="terms-check">
                        <input checked="checked" class="checkbox-bathrift" id="terms-check" name="terms" type="checkbox" value="1" />
                        <span class="terms-text">
                            Saya menyetujui <a class="terms-link" href="<?= url('/syarat-ketentuan') ?>">Syarat &amp; Ketentuan</a> serta <a class="terms-link" href="<?= url('/kebijakan-privasi') ?>">Kebijakan Privasi</a> BaThrift Indonesia.
                        </span>
                    </label>
                </div>

                <!-- Tombol Submit Pendaftaran -->
                <div>
                    <button class="btn-submit-register" type="submit">
                        <span>DAFTAR SEKARANG</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>
            </form>

            <!-- Garis Pemisah Atau Daftar Dengan -->
            <div class="register-divider">
                <div class="divider-line"></div>
                <div class="divider-pill">
                    <span>ATAU DAFTAR DENGAN</span>
                </div>
            </div>

            <!-- Tombol Masuk Pihak Ketiga (OAuth) -->
            <div class="social-grid">
                <!-- DATA: google_auth_url -->
                <a class="btn-social-reg" href="<?= $google_auth_url ?? url('/auth/google') ?>">
                    <svg class="social-icon" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"></path>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"></path>
                    </svg>
                    <span>GOOGLE</span>
                </a>

                <!-- DATA: tiktok_auth_url -->
                <a class="btn-social-reg" href="<?= $tiktok_auth_url ?? url('/auth/tiktok') ?>">
                    <svg class="social-icon" viewBox="0 0 24 24">
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.18 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-3.23.05-6.47.05-9.7z"></path>
                    </svg>
                    <span>TIKTOK</span>
                </a>
            </div>

            <!-- Kotak Pengalihan ke Halaman Login -->
            <div class="login-redirect-card">
                <div class="redirect-info">
                    <span class="material-symbols-outlined">login</span>
                    <span>Sudah punya akun BaThrift?</span>
                </div>
                <a class="btn-login-redirect" href="<?= url('/login') ?>">
                    MASUK DI SINI
                </a>
            </div>
        </div>

        <!-- Strip Barcode Bawah -->
        <div class="register-barcode-strip">
            <div class="barcode-cluster">
                <div class="barcode-bars">
                    <span class="barcode-bar bar-sm"></span>
                    <span class="barcode-bar bar-xs"></span>
                    <span class="barcode-bar bar-md"></span>
                    <span class="barcode-bar bar-sm"></span>
                    <span class="barcode-bar bar-xl"></span>
                    <span class="barcode-bar bar-xs"></span>
                    <span class="barcode-bar bar-sm"></span>
                </div>
                <span class="barcode-code">ID-BTHRF-REG-2024</span>
            </div>
            <span class="barcode-tagline">PASAR LOAK DIGITAL RESMI</span>
        </div>
    </main>

    <!-- Script Interaktif DOM Eksternal -->
    <script src="<?= url('/assets/js/auth.js') ?>"></script>
</body>
</html>
