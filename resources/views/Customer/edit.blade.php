@extends('fragment.navbar')


@section('navbar')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark fw-bold">
                        <i class="bi bi-pencil-square"></i> Edit Customer
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customers.update', $edit->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name_customer" class="form-label">Nama Customer</label>
                                <input type="text" name="name_customer" id="name_customer"
                                    class="form-control @error('name_customer') is-invalid @enderror"
                                    placeholder="Masukkan nama kategori" value="{{ $edit->name_customer }}">

                                @error('name_customer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_phone" class="form-label">No Phone</label>
                                <input type="number" name="no_phone" id="no_phone"
                                    class="form-control @error('no_phone') is-invalid @enderror"
                                    placeholder="Masukkan nama kategori" value="{{ $edit->no_phone }}">

                                @error('no_phone')
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
