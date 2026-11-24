
@extends('templates.index')

@section('content')
<div class="container" style="padding: 30px;">

    <h2>Kelola Data Film</h2>
    <p>Daftar seluruh film One Movies.</p>

    <a href="{{ route('admin.films.create') }}"
       class="btn btn-primary"
       style="margin-bottom: 20px;">
        + Tambah Film
    </a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pencarian Film --}}
    <form action="{{ route('admin.films.index') }}"
          method="GET"
          style="display: flex; gap: 10px; margin-bottom: 20px;">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari judul film..."
               value="{{ $search ?? '' }}">

        <button type="submit" class="btn btn-primary">
            Cari
        </button>

        <a href="{{ route('admin.films.index') }}"
           class="btn btn-secondary">
            Reset
        </a>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Poster</th>
                    <th>Judul Film</th>
                    <th>Tahun</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($films as $film)
                    <tr>
                        <td>{{ $films->firstItem() + $loop->index }}</td>

                        <td>
                            <img src="{{ asset($film->poster) }}"
                                 width="70"
                                 alt="Poster film">
                        </td>

                        <td>{{ $film->title }}</td>
                        <td>{{ $film->year }}</td>
                        <td>{{ $film->genre->name ?? '-' }}</td>

                        <td>
                            <a href="{{ route('admin.films.edit', $film->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.films.destroy', $film->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            @if (!empty($search))
                                Film "{{ $search }}" tidak ditemukan.
                            @else
                                Belum ada data film.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $films->links() }}

</div>
@endsection
