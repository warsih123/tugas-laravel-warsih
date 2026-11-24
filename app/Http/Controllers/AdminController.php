<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan dashboard administrator
    public function index()
    {
        return view('admin.dashboard');
    }
}
