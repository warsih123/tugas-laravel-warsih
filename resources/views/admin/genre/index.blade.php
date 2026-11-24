 
@extends('templates.index')

@section('content')
<div class="container" style="padding: 30px;">

    <h2>Kelola Data Genre</h2>

    <a href="{{ route('admin.genres.create') }}" class="btn btn-primary mb-3">
        + Tambah Genre
    </a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Genre</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($genres as $genre)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="{{ route('admin.genres.edit', $genre->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.genres.destroy', $genre->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus genre ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        Belum ada data genre.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $genres->links() }}

</div>
@endsection