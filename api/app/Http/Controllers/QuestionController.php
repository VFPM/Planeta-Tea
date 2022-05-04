<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('system.Cuestionario.Preguntas.index');
    }

    public function dataindex($test){
        
        return datatables(Question::where('test', $test))
        ->addColumn('btn', 'system.Evento.btn')
        ->rawColumns(['btn'])
        ->toJson();

        return view('system.Cuestionario.Preguntas.index');
    }

    public function dataindexMovil($test){
        $data = Question::where('test', $test);
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    public function create(){
        return view('system.Cuestionario.Preguntas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'question' => 'required',
            'test' => 'required'
        ]);
        
        $data = new Question();
        $data->fill($request->all());
        $data->save();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required',
            'question' => 'required',
            'test' => 'required'
        ]);

        $data = Question::find($id);
        $data->fill($request->all());
        $data->save();
    }

    public function edit($id){
        $data = Question::find($id);

        return view('system.Cuestionario.Preguntas.edit', compact('data'));
    }


    public function destroy($id)
    {
        $noticia = Question::findOrFail($id);
        $noticia->delete();
    }

    public function testQuestions($testId){
        $data = Question::where('test', $testId)->exists()->orderBy("number");

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }
}
