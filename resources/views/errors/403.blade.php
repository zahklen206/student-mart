<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | StudentMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .error-icon {
            font-size: 4rem;
            color: #ef4444;
            margin-bottom: 16px;
        }
        .btn-home {
            background-color: #2E5B88;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: background 0.2s;
        }
        .btn-home:hover {
            background-color: #1e3f60;
            color: white;
        }
    </style>
</head>
<body>
    <div class="error-card">
        <i class="bi bi-shield-lock error-icon"></i>
        <h2 class="fw-bold text-dark mb-2">403 - Akses Ditolak</h2>
        <p class="text-muted mb-4">{{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses untuk membuka halaman ini.' }}</p>
        <a href="/" class="btn-home">
            <i class="bi bi-house-door me-1"></i> Kembali ke Beranda
        </a>
    </div>
</body>
</html>
