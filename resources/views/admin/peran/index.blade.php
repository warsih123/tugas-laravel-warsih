@extends('templates.index')

@section('content')
<div class="container">
    <h2>Data Peran Film</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.perans.create') }}" class="btn btn-primary mb-3">
        Tambah Peran
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peran</th>
                <th>Cast</th>
                <th>Film</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($perans as $peran)
                <tr>
                    <td>{{ $loop->iteration + ($perans->currentPage() - 1) * $perans->perPage() }}</td>
                    <td>{{ $peran->actor }}</td>
                    <td>{{ $peran->cast->name ?? '-' }}</td>
                    <td>{{ $peran->film->title ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.perans.edit', $peran->id) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.perans.destroy', $peran->id) }}"
                            method="POST" style="display:inline;">
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
                    <td colspan="5" class="text-center">
                        Belum ada data peran.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $perans->links() }}
</div>
@endsection