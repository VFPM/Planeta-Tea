<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\News;
use app\Models\NewsType;
use app\Models\Mode;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //News
    public function news(){
        $newsType = NewsType::all();
        $mode = Mode::where('active',1)->get();
        //$data = 
    }
}

?>
