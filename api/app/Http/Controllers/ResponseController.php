<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index()
    {
        return view('system.Cuestionario.Preguntas.Respuestas.index');
    }

    
}
