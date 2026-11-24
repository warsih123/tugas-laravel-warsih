
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    FilmController,
    AuthController,
    AdminController,
    GenreController,
    CastController,
    SutradaraController,
    UserController,
};

// Halaman utama
Route::get('/', [FilmController::class, 'movieHome'])->name('home');

// Daftar film
Route::get('/movies', [FilmController::class, 'movies'])->name('movies');

// Detail film
Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');

// Film berdasarkan genre
Route::get('/movies/genre/{genre}', [FilmController::class, 'moviesByGenre'])->name('genre');

// Halaman Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');

// Proses Register
Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest');

// Halaman Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

// Proses Login
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Dashboard dan fitur Administrator
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('films', FilmController::class)->except(['show']);

    Route::resource('genres', GenreController::class)->except(['show']);

    Route::resource('casts', CastController::class)->except(['show']);

    Route::resource('sutradara', SutradaraController::class)->except(['show']);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

});
