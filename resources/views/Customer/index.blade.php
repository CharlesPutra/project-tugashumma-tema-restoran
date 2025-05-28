@extends('fragment.navbar')

@section('navbar')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">
                <i class="bi bi-person-lines-fill me-2 text-primary"></i>Daftar Kontak Customer
            </h2>
            <a href="{{ route('customers.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Customer
            </a>
        </div>

        {{-- Alerts --}}
        @foreach (['success' => 'check-circle-fill', 'warning' => 'exclamation-triangle-fill', 'danger' => 'x-circle-fill'] as $type => $icon)
            @if (session($type))
                <div class="alert alert-{{ $type }} alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-{{ $icon }} me-2"></i> {{ session($type) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @endforeach

        {{-- Grid Cards --}}
        <div class="row g-4">
            @forelse ($customers as $index => $customer)
                <div class="col-md-4 col-lg-3">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            @php
                            // ada dua resource foto random 
                                $imageUrl = "https://picsum.photos/seed/animal{$customer->id}/100";
                                // $imageUrl = "https://picsum.photos/seed/customer{$customer->id}/100";
                            @endphp
                            <img src="{{ $imageUrl }}" alt="Foto untuk {{ $customer->name_customer }}"
                                class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">

                            <h5 class="card-title mb-1">{{ $customer->name_customer }}</h5>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-telephone me-1"></i>{{ $customer->no_phone }}
                            </p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('customers.edit', $customer->id) }}"
                                    class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus customer ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4">
                    <i class="bi bi-info-circle me-2"></i>Belum ada data customer.
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $customers->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
