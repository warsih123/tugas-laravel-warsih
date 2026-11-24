<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // ==============================
    // MENAMPILKAN HALAMAN REGISTER
    // ==============================
    public function showRegister()
    {
        return view('auth.register');
    }


    // ==============================
    // PROSES REGISTER
    // ==============================
    public function register(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'umur' => 'required|integer|min:1|max:120',
            'bio' => 'nullable|string',
            'password' => 'required|min:8|confirmed',
        ]);

        // Mencari role user biasa
        $role = Role::where('name', 'user')->first();

        if (!$role) {
            return back()->withInput()->withErrors([
                'email' => 'Role user belum tersedia di database.',
            ]);
        }

        // Membuat Profile dan User
        $user = DB::transaction(function () use ($validated, $role) {

            // Membuat Profile
            $profile = Profile::create([
                'umur' => $validated['umur'],
                'bio' => $validated['bio'] ?? 'Pengguna',
                'alamat' => 'Belum diisi',
            ]);

            // Membuat User
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'profile_id' => $profile->id,
                'role_id' => $role->id,
            ]);

            return $user;
        });

        // Login otomatis
        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('home')
            ->with('success', 'Registrasi berhasil!');
    }


    // ==============================
    // MENAMPILKAN HALAMAN LOGIN
    // ==============================
    public function showLogin()
    {
        return view('auth.login');
    }


    // ==============================
    // PROSES LOGIN
    // ==============================
    public function login(Request $request)
    {
        // Validasi login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Memeriksa email dan password
        if (Auth::attempt($credentials)) {

            // Memperbarui session
            $request->session()->regenerate();

            // Mengambil data pengguna
            $user = Auth::user();

            // Jika ADMIN (role_id = 2)
            if ($user->role_id == 2) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Selamat datang Administrator!');
            }

            // Jika USER BIASA (role_id = 1)
            if ($user->role_id == 1) {
                return redirect()->route('home')
                    ->with('success', 'Login berhasil!');
            }

            // Jika role tidak dikenali
            Auth::logout();

            return redirect()->route('login')
                ->withErrors([
                    'email' => 'Role akun tidak dikenali.',
                ]);
        }

        // Jika email atau password salah
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }


    // ==============================
    // PROSES LOGOUT
    // ==============================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Kamu berhasil logout.');
    }
}
