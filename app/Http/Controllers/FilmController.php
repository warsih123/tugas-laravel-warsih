<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Kritik;
use App\Models\Peran;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FilmController extends Controller
{
    // Menampilkan daftar film untuk pengunjung
    public function movies()
    {
        $genreFilm = null;
        $search = request('search');

        $films = Film::select('id', 'title', 'poster', 'year')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderByDesc('year')
            ->orderBy('created_at', 'asc')
            ->paginate(18)
            ->withQueryString();

        return view('components.movies', compact(
            'films',
            'genreFilm',
            'search'
        ));
    }

    // Menampilkan daftar film di admin + pencarian
    public function index()
    {
        $search = request('search');

        $films = Film::with('genre')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.film.index', compact('films', 'search'));
    }

    // Form tambah film
public function create()
{
    $genres = Genre::orderBy('name')->get();
    $sutradaras = \App\Models\Sutradara::orderBy('nama_sutradara')->get();

    return view('admin.film.create', compact('genres', 'sutradaras'));
}

    // Menyimpan film baru
    public function store(StoreFilmRequest $request)
    {
        $validated = $request->validated();

        $poster = $request->file('poster');

        $folder = public_path('images/admin_uploads');

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $filename = Str::uuid() . '.' . $poster->extension();

        $poster->move($folder, $filename);

        $validated['poster'] = 'images/admin_uploads/' . $filename;

        Film::create($validated);

        return redirect()
            ->route('admin.films.index')
            ->with('success', 'Film berhasil ditambahkan!');
    }

    // Menampilkan detail film
    public function show(Film $film)
    {
        $filmByGenre = Film::select(
            'id', 'title', 'poster', 'year', 'sinopsis'
        )
            ->where('genre_id', '=', $film->genre_id)
            ->orderBy('created_at', 'asc')
            ->limit(7)
            ->get();

        $filmByRelease = Film::select('id', 'title', 'poster', 'year')
            ->where('year', '=', Carbon::now()->format('Y'))
            ->orderBy('created_at', 'asc')
            ->limit(9)
            ->get();

        $comments = Kritik::select('comment', 'user_id')
            ->where('film_id', '=', $film->id)
            ->orderBy('created_at', 'asc')
            ->limit(10)
            ->get();

        $perans = Peran::with('cast')
            ->where('film_id', '=', $film->id)
            ->get();

        return view('components.movie-show', compact(
            'film',
            'filmByGenre',
            'filmByRelease',
            'comments',
            'perans'
        ));
    }

    // Form edit film
public function edit(Film $film)
{
    $genres = Genre::orderBy('name')->get();
    $sutradaras = \App\Models\Sutradara::orderBy('nama_sutradara')->get();

    return view('admin.film.edit', compact('film', 'genres', 'sutradaras'));
}

    // Memperbarui film
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $validated = $request->validated();

        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');

            $folder = public_path('images/admin_uploads');

            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            $filename = Str::uuid() . '.' . $poster->extension();

            $poster->move($folder, $filename);

            $validated['poster'] = 'images/admin_uploads/' . $filename;

            $this->deleteAdminPoster($film->poster);
        } else {
            unset($validated['poster']);
        }

        $film->update($validated);

        return redirect()
            ->route('admin.films.index')
            ->with('success', 'Film berhasil diperbarui!');
    }

    // Menghapus film
    public function destroy(Film $film)
    {
        $this->deleteAdminPoster($film->poster);

        $film->delete();

        return redirect()
            ->route('admin.films.index')
            ->with('success', 'Film berhasil dihapus!');
    }

    // Menghapus poster upload admin
    private function deleteAdminPoster($poster)
    {
        if (str_starts_with($poster, 'images/admin_uploads/')) {
            $path = public_path($poster);

            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    // Halaman utama
    public function movieHome()
    {
        $films = Film::select('id', 'title', 'poster', 'year')
            ->orderBy('created_at', 'asc')
            ->limit(9)
            ->get();

        $filmFutured = Film::select('id', 'title', 'poster', 'year')
            ->orderByDesc('year')
            ->orderBy('created_at', 'asc')
            ->limit(6)
            ->get();

        $filmRecentAdded = Film::select('id', 'title', 'poster', 'year')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $filmSlidey = Film::select('title', 'poster', 'sinopsis')
            ->orderByDesc('year')
            ->orderBy('created_at', 'asc')
            ->limit(6)
            ->get();

        return view('components.home', compact(
            'filmSlidey',
            'films',
            'filmFutured',
            'filmRecentAdded'
        ));
    }

    // Menampilkan film berdasarkan genre
    public function moviesByGenre($genre)
    {
        $genreFilm = Genre::where('id', '=', $genre)->first();

        $films = Film::select('id', 'title', 'poster', 'year')
            ->where('genre_id', '=', $genre)
            ->orderByDesc('year')
            ->orderBy('created_at', 'asc')
            ->paginate(18);

        return view('components.movies', compact(
            'films',
            'genreFilm'
        ));
    }
}