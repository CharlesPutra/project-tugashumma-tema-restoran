<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Savory Spoon</title>
    <link rel="web icon" href="{{ asset('logo.jpg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        .navbar {
            background-color: hsl(10, 56%, 51%) !important;
            color: #fff !important;
        }

        .navbar a,
        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar a:hover,
        .navbar-nav .nav-link:hover {
            color: #ffd8c2 !important;
            /* Warna hover lebih terang */
        }

        .dropdown-menu {
            background-color: hsl(10, 56%, 51%) !important;
            /* Warna navbar */
            color: #fff !important;
            border: none;
            --bs-dropdown-bg: hsl(10, 56%, 51%) !important;
            --bs-dropdown-link-color: #fff !important;
            --bs-dropdown-link-hover-bg: #ff7a5c !important;
            /* sedikit lebih terang untuk hover */
            --bs-dropdown-link-hover-color: #fff !important;
            backdrop-filter: none !important;
        }

        .dropdown-item {
            color: #fff !important;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background-color: #ff7a5c !important;
            color: #fff !important;
        }
    </style>

</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                <img src="{{ asset('logo.jpg') }}" alt="Logo" width="30" height="30"
                    class="d-inline-block align-text-top rounded-circle">
                The Savory Spoon
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i
                                class="bi bi-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu.index') }}"><i class="bi bi-list-ul"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}"><i class="bi bi-tags"></i> Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-people"></i> Customers</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="ordersDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-cart"></i> Orders
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" data-bs-theme="light"
                            aria-labelledby="ordersDropdown">
                            <li><a class="dropdown-item text-white" href="#"><i class="bi bi-cart-plus"></i> Add
                                    Orders </a></li>
                            <li><a class="dropdown-item text-white" href="#"><i class="bi bi-cart-check"></i>
                                    Orders Details</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- navbar end --}}
    <main>
        @yield('navbar')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>
