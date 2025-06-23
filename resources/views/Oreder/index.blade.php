{{-- @extends('fragment.navbar')

@section('navbar')
    <div class="container">
        <h2 class="mb-4 d-flex justify-content-between align-items-center">
            Daftar Pesanan
            <a href="{{ route('orders.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Pesanan
            </a>
        </h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabel pesanan -->
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Table</th>
                    <th>Tanggal Pesan</th>
                    <th>Item</th>
                    <th>Total (Rp)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ optional($order->customer)->name_customer ?? '-' }}</td>
                        <td>{{ optional($order->table)->table_number ?? '-' }}</td>
                        <td>{{ $order->order_date->format('d-m-Y H:i') }}</td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach ($order->items as $item)
                                    <li>{{ $item->menu->name }} x {{ $item->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            @if ($order->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif ($order->status === 'paid')
                                <span class="badge bg-success">Paid</span>
                            @else
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button name="status" value="paid" class="btn btn-success btn-sm"
                                    onclick="return confirm('Tandai pesanan sebagai dibayar?')">Paid</button>
                                <button name="status" value="cancelled" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Batalkan pesanan ini?')">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}



@extends('fragment.navbar')

@section('navbar')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">
                <i class="bi bi-tags-fill me-2 text-primary"></i>Daftar Kategori
            </h2>
            <a href="{{ route('orders.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Pesanan
            </a>
        </div>

        {{-- Alert messages --}}
        {{-- @foreach (['success' => 'check-circle-fill', 'warning' => 'exclamation-triangle-fill', 'danger' => 'x-circle-fill'] as $type => $icon)
            @if (session($type))
                <div class="alert alert-{{ $type }} alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-{{ $icon }} me-2"></i> {{ session($type) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @endforeach --}}

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-center text-secondary">
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Table</th>
                            <th>Tanggal Pesan</th>
                            <th>Item</th>
                            <th>Total (Rp)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                       @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ optional($order->customer)->name_customer ?? '-' }}</td>
                        <td>{{ optional($order->table)->table_number ?? '-' }}</td>
                        <td>{{ $order->order_date->format('d-m-Y H:i') }}</td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach ($order->items as $item)
                                    <li>{{ $item->menu->name }} x {{ $item->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            @if ($order->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif ($order->status === 'paid')
                                <span class="badge bg-success">Paid</span>
                            @else
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button name="status" value="paid" class="btn btn-success btn-sm"
                                    onclick="return confirm('Tandai pesanan sebagai dibayar?')">Paid</button>
                                <button name="status" value="cancelled" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Batalkan pesanan ini?')">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
