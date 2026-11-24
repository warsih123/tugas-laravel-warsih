
@extends('templates.index')

@section('content')
<div class="container" style="padding: 30px;">
    <h2>Edit Film</h2>

    <form action="{{ route('admin.films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Judul Film</label>
            <input type="text" name="title" class="form-control"
                value="{{ old('title', $film->title) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" rows="5" required>{{ old('sinopsis', $film->sinopsis) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Tahun</label>
            <input type="number" name="year" class="form-control"
                value="{{ old('year', $film->year) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Genre</label>
            <select name="genre_id" class="form-control" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        {{ old('genre_id', $film->genre_id) == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Sutradara</label>
            <select name="sutradara_id" class="form-control">
                <option value="">Pilih Sutradara</option>
                @foreach ($sutradaras as $sutradara)
                    <option value="{{ $sutradara->id }}"
                        {{ old('sutradara_id', $film->sutradara_id) == $sutradara->id ? 'selected' : '' }}>
                        {{ $sutradara->nama_sutradara }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Poster Saat Ini</label><br>
            <img src="{{ asset($film->poster) }}" width="120" alt="Poster Film">
        </div>

        <div class="form-group mb-3">
            <label>Ganti Poster (Opsional)</label>
            <input type="file" name="poster" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.films.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
