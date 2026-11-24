<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);

        return view('admin.user.index', compact('users'));
    }
}