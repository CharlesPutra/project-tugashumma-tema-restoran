@extends('fragment.auth')

@section('title', 'Masuk ke')

@section('auth')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    {{-- alert pertama --}}
    {{-- @if ($errors->has('login'))
    <div class="alert alert-danger">
        {{ $errors->first('login') }}
    </div>
@endif --}}

    {{-- alert kedua  --}}

    @if ($errors->has('login'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{ $errors->first('login') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif





    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
            <label for="name" class="form-label">Username</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="Savory Spoon" required
                autofocus>
        </div>

        <div class="mb-3 text-start">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-login">Masuk</button>
        </div>

        <p class="text-center text-muted">
            Belum punya akun? <a href="{{ route('Showregis') }}">Daftar</a>
        </p>
    </form>
@endsection
