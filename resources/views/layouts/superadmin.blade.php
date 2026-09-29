<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Dashboard Super Admin') - StudentMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#2E5B88;
    color:white;
}

.sidebar h3{
    padding:20px;
    font-weight:bold;
}

.sidebar a{
    display:block;
    padding:15px 20px;
    color:white;
    text-decoration:none;
}

.sidebar a:hover, .sidebar a.active{
    background:#24496d;
}

.content{
    margin-left:260px;
    padding:30px;
}

.card-custom{
    border:none;
    border-radius:15px;
}

</style>
@stack('styles')
</head>
<body>

<div class="sidebar">

    <h3>StudentMart</h3>

    <a href="/superadmin/dashboard" class="{{ request()->is('superadmin/dashboard') ? 'active' : '' }}">
        <i class="bi bi-house me-2"></i>
        Dashboard
    </a>

    <a href="/superadmin/produk" class="{{ request()->is('superadmin/produk*') ? 'active' : '' }}">
        <i class="bi bi-box me-2"></i>
        Semua Produk
    </a>

    <a href="/superadmin/kategori" class="{{ request()->is('superadmin/kategori*') ? 'active' : '' }}">
        <i class="bi bi-tags me-2"></i>
        Kategori
    </a>

    <a href="/superadmin/admin" class="{{ request()->is('superadmin/admin*') ? 'active' : '' }}">
        <i class="bi bi-people me-2"></i>
        Admin
    </a>

    <a href="/profile" class="{{ request()->is('profile') ? 'active' : '' }}">
        <i class="bi bi-person me-2"></i>
        Profil
    </a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn text-white w-100 text-start ps-3 mt-3">
            <i class="bi bi-box-arrow-right me-2"></i>
            Logout
        </button>
    </form>

</div>

<div class="content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
