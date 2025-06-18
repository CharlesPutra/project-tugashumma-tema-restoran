@extends('fragment.navbar')


@section('navbar')
    <div class="container my-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="row g-0 align-items-center">
                {{-- Gambar Menu --}}
                <div class="col-md-5">
                    @if ($show->image)
                        <img src="{{ asset('storage/' . $show->image) }}" class="img-fluid rounded-start"
                            alt="{{ $show->name }}" style="object-fit: cover; height: 100%;">
                    @else
                        <div class="bg-secondary d-flex align-items-center justify-content-center rounded-start"
                            style="height: 100%; min-height: 250px;">
                            <span class="text-white fs-5">No Image</span>
                        </div>
                    @endif
                </div>

                {{-- Detail show --}}
                <div class="col-md-7 p-4">
                    <h2 class="card-title fw-bold">{{ $show->name_menu }}</h2>
                    <div class="small text-muted mb-2">
                        <i class="bi bi-tags"></i>
                        {{ $show->category->name_category ?? 'Tidak ada kategori' }}
                    </div>
                    <p class="card-text text-muted mb-4" style="white-space: pre-line;">{{ $show->deskripsi }}</p>
                    <h4 class="text-success fw-semibold mb-4">Rp {{ number_format($show->harga, 0, ',', '.') }}</h4>
                    <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary px-4 py-2 fw-semibold">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
