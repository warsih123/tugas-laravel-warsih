<?php

namespace App\Http\Controllers;

use App\Models\Peran;
use App\Models\Cast;
use App\Models\Film;
use Illuminate\Http\Request;

class PeranController extends Controller
{
    // Menampilkan daftar peran
    public function index()
    {
        $perans = Peran::with(['cast', 'film'])->paginate(10);

        return view('admin.peran.index', compact('perans'));
    }

    // Form tambah peran
    public function create()
    {
        $casts = Cast::all();
        $films = Film::all();

        return view('admin.peran.create', compact('casts', 'films'));
    }

    // Menyimpan data peran
    public function store(Request $request)
    {
        $request->validate([
            'actor' => 'required|string|max:255',
            'cast_id' => 'required|exists:casts,id',
            'film_id' => 'required|exists:films,id',
        ]);

        Peran::create($request->only('actor', 'cast_id', 'film_id'));

        return redirect()->route('admin.perans.index')
            ->with('success', 'Data peran berhasil ditambahkan.');
    }

    // Form edit peran
    public function edit(Peran $peran)
    {
        $casts = Cast::all();
        $films = Film::all();

        return view('admin.peran.edit', compact('peran', 'casts', 'films'));
    }

    // Memperbarui data peran
    public function update(Request $request, Peran $peran)
    {
        $request->validate([
            'actor' => 'required|string|max:255',
            'cast_id' => 'required|exists:casts,id',
            'film_id' => 'required|exists:films,id',
        ]);

        $peran->update($request->only('actor', 'cast_id', 'film_id'));

        return redirect()->route('admin.perans.index')
            ->with('success', 'Data peran berhasil diperbarui.');
    }

    // Menghapus data peran
    public function destroy(Peran $peran)
    {
        $peran->delete();

        return redirect()->route('admin.perans.index')
            ->with('success', 'Data peran berhasil dihapus.');
    }
}