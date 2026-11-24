@extends('templates.index')

@section('content')
<div class="container">
    <h2>Edit Peran Film</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.perans.update', $peran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Peran / Karakter</label>
            <input type="text" name="actor" class="form-control"
                value="{{ old('actor', $peran->actor) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Cast</label>
            <select name="cast_id" class="form-control" required>
                @foreach($casts as $cast)
                    <option value="{{ $cast->id }}"
                        {{ old('cast_id', $peran->cast_id) == $cast->id ? 'selected' : '' }}>
                        {{ $cast->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Film</label>
            <select name="film_id" class="form-control" required>
                @foreach($films as $film)
                    <option value="{{ $film->id }}"
                        {{ old('film_id', $peran->film_id) == $film->id ? 'selected' : '' }}>
                        {{ $film->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.perans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection