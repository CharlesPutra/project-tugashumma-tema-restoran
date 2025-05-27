@extends('fragment.navbar')

@section('navbar')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark fw-bold">
                    <i class="bi bi-pencil-square"></i> Edit Menu
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label for="id_category" class="form-label">Kategori</label>
                            <select name="id_category" id="id_category"
                                class="form-select @error('id_category') is-invalid @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $menu->id_category == $category->id ? 'selected' : '' }}>
                                        {{ $category->name_category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nama Menu --}}
                        <div class="mb-3">
                            <label for="name_menu" class="form-label">Nama Menu</label>
                            <input type="text" name="name_menu" id="name_menu"
                                class="form-control @error('name_menu') is-invalid @enderror"
                                value="{{ old('name_menu', $menu->name_menu) }}">
                            @error('name_menu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Gambar --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Menu (Opsional)</label>
                            @if ($menu->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="Gambar Menu"
                                        class="img-thumbnail rounded" style="max-width: 150px;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga" id="harga"
                                class="form-control @error('harga') is-invalid @enderror"
                                value="{{ old('harga', $menu->harga) }}">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                rows="4">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('menu.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning text-white">
                                <i class="bi bi-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
