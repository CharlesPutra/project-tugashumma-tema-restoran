@extends('fragment.navbar')

@section('navbar')
    <style>
        body {
            background-color: #fff8f0;
            color: #4b3f2f;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200&q=80') no-repeat center center/cover;
            border-radius: 0.75rem;
            height: 300px;
            color: #fff;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2.5rem 3rem;
            margin-bottom: 3rem;
        }

        .section-title {
            border-bottom: 3px solid #c8553d;
            color: #a3452f;
            padding-bottom: 0.25rem;
            font-weight: 700;
        }

        .menu-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(191, 144, 84, 0.3);
            border-radius: 0.75rem;
        }

        .menu-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 8px 22px rgba(200, 100, 40, 0.4);
        }

        .menu-card img {
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
            object-fit: cover;
            height: 160px;
            width: 100%;
        }

        .menu-card-body {
            padding: 1rem 1.25rem;
            display: flex;
            flex-direction: column;
            height: 170px;
        }

        .price {
            font-weight: 700;
            color: #c8553d;
            font-size: 1.1rem;
            margin-top: auto;
        }

        .promotions {
            background-color: #f5e6da;
            border-radius: 0.625rem;
            padding: 2rem;
            box-shadow: 0 3px 10px rgba(184, 122, 73, 0.3);
            color: #7a4a2a;
            margin-top: 3rem;
        }

        footer {
            background-color: hsl(10, 56%, 51%);
            color: #fff;
            font-weight: 600;
            padding: 1rem 0;
            text-align: center;
            border-top-left-radius: 0.625rem;
            border-top-right-radius: 0.625rem;
            margin-top: 4rem;
        }
    </style>
    <main class="container my-4 text-center">
        <section class="hero" role="banner" aria-label="Restaurant welcome banner">
            <h1 class="display-4 fw-bold">Welcome to The Savory Spoon</h1>
            <p class="lead">Experience delicious dishes crafted with love and fresh ingredients. Your perfect meal awaits!
            </p>
        </section>
        <section aria-labelledby="menu-title">
            <h2 id="menu-title" class="section-title mb-4">Featured Menu</h2>
            <div class="row g-4">
                <article class="col-12 col-md-6 col-lg-4">
                    <div class="card menu-card h-100" tabindex="0" aria-label="Margherita Pizza">
                        <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Margherita Pizza" />
                        <div class="card-body menu-card-body">
                            <h3 class="card-title h5 text-brown fw-bold">Margherita Pizza</h3>
                            <p class="card-text flex-grow-1">Classic pizza topped with fresh mozzarella, tomatoes, and basil
                                leaves baked to perfection.</p>
                            <div class="price">Rp12.500</div>
                        </div>
                    </div>
                </article>
                <article class="col-12 col-md-6 col-lg-4">
                    <div class="card menu-card h-100" tabindex="0" aria-label="Grilled Salmon">
                        <img src="https://images.unsplash.com/photo-1551183053-bf91a1d81141?auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Grilled Salmon" />
                        <div class="card-body menu-card-body">
                            <h3 class="card-title h5 text-brown fw-bold">Grilled Salmon</h3>
                            <p class="card-text flex-grow-1">Fresh Atlantic salmon grilled to a tender finish, served with
                                lemon and seasonal vegetables.</p>
                            <div class="price">Rp18.000</div>
                        </div>
                    </div>
                </article>
                <article class="col-12 col-md-6 col-lg-4">
                    <div class="card menu-card h-100" tabindex="0" aria-label="Chocolate Lava Cake">
                        <img src="https://images.unsplash.com/photo-1525755662778-989d0524087e?auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Chocolate Lava Cake" />
                        <div class="card-body menu-card-body">
                            <h3 class="card-title h5 text-brown fw-bold">Tumis Ayam Brocoli</h3>
                            <p class="card-text flex-grow-1">Decadent warm chocolate cake with a gooey molten center served
                                with vanilla ice cream.</p>
                            <div class="price">Rp50.000</div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <section class="promotions" aria-labelledby="promo-title">
            <h2 id="promo-title" class="fw-bold fs-3 mb-3">Today's Specials</h2>
            <p class="fs-5">Enjoy 20% off all pasta dishes from 5 PM to 8 PM! Celebrate the flavors of Italy with us
                tonight.</p>
        </section>
    </main>
    <footer>
        &copy; 2025 Charles Agustian Putra. All rights reserved.
    </footer>
@endsection
