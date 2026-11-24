
@extends('templates.index')

@section('content')
<div class="container">
    <h2>Data Sutradara</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.sutradara.create') }}" class="btn btn-primary mb-3">
        Tambah Sutradara
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sutradara</th>
                <th>Biografi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($sutradaras as $sutradara)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sutradara->nama_sutradara }}</td>
                    <td>{{ $sutradara->biografi ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.sutradara.edit', $sutradara->id) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.sutradara.destroy', $sutradara->id) }}"
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
                    <td colspan="4" class="text-center">
                        Belum ada data sutradara.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
