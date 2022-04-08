<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Login
    public function index(){
        return view('login');
    }

    //Register
    public function register(){
        return view('register');
    }
}