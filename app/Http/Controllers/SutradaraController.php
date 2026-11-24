<?php

namespace App\Http\Controllers;

use App\Models\Sutradara;
use Illuminate\Http\Request;

class SutradaraController extends Controller
{
    // Menampilkan semua data sutradara
    public function index()
    {
        $sutradaras = Sutradara::latest()->get();

        return view('admin.sutradara.index', compact('sutradaras'));
    }

    // Menampilkan form tambah sutradara
    public function create()
    {
        return view('admin.sutradara.create');
    }

    // Menyimpan data sutradara
    public function store(Request $request)
    {
        $request->validate([
            'nama_sutradara' => 'required|string|max:255',
            'biografi' => 'nullable|string',
        ]);

        Sutradara::create($request->all());

        return redirect()
            ->route('admin.sutradara.index')
            ->with('success', 'Data sutradara berhasil ditambahkan!');
    }

    // Menampilkan detail sutradara
    public function show(string $id)
    {
        $sutradara = Sutradara::findOrFail($id);

        return view('admin.sutradara.show', compact('sutradara'));
    }

    // Menampilkan form edit sutradara
    public function edit(string $id)
    {
        $sutradara = Sutradara::findOrFail($id);

        return view('admin.sutradara.edit', compact('sutradara'));
    }

    // Memperbarui data sutradara
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_sutradara' => 'required|string|max:255',
            'biografi' => 'nullable|string',
        ]);

        $sutradara = Sutradara::findOrFail($id);
        $sutradara->update($request->all());

        return redirect()
            ->route('admin.sutradara.index')
            ->with('success', 'Data sutradara berhasil diperbarui!');
    }

    // Menghapus data sutradara
    public function destroy(string $id)
    {
        $sutradara = Sutradara::findOrFail($id);
        $sutradara->delete();

        return redirect()
            ->route('admin.sutradara.index')
            ->with('success', 'Data sutradara berhasil dihapus!');
    }
}