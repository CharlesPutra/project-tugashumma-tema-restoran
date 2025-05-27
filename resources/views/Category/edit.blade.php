@extends('fragment.navbar')


@section('navbar')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark fw-bold">
                        <i class="bi bi-pencil-square"></i> Edit Kategori
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $edit->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name_category" class="form-label">Nama Kategori</label>
                                <input type="text" name="name_category" id="name_category"
                                    class="form-control @error('name_category') is-invalid @enderror"
                                    placeholder="Masukkan nama kategori" value="{{ $edit->name_category }}">

                                @error('name_category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('category.index') }}" class="btn btn-secondary">
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
