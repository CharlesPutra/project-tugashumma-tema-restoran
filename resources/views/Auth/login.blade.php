<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - The Savory Spoon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* opsional */
            /* kasih img */
            /* background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover; */
            /*  di kasih img logo*/
            /* background: linear-gradient(rgba(255, 248, 240, 0.9), rgba(255, 248, 240, 0.9)),
                url('logo.jpg') no-repeat center center;
            background-size: cover; */
            /* natural */
             background: linear-gradient(rgba(255, 248, 240, 0.9), rgba(255, 248, 240, 0.9));

            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background-color: rgba(255, 248, 240, 0.95);
            padding: 2.5rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1.5rem;
            border: 3px solid #c8553d;
        }

        .login-card h2 {
            font-weight: 700;
            color: #a3452f;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .btn-login {
            background-color: #c8553d;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #a3452f;
        }

        .text-muted a {
            color: #c8553d;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-card {
                margin: 1rem;
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-card">
        <!-- Gambar Profil Restoran / Hiasan -->
        <img src="{{ asset('logo.jpg') }}" alt="Food Icon">

        <h2>Masuk ke <span style="color:#c8553d;">Savory Spoon</span></h2>
        <form method="POST" action="">
            @csrf

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="contoh@restaurant.com" required autofocus>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••"
                    required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-login">Masuk</button>
            </div>

            {{-- opsional
            <p class="text-center text-muted">
                Belum punya akun? <a href="">Daftar</a>
            </p> --}}
        </form>
    </div>
</body>

</html>
