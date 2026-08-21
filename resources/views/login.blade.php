<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — SIMEKAR</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --bg: #F7F3EA;
            --fg: #2B2620;
            --primary: #2F4538;
            --primary-light: #3E5A49;
            --primary-fg: #F7F3EA;
            --accent: #B08D57;
            --muted: #EDE6D6;
            --border-c: #DCD3BD;
            --card: #FFFDF8;
        }

        body {
            background-color: var(--bg);
            color: var(--fg);
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
        }

        .font-display { font-family: 'Playfair Display', serif; }

        .paper-texture {
            background-image: radial-gradient(#00000010 1px, transparent 1px);
            background-size: 18px 18px;
        }

        /* Panel kiri: identitas & suasana perpustakaan */
        .brand-panel {
            background-color: var(--primary);
            color: var(--bg);
            position: relative;
            overflow: hidden;
        }

        .brand-panel::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(247,243,234,0.06) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
        }

        .logo-badge {
            width: 46px;
            height: 46px;
            border-radius: .5rem;
            background-color: rgba(247, 243, 234, 0.12);
            color: var(--bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        /* Kartu katalog dekoratif di panel kiri */
        .ledger-card {
            background-color: rgba(247, 243, 234, 0.05);
            border: 1px solid rgba(247, 243, 234, 0.18);
            border-radius: .75rem;
        }
        .ledger-card .ledger-row {
            border-bottom: 1px dashed rgba(247, 243, 234, 0.2);
        }
        .ledger-card .ledger-row:last-child { border-bottom: none; }

        /* Panel kanan: form */
        .form-panel {
            background-color: var(--bg);
        }

        .form-card {
            max-width: 400px;
            width: 100%;
        }

        .stamp-badge {
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--accent);
            background-color: rgba(176, 141, 87, 0.1);
            border-radius: 999px;
            padding: .4rem .9rem;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
        }

        .form-label-custom {
            font-size: .82rem;
            font-weight: 600;
            color: var(--fg);
            margin-bottom: .4rem;
        }

        .input-classic {
            background-color: var(--card);
            border: 1px solid var(--border-c);
            border-radius: .6rem;
            padding: .7rem 1rem;
            font-size: .92rem;
            color: var(--fg);
        }
        .input-classic:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(47, 69, 56, 0.12);
            background-color: var(--card);
            color: var(--fg);
        }

        .input-group-classic {
            background-color: var(--card);
            border: 1px solid var(--border-c);
            border-radius: .6rem;
            overflow: hidden;
        }
        .input-group-classic:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(47, 69, 56, 0.12);
        }
        .input-group-classic .form-control {
            border: none;
            background: transparent;
            padding: .7rem 1rem;
            font-size: .92rem;
        }
        .input-group-classic .form-control:focus {
            box-shadow: none;
            outline: none;
        }
        .input-group-classic .btn-toggle {
            background: transparent;
            border: none;
            color: rgba(43,38,32,.5);
            padding: 0 1rem;
        }
        .input-group-classic .btn-toggle:hover { color: var(--fg); }

        .form-check-input {
            border-color: var(--border-c);
        }
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(47, 69, 56, 0.12);
        }

        .btn-primary-custom {
            background-color: var(--primary);
            color: var(--primary-fg, #F7F3EA);
            border: 1px solid var(--primary);
            font-weight: 600;
            border-radius: .6rem;
            padding: .75rem 1rem;
            transition: background-color .15s ease;
        }
        .btn-primary-custom:hover {
            background-color: var(--primary-light);
            color: #F7F3EA;
        }

        .btn-outline-classic {
            background-color: var(--card);
            border: 1px solid var(--border-c);
            border-radius: .6rem;
            padding: .65rem 1rem;
            font-size: .88rem;
            font-weight: 500;
            color: var(--fg);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            transition: background-color .15s ease, border-color .15s ease;
        }
        .btn-outline-classic:hover {
            background-color: var(--muted);
            border-color: var(--border-c);
            color: var(--fg);
        }

        .divider-text {
            display: flex;
            align-items: center;
            gap: .75rem;
            color: rgba(43,38,32,.45);
            font-size: .78rem;
        }
        .divider-text::before, .divider-text::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: var(--border-c);
        }

        .link-accent {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }
        .link-accent:hover { color: var(--accent); }

        @media (min-width: 992px) {
            .split-screen { min-height: 100vh; }
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <div class="row g-0 split-screen">

            <!-- PANEL KIRI: Identitas -->
            <div class="col-lg-5 brand-panel paper-texture d-none d-lg-flex flex-column justify-content-between p-5">
                <a href="#" class="d-flex align-items-center gap-3 text-decoration-none position-relative" style="z-index:1;">
                    <span class="logo-badge">S</span>
                    <span class="lh-sm">
                        <span class="d-block font-display fs-5 fw-semibold text-white">SIMEKAR</span>
                        <span class="d-block text-uppercase" style="font-size:10px; letter-spacing:.1em; color: rgba(247,243,234,.6);">Perpustakaan SMAN 1 Mekarsari</span>
                    </span>
                </a>

                <div class="position-relative" style="z-index:1;">
                    <span class="badge rounded-pill mb-4" style="background-color: rgba(247,243,234,.12); color: rgba(247,243,234,.85); font-size:.72rem; font-weight:600; letter-spacing:.06em; padding:.4rem .9rem;">
                        Kartu Anggota Digital
                    </span>
                    <h1 class="font-display display-5 mb-3" style="line-height:1.2;">Selamat datang kembali di rak Anda.</h1>
                    <p style="color: rgba(247,243,234,.65); max-width: 26rem;">
                        Masuk untuk melanjutkan peminjaman, memperpanjang buku, dan menelusuri koleksi terbaru perpustakaan.
                    </p>

                    <div class="ledger-card p-4 mt-5">
                        <div class="ledger-row d-flex justify-content-between py-2">
                            <span style="color: rgba(247,243,234,.6); font-size:.82rem;">Judul tersedia</span>
                            <span class="font-display fw-semibold">12.480</span>
                        </div>
                        <div class="ledger-row d-flex justify-content-between py-2">
                            <span style="color: rgba(247,243,234,.6); font-size:.82rem;">Anggota aktif</span>
                            <span class="font-display fw-semibold">3.2K+</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span style="color: rgba(247,243,234,.6); font-size:.82rem;">Masa pinjam standar</span>
                            <span class="font-display fw-semibold">14 hari</span>
                        </div>
                    </div>
                </div>

                <p class="small mb-0 position-relative" style="color: rgba(247,243,234,.45); z-index:1;">
                    © {{ date('Y') }} SIMEKAR — SMA Negeri 1 Mekarsari.
                </p>
            </div>

            <!-- PANEL KANAN: Form -->
            <div class="col-lg-7 form-panel d-flex align-items-center justify-content-center p-4 p-sm-5">
                <div class="form-card">

                    <!-- Logo tampil di mobile saja -->
                    <a href="#" class="d-flex d-lg-none align-items-center gap-3 text-decoration-none mb-5">
                        <span class="logo-badge" style="background-color: var(--primary); color: var(--bg);">S</span>
                        <span class="lh-sm">
                            <span class="d-block font-display fs-5 fw-semibold" style="color: var(--fg);">SIMEKAR</span>
                            <span class="d-block text-uppercase text-accent" style="font-size:10px; letter-spacing:.1em;">Perpustakaan SMAN 1 Mekarsari</span>
                        </span>
                    </a>

                    <span class="stamp-badge mb-4">
                        <i class="bi bi-journal-bookmark"></i> Masuk Anggota
                    </span>
                    <h2 class="font-display display-6 mb-2">Masuk ke akun Anda</h2>
                    <p class="mb-4" style="color: rgba(43,38,32,.6);">Gunakan akun email terdaftar untuk melanjutkan.</p>

                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label for="no_induk" class="form-label-custom d-block">NIS / NIP</label>
                            <input type="text" id="no_induk" name="no_induk" class="form-control input-classic" 
                                placeholder="Nomor induk" value="{{ old('no_induk') }}" required>
                            @error('no_induk')
                                <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label-custom d-block mb-0">Kata Sandi</label>
                                <a href="#" class="small link-accent">Lupa kata sandi?</a>
                            </div>
                            <div class="input-group-classic d-flex align-items-center mt-2">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
                                <button type="button" class="btn-toggle" id="togglePassword" aria-label="Tampilkan kata sandi">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label small" for="remember" style="color: rgba(43,38,32,.7);">
                                Ingat saya di perangkat ini
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100">Masuk</button>
                    </form>

                    <p class="text-center small mt-4 mb-0" style="color: rgba(43,38,32,.6);">
                        Belum punya akun?
                        <a href="{{ route('register.index') }}" class="link-accent">Daftar sebagai anggota</a>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            const toggleBtn = document.getElementById('togglePassword');
            const pwdInput = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (toggleBtn && pwdInput && icon) {
                toggleBtn.addEventListener('click', function () {
                    const isPassword = pwdInput.type === 'password';
                    pwdInput.type = isPassword ? 'text' : 'password';
                    icon.classList.toggle('bi-eye');
                    icon.classList.toggle('bi-eye-slash');
                });
            }
        })();
    </script>
</body>

</html>