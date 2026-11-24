<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StudentMart') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        .auth-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 440px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.04);
        }

        .auth-header {
            background: #2E5B88;
            padding: 32px 24px;
            text-align: center;
            color: white;
        }

        .auth-header h3 {
            font-weight: 800;
            margin-bottom: 4px;
            letter-spacing: -0.5px;
        }

        .auth-body {
            padding: 32px 28px;
        }

        .form-control:focus {
            border-color: #2E5B88;
            box-shadow: 0 0 0 0.2rem rgba(46, 91, 136, 0.15);
        }

        .btn-auth {
            background: #2E5B88;
            color: white;
            font-weight: 600;
            padding: 11px;
            border-radius: 10px;
            border: none;
            transition: all 0.2s;
        }

        .btn-auth:hover {
            background: #204163;
            color: white;
            box-shadow: 0 4px 12px rgba(46, 91, 136, 0.3);
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <div class="auth-header">
            <a href="/" class="text-white text-decoration-none">
                <i class="bi bi-shop fs-1 d-block mb-2"></i>
                <h3 class="mb-0">StudentMart</h3>
            </a>
            <small class="text-white-50">Marketplace Mahasiswa</small>
        </div>

        <div class="auth-body">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
