<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($test_id)
    {
        $test = Test::find($test_id);

        return view('system.Cuestionario.Preguntas.index', compact('test'));
    }

    public function dataindex($test){
        
        return datatables(Question::where('test_id', $test))
        ->addColumn('btn', 'system.Cuestionario.Preguntas.btn')
        ->rawColumns(['btn'])
        ->toJson();

        return view('system.Cuestionario.Preguntas.index');
    }

    public function dataindexMovil($test){
        $data = Question::where('test_id', $test);

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    public function create($test_id){
        $test = Test::find($test_id);
        $questionTypes = QuestionType::all();

        return view('system.Cuestionario.Preguntas.create', compact('test', 'questionTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'question_type_id' => 'required',
            'test_id' => 'required'
        ]);
        
        $data = new Question();
        $data->fill($request->all());
        $data->save();
    }

    public function edit($test, $id){
        $data = Question::find($id);

        return view('system.Cuestionario.Preguntas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'question_type_id' => 'required',
            'test_id' => 'required'
        ]);

        $data = Question::find($id);
        $data->fill($request->all());
        $data->save();
    }


    public function destroy($id)
    {
        $noticia = Question::findOrFail($id);
        $noticia->delete();
    }

    public function testQuestions($testId){
        $data = Question::where('test_id', $testId)->exists();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }
}
