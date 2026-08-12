<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMEKAR — Sistem Informasi Perpustakaan SMA Negeri 1 Mekarsari</title>

    <!-- Google Fonts: Playfair Display (display serif, klasik) + Inter (body, modern) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --bg: #F7F3EA;
            --fg: #2B2620;
            --primary: #2F4538;
            --primary-light: #3E5A49;
            --primary-fg: #F7F3EA;
            --accent: #B08D57;
            --accent-fg: #2B2620;
            --muted: #EDE6D6;
            --muted-fg: #6B6353;
            --border-c: #DCD3BD;
            --card: #FFFDF8;

            /* Override Bootstrap theme colors so utilities/components match the palette */
            --bs-primary: var(--primary);
            --bs-primary-rgb: 47, 69, 56;
            --bs-body-bg: var(--bg);
            --bs-body-color: var(--fg);
            --bs-border-color: var(--border-c);
            --bs-body-font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--fg);
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        .text-accent { color: var(--accent) !important; }
        .bg-accent { background-color: var(--accent) !important; }
        .bg-primary-custom { background-color: var(--primary) !important; }
        .text-primary-custom { color: var(--primary) !important; }
        .bg-primary-light { background-color: var(--primary-light) !important; }
        .bg-muted { background-color: var(--muted) !important; }
        .text-muted-custom { color: var(--muted-fg) !important; }
        .bg-card { background-color: var(--card) !important; }
        .border-custom { border-color: var(--border-c) !important; }

        .btn-primary-custom {
            background-color: var(--primary);
            color: var(--primary-fg);
            border: 1px solid var(--primary);
            font-weight: 600;
            transition: background-color .15s ease;
        }
        .btn-primary-custom:hover {
            background-color: var(--primary-light);
            color: var(--primary-fg);
        }

        .btn-accent-custom {
            background-color: var(--accent);
            color: var(--primary);
            border: 1px solid var(--accent);
            font-weight: 600;
            transition: filter .15s ease;
        }
        .btn-accent-custom:hover {
            filter: brightness(0.95);
            color: var(--primary);
        }

        .btn-outline-custom {
            background-color: transparent;
            color: var(--fg);
            border: 1px solid var(--border-c);
            font-weight: 500;
        }
        .btn-outline-custom:hover {
            background-color: var(--muted);
            color: var(--fg);
        }

        .paper-texture {
            background-image: radial-gradient(#00000008 1px, transparent 1px);
            background-size: 18px 18px;
        }

        /* Signature: tab motif ala kartu katalog perpustakaan lama */
        .catalog-tab {
            position: relative;
        }
        .catalog-tab::before {
            content: "KARTU KATALOG";
            position: absolute;
            top: -14px;
            left: 22px;
            background: var(--primary);
            color: var(--bg);
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            letter-spacing: .08em;
            padding: 4px 12px;
            border-radius: 6px 6px 0 0;
            font-weight: 600;
        }

        .divider-dot {
            background-image: radial-gradient(var(--accent) 1.5px, transparent 1.5px);
            background-size: 8px 8px;
            height: 2px;
        }

        .navbar-custom {
            background-color: rgba(247, 243, 234, 0.9);
            backdrop-filter: blur(6px);
            border-bottom: 1px solid var(--border-c);
        }

        .nav-link-custom {
            color: var(--fg);
            font-weight: 500;
            font-size: .9rem;
        }
        .nav-link-custom:hover {
            color: var(--accent);
        }

        .logo-badge {
            width: 44px;
            height: 44px;
            border-radius: .5rem;
            background-color: var(--primary);
            color: var(--bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .badge-pill-custom {
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

        .stat-card {
            border-radius: 1rem;
            padding: 1.5rem;
            height: 100%;
            min-height: 176px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 8px 20px -8px rgba(43,38,32,0.15);
        }

        .category-card, .book-card, .faq-item {
            background-color: var(--card);
            border: 1px solid var(--border-c);
            border-radius: .75rem;
            transition: box-shadow .15s ease, border-color .15s ease;
        }
        .category-card:hover {
            border-color: var(--primary);
            box-shadow: 0 6px 16px -6px rgba(43,38,32,0.15);
        }
        .book-card:hover {
            box-shadow: 0 10px 24px -8px rgba(43,38,32,0.18);
        }

        .book-cover {
            height: 170px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            text-align: center;
        }

        .step-item {
            border-left: 2px solid var(--border-c);
            padding-left: 1.5rem;
            position: relative;
        }
        .step-item::before {
            content: "";
            position: absolute;
            left: -9px;
            top: 0;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background-color: var(--primary);
        }

        .cta-box {
            background-color: var(--primary);
            color: var(--bg);
            border-radius: 1rem;
        }

        .footer-custom {
            background-color: var(--primary);
            color: rgba(247, 243, 234, 0.8);
        }
        .footer-custom a {
            color: rgba(247, 243, 234, 0.8);
            text-decoration: none;
        }
        .footer-custom a:hover {
            color: var(--bg);
        }

        .search-bar {
            background-color: var(--card);
            border: 1px solid var(--border-c);
            border-radius: .75rem;
            box-shadow: 0 8px 24px -8px rgba(43,38,32,0.15);
        }
        .search-bar input {
            border: none;
            background: transparent;
            font-size: .9rem;
        }
        .search-bar input:focus {
            outline: none;
            box-shadow: none;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--card);
            color: var(--fg);
            box-shadow: none;
        }
        .accordion-button:focus {
            box-shadow: none;
            border-color: var(--border-c);
        }
        .accordion-button::after {
            filter: none;
        }
        .accordion-item {
            background-color: var(--card);
            border-color: var(--border-c);
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-custom sticky-top py-3">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <span class="logo-badge">S</span>
                <span class="lh-sm">
                    <span class="d-block font-display fw-semibold fs-6">SIMEKAR</span>
                    <span class="d-block text-accent text-uppercase" style="font-size:10px; letter-spacing:.1em;">Perpustakaan SMAN 1 Mekarsari</span>
                </span>
            </a>

            <button class="navbar-toggler border-custom" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mobileMenu">
                <ul class="navbar-nav mx-auto gap-md-4 mt-3 mt-md-0">
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#katalog">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#kategori">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#cara-kerja">Cara Pinjam</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#faq">FAQ</a></li>
                </ul>
                <div class="d-flex flex-column flex-md-row gap-2 mt-3 mt-md-0">
                    <a href="{{ route('login.index') }}" class="btn btn-outline-custom btn-sm px-4 py-2">Masuk</a>
                    <a href="#daftar" class="btn btn-primary-custom btn-sm px-4 py-2">Daftar Anggota</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="paper-texture py-5 py-lg-6">
        <div class="container px-4 px-lg-5 py-4 py-lg-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge-pill-custom">
                        <span class="rounded-circle bg-accent" style="width:6px;height:6px;"></span> Katalog Digital Sekolah
                    </span>
                    <h1 class="font-display display-4 mt-4 mb-3" style="line-height:1.15;">
                        Perpustakaan sekolah, kini di ujung jari.
                    </h1>
                    <p class="fs-6 fs-lg-5" style="max-width: 32rem; color: rgba(43,38,32,.7);">
                        SIMEKAR membantu siswa dan guru SMA Negeri 1 Mekarsari mencari,
                        meminjam, dan mengelola koleksi buku perpustakaan secara digital.
                    </p>

                    <!-- Signature: kartu katalog search -->
                    <div class="mt-5 catalog-tab">
                        <div class="search-bar p-2 d-flex flex-column flex-sm-row gap-2">
                            <div class="d-flex align-items-center gap-2 flex-grow-1 px-2">
                                <i class="bi bi-search" style="color: rgba(43,38,32,.4);"></i>
                                <input type="text" placeholder="Cari judul, penulis, atau ISBN..." class="form-control-plaintext w-100 py-2">
                            </div>
                            <button class="btn btn-primary-custom px-4 py-2 flex-shrink-0">Cari Buku</button>
                        </div>
                    </div>
                    <p class="small mt-3" style="color: rgba(43,38,32,.5);">Populer: Fiksi Remaja · Buku Pelajaran · Sejarah · Sains</p>
                </div>

                <!-- Visual: rak buku ilustratif -->
                <div class="col-lg-6">
                    <div class="row g-3 g-sm-4">
                        <div class="col-8">
                            <div class="stat-card bg-primary-custom text-bg-dark">
                                <i class="bi bi-book text-white-50 fs-3"></i>
                                <div>
                                    <p class="font-display display-6 text-white mb-0">12.480</p>
                                    <p class="small text-white-50 mb-0">Judul buku tersedia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-card bg-accent">
                                <p class="text-primary-custom small fw-bold text-uppercase mb-0" style="letter-spacing:.06em;">Anggota Aktif</p>
                                <p class="font-display display-6 text-primary-custom mb-0">3.2K+</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-card border border-custom rounded-4 p-4 d-flex align-items-center gap-3">
                                <div class="bg-muted rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width:56px;height:56px;">
                                    <i class="bi bi-book text-primary-custom fs-4"></i>
                                </div>
                                <div>
                                    <p class="fw-semibold small mb-1">Cari lewat katalog</p>
                                    <p class="small mb-0" style="color: rgba(43,38,32,.6);">Cek ketersediaan buku sebelum datang ke perpustakaan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider-dot"></div>

    <!-- KATEGORI -->
    <section id="kategori" class="py-5 py-lg-6">
        <div class="container px-4 px-lg-5 py-4">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-end gap-3 mb-5">
                <div>
                    <span class="small fw-semibold text-uppercase text-accent" style="letter-spacing:.08em;">Jelajahi Rak</span>
                    <h2 class="font-display display-6 mt-2 mb-0">Kategori Koleksi</h2>
                </div>
                <a href="#katalog" class="small fw-semibold text-primary-custom text-decoration-none">Lihat semua katalog →</a>
            </div>

            <div class="row g-3 g-lg-4">
                <div class="col-6 col-lg-3">
                    <a href="#" class="category-card d-block p-4 text-decoration-none text-reset h-100">
                        <p class="font-display fs-5 mb-1">Sastra &amp; Fiksi</p>
                        <p class="small mb-3" style="color: rgba(43,38,32,.6);">2.104 judul</p>
                        <span class="small fw-semibold text-primary-custom">Buka rak →</span>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a href="#" class="category-card d-block p-4 text-decoration-none text-reset h-100">
                        <p class="font-display fs-5 mb-1">Sains &amp; Teknologi</p>
                        <p class="small mb-3" style="color: rgba(43,38,32,.6);">1.865 judul</p>
                        <span class="small fw-semibold text-primary-custom">Buka rak →</span>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a href="#" class="category-card d-block p-4 text-decoration-none text-reset h-100">
                        <p class="font-display fs-5 mb-1">Sejarah &amp; Budaya</p>
                        <p class="small mb-3" style="color: rgba(43,38,32,.6);">1.320 judul</p>
                        <span class="small fw-semibold text-primary-custom">Buka rak →</span>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a href="#" class="category-card d-block p-4 text-decoration-none text-reset h-100">
                        <p class="font-display fs-5 mb-1">Referensi Akademik</p>
                        <p class="small mb-3" style="color: rgba(43,38,32,.6);">3.591 judul</p>
                        <span class="small fw-semibold text-primary-custom">Buka rak →</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- KOLEKSI POPULER -->
    <section id="katalog" class="py-5 py-lg-6 bg-muted border-top border-bottom border-custom">
        <div class="container px-4 px-lg-5 py-4">
            <div class="mb-5">
                <span class="small fw-semibold text-uppercase text-accent" style="letter-spacing:.08em;">Paling Diminati</span>
                <h2 class="font-display display-6 mt-2 mb-0">Koleksi Populer Bulan Ini</h2>
            </div>

            <div class="row g-3 g-lg-4">
                <div class="col-6 col-lg-3">
                    <div class="book-card h-100 overflow-hidden">
                        <div class="book-cover bg-primary-custom">
                            <span class="font-display text-white-50 small">Bumi Manusia</span>
                        </div>
                        <div class="p-3">
                            <p class="fw-semibold small mb-1">Bumi Manusia</p>
                            <p class="small mb-2" style="color: rgba(43,38,32,.6);">Pramoedya Ananta Toer</p>
                            <span class="badge rounded-pill" style="background-color: rgba(47,69,56,.1); color: var(--primary); font-weight:600; font-size:.7rem;">Tersedia</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="book-card h-100 overflow-hidden">
                        <div class="book-cover bg-accent">
                            <span class="font-display text-primary-custom small">Matematika Kelas XI</span>
                        </div>
                        <div class="p-3">
                            <p class="fw-semibold small mb-1">Matematika Kelas XI</p>
                            <p class="small mb-2" style="color: rgba(43,38,32,.6);">Kemendikbudristek</p>
                            <span class="badge rounded-pill" style="background-color: rgba(47,69,56,.1); color: var(--primary); font-weight:600; font-size:.7rem;">Tersedia</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="book-card h-100 overflow-hidden">
                        <div class="book-cover" style="background-color: rgba(43,38,32,.85);">
                            <span class="font-display text-white small">Laskar Pelangi</span>
                        </div>
                        <div class="p-3">
                            <p class="fw-semibold small mb-1">Laskar Pelangi</p>
                            <p class="small mb-2" style="color: rgba(43,38,32,.6);">Andrea Hirata</p>
                            <span class="badge rounded-pill" style="background-color: rgba(176,141,87,.2); color: var(--accent); font-weight:600; font-size:.7rem;">Dipinjam</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="book-card h-100 overflow-hidden">
                        <div class="book-cover bg-primary-light">
                            <span class="font-display text-white small">Sejarah Indonesia</span>
                        </div>
                        <div class="p-3">
                            <p class="fw-semibold small mb-1">Sejarah Indonesia</p>
                            <p class="small mb-2" style="color: rgba(43,38,32,.6);">Kemendikbudristek</p>
                            <span class="badge rounded-pill" style="background-color: rgba(47,69,56,.1); color: var(--primary); font-weight:600; font-size:.7rem;">Tersedia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CARA PINJAM -->
    <section id="cara-kerja" class="py-5 py-lg-6">
        <div class="container px-4 px-lg-5 py-4">
            <div class="mb-5" style="max-width: 36rem;">
                <span class="small fw-semibold text-uppercase text-accent" style="letter-spacing:.08em;">Alur Layanan</span>
                <h2 class="font-display display-6 mt-2 mb-0">Meminjam buku semudah tiga langkah</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-item">
                        <p class="font-display fs-4 mb-2">Cari &amp; Pesan</p>
                        <p class="small mb-0" style="color: rgba(43,38,32,.6);">Temukan judul yang diinginkan lewat katalog daring, lalu pesan slot peminjaman secara langsung.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-item">
                        <p class="font-display fs-4 mb-2">Ambil di Konter</p>
                        <p class="small mb-0" style="color: rgba(43,38,32,.6);">Tunjukkan kode QR keanggotaan Anda di konter, dan petugas akan menyiapkan buku pesanan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-item">
                        <p class="font-display fs-4 mb-2">Kembalikan Tepat Waktu</p>
                        <p class="small mb-0" style="color: rgba(43,38,32,.6);">Dapatkan pengingat otomatis sebelum jatuh tempo, dan perpanjang langsung dari aplikasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-5 py-lg-6 bg-muted border-top border-bottom border-custom">
        <div class="container px-4 px-lg-5 py-4" style="max-width: 48rem;">
            <div class="text-center mb-5">
                <span class="small fw-semibold text-uppercase text-accent" style="letter-spacing:.08em;">Pertanyaan Umum</span>
                <h2 class="font-display display-6 mt-2 mb-0">Sebelum mulai membaca</h2>
            </div>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item mb-3">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold small" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Berapa lama masa pinjam buku?
                        </button>
                    </h3>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body small" style="color: rgba(43,38,32,.6);">
                            Masa pinjam standar adalah 14 hari dan dapat diperpanjang satu kali selama tidak ada anggota lain yang memesan buku tersebut.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold small" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Apakah tersedia versi buku digital / e-book?
                        </button>
                    </h3>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body small" style="color: rgba(43,38,32,.6);">
                            Ya, sebagian koleksi memiliki versi digital yang bisa dibaca langsung dari akun keanggotaan tanpa batas kuota peminjaman fisik.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold small" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Bagaimana jika buku terlambat dikembalikan?
                        </button>
                    </h3>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body small" style="color: rgba(43,38,32,.6);">
                            Berlaku denda administrasi harian yang tertera pada aplikasi, dan akun akan ditangguhkan sementara hingga buku dikembalikan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-custom">
        <div class="container px-4 px-lg-5 py-5 d-flex flex-column flex-sm-row align-items-center justify-content-between gap-4">
            <div class="d-flex align-items-center gap-3">
                <span class="rounded-3 d-flex align-items-center justify-content-center font-display flex-shrink-0" style="width:36px;height:36px; background-color: rgba(247,243,234,.15); color: var(--bg);">S</span>
                <div class="lh-sm">
                    <p class="font-display fs-5 mb-0" style="color: var(--bg);">SIMEKAR</p>
                    <p class="small mb-0" style="color: rgba(247,243,234,.6);">SMA Negeri 1 Mekarsari</p>
                </div>
            </div>
            <nav class="d-flex flex-wrap justify-content-center gap-4 small">
                <a href="#katalog">Katalog</a>
                <a href="#kategori">Kategori</a>
                <a href="#cara-kerja">Cara Pinjam</a>
                <a href="#faq">FAQ</a>
            </nav>
        </div>
        <div class="text-center small py-3" style="border-top: 1px solid rgba(247,243,234,.15); color: rgba(247,243,234,.6);">
            © 2026 SIMEKAR — Sistem Informasi Perpustakaan SMA Negeri 1 Mekarsari.
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle (Popper + JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>

</html>