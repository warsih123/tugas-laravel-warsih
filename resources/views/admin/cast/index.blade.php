@extends('templates.index')

@section('content')
<div class="container">
    <h2>Data Cast</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.casts.create') }}" class="btn btn-primary mb-3">
        Tambah Cast
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Bio</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($casts as $cast)
                <tr>
                    <td>{{ $loop->iteration + ($casts->currentPage() - 1) * $casts->perPage() }}</td>
                    <td>{{ $cast->name }}</td>
                    <td>{{ $cast->age }}</td>
                    <td>{{ $cast->bio }}</td>
                    <td>
                        <a href="{{ route('admin.casts.edit', $cast->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.casts.destroy', $cast->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data cast.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $casts->links() }}
</div>
@endsection