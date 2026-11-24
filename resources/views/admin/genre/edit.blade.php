 
@extends('templates.index')

@section('content')
<div class="container" style="padding: 30px;">

    <h2>Edit Genre</h2>

    <form action="{{ route('admin.genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Genre</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $genre->name) }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Perubahan
        </button>

        <a href="{{ route('admin.genres.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
@endsection