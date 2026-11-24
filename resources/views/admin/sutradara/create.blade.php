
@extends('templates.index')

@section('content')
<div class="container">
    <h2>Tambah Sutradara</h2>

    <form action="{{ route('admin.sutradara.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Nama Sutradara</label>
            <input type="text" name="nama_sutradara"
                class="form-control"
                value="{{ old('nama_sutradara') }}"
                placeholder="Masukkan nama sutradara"
                required>
            @error('nama_sutradara')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label>Biografi</label>
            <textarea name="biografi" class="form-control"
                rows="4"
                placeholder="Masukkan biografi sutradara">{{ old('biografi') }}</textarea>
            @error('biografi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('admin.sutradara.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
