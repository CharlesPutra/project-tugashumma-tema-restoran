<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .error-container {
            text-align: center;
            max-width: 420px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 6rem;
            font-weight: 700;
            color: #dc3545;
        }
        p {
            font-size: 1.25rem;
            margin-bottom: 24px;
            color: #6c757d;
        }
        a.btn-primary {
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <p>Maaf, halaman yang kamu cari tidak ditemukan.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</body>
</html>
