@extends('fragment.navbar')

@section('navbar')
<div class="container my-5">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">
            <i class="bi bi-list-ul me-2 text-primary"></i>Daftar Table
        </h2>
        <a href="{{ route('tables.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Table
        </a>
    </div>

    {{-- Alerts --}}
    @foreach (['success' => 'check-circle-fill', 'warning' => 'exclamation-triangle-fill', 'danger' => 'x-circle-fill'] as $type => $icon)
        @if (session($type))
            <div class="alert alert-{{ $type }} alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-{{ $icon }} me-2"></i>{{ session($type) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endforeach

    {{-- List Menu --}}
    <div class="row">
        @forelse ($tables as $table)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('storage/' . $table->image)  }}" class="card-img-top rounded-top"
                         alt="{{ $table->table_number }}" style="object-fit: cover; height: 200px;">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $table->table_number }}</h5>
                        <p class="card-text flex-grow-1 text-truncate" title="{{ $table->capacity }}">
                            {{ $table->capacity }}
                        </p>
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between border-0">
                        <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('tables.destroy', $table->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus table ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center py-4">
                    <i class="bi bi-folder-x fs-3 d-block mb-2"></i>
                    Tidak ada table tersedia.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $tables->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
