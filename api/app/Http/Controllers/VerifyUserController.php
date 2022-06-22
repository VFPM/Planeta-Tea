<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VerifyUserController extends Controller
{
    public function index()
    {
        return view('auth.verifyuser');
    }

}
