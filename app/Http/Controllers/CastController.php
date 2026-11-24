<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    // Menampilkan daftar cast
    public function index()
    {
        $casts = Cast::orderBy('name')->paginate(10);

        return view('admin.cast.index', compact('casts'));
    }

    // Menampilkan form tambah cast
    public function create()
    {
        return view('admin.cast.create');
    }

    // Menyimpan data cast
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'age' => 'required|integer|min:0',
            'bio' => 'nullable|string',
        ]);

        Cast::create([
            'name' => $request->name,
            'age' => $request->age,
            'bio' => $request->bio,
        ]);

        return redirect()
            ->route('admin.casts.index')
            ->with('success', 'Data cast berhasil ditambahkan.');
    }

    // Menampilkan form edit cast
    public function edit(Cast $cast)
    {
        return view('admin.cast.edit', compact('cast'));
    }

    // Memperbarui data cast
    public function update(Request $request, Cast $cast)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'age' => 'required|integer|min:0',
            'bio' => 'nullable|string',
        ]);

        $cast->update([
            'name' => $request->name,
            'age' => $request->age,
            'bio' => $request->bio,
        ]);

        return redirect()
            ->route('admin.casts.index')
            ->with('success', 'Data cast berhasil diperbarui.');
    }

    // Menghapus data cast
    public function destroy(Cast $cast)
    {
        $cast->delete();

        return redirect()
            ->route('admin.casts.index')
            ->with('success', 'Data cast berhasil dihapus.');
    }
}

