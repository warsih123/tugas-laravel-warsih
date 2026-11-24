
@extends('templates.index')

@section('content')

<div class="container" style="padding: 30px;">

    <h2>Tambah Genre</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.genres.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Nama Genre</label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                placeholder="Masukkan nama genre"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Genre
        </button>

        <a href="{{ route('admin.genres.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
