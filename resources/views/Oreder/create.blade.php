@extends('fragment.navbar')

@section('navbar')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">
                        <i class="bi bi-plus-circle"></i> Tambah Orders
                    </div>
                    <div class="card-body">
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            {{-- Alert Error --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Customer --}}
                            <label>Customer</label>
                            <select name="customer_id" class="form-select mb-2" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($customers as $c)
                                    <option value="{{ $c->id }}"
                                        {{ old('customer_id') == $c->id ? 'selected' : '' }}>
                                        {{ $c->name_customer }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Meja --}}
                            <label>Meja</label>
                            <select name="table_id" class="form-select mb-2" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($tables as $t)
                                    <option value="{{ $t->id }}" {{ old('table_id') == $t->id ? 'selected' : '' }}>
                                        Meja {{ $t->table_number }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Menu --}}
                            <label>Menu</label>
                            @foreach ($menus as $menu)
                                <div class="form-check d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <input type="checkbox" name="menus[{{ $menu->id }}][selected]" value="1"
                                            class="form-check-input me-2" id="menu-{{ $menu->id }}"
                                            {{ old("menus.{$menu->id}.selected") ? 'checked' : '' }}>
                                        <label class="form-check-label" for="menu-{{ $menu->id }}">
                                            {{ $menu->name_menu }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                        </label>
                                    </div>
                                    <input type="number" name="menus[{{ $menu->id }}][quantity]"
                                        class="form-control w-25" placeholder="Qty" min="1"
                                        value="{{ old("menus.{$menu->id}.quantity", 1) }}">
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
