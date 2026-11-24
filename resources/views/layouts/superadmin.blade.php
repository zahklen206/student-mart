<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Super Admin') - StudentMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            background: #f1f5f9;
            color: #334155;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #1e3a5f;
            color: white;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        }

        .sidebar-brand {
            padding: 22px 20px;
            font-size: 1.3rem;
            font-weight: 800;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-user {
            padding: 16px 20px;
            background: rgba(0,0,0,0.15);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            font-size: 0.88rem;
        }

        .sidebar-menu {
            padding: 16px 12px;
            flex-grow: 1;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 4px;
            font-size: 0.92rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .sidebar-menu a:hover {
            color: white;
            background: rgba(255,255,255,0.12);
        }

        .sidebar-menu a.active {
            color: white;
            background: #ef4444;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .content {
            margin-left: 260px;
            padding: 32px;
            min-height: 100vh;
        }

        .card-custom {
            border: none;
            border-radius: 14px;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .content {
                margin-left: 0;
                padding: 20px 15px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

<div class="sidebar">
    <a href="/superadmin/dashboard" class="sidebar-brand">
        <i class="bi bi-shield-lock me-2 text-warning"></i>StudentMart
    </a>

    <div class="sidebar-user">
        <div class="text-white fw-bold">{{ Auth::user()->name }}</div>
        <div class="small text-danger fw-semibold"><i class="bi bi-star-fill me-1"></i>Super Admin</div>
    </div>

    <div class="sidebar-menu">
        <div class="text-uppercase text-white-50 px-3 mb-2" style="font-size: 0.72rem; letter-spacing: 0.8px;">Menu Utama</div>

        <a href="/superadmin/dashboard" class="{{ request()->is('superadmin/dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid me-2"></i> Dashboard
        </a>

        <a href="/superadmin/produk" class="{{ request()->is('superadmin/produk*') ? 'active' : '' }}">
            <i class="bi bi-box-seam me-2"></i> Semua Produk
        </a>

        <a href="/superadmin/kategori" class="{{ request()->is('superadmin/kategori*') ? 'active' : '' }}">
            <i class="bi bi-tags me-2"></i> Kategori
        </a>

        <a href="/superadmin/admin" class="{{ request()->is('superadmin/admin*') ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i> Data Penjual
        </a>

        <div class="text-uppercase text-white-50 px-3 mt-3 mb-2" style="font-size: 0.72rem; letter-spacing: 0.8px;">Navigasi</div>

        <a href="/" target="_blank">
            <i class="bi bi-box-arrow-up-right me-2"></i> Lihat Toko Publik
        </a>

        <a href="/profile" class="{{ request()->is('profile') ? 'active' : '' }}">
            <i class="bi bi-person-gear me-2"></i> Profil
        </a>
    </div>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm w-100 d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</div>

<div class="content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
