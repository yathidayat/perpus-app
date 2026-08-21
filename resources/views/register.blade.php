<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota — SIMEKAR</title>

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

        /* Checklist manfaat keanggotaan di panel kiri */
        .benefit-row {
            display: flex;
            align-items: flex-start;
            gap: .85rem;
        }
        .benefit-icon {
            width: 34px;
            height: 34px;
            border-radius: .5rem;
            background-color: rgba(247, 243, 234, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: .95rem;
        }

        /* Panel kanan: form */
        .form-panel {
            background-color: var(--bg);
        }

        .form-card {
            max-width: 460px;
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

        select.input-classic {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%236B6353' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
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

        .link-accent {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }
        .link-accent:hover { color: var(--accent); }

        .password-hint {
            font-size: .76rem;
            color: rgba(43,38,32,.5);
        }

        @media (min-width: 992px) {
            .split-screen { min-height: 100vh; }
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <div class="row g-0 split-screen">

            <!-- PANEL KIRI: Identitas & Manfaat -->
            <div class="col-lg-5 brand-panel paper-texture d-none d-lg-flex flex-column justify-content-between p-5">
                <a href="{{ url('/') }}" class="d-flex align-items-center gap-3 text-decoration-none position-relative" style="z-index:1;">
                    <span class="logo-badge">S</span>
                    <span class="lh-sm">
                        <span class="d-block font-display fs-5 fw-semibold text-white">SIMEKAR</span>
                        <span class="d-block text-uppercase" style="font-size:10px; letter-spacing:.1em; color: rgba(247,243,234,.6);">Perpustakaan SMAN 1 Mekarsari</span>
                    </span>
                </a>

                <div class="position-relative" style="z-index:1;">
                    <span class="badge rounded-pill mb-4" style="background-color: rgba(247,243,234,.12); color: rgba(247,243,234,.85); font-size:.72rem; font-weight:600; letter-spacing:.06em; padding:.4rem .9rem;">
                        Kartu Anggota Baru
                    </span>
                    <h1 class="font-display display-5 mb-3" style="line-height:1.2;">Buat kartu anggota Anda sendiri.</h1>
                    <p style="color: rgba(247,243,234,.65); max-width: 26rem;">
                        Daftar sekali, akses seluruh koleksi fisik dan digital perpustakaan SMA Negeri 1 Mekarsari.
                    </p>

                    <div class="d-flex flex-column gap-4 mt-5">
                        <div class="benefit-row">
                            <span class="benefit-icon"><i class="bi bi-book-half"></i></span>
                            <div>
                                <p class="fw-semibold mb-1">Pinjam hingga 3 judul sekaligus</p>
                                <p class="small mb-0" style="color: rgba(247,243,234,.6);">Masa pinjam 14 hari, bisa diperpanjang satu kali.</p>
                            </div>
                        </div>
                        <div class="benefit-row">
                            <span class="benefit-icon"><i class="bi bi-qr-code"></i></span>
                            <div>
                                <p class="fw-semibold mb-1">Kartu anggota digital</p>
                                <p class="small mb-0" style="color: rgba(247,243,234,.6);">Cukup tunjukkan kode QR di konter peminjaman.</p>
                            </div>
                        </div>
                        <div class="benefit-row">
                            <span class="benefit-icon"><i class="bi bi-bell"></i></span>
                            <div>
                                <p class="fw-semibold mb-1">Pengingat otomatis</p>
                                <p class="small mb-0" style="color: rgba(247,243,234,.6);">Notifikasi sebelum tanggal jatuh tempo pengembalian.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="small mb-0 position-relative" style="color: rgba(247,243,234,.45); z-index:1;">
                    © 2026 SIMEKAR — SMA Negeri 1 Mekarsari.
                </p>
            </div>

            <!-- PANEL KANAN: Form -->
            <div class="col-lg-7 form-panel d-flex align-items-center justify-content-center p-4 p-sm-5">
                <div class="form-card">

                    <!-- Logo tampil di mobile saja -->
                    <a href="{{ url('/') }}" class="d-flex d-lg-none align-items-center gap-3 text-decoration-none mb-5">
                        <span class="logo-badge" style="background-color: var(--primary); color: var(--bg);">S</span>
                        <span class="lh-sm">
                            <span class="d-block font-display fs-5 fw-semibold" style="color: var(--fg);">SIMEKAR</span>
                            <span class="d-block text-uppercase text-accent" style="font-size:10px; letter-spacing:.1em;">Perpustakaan SMAN 1 Mekarsari</span>
                        </span>
                    </a>

                    <span class="stamp-badge mb-4">
                        <i class="bi bi-person-plus"></i> Pendaftaran Anggota
                    </span>
                    <h2 class="font-display display-6 mb-2">Daftar sebagai anggota</h2>
                    <p class="mb-4" style="color: rgba(43,38,32,.6);">Lengkapi data berikut untuk membuat kartu anggota perpustakaan.</p>

                    <form action="{{ route('register.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label-custom d-block">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control input-classic" placeholder="Nama sesuai identitas sekolah" value="{{ old('nama') }}" required autofocus>
                            @error('nama')
                                <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-1">
                                <label for="no_induk" class="form-label-custom d-block">NIS / NIP</label>
                                <input type="text" id="no_induk" name="no_induk" class="form-control input-classic" placeholder="Nomor induk" value="{{ old('no_induk') }}" required>
                                @error('no_induk')
                                    <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
                                @enderror
                        </div>

                        <div class="mb-1">
                            <label for="password" class="form-label-custom d-block">Kata Sandi</label>
                            <div class="input-group-classic d-flex align-items-center">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                                <button type="button" class="btn-toggle" id="togglePassword" aria-label="Tampilkan kata sandi">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <p class="password-hint mb-3">Gunakan kombinasi huruf dan angka agar akun lebih aman.</p>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label-custom d-block">Konfirmasi Kata Sandi</label>
                            <div class="input-group-classic d-flex align-items-center">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi kata sandi" required>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label small" for="terms" style="color: rgba(43,38,32,.7);">
                                Saya menyetujui <a href="#" class="link-accent">ketentuan peminjaman</a> perpustakaan.
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100">Buat Akun</button>
                    </form>

                    <p class="text-center small mt-4 mb-0" style="color: rgba(43,38,32,.6);">
                        Sudah punya akun?
                        <a href="{{ route('login.index') }}" class="link-accent">Masuk di sini</a>
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