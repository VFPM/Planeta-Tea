<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\TestAnswer;
use App\Models\TestContact;

class AnswerController extends Controller
{

    public function index(){
        return view('system.Response.index');

    }

    public function data(){
        return datatables(TestContact::all())

        ->addColumn('btn', 'system.Response.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function dataAnswers($id){
        return datatables(TestAnswer::where("test_contact_id",$id)->get())
        ->toJson();
    }

    // public function index()
    // {
    //     return view('system.Cuestionario.Preguntas.index');
    // }

    // public function dataindex($test){
        
    //     return datatables(Answer::where('test_id', $test))
    //     ->addColumn('btn', 'system.Evento.btn')
    //     ->rawColumns(['btn'])
    //     ->toJson();

    //     return view('system.Cuestionario.Preguntas.index');
    // }

    // public function dataindexMovil($test){
    //     $data = Question::where('test_id', $test);

    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $data,
    //         'msg' => 'Se ha mostrado la información correctamente'
    //     ],200);
    // }

    // public function create(){
    //     return view('system.Cuestionario.Preguntas.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'description' => 'required',
    //         'question_type_id' => 'required',
    //         'test_id' => 'required'
    //     ]);
        
    //     $data = new Question();
    //     $data->fill($request->all());
    //     $data->save();
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'description' => 'required',
    //         'question_type_id' => 'required',
    //         'test_id' => 'required'
    //     ]);

    //     $data = Question::find($id);
    //     $data->fill($request->all());
    //     $data->save();
    // }

    // public function edit($id){
    //     $data = Question::find($id);

    //     return view('system.Cuestionario.Preguntas.edit', compact('data'));
    // }


    // public function destroy($id)
    // {
    //     $noticia = Question::findOrFail($id);
    //     $noticia->delete();
    // }

    // public function testQuestions($testId){
    //     $data = Question::where('test_id', $testId)->exists();

    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $data,
    //         'msg' => 'Se ha mostrado la información correctamente'
    //     ],200);
    // }
}
