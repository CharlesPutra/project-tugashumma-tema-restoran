@extends('fragment.navbar')


@section('navbar')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-white fw-bold">
                          <i class="bi bi-pencil-square"></i> Edit Table
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tables.update',$edit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Table Number --}}
                            <div class="mb-3">
                                <label for="table_number" class="form-label">Table Number</label>
                                <input type="text" name="table_number" id="table_number"
                                    class="form-control @error('table_number') is-invalid @enderror"
                                    value="{{ $edit->table_number }}" placeholder="Masukkan Table Number">
                                @error('table_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Gambar --}}
                            <div class="mb-3">
                                   <label for="image" class="form-label">Gambar Menu (Opsional)</label>
                            @if ($edit->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $edit->image) }}" alt="Gambar Menu"
                                        class="img-thumbnail rounded" style="max-width: 150px;">
                                </div>
                            @endif
                                <label for="image" class="form-label">Gambar Menu</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- capacity --}}
                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" name="capacity" id="capacity"
                                    class="form-control @error('capacity') is-invalid @enderror" value="{{ $edit->capacity }}"
                                    placeholder="Masukkan capacity">
                                @error('capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tables.index') }}" class="btn btn-secondary">
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
