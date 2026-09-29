<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'StudentMart - Marketplace Mahasiswa Polbeng' }}</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --sm-primary: #2E5B88;
            --sm-primary-dark: #204163;
            --sm-accent: #f59e0b;
            --sm-accent-hover: #d97706;
            --sm-bg: #f4f7fb;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--sm-bg);
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(46, 91, 136, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(245, 158, 11, 0.05) 0%, transparent 40%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 30px 16px;
            color: #334155;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 480px;
            margin: auto;
        }

        .auth-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 12px 35px rgba(46, 91, 136, 0.08), 0 3px 8px rgba(0, 0, 0, 0.02);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .auth-header-bar {
            height: 5px;
            background: linear-gradient(90deg, var(--sm-primary) 0%, #3b82f6 50%, var(--sm-accent) 100%);
        }

        .auth-body {
            padding: 2.25rem 2rem 2rem 2rem;
        }

        @media (max-width: 576px) {
            .auth-body {
                padding: 1.75rem 1.25rem;
            }
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--sm-primary) 0%, #1a3652 100%);
            color: #ffffff;
            border-radius: 16px;
            font-size: 1.75rem;
            box-shadow: 0 8px 18px rgba(46, 91, 136, 0.25);
            margin-bottom: 0.75rem;
            text-decoration: none;
            transition: transform 0.2s ease;
        }

        .brand-badge:hover {
            transform: scale(1.05);
            color: #ffffff;
        }

        .brand-name {
            font-weight: 800;
            font-size: 1.45rem;
            color: var(--sm-primary);
            letter-spacing: -0.5px;
            margin: 0;
            text-decoration: none;
        }

        .brand-name:hover {
            color: var(--sm-primary-dark);
        }

        .brand-tagline {
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 2px;
            margin-bottom: 0;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 0.4rem;
        }

        .input-group-text {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: #64748b;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            padding-left: 14px;
            padding-right: 14px;
        }

        .form-control {
            border-color: #cbd5e1;
            padding: 0.65rem 0.9rem;
            font-size: 0.95rem;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .input-group .form-control {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .input-group .form-control:not(:last-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group .btn-toggle-pw {
            border-color: #cbd5e1;
            background-color: #f8fafc;
            color: #64748b;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-left: 0;
            transition: all 0.15s ease;
        }

        .input-group .btn-toggle-pw:hover {
            background-color: #e2e8f0;
            color: #334155;
            border-color: #cbd5e1;
        }

        .form-control:focus {
            border-color: var(--sm-primary);
            box-shadow: 0 0 0 0.22rem rgba(46, 91, 136, 0.15);
        }

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .btn-toggle-pw {
            border-color: var(--sm-primary);
        }

        .form-check-input:checked {
            background-color: var(--sm-primary);
            border-color: var(--sm-primary);
        }

        .form-check-input:focus {
            border-color: var(--sm-primary);
            box-shadow: 0 0 0 0.2rem rgba(46, 91, 136, 0.15);
        }

        .btn-primary-custom {
            background-color: var(--sm-primary);
            border: 1px solid var(--sm-primary);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.72rem 1.25rem;
            border-radius: 10px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(46, 91, 136, 0.2);
        }

        .btn-primary-custom:hover {
            background-color: var(--sm-primary-dark);
            border-color: var(--sm-primary-dark);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(46, 91, 136, 0.28);
        }

        .btn-primary-custom:active {
            transform: translateY(0);
        }

        .btn-outline-primary-custom {
            border: 1.5px solid var(--sm-primary);
            color: var(--sm-primary);
            font-weight: 600;
            font-size: 0.925rem;
            padding: 0.65rem 1.25rem;
            border-radius: 10px;
            background: transparent;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-primary-custom:hover {
            background-color: var(--sm-primary);
            color: #ffffff;
            border-color: var(--sm-primary);
            box-shadow: 0 4px 12px rgba(46, 91, 136, 0.18);
        }

        .auth-footer-nav {
            margin-top: 1.5rem;
            text-align: center;
        }

        .auth-footer-nav a {
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.2s ease;
        }

        .auth-footer-nav a:hover {
            color: var(--sm-primary);
        }

        .divider-text {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }

        .divider-text hr {
            margin: 0;
            border-color: #e2e8f0;
            opacity: 1;
        }

        .divider-text span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 0 0.85rem;
            font-size: 0.8rem;
            color: #94a3b8;
            font-weight: 500;
        }

        .auth-copyright {
            font-size: 0.8rem;
            color: #94a3b8;
            text-align: center;
            margin-top: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-header-bar"></div>
            <div class="auth-body">
                <!-- Brand Header -->
                <div class="text-center mb-4">
                    <a href="/" class="brand-badge" title="Ke Beranda StudentMart">
                        <i class="bi bi-shop"></i>
                    </a>
                    <div>
                        <a href="/" class="brand-name d-block">StudentMart</a>
                        <p class="brand-tagline">Marketplace Mahasiswa Polbeng</p>
                    </div>
                </div>

                {{ $slot }}
            </div>
        </div>

        <div class="auth-footer-nav">
            <a href="/">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda StudentMart
            </a>
            <div class="auth-copyright">
                &copy; {{ date('Y') }} StudentMart Polbeng. Hak cipta dilindungi.
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePasswordVisibility(fieldId, btn) {
            const field = document.getElementById(fieldId);
            if (!field) return;
            const icon = btn.querySelector('i');
            if (field.type === 'password') {
                field.type = 'text';
                if (icon) {
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
            } else {
                field.type = 'password';
                if (icon) {
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            }
        }
    </script>
</body>
</html>
