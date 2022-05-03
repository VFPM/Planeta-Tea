<?php

namespace App\Http\Controllers;

use App\Models\QuestionType;
use Illuminate\Http\Request;

class QuestionTypeController extends Controller
{

    // ---------- Web ----------
    public function index()
    {
        return view('system.Cuestionario.TipoPreguntas.index');
    }
    
    public function dataindex(){
        $data = QuestionType::where('active', 1);
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);

        return view('system.Cuestionario.TipoPreguntas.index');
    }

    public function create(){
        return view('system.Cuestionario.TipoPreguntas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $data = new QuestionType();
        $data->fill($request->all());
        $data->save();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = QuestionType::find($id);
        $data->fill($request->all());
        $data->save();
    }

    public function edit($id){
        $data = QuestionType::find($id);

        return view('system.Cuestionario.TipoPreguntas.edit', compact('data'));
    }


    public function destroy($id)
    {
        $noticia = QuestionType::findOrFail($id);
        $noticia->delete();
    }

}
