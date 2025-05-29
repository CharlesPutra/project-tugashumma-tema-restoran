<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Savory Spoon</title>
    <link rel="icon" href="{{ asset('logo.jpg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
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
        <img src="{{ asset('logo.jpg') }}" alt="Food Icon">
        <h2>@yield('title', 'Masuk ke') <span style="color:#c8553d;">Savory Spoon</span></h2>
            <main>
                @yield('auth')
            </main>
    </div>
</body>

</html>
