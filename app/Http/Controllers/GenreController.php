<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Menampilkan daftar genre
    public function index()
    {
        $genres = Genre::orderBy('name')->paginate(10);

        return view('admin.genre.index', compact('genres'));
    }

    // Menampilkan form tambah genre
    public function create()
{
    return view('admin.genre.create');
}
    // Menyimpan genre baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name',
        ]);

        Genre::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.genres.index')
            ->with('success', 'Genre berhasil ditambahkan.');
    }

    // Menampilkan form edit genre
    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }

    // Memperbarui data genre
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id,
        ]);

        $genre->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.genres.index')
            ->with('success', 'Genre berhasil diperbarui.');
    }

    // Menghapus genre
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()
            ->route('admin.genres.index')
            ->with('success', 'Genre berhasil dihapus.');
    }
}
 
