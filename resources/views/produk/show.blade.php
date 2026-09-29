<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} - StudentMart</title>
    <meta name="description" content="{{ Str::limit($produk->deskripsi, 150) }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }

        body { background: #f0f4f8; }

        /* Navbar */
        .navbar-custom {
            background: #224C7A;
            padding: 14px 0;
            box-shadow: 0 2px 12px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            color: white !important;
        }

        .nav-link-custom {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-link-custom:hover { color: white !important; }

        /* Breadcrumb */
        .breadcrumb-section {
            background: white;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .breadcrumb-item a {
            color: #224C7A;
            text-decoration: none;
        }

        /* Product Card */
        .product-container {
            max-width: 960px;
            margin: 0 auto;
            padding: 36px 20px 60px;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }

        .product-image-placeholder {
            background: linear-gradient(135deg, #dbeafe, #ede9fe);
            height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            color: #93c5fd;
        }

        .product-info {
            padding: 36px;
        }

        .kategori-badge {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 12px;
        }

        .product-name {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .product-price {
            font-size: 2rem;
            font-weight: 800;
            color: #16a34a;
            margin-bottom: 20px;
        }

        .divider {
            border: none;
            border-top: 1px solid #f1f5f9;
            margin: 20px 0;
        }

        .section-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
            margin-bottom: 8px;
        }

        .description-text {
            color: #475569;
            line-height: 1.8;
            font-size: 0.97rem;
        }

        /* Seller Info */
        .seller-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px 20px;
            margin: 24px 0;
        }

        .seller-avatar {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #224C7A, #4f9cf9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .seller-name {
            font-weight: 600;
            color: #1e293b;
        }

        .seller-label {
            font-size: 0.8rem;
            color: #94a3b8;
        }

        /* WhatsApp Button */
        .btn-whatsapp {
            background: linear-gradient(135deg, #25d366, #128c7e);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 16px 28px;
            font-size: 1.1rem;
            font-weight: 700;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(37, 211, 102, 0.35);
        }

        .btn-whatsapp:hover {
            background: linear-gradient(135deg, #20ba5a, #0e7a6e);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.45);
        }

        .btn-whatsapp i {
            font-size: 1.4rem;
        }

        .wa-note {
            text-align: center;
            font-size: 0.8rem;
            color: #94a3b8;
            margin-top: 10px;
        }

        /* Back button */
        .btn-back {
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s;
            margin-bottom: 20px;
        }

        .btn-back:hover { color: #224C7A; }

        /* Related info */
        .info-chip {
            background: #f1f5f9;
            border-radius: 8px;
            padding: 8px 14px;
            font-size: 0.85rem;
            color: #475569;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="bi bi-shop me-2"></i>StudentMart
        </a>
        <div class="ms-auto d-flex align-items-center gap-2">
            <a href="/produk" class="nav-link-custom me-2">Semua Produk</a>
            @auth
                @if(Auth::user()->role === 'superadmin')
                    <a href="/superadmin/dashboard" class="btn btn-outline-light btn-sm">Dashboard</a>
                @else
                    <a href="/admin/dashboard" class="btn btn-outline-light btn-sm">Dashboard</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size:0.88rem;">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/produk">Produk</a></li>
                @if($produk->kategori)
                    <li class="breadcrumb-item"><a href="/produk?kategori={{ $produk->kategori_id }}">{{ $produk->kategori->nama_kategori }}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($produk->nama_produk, 40) }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="product-container">

    <a href="/produk" class="btn-back">
        <i class="bi bi-arrow-left"></i> Kembali ke daftar produk
    </a>

    <div class="product-card">
        <div class="row g-0">

            <!-- Gambar Produk -->
            <div class="col-lg-5">
                @if($produk->foto && $produk->foto !== '')
                    <img src="{{ asset('storage/' . $produk->foto) }}"
                         alt="{{ $produk->nama_produk }}"
                         style="width:100%; height:380px; object-fit:cover;">
                @else
                    <div class="product-image-placeholder">
                        <i class="bi bi-image"></i>
                    </div>
                @endif
            </div>

            <!-- Info Produk -->
            <div class="col-lg-7">
                <div class="product-info">

                    @if($produk->kategori)
                        <span class="kategori-badge">
                            <i class="bi bi-tag me-1"></i>{{ $produk->kategori->nama_kategori }}
                        </span>
                    @endif

                    <h1 class="product-name">{{ $produk->nama_produk }}</h1>

                    <div class="product-price">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </div>

                    <div class="d-flex gap-2 mb-3">
                        <span class="info-chip">
                            <i class="bi bi-clock"></i>
                            {{ $produk->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <hr class="divider">

                    @if($produk->deskripsi)
                        <div class="section-label">Deskripsi Produk</div>
                        <p class="description-text">{{ $produk->deskripsi }}</p>
                        <hr class="divider">
                    @endif

                    <!-- Info Penjual -->
                    @if($produk->user)
                        <div class="seller-box">
                            <div class="d-flex align-items-center gap-3">
                                <div class="seller-avatar">
                                    {{ strtoupper(substr($produk->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="seller-name">{{ $produk->user->name }}</div>
                                    <div class="seller-label"><i class="bi bi-person-badge me-1"></i>Penjual Terverifikasi</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- TOMBOL WHATSAPP -->
                    <a href="{{ $linkWa }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn-whatsapp"
                       id="btn-hubungi-penjual">
                        <i class="bi bi-whatsapp"></i>
                        Hubungi Penjual via WhatsApp
                    </a>

                    <p class="wa-note">
                        <i class="bi bi-info-circle me-1"></i>
                        Anda akan diarahkan ke WhatsApp untuk menghubungi penjual
                    </p>

                </div>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
