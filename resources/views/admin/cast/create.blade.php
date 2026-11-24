@extends('templates.index')

@section('content')
<div class="container">
    <h2>Tambah Data Cast</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.casts.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Nama Cast</label>
            <input type="text" name="name" class="form-control"
                value="{{ old('name') }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Umur</label>
            <input type="number" name="age" class="form-control"
                value="{{ old('age') }}" min="0" required>
        </div>

        <div class="form-group mb-3">
            <label>Bio</label>
            <textarea name="bio" class="form-control" rows="4">{{ old('bio') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.casts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection