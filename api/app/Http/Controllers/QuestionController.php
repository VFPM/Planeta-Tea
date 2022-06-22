<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\QuestionType;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index($test_id)
    {
        $test = Test::find($test_id);

        return view('system.Cuestionario.Preguntas.index', compact('test'));
    }

    public function dataindex($test)
    {

        return datatables(Question::where('test_id', $test)->get())
            ->addColumn('btn', 'system.Cuestionario.Preguntas.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function dataindexMovil($test)
    {
        $data = Question::where('test_id', $test);

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ], 200);
    }

    public function create($test_id)
    {
        $test = Test::find($test_id);
        $questionTypes = QuestionType::all();

        return view('system.Cuestionario.Preguntas.create', compact('test', 'questionTypes'));
    }

    public function store(Request $request)
    {
        $test = $request->test_id;


        $request->validate([
            'description' => 'required',
            'question_type_id' => 'required',
            'test_id' => 'required'
        ]);



        $data = new Question();
        $data->fill($request->all());
        $data->save();

        if ($request->question_type_id == 2) {
            foreach ($request->respuestas as $respuesta) {
                $responses = new Answer();
                $responses->description = $respuesta;
                $responses->question_id = $data->id;
                $responses->save();
            }
        }


        return redirect(route('question.index', compact('test')));
    }

    public function edit($id)
    {
        $data = Question::find($id);
        $questionTypes = QuestionType::all();
        $test = Test::find($data->test_id);
        $responses = Answer::all()->where('question_id', $id);

        return view('system.Cuestionario.Preguntas.edit', compact('test', 'data', 'questionTypes', 'responses'));
    }

    public function update(Request $request, $id)
    {

        $test = $request->test_id;

        $request->validate([
            'description' => 'required',
            'question_type_id' => 'required',
            'test_id' => 'required'
        ]);

        $data = Question::find($id);
        $data->fill($request->all());
        $data->save();

        $responses = Answer::where('question_id', $id)->get();
        foreach ($responses as $response ) {
            $response->delete();
        }


        if ($request->question_type_id == 2) {
            foreach ($request->respuestas as $respuesta) {
                $responses = new Answer();
                $responses->description = $respuesta;
                $responses->question_id = $data->id;
                $responses->save();
            }
        }

        return redirect(route('question.index', compact('test')));
    }


    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $test = $question->test_id;

        $question->delete();

        return redirect(route('question.index', compact('test')));
    }

    public function testQuestions($testId)
    {
        $data = Question::where('test_id', $testId)->exists();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ], 200);
    }
}
