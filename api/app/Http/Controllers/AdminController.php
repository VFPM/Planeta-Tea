<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Web
    public function index()
    {
        $data = User::all();
        return view('system.Administrador.index', compact('data'));
    }
}
