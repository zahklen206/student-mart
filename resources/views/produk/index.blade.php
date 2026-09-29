<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Produk - StudentMart</title>
    <meta name="description" content="Temukan produk terbaik dari mahasiswa di StudentMart Marketplace.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f4f8; }

        /* Navbar */
        .navbar-custom {
            background: #2E5B88;
            padding: 14px 0;
            box-shadow: 0 2px 12px rgba(0,0,0,0.15);
        }
        .navbar-brand-text {
            font-weight: 700;
            font-size: 1.3rem;
            color: white;
            text-decoration: none;
        }
        .nav-link-custom {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
        }
        .nav-link-custom:hover { color: white !important; }

        /* Hero Section */
        .page-hero {
            background: linear-gradient(135deg, #2E5B88 0%, #1a3c62 100%);
            color: white;
            padding: 40px 0 32px;
        }
        .page-hero h2 { font-weight: 700; font-size: 1.8rem; }
        .page-hero p { opacity: 0.8; }

        .search-box {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            display: flex;
            background: white;
            padding: 4px;
            max-width: 600px;
            margin-top: 20px;
        }
        .search-box input {
            flex: 1;
            border: none;
            padding: 12px 16px;
            font-size: 0.95rem;
            outline: none;
            color: #333;
        }
        .search-box button {
            background: #f59e0b;
            border: none;
            padding: 10px 24px;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .search-box button:hover { background: #d97706; }

        /* Product Grid */
        .product-grid { padding: 32px 0 60px; }

        /* Product Card */
        .produk-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .produk-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(0,0,0,0.12);
            color: inherit;
        }

        .produk-img {
            height: 200px;
            background: linear-gradient(135deg, #dbeafe, #ede9fe);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #93c5fd;
        }

        .produk-body { padding: 16px 18px 20px; flex-grow: 1; display: flex; flex-direction: column; }

        .produk-kategori {
            font-size: 0.75rem;
            color: #2E5B88;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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
        }

        .produk-harga {
            font-size: 1.15rem;
            font-weight: 700;
            color: #16a34a;
            margin-bottom: 12px;
            margin-top: auto;
        }

        .produk-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px solid #f1f5f9;
        }

        .penjual-info {
            font-size: 0.8rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-wa-mini {
            background: #25d366;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 5px 12px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-wa-mini:hover { background: #20ba5a; color: white; }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }
        .empty-state i { font-size: 4rem; color: #cbd5e1; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand-text" href="/">
            <i class="bi bi-shop me-2"></i>StudentMart
        </a>
        <div class="ms-auto d-flex align-items-center gap-2">
            <a href="/" class="nav-link-custom me-2">Beranda</a>
            @auth
                @if(Auth::user()->role === 'superadmin')
                    <a href="/superadmin/dashboard" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-speedometer2 me-1"></i>Dashboard
                    </a>
                @elseif(Auth::user()->role === 'admin')
                    <a href="/admin/dashboard" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-speedometer2 me-1"></i>Dashboard
                    </a>
                @else
                    <a href="/profile" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-person me-1"></i>Profil
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-light btn-sm">Register</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <h2><i class="bi bi-grid me-2"></i>Semua Produk</h2>
        <p>{{ $produk->total() }} produk tersedia dari mahasiswa penjual</p>
        
        <form action="{{ route('produk.index') }}" method="GET">
            <div class="search-box">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama produk...">
                <button type="submit"><i class="bi bi-search me-1"></i> Cari</button>
            </div>
        </form>
    </div>
</div>

<!-- Product Grid -->
<div class="product-grid">
    <div class="container">

        @if($produk->isEmpty())
            <div class="empty-state">
                <i class="bi bi-search d-block mb-3"></i>
                <h5 class="text-muted">Tidak ada produk ditemukan</h5>
                <p class="text-muted">Coba gunakan kata kunci pencarian yang lain.</p>
                @if(request('q'))
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-primary mt-2">Reset Pencarian</a>
                @endif
            </div>
        @else
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($produk as $p)
                    <div class="col">
                        <a href="{{ route('produk.show', $p->id) }}" class="produk-card">

                            <!-- Gambar -->
                            <div class="produk-img">
                                @if($p->foto && $p->foto !== '')
                                    <img src="{{ asset('storage/' . $p->foto) }}"
                                         alt="{{ $p->nama_produk }}"
                                         style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    <i class="bi bi-image"></i>
                                @endif
                            </div>

                            <!-- Konten -->
                            <div class="produk-body">

                                @if($p->kategori)
                                    <div class="produk-kategori">{{ $p->kategori->nama_kategori }}</div>
                                @endif

                                <div class="produk-nama">{{ $p->nama_produk }}</div>

                                <div class="produk-harga">
                                    Rp {{ number_format($p->harga, 0, ',', '.') }}
                                </div>

                                <div class="produk-footer">
                                    <div class="penjual-info">
                                        <i class="bi bi-person-circle"></i>
                                        {{ Str::limit($p->user->name ?? 'Penjual', 14) }}
                                    </div>
                                    <span class="btn-wa-mini" onclick="event.preventDefault();">
                                        <i class="bi bi-whatsapp"></i> WA
                                    </span>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $produk->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
