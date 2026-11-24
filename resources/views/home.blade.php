<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentMart - Marketplace Mahasiswa Polbeng</title>
    <meta name="description" content="Jual dan beli kebutuhan kuliah dengan mudah di StudentMart, marketplace khusus mahasiswa Polbeng.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #ffffff; color: #334155; }

        /* ===== NAVBAR ===== */
        .navbar-custom {
            background: #2E5B88; /* Denim Blue */
            padding: 16px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .navbar-brand-text {
            font-weight: 800;
            font-size: 1.4rem;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            letter-spacing: -0.5px;
        }
        .navbar-brand-text:hover {
            color: rgba(255,255,255,0.9);
        }
        .nav-link-custom {
            color: rgba(255,255,255,0.8) !important;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 6px 12px !important;
            transition: all 0.2s ease;
            border-radius: 6px;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            color: white !important;
            background: rgba(255,255,255,0.1);
        }
        .navbar-toggler {
            border: none;
            padding: 6px;
        }
        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }
        .btn-register-custom {
            background-color: #f59e0b;
            color: white !important;
            border: none;
            transition: all 0.2s ease;
        }
        .btn-register-custom:hover {
            background-color: #d97706;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        /* ===== HERO ===== */
        .hero {
            background: #2E5B88; /* Denim Blue */
            padding: 48px 0;
            position: relative;
            overflow: hidden;
            min-height: 25vh;
            display: flex;
            align-items: center;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 400px; height: 400px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -60px;
            width: 350px; height: 350px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
        }
        .hero-content { position: relative; z-index: 1; }
        .hero h1 {
            font-size: 2.2rem;
            font-weight: 800;
            color: white;
            line-height: 1.2;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }
        .hero p {
            font-size: 1rem;
            color: rgba(255,255,255,0.85);
            margin-bottom: 24px;
        }
        .hero-search {
            max-width: 500px;
            margin: 0 auto;
        }
        .search-box {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            display: flex;
            background: white;
            padding: 4px;
        }
        .search-box input {
            flex: 1;
            border: none;
            padding: 12px 16px;
            font-size: 0.95rem;
            outline: none;
        }
        .search-box button {
            background: #f59e0b;
            border: none;
            padding: 12px 24px;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .search-box button:hover { background: #d97706; }

        /* ===== SECTION ===== */
        .section {
            padding: 60px 0;
            background: #ffffff;
        }
        .section-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        /* ===== PRODUK CARD ===== */
        .produk-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02), 0 4px 12px rgba(0,0,0,0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .produk-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
            border-color: #e2e8f0;
            color: inherit;
        }
        .produk-img {
            height: 200px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #cbd5e1;
            position: relative;
            border-bottom: 1px solid #f1f5f9;
        }
        .produk-body {
            padding: 18px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .produk-kategori {
            font-size: 0.75rem;
            color: #2E5B88; /* Denim Blue */
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 6px;
        }
        .produk-nama {
            font-weight: 600;
            color: #1e293b;
            font-size: 1rem;
            line-height: 1.4;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 2.8rem;
        }
        .produk-harga {
            font-size: 1.15rem;
            font-weight: 800;
            color: #16a34a;
            margin-bottom: 14px;
            margin-top: auto;
        }
        .produk-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px solid #f1f5f9;
            margin-top: auto;
        }
        .penjual-info {
            font-size: 0.8rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .btn-wa-mini {
            background: #25d366;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 5px 12px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .btn-wa-mini:hover {
            background: #20ba5a;
            color: white;
            box-shadow: 0 4px 10px rgba(37, 211, 102, 0.2);
        }

        /* ===== FOOTER ===== */
        footer {
            background: #0f172a;
            color: rgba(255,255,255,0.6);
            padding: 32px 0;
            text-align: center;
            font-size: 0.9rem;
        }
        footer a { color: rgba(255,255,255,0.7); text-decoration: none; transition: color 0.2s; }
        footer a:hover { color: white; }

        @media (max-width: 991.98px) {
            .navbar-nav {
                padding: 12px 0;
                text-align: center;
            }
            .nav-link-custom {
                padding: 8px 12px !important;
                display: inline-block;
                width: 100%;
            }
            .d-flex.align-items-center {
                padding-top: 16px;
                border-top: 1px solid rgba(255,255,255,0.1);
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand-text" href="/">
            <i class="bi bi-shop me-2"></i>StudentMart
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom active" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="/produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="#tentang">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="#faq">FAQ</a>
                </li>
            </ul>
<div class="d-flex align-items-center gap-2">

    @guest
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm px-3">
            Login
        </a>

        <a href="{{ route('register') }}" class="btn btn-register-custom btn-sm px-3">
            Register
        </a>
    @endguest


    @auth

        @if(Auth::user()->role === 'superadmin')
            <a href="/superadmin/dashboard" class="btn btn-outline-light btn-sm px-3">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
            </a>
        @elseif(Auth::user()->role === 'admin')
            <a href="/admin/dashboard" class="btn btn-outline-light btn-sm px-3">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
            </a>
        @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-register-custom btn-sm px-3">
                Logout
            </button>
        </form>

    @endauth

</div>

        </div>
    </div>
</nav>

<!-- ===== HERO ===== -->
<div class="hero">
    <div class="container text-center hero-content">
        <h1>Marketplace<br>Mahasiswa Indonesia</h1>
        <p>Temukan produk dari penjual mahasiswa — tanpa perlu daftar atau login</p>

        <div class="hero-search">
            <form action="/produk" method="GET">
                <div class="search-box">
                    <input type="text" name="q" placeholder="Cari produk, buku, elektronik...">
                    <button type="submit">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ===== PRODUK TERBARU ===== -->
<div class="section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Produk Terbaru</h2>
            <a href="/produk" class="btn btn-outline-primary btn-sm">
                Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        @if($produkTerbaru->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-box-seam" style="font-size:3rem; color:#cbd5e1;"></i>
                <p class="text-muted mt-3">Belum ada produk. Jadilah yang pertama berjualan!</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Mulai Berjualan</a>
            </div>
        @else
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($produkTerbaru as $p)
                    <div class="col">
                        <a href="{{ route('produk.show', $p->id) }}" class="produk-card">
                            <div class="produk-img">
                                @if($p->foto && $p->foto !== '')
                                    <img src="{{ asset('storage/' . $p->foto) }}"
                                         alt="{{ $p->nama_produk }}"
                                         style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    <i class="bi bi-image"></i>
                                @endif
                            </div>
                            <div class="produk-body">
                                @if($p->kategori)
                                    <div class="produk-kategori">{{ $p->kategori->nama_kategori }}</div>
                                @endif
                                <div class="produk-nama">{{ $p->nama_produk }}</div>
                                <div class="produk-harga">Rp {{ number_format($p->harga, 0, ',', '.') }}</div>
                                <div class="produk-footer">
                                    <span class="penjual-info">
                                        <i class="bi bi-person-circle me-1"></i>
                                        {{ Str::limit($p->user->name ?? 'Penjual', 14) }}
                                    </span>
                                    <span class="btn-wa-mini">
                                        <i class="bi bi-whatsapp"></i> WA
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- ===== TENTANG KAMI ===== -->
<div id="tentang" class="section border-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="pe-lg-4">
                    <span class="text-uppercase fw-bold font-monospace" style="font-size: 0.85rem; letter-spacing: 1px; color: #2E5B88;">Tentang StudentMart</span>
                    <h2 class="mt-2 mb-3" style="font-weight: 800; font-size: 2rem; color: #0f172a;">Pasar Digital Kreatif Mahasiswa Indonesia</h2>
                    <p class="text-muted leading-relaxed" style="font-size: 1.05rem;">StudentMart adalah platform marketplace eksklusif yang dirancang untuk mendukung ekosistem wirausaha di kalangan mahasiswa. Kami memberikan wadah yang aman dan mudah digunakan untuk bertransaksi kebutuhan kuliah, jasa akademik, makanan, hingga barang bekas berkualitas.</p>
                    <p class="text-muted" style="font-size: 1rem;">Misi kami adalah mendorong kemandirian finansial mahasiswa melalui pemanfaatan teknologi digital, sekaligus mempermudah akses barang-barang kebutuhan kuliah dengan harga terjangkau.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-4 border rounded-3 bg-light text-center h-100">
                            <i class="bi bi-shield-check text-success display-5 mb-2"></i>
                            <h5 class="fw-bold mb-1" style="font-size: 1rem; color: #0f172a;">Transaksi Aman</h5>
                            <p class="text-muted small mb-0">Hubungi penjual langsung via WhatsApp terverifikasi.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 border rounded-3 bg-light text-center h-100">
                            <i class="bi bi-wallet2 text-primary display-5 mb-2" style="color: #2E5B88 !important;"></i>
                            <h5 class="fw-bold mb-1" style="font-size: 1rem; color: #0f172a;">Harga Bersahabat</h5>
                            <p class="text-muted small mb-0">Harga khusus mahasiswa, bersahabat untuk kuliah.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 border rounded-3 bg-light text-center h-100">
                            <i class="bi bi-gem text-warning display-5 mb-2"></i>
                            <h5 class="fw-bold mb-1" style="font-size: 1rem; color: #0f172a;">Kualitas Unggul</h5>
                            <p class="text-muted small mb-0">Produk pilihan dari rekan sesama mahasiswa.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 border rounded-3 bg-light text-center h-100">
                            <i class="bi bi-chat-heart text-danger display-5 mb-2"></i>
                            <h5 class="fw-bold mb-1" style="font-size: 1rem; color: #0f172a;">Dukungan Lokal</h5>
                            <p class="text-muted small mb-0">Mendukung usaha lokal dan sesama mahasiswa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== FAQ SECTION ===== -->
<div id="faq" class="section border-top bg-light">
    <div class="container" style="max-width: 800px;">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-bold font-monospace" style="font-size: 0.85rem; letter-spacing: 1px; color: #2E5B88;">Pertanyaan Umum</span>
            <h2 class="mt-2" style="font-weight: 800; font-size: 2rem; color: #0f172a;">FAQ StudentMart</h2>
        </div>
        
        <div class="accordion accordion-flush bg-white p-3 rounded-3 border" id="faqAccordion">
            <div class="accordion-item border-0 mb-3">
                <h2 class="accordion-header" id="faq-headingOne">
                    <button class="accordion-button collapsed fw-semibold rounded-3 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseOne" aria-expanded="false" aria-controls="faq-collapseOne" style="color: #0f172a; font-size: 1.05rem;">
                        Apakah saya harus memiliki akun untuk berbelanja?
                    </button>
                </h2>
                <div id="faq-collapseOne" class="accordion-collapse collapse" aria-labelledby="faq-headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Tidak perlu! Anda dapat menjelajahi produk dan langsung menghubungi penjual melalui tombol WhatsApp yang tertera di setiap detail produk.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item border-0 mb-3">
                <h2 class="accordion-header" id="faq-headingTwo">
                    <button class="accordion-button collapsed fw-semibold rounded-3 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseTwo" aria-expanded="false" aria-controls="faq-collapseTwo" style="color: #0f172a; font-size: 1.05rem;">
                        Bagaimana cara saya mulai menjual produk?
                    </button>
                </h2>
                <div id="faq-collapseTwo" class="accordion-collapse collapse" aria-labelledby="faq-headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Cukup buat akun dengan mengklik tombol <strong>Register</strong> di kanan atas, verifikasi akun Anda, lalu Anda dapat langsung masuk ke dashboard penjual untuk mengunggah produk Anda.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3">
                <h2 class="accordion-header" id="faq-headingThree">
                    <button class="accordion-button collapsed fw-semibold rounded-3 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseThree" aria-expanded="false" aria-controls="faq-collapseThree" style="color: #0f172a; font-size: 1.05rem;">
                        Apakah ada biaya pendaftaran atau komisi transaksi?
                    </button>
                </h2>
                <div id="faq-collapseThree" class="accordion-collapse collapse" aria-labelledby="faq-headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Tidak ada biaya sama sekali. StudentMart 100% gratis digunakan oleh mahasiswa baik untuk menjual maupun membeli produk.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0">
                <h2 class="accordion-header" id="faq-headingFour">
                    <button class="accordion-button collapsed fw-semibold rounded-3 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseFour" aria-expanded="false" aria-controls="faq-collapseFour" style="color: #0f172a; font-size: 1.05rem;">
                        Bagaimana sistem pembayarannya?
                    </button>
                </h2>
                <div id="faq-collapseFour" class="accordion-collapse collapse" aria-labelledby="faq-headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Pembayaran dilakukan secara langsung antara pembeli dan penjual (COD, transfer bank, atau e-wallet) setelah Anda bersepakat melalui percakapan WhatsApp.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<footer>
    <div class="container">
        <p>© {{ date('Y') }} StudentMart — Marketplace Mahasiswa Indonesia</p>
        <p class="mt-1">
            <a href="/">Beranda</a> · <a href="/produk">Produk</a> · <a href="#tentang">Tentang</a> · <a href="#faq">FAQ</a> · <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>