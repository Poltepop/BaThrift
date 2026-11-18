<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url() ?>/assets/css/Auth/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="badge-sticker badge-green-1">
            <span>🛍️</span> 100% AMAN &amp; VERIFIKASI
        </div>

        <div class="badge-sticker badge-green-2">
            <span>★</span> GABUNG KOMUNITAS THRIFT
        </div>

        <div class="badge-sticker badge-pink">
            <span>🔥</span> THRIFT HUNTER CLUB
        </div>

        <div class="header">
            <h1>Buat Akun BaThrift</h1>
            <span class="mini-card">#01 Daftar</span>
        </div>

        <div class="highlight-card">Satu akun bisa beli & jual barang preloved favoritemu!</div>
        <div class="notice-card">INFO PENTING: Cukup 1 ID untuk check-out hunting vintage atau posting lapak baju preloved langsung!</div>

        <form action="<?= url('/storeRegister') ?>" method="POST">

            <?php if(isset($model['errors']['nama_lengkap'])): ?> 
                 <div class="field">
                    <label for="nama_lengkap" class="label-error">
                        <p class="label-info">NAMA LENGKAP <span>*</span></p>
                        <p class="label-req">SESUAI DI KTP</p>
                    </label>
                    <div class="input input-error">
                        <input type="text"
                            id="nama_lengkap"
                            name="nama_lengkap"
                            placeholder="Poltepop">
                        <span class="ico" aria-hidden="true">
                            <svg width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.2">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                        </span>
                    </div>
                     <div class="error">
                        <p><?= '! ' . $model['errors']['nama_lengkap'] ?></p>
                    </div>
                </div>

               
            <?php else: ?>
                <div class="field">
                    <label for="nama_lengkap">
                        <p class="label-info">NAMA LENGKAP <span>*</span></p>
                        <p class="label-req">SESUAI DI KTP</p>
                    </label>
                    <div class="input">
                        <input type="text"
                            id="nama_lengkap"
                            name="nama_lengkap"
                            placeholder="Poltepop">
                        <span class="ico" aria-hidden="true">
                            <svg width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.2">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                        </span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($model['errors']['email'])): ?>
                <div class="field">
                    <label for="email" class="label-error">
                        <p class="label-info">EMAIL<span>*</span></p>
                        <p class="label-req">Required</p>
                    </label>
                    <div class="input input-error">
                        <input type="email"
                            id="email"
                            name="email"
                            placeholder="Poltepop@gmail.com">
    
                        <span class="ico" aria-hidden="true">
                            <svg width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.2">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                        </span>
                    </div>
                    <div class="error">
                        <p><?= '! ' . $model['errors']['email'] ?></p>
                    </div>
                </div>
            <?php else: ?>
                <div class="field">
                    <label for="email">
                        <p class="label-info">EMAIL<span>*</span></p>
                        <p class="label-req">Required</p>
                    </label>
                    <div class="input">
                        <input type="email"
                            id="email"
                            name="email"
                            placeholder="Poltepop@gmail.com">
    
                        <span class="ico" aria-hidden="true">
                            <svg width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.2">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                        </span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($model['errors']['phone'])): ?>
                <div class="field">
                    <label for="phone" class="label-error">
                        <p class="label-info">NOMOR WHATSAPP / HP <span>*</span></p>
                        <p class="label-req">Required</p>
                    </label>
                    <div class="input-phone">
                        <div class="phone-prefix">
                            <span>ID</span>
                            <span>+62</span>
                        </div>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="812-3456-7890">
                    </div>
                    <div class="error">
                        <p><?= '! ' . $model['errors']['phone'] ?></p>
                    </div>
                </div>
                <?php else: ?>
                    <div class="field">
                        <label for="phone">
                            <p class="label-info">NOMOR WHATSAPP / HP <span>*</span></p>
                            <p class="label-req">Required</p>
                        </label>
                        <div class="input-phone">
                            <div class="phone-prefix">
                                <span>ID</span>
                                <span>+62</span>
                            </div>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                placeholder="812-3456-7890">
                        </div>
                    </div>
            <?php endif; ?>

            <?php if(isset($model['errors']['password'])): ?>
                <div class="field">
                    <label for="password" class="label-error">
                        <p class="label-info">PASSWORD <span>*</span></p>
                        <p class="label-req">Min. 8 Karakter</p>
                    </label>
                    <div class="input input-error">
                        <input type="password"
                            id="password"
                            name="password"
                            placeholder="">
                        <span class="ico" aria-hidden="true">
                            <svg width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.2">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                        </span>
                    </div>
                    <div class="error">
                        <p><?= '! ' . $model['errors']['password'] ?></p>
                    </div>
                </div>
                <?php else: ?>
                    <div class="field">
                        <label for="password">
                            <p class="label-info">PASSWORD <span>*</span></p>
                            <p class="label-req">Min. 8 Karakter</p>
                        </label>
                        <div class="input">
                            <input type="password"
                                id="password"
                                name="password"
                                placeholder="">
                            <span class="ico" aria-hidden="true">
                                <svg width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.2">
                                    <circle cx="12" cy="12" r="4" />
                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                                </svg>
                            </span>
                        </div>
                    </div>
            <?php endif; ?>


            <?php if(isset($model['errors']['password-re'])): ?>
                <div class="field">
                    <label for="password-re" class="label-error">
                        <p class="label-info">KONFIRMASI KATA SANDI<span>*</span></p>
                        <p class="label-req">Min. 8 Karakter</p>
                    </label>
                    <div class="input input-error">
                        <input type="password"
                            id="password-re"
                            name="password-re"
                            placeholder="">
                        <span class="ico" aria-hidden="true">
                            <svg width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.2">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                        </span>
                    </div>
                    <div class="error">
                        <p><?= '! ' . $model['errors']['password-re'] ?></p>
                    </div>
                </div>
                <?php else: ?>
                    <div class="field">
                        <label for="password-re">
                            <p class="label-info">KONFIRMASI KATA SANDI<span>*</span></p>
                            <p class="label-req">Min. 8 Karakter</p>
                        </label>
                        <div class="input">
                            <input type="password"
                                id="password-re"
                                name="password-re"
                                placeholder="">
                            <span class="ico" aria-hidden="true">
                                <svg width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.2">
                                    <circle cx="12" cy="12" r="4" />
                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                                </svg>
                            </span>
                        </div>
                    </div>
            <?php endif; ?>

            <div class="remember">
                <label class="check"><input type="checkbox" name="remember">Saya menyetujui Syarat & ketentuan serta kebijakan privasi BaThrift</label>
            </div>

            <button class="btn" type="submit">Daftar
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <path d="M5 12h14M13 6l6 6-6 6" />
                </svg>
            </button>
        </form>

        <div class="devider">
            <hr>
            <div class="devider-content">
                Atau Daftar Dengan
            </div>
            <hr>
        </div>

        <div class="socials">
            <a class="btn light" href="#"><b style="font-size:15px">G</b> Google</a>
            <a class="btn light" href="#"><span aria-hidden="true">♪</span> TikTok</a>
        </div>

        <div class="redirect-button">
            <p>Sudah Punay Akun BaThrift?</p>
            <a href="<?= url('/login') ?>">Masuk Di Sini</a>
        </div>

    </div>
</body>

</html>