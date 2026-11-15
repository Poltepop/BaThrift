<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url() ?>/assets/css/Auth/login.css">
    <title><?= $model['title'] ?? '' ?></title>
</head>

<body>
    <div class="wrap">

        <div class="banner" role="note">
            <span>Pasar loak digital Indonesia</span><span class="dot"></span>
            <span>🔥 Drop curated jam 19:00 WIB</span><span class="dot"></span>
        </div>

        <div class="main">

            <!-- LEFT -->
            <aside class="panel hero">
                <div class="top-row">
                    <div class="sticker r-l"><span class="pdot"></span>Bathrift HQ // Archive 24</div>
                    <div class="sticker pink">#01 Curated</div>
                </div>

                <div class="sticker r-l" style="margin-left:6px">Hunting gak pakai rugi</div>

                <div>
                    <h1 class="display">Thrift.<br><mark>Jual.</mark><br>Beli.</h1>
                    <p style="margin-top:14px">Platform p2p preloved streetwear tanah air. Nego tipis, amankan stok arsip, dan cuankan lemari bajumu langsung dalam 1 akun.</p>
                </div>

                <div class="stickers">
                    <div class="sticker r-r"><span aria-hidden="true">🔥</span>100% Preloved Curated</div>
                    <div class="sticker blue r-l"><span aria-hidden="true">⇄</span>1 Akun: Buyer &amp; Seller</div>
                    <div class="sticker pink r-r"><span aria-hidden="true">♟</span>Streetwear • Vintage • Y2K</div>
                </div>

                <div class="id-row">
                    <div>
                        <div class="barcode" aria-hidden="true"></div>
                        <div class="id-code">ID-JKT-<br>88290-<br>THRIFT</div>
                    </div>
                    <div class="sticker stamp">Pasar Loak<br>Digital<b>No. 1</b></div>
                </div>
            </aside>

            <!-- RIGHT -->
            <section class="panel card" aria-labelledby="judul">
                <div class="card-head">
                    <span class="tag">Gerbang<br>Masuk</span>
                    <span class="auth-id">#AUTH-02
                        <span class="squares" aria-hidden="true">
                            <i style="background:var(--pink)"></i><i style="background:var(--yellow)"></i><i style="background:var(--blue)"></i>
                        </span>
                    </span>
                </div>

                <div>
                    <h2 id="judul">Masuk ke Bathrift</h2>
                    <p class="lead" style="margin-top:6px">Lanjutkan sesi hunting rilisan langka atau pantau pesanan lapakmu.</p>
                </div>

                <form method="post" action="<?= url('/auth') ?>" novalidate>
                    <div style="display:grid; gap:18px">
                        <div class="field">
                            <label for="email">Email atau No. WhatsApp</label>
                            <div class="input">
                                <input id="email" name="email" type="email" autocomplete="username" placeholder="nama@email.com atau 08xx" aria-describedby="identity-error">
                                <span class="ico" aria-hidden="true">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                        <circle cx="12" cy="12" r="4" />
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                                    </svg>
                                </span>
                            </div>
                            <p class="error" id="identity-error" role="alert"></p>
                        </div>

                        <div class="field">
                            <div class="field-top">
                                <label for="password">Kata sandi</label>
                                <a class="link" href="#">Lupa sandi?</a>
                            </div>
                            <div class="input">
                                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Minimal 8 karakter" aria-describedby="password-error">
                                <button type="button" class="ico" id="toggle" aria-label="Tampilkan kata sandi" aria-pressed="false">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </div>
                            <p class="error" id="password-error" role="alert"></p>
                        </div>

                        <div class="remember">
                            <label class="check"><input type="checkbox" name="remember"> Ingat saya di perangkat ini</label>
                            <span class="secure">Secure<br>256-bit</span>
                        </div>

                        <button class="btn" type="submit">Masuk sekarang
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg>
                        </button>
                    </div>
                </form>

                <span class="divider tag" style="background:var(--paper);box-shadow:none;border-width:2px">Atau masuk dengan</span>

                <div class="socials">
                    <a class="btn light" href="#"><b style="font-size:15px">G</b> Google</a>
                    <a class="btn light" href="#"><span aria-hidden="true">♪</span> TikTok</a>
                </div>

                <div class="signup">
                    <p><strong>Belum punya akun Bathrift?</strong>Daftar gratis langsung dapat kupon ongkir 10K</p>
                    <a class="btn pink" href="#">Daftar sekarang</a>
                </div>

                <div class="meta"><span>Terminal:<br>WEB-CL-99</span><span style="text-align:right">id.bathrift.cc<br>// 2025</span></div>
            </section>
        </div>

        <div class="note">
            <div><span style="display:inline-block;width:6px;height:6px;background:var(--yellow);border:1.5px solid #000;margin-right:8px"></span>Rekening bersama aman 100% — uang diteruskan setelah barang tiba</div>
            <nav><a href="#">Pusat bantuan</a><span></span><a href="#">Aturan lapak</a><span></span><a href="#">Anti-fraud</a></nav>
        </div>

    </div>

    <script>
        // Tampilkan/sembunyikan kata sandi
        const pw = document.getElementById('password');
        const btn = document.getElementById('toggle');
        btn.addEventListener('click', () => {
            const show = pw.type === 'password';
            pw.type = show ? 'text' : 'password';
            btn.setAttribute('aria-pressed', show);
            btn.setAttribute('aria-label', show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
        });
    </script>
</body>

</html>