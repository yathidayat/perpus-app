<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMEKAR — Sistem Informasi Perpustakaan SMA Negeri 1 Mekarsari</title>

    <!-- Google Fonts: Playfair Display (display serif, klasik) + Inter (body, modern) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Play CDN, untuk prototipe. Untuk produksi Laravel, build Tailwind via npm) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- KTUI (https://ktui.io) - JS component library berbasis Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@keenthemes/ktui@1.2.5/dist/ktui.min.js" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: '#F7F3EA',
                        foreground: '#2B2620',
                        primary: {
                            DEFAULT: '#2F4538',
                            foreground: '#F7F3EA',
                            light: '#3E5A49'
                        },
                        accent: {
                            DEFAULT: '#B08D57',
                            foreground: '#2B2620'
                        },
                        muted: {
                            DEFAULT: '#EDE6D6',
                            foreground: '#6B6353'
                        },
                        border: '#DCD3BD',
                        card: '#FFFDF8',
                    },
                    fontFamily: {
                        display: ['"Playfair Display"', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #F7F3EA;
        }

        .paper-texture {
            background-image:
                radial-gradient(#00000008 1px, transparent 1px);
            background-size: 18px 18px;
        }

        /* Signature: tab motif ala kartu katalog perpustakaan lama */
        .catalog-tab {
            position: relative;
        }

        .catalog-tab::before {
            content: attr(data-tab);
            position: absolute;
            top: -14px;
            left: 22px;
            background: #2F4538;
            color: #F7F3EA;
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            letter-spacing: .08em;
            padding: 4px 12px;
            border-radius: 6px 6px 0 0;
            font-weight: 600;
        }

        .divider-dot {
            background-image: radial-gradient(#B08D57 1.5px, transparent 1.5px);
            background-size: 8px 8px;
            height: 2px;
        }
    </style>
</head>

<body class="font-sans text-foreground antialiased">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 bg-background/90 backdrop-blur border-b border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 h-16 sm:h-20 flex items-center justify-between">
            <a href="#" class="flex items-center gap-2 sm:gap-3 min-w-0">
                <span class="w-9 h-9 sm:w-11 sm:h-11 rounded-lg bg-primary flex items-center justify-center text-background font-display text-lg sm:text-xl shrink-0">S</span>
                <div class="leading-tight min-w-0">
                    <p class="font-display text-base sm:text-lg font-semibold truncate">SIMEKAR</p>
                    <p class="text-[10px] sm:text-[11px] tracking-widest uppercase text-muted-foreground/70 text-accent truncate">Perpustakaan SMAN 1 Mekarsari</p>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-9 text-sm font-medium">
                <a href="#katalog" class="hover:text-accent transition-colors">Katalog</a>
                <a href="#kategori" class="hover:text-accent transition-colors">Kategori</a>
                <a href="#cara-kerja" class="hover:text-accent transition-colors">Cara Pinjam</a>
                <a href="#faq" class="hover:text-accent transition-colors">FAQ</a>
            </nav>

            <div class="hidden md:flex items-center gap-3">
                <a href="#login" class="kt-btn text-sm font-medium px-4 py-2.5 rounded-lg border border-border hover:bg-muted transition-colors">Masuk</a>
                <a href="#daftar" class="kt-btn text-sm font-semibold px-5 py-2.5 rounded-lg bg-primary text-primary-foreground hover:bg-primary-light transition-colors shadow-sm">Daftar Anggota</a>
            </div>

            <!-- Mobile menu button -->
            <button id="menuBtn" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="mobileMenu" class="md:hidden w-10 h-10 shrink-0 flex items-center justify-center rounded-lg border border-border active:bg-muted transition-colors">
                <svg id="iconOpen" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile menu panel -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-border bg-background px-4 sm:px-6 py-5 space-y-1 max-h-[calc(100vh-4rem)] overflow-y-auto">
            <a href="#katalog" class="block text-sm font-medium py-2.5 px-2 rounded-lg active:bg-muted">Katalog</a>
            <a href="#kategori" class="block text-sm font-medium py-2.5 px-2 rounded-lg active:bg-muted">Kategori</a>
            <a href="#cara-kerja" class="block text-sm font-medium py-2.5 px-2 rounded-lg active:bg-muted">Cara Pinjam</a>
            <a href="#faq" class="block text-sm font-medium py-2.5 px-2 rounded-lg active:bg-muted">FAQ</a>
            <div class="pt-3 flex gap-3">
                <a href="#login" class="flex-1 text-center text-sm font-medium px-4 py-3 rounded-lg border border-border">Masuk</a>
                <a href="#daftar" class="flex-1 text-center text-sm font-semibold px-4 py-3 rounded-lg bg-primary text-primary-foreground">Daftar</a>
            </div>
        </div>
    </header>

    <!-- HERO -->
    <section class="relative overflow-hidden paper-texture">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 pt-10 pb-14 sm:pt-16 sm:pb-24 lg:pt-24 lg:pb-32 grid lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            <div>
                <span class="inline-flex items-center gap-2 text-[11px] sm:text-xs font-semibold tracking-widest uppercase text-accent bg-accent/10 px-3 py-1.5 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent shrink-0"></span> Katalog Digital Sekolah
                </span>
                <h1 class="font-display text-3xl sm:text-5xl lg:text-6xl leading-[1.15] sm:leading-[1.1] mt-5 sm:mt-6 mb-4 sm:mb-6">
                    Perpustakaan sekolah,<br class="hidden sm:block"> kini di ujung jari.
                </h1>
                <p class="text-sm sm:text-lg text-foreground/70 max-w-md leading-relaxed">
                    SIMEKAR membantu siswa dan guru SMA Negeri 1 Mekarsari mencari,
                    meminjam, dan mengelola koleksi buku perpustakaan secara digital.
                </p>

                <!-- Signature: kartu katalog search -->
                <div class="mt-8 sm:mt-9 catalog-tab" data-tab="KARTU KATALOG">
                    <div class="bg-card border border-border rounded-xl shadow-[0_8px_24px_-8px_rgba(43,38,32,0.15)] p-2 flex flex-col sm:flex-row gap-2">
                        <div class="flex items-center gap-2 flex-1 px-3 min-w-0">
                            <svg class="w-5 h-5 text-foreground/40 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5A6.5 6.5 0 1 1 4 10.5a6.5 6.5 0 0 1 13 0Z" />
                            </svg>
                            <input type="text" placeholder="Cari judul, penulis, atau ISBN..." class="w-full min-w-0 py-3 bg-transparent outline-none text-sm placeholder:text-foreground/40">
                        </div>
                        <button class="kt-btn shrink-0 w-full sm:w-auto bg-primary text-primary-foreground text-sm font-semibold px-6 py-3 rounded-lg hover:bg-primary-light transition-colors">
                            Cari Buku
                        </button>
                    </div>
                </div>
                <p class="text-xs text-foreground/50 mt-3">Populer: Fiksi Remaja · Buku Pelajaran · Sejarah · Sains</p>
            </div>

            <!-- Visual: rak buku ilustratif -->
            <div class="relative">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4">
                    <div class="col-span-2 bg-primary rounded-2xl p-5 sm:p-7 flex flex-col justify-between h-44 sm:h-56 shadow-lg">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-background/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25a8.987 8.987 0 0 0-3-.512c-2.305 0-4.408.867-6 2.292m0-14.25v14.25" />
                        </svg>
                        <div>
                            <p class="font-display text-2xl sm:text-4xl text-background">12.480</p>
                            <p class="text-background/70 text-xs sm:text-sm mt-1">Judul buku tersedia</p>
                        </div>
                    </div>
                    <div class="bg-accent rounded-2xl p-4 sm:p-6 flex flex-col justify-between h-44 sm:h-56 shadow-lg">
                        <p class="text-primary text-[10px] sm:text-xs font-bold uppercase tracking-wider">Anggota Aktif</p>
                        <p class="font-display text-2xl sm:text-4xl text-primary">3.2K+</p>
                    </div>
                    <div class="col-span-2 sm:col-span-3 bg-card border border-border rounded-2xl p-4 sm:p-6 flex items-center gap-4 sm:gap-5">
                        <div class="w-11 h-11 sm:w-14 sm:h-14 rounded-xl bg-muted flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-7 sm:h-7 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25a8.987 8.987 0 0 0-3-.512c-2.305 0-4.408.867-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="font-semibold text-sm">Cari lewat katalog</p>
                            <p class="text-foreground/60 text-xs sm:text-sm">Cek ketersediaan buku sebelum datang ke perpustakaan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider-dot"></div>

    <!-- KATEGORI -->
    <section id="kategori" class="py-16 sm:py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 sm:gap-4 mb-8 sm:mb-12">
                <div>
                    <span class="text-xs font-semibold tracking-widest uppercase text-accent">Jelajahi Rak</span>
                    <h2 class="font-display text-2xl sm:text-3xl lg:text-4xl mt-2">Kategori Koleksi</h2>
                </div>
                <a href="#katalog" class="text-sm font-semibold text-primary hover:text-accent transition-colors">Lihat semua katalog →</a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
                <a href="#" class="group bg-card border border-border rounded-xl p-4 sm:p-6 hover:border-primary hover:shadow-md transition-all">
                    <p class="font-display text-base sm:text-lg mb-1">Sastra &amp; Fiksi</p>
                    <p class="text-xs sm:text-sm text-foreground/60 mb-3 sm:mb-4">2.104 judul</p>
                    <span class="text-xs font-semibold text-primary group-hover:translate-x-1 inline-block transition-transform">Buka rak →</span>
                </a>
                <a href="#" class="group bg-card border border-border rounded-xl p-4 sm:p-6 hover:border-primary hover:shadow-md transition-all">
                    <p class="font-display text-base sm:text-lg mb-1">Sains &amp; Teknologi</p>
                    <p class="text-xs sm:text-sm text-foreground/60 mb-3 sm:mb-4">1.865 judul</p>
                    <span class="text-xs font-semibold text-primary group-hover:translate-x-1 inline-block transition-transform">Buka rak →</span>
                </a>
                <a href="#" class="group bg-card border border-border rounded-xl p-4 sm:p-6 hover:border-primary hover:shadow-md transition-all">
                    <p class="font-display text-base sm:text-lg mb-1">Sejarah &amp; Budaya</p>
                    <p class="text-xs sm:text-sm text-foreground/60 mb-3 sm:mb-4">1.320 judul</p>
                    <span class="text-xs font-semibold text-primary group-hover:translate-x-1 inline-block transition-transform">Buka rak →</span>
                </a>
                <a href="#" class="group bg-card border border-border rounded-xl p-4 sm:p-6 hover:border-primary hover:shadow-md transition-all">
                    <p class="font-display text-base sm:text-lg mb-1">Referensi Akademik</p>
                    <p class="text-xs sm:text-sm text-foreground/60 mb-3 sm:mb-4">3.591 judul</p>
                    <span class="text-xs font-semibold text-primary group-hover:translate-x-1 inline-block transition-transform">Buka rak →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- KOLEKSI POPULER -->
    <section id="katalog" class="py-16 sm:py-20 lg:py-28 bg-muted/50 border-y border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="mb-8 sm:mb-12">
                <span class="text-xs font-semibold tracking-widest uppercase text-accent">Paling Diminati</span>
                <h2 class="font-display text-2xl sm:text-3xl lg:text-4xl mt-2">Koleksi Populer Bulan Ini</h2>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <!-- Card buku 1 -->
                <div class="bg-card border border-border rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-32 sm:h-44 bg-primary/90 flex items-center justify-center">
                        <span class="font-display text-background/80 text-xs sm:text-sm px-3 sm:px-4 text-center leading-snug">Bumi Manusia</span>
                    </div>
                    <div class="p-3.5 sm:p-5">
                        <p class="font-semibold text-xs sm:text-sm mb-1">Bumi Manusia</p>
                        <p class="text-[11px] sm:text-xs text-foreground/60 mb-2.5 sm:mb-3">Pramoedya Ananta Toer</p>
                        <span class="inline-block text-[10px] sm:text-[11px] font-semibold px-2 sm:px-2.5 py-1 rounded-full bg-primary/10 text-primary">Tersedia</span>
                    </div>
                </div>
                <!-- Card buku 2 -->
                <div class="bg-card border border-border rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-32 sm:h-44 bg-accent/80 flex items-center justify-center">
                        <span class="font-display text-primary text-xs sm:text-sm px-3 sm:px-4 text-center leading-snug">Matematika Kelas XI</span>
                    </div>
                    <div class="p-3.5 sm:p-5">
                        <p class="font-semibold text-xs sm:text-sm mb-1">Matematika Kelas XI</p>
                        <p class="text-[11px] sm:text-xs text-foreground/60 mb-2.5 sm:mb-3">Kemendikbudristek</p>
                        <span class="inline-block text-[10px] sm:text-[11px] font-semibold px-2 sm:px-2.5 py-1 rounded-full bg-primary/10 text-primary">Tersedia</span>
                    </div>
                </div>
                <!-- Card buku 3 -->
                <div class="bg-card border border-border rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-32 sm:h-44 bg-foreground/85 flex items-center justify-center">
                        <span class="font-display text-background text-xs sm:text-sm px-3 sm:px-4 text-center leading-snug">Laskar Pelangi</span>
                    </div>
                    <div class="p-3.5 sm:p-5">
                        <p class="font-semibold text-xs sm:text-sm mb-1">Laskar Pelangi</p>
                        <p class="text-[11px] sm:text-xs text-foreground/60 mb-2.5 sm:mb-3">Andrea Hirata</p>
                        <span class="inline-block text-[10px] sm:text-[11px] font-semibold px-2 sm:px-2.5 py-1 rounded-full bg-accent/20 text-accent">Dipinjam</span>
                    </div>
                </div>
                <!-- Card buku 4 -->
                <div class="bg-card border border-border rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-32 sm:h-44 bg-primary-light flex items-center justify-center">
                        <span class="font-display text-background text-xs sm:text-sm px-3 sm:px-4 text-center leading-snug">Sejarah Indonesia</span>
                    </div>
                    <div class="p-3.5 sm:p-5">
                        <p class="font-semibold text-xs sm:text-sm mb-1">Sejarah Indonesia</p>
                        <p class="text-[11px] sm:text-xs text-foreground/60 mb-2.5 sm:mb-3">Kemendikbudristek</p>
                        <span class="inline-block text-[10px] sm:text-[11px] font-semibold px-2 sm:px-2.5 py-1 rounded-full bg-primary/10 text-primary">Tersedia</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CARA PINJAM -->
    <section id="cara-kerja" class="py-16 sm:py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="mb-10 sm:mb-14 max-w-xl">
                <span class="text-xs font-semibold tracking-widest uppercase text-accent">Alur Layanan</span>
                <h2 class="font-display text-2xl sm:text-3xl lg:text-4xl mt-2">Meminjam buku semudah tiga langkah</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-7 sm:gap-8">
                <div class="relative pl-6 border-l-2 border-border">
                    <span class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-primary"></span>
                    <p class="font-display text-lg sm:text-xl mb-2">Cari &amp; Pesan</p>
                    <p class="text-sm text-foreground/60 leading-relaxed">Temukan judul yang diinginkan lewat katalog daring, lalu pesan slot peminjaman secara langsung.</p>
                </div>
                <div class="relative pl-6 border-l-2 border-border">
                    <span class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-primary"></span>
                    <p class="font-display text-lg sm:text-xl mb-2">Ambil di Konter</p>
                    <p class="text-sm text-foreground/60 leading-relaxed">Tunjukkan kode QR keanggotaan Anda di konter, dan petugas akan menyiapkan buku pesanan.</p>
                </div>
                <div class="relative pl-6 border-l-2 border-border">
                    <span class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-primary"></span>
                    <p class="font-display text-lg sm:text-xl mb-2">Kembalikan Tepat Waktu</p>
                    <p class="text-sm text-foreground/60 leading-relaxed">Dapatkan pengingat otomatis sebelum jatuh tempo, dan perpanjang langsung dari aplikasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section id="daftar" class="py-14 sm:py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="bg-primary rounded-2xl px-6 py-10 sm:px-8 sm:py-14 lg:p-16 flex flex-col lg:flex-row items-center lg:items-center justify-between gap-6 sm:gap-8 paper-texture">
                <div class="text-background text-center lg:text-left max-w-lg">
                    <h3 class="font-display text-2xl sm:text-3xl lg:text-4xl mb-3">Jadi anggota, mulai membaca hari ini.</h3>
                    <p class="text-background/70 text-sm lg:text-base">Pendaftaran otomatis untuk seluruh siswa dan guru SMA Negeri 1 Mekarsari menggunakan akun sekolah.</p>
                </div>
                <div class="flex gap-3 shrink-0 w-full sm:w-auto">
                    <a href="#" class="kt-btn w-full sm:w-auto text-center bg-accent text-primary font-semibold text-sm px-6 py-3.5 rounded-lg hover:brightness-95 transition">Masuk dengan Akun Sekolah</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-16 sm:py-20 lg:py-28 bg-muted/50 border-y border-border">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="text-center mb-8 sm:mb-12">
                <span class="text-xs font-semibold tracking-widest uppercase text-accent">Pertanyaan Umum</span>
                <h2 class="font-display text-2xl sm:text-3xl lg:text-4xl mt-2">Sebelum mulai membaca</h2>
            </div>

            <div class="space-y-3" id="faqAccordion">
                <div class="bg-card border border-border rounded-xl overflow-hidden">
                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-3 text-left px-4 sm:px-5 py-4 font-semibold text-sm">
                        <span>Berapa lama masa pinjam buku?</span>
                        <svg class="faq-icon w-4 h-4 shrink-0 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-panel hidden px-4 sm:px-5 pb-4 text-sm text-foreground/60 leading-relaxed">
                        Masa pinjam standar adalah 14 hari dan dapat diperpanjang satu kali selama tidak ada anggota lain yang memesan buku tersebut.
                    </div>
                </div>
                <div class="bg-card border border-border rounded-xl overflow-hidden">
                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-3 text-left px-4 sm:px-5 py-4 font-semibold text-sm">
                        <span>Apakah tersedia versi buku digital / e-book?</span>
                        <svg class="faq-icon w-4 h-4 shrink-0 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-panel hidden px-4 sm:px-5 pb-4 text-sm text-foreground/60 leading-relaxed">
                        Ya, sebagian koleksi memiliki versi digital yang bisa dibaca langsung dari akun keanggotaan tanpa batas kuota peminjaman fisik.
                    </div>
                </div>
                <div class="bg-card border border-border rounded-xl overflow-hidden">
                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-3 text-left px-4 sm:px-5 py-4 font-semibold text-sm">
                        <span>Bagaimana jika buku terlambat dikembalikan?</span>
                        <svg class="faq-icon w-4 h-4 shrink-0 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-panel hidden px-4 sm:px-5 pb-4 text-sm text-foreground/60 leading-relaxed">
                        Berlaku denda administrasi harian yang tertera pada aplikasi, dan akun akan ditangguhkan sementara hingga buku dikembalikan.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-primary text-background/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10 sm:py-12 flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 rounded-lg bg-background/15 flex items-center justify-center font-display text-background shrink-0">S</span>
                <div class="leading-tight">
                    <p class="font-display text-background text-lg">SIMEKAR</p>
                    <p class="text-xs text-background/60">SMA Negeri 1 Mekarsari</p>
                </div>
            </div>
            <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm">
                <a href="#katalog" class="hover:text-background transition-colors">Katalog</a>
                <a href="#kategori" class="hover:text-background transition-colors">Kategori</a>
                <a href="#cara-kerja" class="hover:text-background transition-colors">Cara Pinjam</a>
                <a href="#faq" class="hover:text-background transition-colors">FAQ</a>
            </nav>
        </div>
        <div class="border-t border-background/15 py-6 text-center text-xs text-background/60 px-4">
            © 2026 SIMEKAR — Sistem Informasi Perpustakaan SMA Negeri 1 Mekarsari.
        </div>
    </footer>

    <script src="{{ asset('js/home.js') }}"></script>
    <script>
        // Mobile nav toggle
        (function () {
            const menuBtn = document.getElementById('menuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const iconOpen = document.getElementById('iconOpen');
            const iconClose = document.getElementById('iconClose');
            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function () {
                    const isHidden = mobileMenu.classList.contains('hidden');
                    mobileMenu.classList.toggle('hidden');
                    iconOpen.classList.toggle('hidden');
                    iconClose.classList.toggle('hidden');
                    menuBtn.setAttribute('aria-expanded', String(isHidden));
                });
                // Close mobile menu after tapping a link
                mobileMenu.querySelectorAll('a').forEach(function (link) {
                    link.addEventListener('click', function () {
                        mobileMenu.classList.add('hidden');
                        iconOpen.classList.remove('hidden');
                        iconClose.classList.add('hidden');
                        menuBtn.setAttribute('aria-expanded', 'false');
                    });
                });
            }
        })();

        // FAQ accordion
        (function () {
            document.querySelectorAll('.faq-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const panel = btn.nextElementSibling;
                    const icon = btn.querySelector('.faq-icon');
                    const isOpen = !panel.classList.contains('hidden');
                    panel.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                    btn.setAttribute('aria-expanded', String(!isOpen));
                });
            });
        })();
    </script>
</body>

</html>