@extends('fragment.navbar')

@section('navbar')
 <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <label>Customer</label>
        <select name="customer_id" class="form-select mb-2" required>
            <option value="">-- Pilih --</option>
            @foreach ($customers as $c)
                <option value="{{ $c->id }}">{{ $c->name_customer }}</option>
            @endforeach
        </select>

        <label>Meja</label>
        <select name="table_id" class="form-select mb-2" required>
            <option value="">-- Pilih --</option>
            @foreach ($tables as $t)
                <option value="{{ $t->id }}">Meja {{ $t->table_number }}</option>
            @endforeach
        </select>

        <label>Menu</label>
        @foreach ($menus as $menu)
            <div class="form-check d-flex justify-content-between mb-2">
                <label class="form-check-label">
                    <input type="checkbox" name="menus[{{ $menu->id }}][selected]" value="1"
                        class="form-check-input">
                    {{ $menu->name_menu }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                </label>
                <input type="number" name="menus[{{ $menu->id }}][quantity]" placeholder="Qty"
                    class="form-control w-25" min="1">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
