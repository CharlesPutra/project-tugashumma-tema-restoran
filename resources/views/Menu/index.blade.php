@extends('fragment.navbar')

@section('navbar')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Menu List</h2>
            <a href="{{ route('menu.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Menu
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-arrow-counterclockwise"></i>
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-trash"></i>
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


       {{-- List Menu --}}
    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->name_menu }}"
                         style="object-fit: cover; height: 200px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $menu->name_menu }}</h5>
                        <h6 class="text-muted mb-2">{{ $menu->category->name_category ?? '-' }}</h6>
                        <p class="mb-1">{{ $menu->deskripsi }}</p>
                        <p class="fw-bold mt-auto text-primary">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="bi bi-folder-x fs-3 d-block mb-2"></i>
                    Tidak ada menu tersedia.
                </div>
            </div>
        @endforelse
    </div>
        {{-- Pagination --}}
        <div class="mt-3">
            {{ $menus->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
