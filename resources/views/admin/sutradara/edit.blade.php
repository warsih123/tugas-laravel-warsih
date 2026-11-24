
@extends('templates.index')

@section('content')
<div class="container">
    <h2>Edit Data Sutradara</h2>

    <form action="{{ route('admin.sutradara.update', $sutradara->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Sutradara</label>
            <input type="text" name="nama_sutradara"
                class="form-control"
                value="{{ old('nama_sutradara', $sutradara->nama_sutradara) }}"
                required>
            @error('nama_sutradara')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label>Biografi</label>
            <textarea name="biografi" class="form-control"
                rows="4">{{ old('biografi', $sutradara->biografi) }}</textarea>
            @error('biografi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('admin.sutradara.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
