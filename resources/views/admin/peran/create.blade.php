@extends('templates.index')

@section('content')
<div class="container">
    <h2>Tambah Peran Film</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.perans.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Nama Peran / Karakter</label>
            <input type="text" name="actor" class="form-control"
                value="{{ old('actor') }}" placeholder="Contoh: Peter Parker" required>
        </div>

        <div class="form-group mb-3">
            <label>Cast</label>
            <select name="cast_id" class="form-control" required>
                <option value="">-- Pilih Cast --</option>
                @foreach($casts as $cast)
                    <option value="{{ $cast->id }}"
                        {{ old('cast_id') == $cast->id ? 'selected' : '' }}>
                        {{ $cast->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Film</label>
            <select name="film_id" class="form-control" required>
                <option value="">-- Pilih Film --</option>
                @foreach($films as $film)
                    <option value="{{ $film->id }}"
                        {{ old('film_id') == $film->id ? 'selected' : '' }}>
                        {{ $film->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.perans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection