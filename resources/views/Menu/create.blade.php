@extends('fragment.navbar')


@section('navbar')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">
                        <i class="bi bi-plus-circle"></i> Tambah Menu
                    </div>
                    <div class="card-body">
                        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Select kategori utama --}}
                            <div class="mb-3">
                                <label for="id_category" class="form-label">Pilih Kategori Menu</label>
                                <select name="id_category" id="id_category"
                                    class="form-select @error('id_category') is-invalid @enderror">
                                    <option selected>-- Pilih Kategori --</option>
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                                    @endforeach
                                </select>
                                @error('id_category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Select kategori utama end --}}
                            {{-- Nama Menu --}}
                            <div class="mb-3">
                                <label for="name_menu" class="form-label">Nama Menu</label>
                                <input type="text" name="name_menu" id="name_menu"
                                    class="form-control @error('name_menu') is-invalid @enderror"
                                    value="{{ old('name_menu') }}" placeholder="Masukkan nama menu">
                                @error('name_menu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Gambar --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Menu</label>
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
                                    class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}"
                                    placeholder="Masukkan harga">
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4"
                                    placeholder="Tulis deskripsi menu">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('menu.index') }}" class="btn btn-secondary">
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
