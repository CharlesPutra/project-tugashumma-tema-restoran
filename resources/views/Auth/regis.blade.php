@extends('fragment.auth')

@section('title', 'Daftar di')

@section('auth')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Savory Spoon" required
                autofocus>
        </div>

        <div class="mb-3 text-start">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="contoh@restaurant.com"
                required>
        </div>

        <div class="mb-3 text-start">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-login">Daftar</button>
        </div>

        <p class="text-center text-muted">
            Sudah punya akun? <a href="{{ route('Showlogin') }}">Masuk</a>
        </p>
    </form>
@endsection
