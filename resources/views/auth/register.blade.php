
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Film Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #141e30, #243b55);
            padding: 30px 15px;
        }

        .register-container {
            width: 100%;
            max-width: 480px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.3);
        }

        .register-container h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            color: #222;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            padding: 11px;
            border-radius: 8px;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #e50914;
            color: white;
            font-weight: bold;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-register:hover {
            background: #b80710;
        }

        .login-link {
            text-align: center;
            margin-top: 22px;
            color: #666;
        }

        .login-link a {
            color: #e50914;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="register-container">

        <h2>Create Account</h2>
        <p class="subtitle">Daftar untuk menikmati berbagai film favoritmu!</p>

        <!-- Pesan Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Register -->
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                >
            </div>

            <!-- Umur -->
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input
                    type="number"
                    class="form-control"
                    id="umur"
                    name="umur"
                    value="{{ old('umur') }}"
                    min="1"
                    max="120"
                    placeholder="Masukkan umur"
                    required
                >
            </div>

            <!-- Bio -->
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea
                    class="form-control"
                    id="bio"
                    name="bio"
                    rows="3"
                    placeholder="Ceritakan sedikit tentang dirimu"
                >{{ old('bio') }}</textarea>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    required
                >
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Konfirmasi Password
                </label>
                <input
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Masukkan ulang password"
                    required
                >
            </div>

            <button type="submit" class="btn-register">
                Register
            </button>

        </form>

        <!-- Link Login -->
        <div class="login-link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login sekarang</a>
        </div>

    </div>

</body>
</html>
