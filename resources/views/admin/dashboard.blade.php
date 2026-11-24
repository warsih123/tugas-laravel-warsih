
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - One Movies</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f5f9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #20212b;
            color: white;
            padding: 25px 18px;
        }

        .sidebar h3 {
            color: #ff8c1a;
            text-align: center;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 7px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #ff8c1a;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: white;
            padding: 20px 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .card-admin {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.05);
            height: 100%;
            transition: .3s;
        }

        .card-admin:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 18px rgba(0,0,0,.12);
        }

        .card-admin h5 {
            color: #777;
        }

        .card-admin h2 {
            color: #ff8c1a;
            margin-top: 15px;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .logout-btn {
            background: #e53935;
            color: white;
            border: none;
            padding: 9px 16px;
            border-radius: 6px;
        }

        .logout-btn:hover {
            background: #c62828;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>ONE MOVIES</h3>

        <a href="{{ route('admin.dashboard') }}" class="active">
            Dashboard
        </a>

        <a href="{{ route('admin.films.index') }}">Kelola Film</a>
        <a href="{{ route('admin.casts.index') }}">Kelola Cast</a>
        <a href="{{ route('admin.genres.index') }}">Kelola Genre</a>
        <a href="{{ route('admin.sutradara.index') }}">Kelola Sutradara</a>
        <a href="{{ route('admin.users.index') }}">Data User</a>

        <hr>

        <a href="{{ route('home') }}">Kembali ke Website</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <div class="topbar">
            <h4 class="mb-0">Dashboard Administrator</h4>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </div>

        <div class="welcome">
            <h3>Selamat Datang, {{ auth()->user()->name }}!</h3>
            <p class="text-secondary">
                Kelola seluruh data pada aplikasi One Movies.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <a href="{{ route('admin.films.index') }}" class="card-link">
                    <div class="card-admin">
                        <h5>Kelola Film</h5>
                        <h2>Film</h2>
                        <p class="text-secondary">
                            Tambah, edit, dan hapus data film.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.casts.index') }}" class="card-link">
                    <div class="card-admin">
                        <h5>Kelola Cast</h5>
                        <h2>Cast</h2>
                        <p class="text-secondary">
                            Kelola biodata pemain film.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.genres.index') }}" class="card-link">
                    <div class="card-admin">
                        <h5>Kelola Genre</h5>
                        <h2>Genre</h2>
                        <p class="text-secondary">
                            Kelola kategori film.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.sutradara.index') }}" class="card-link">
                    <div class="card-admin">
                        <h5>Kelola Sutradara</h5>
                        <h2>Sutradara</h2>
                        <p class="text-secondary">
                            Kelola data sutradara film.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.users.index') }}" class="card-link">
                    <div class="card-admin">
                        <h5>Data Pengguna</h5>
                        <h2>User</h2>
                        <p class="text-secondary">
                            Lihat daftar akun pengguna.
                        </p>
                    </div>
                </a>
            </div>

        </div>

    </div>

</body>
</html>
