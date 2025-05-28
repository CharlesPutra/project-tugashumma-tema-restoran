@extends('fragment.navbar')

@section('navbar')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">
                <i class="bi bi-tags-fill me-2 text-primary"></i>Daftar Kategori
            </h2>
            <a href="{{ route('category.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
            </a>
        </div>

        {{-- Alert messages --}}
        @foreach (['success' => 'check-circle-fill', 'warning' => 'exclamation-triangle-fill', 'danger' => 'x-circle-fill'] as $type => $icon)
            @if (session($type))
                <div class="alert alert-{{ $type }} alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-{{ $icon }} me-2"></i> {{ session($type) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @endforeach

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-center text-secondary">
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categorys as $index => $category)
                            <tr class="text-center">
                                <td class="text-muted">{{ $index + 1 }}</td>
                                <td>
                                    {{-- opsional
                                    @php
                                        $colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary'];
                                        $badgeColor = $colors[$index % count($colors)];
                                    @endphp

                                    <span
                                        class="badge bg-{{ $badgeColor }} text-light px-3 py-2 rounded-pill fw-semibold">
                                        {{ $category->name_category }}
                                    </span> --}}

                                    <span class="badge bg-info-subtle text-dark px-3 py-2 rounded-pill fw-semibold">
                                        {{ $category->name_category }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    <i class="bi bi-folder-x me-2"></i>Tidak ada kategori tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $categorys->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
