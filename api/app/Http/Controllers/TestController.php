<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Test;
use App\Models\Event;
use App\Models\News;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\TestAnswer;
use App\Models\TestContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    // Móvil
    public function mobileDataIndex(){
        
        //$data = Test::with('questions', 'questions.answers')->get();
        $data = Test::with('questions', 'questions.answers')->where('tests.active', 1)->where('deleted_at', null)->get();
        // $data = TestAnswer::all();
        
        return response()->json(
            $data
            ,200);
    }

    // Web
    public function index()
    {
        return view('system.Cuestionario.index');
    }

    public function dataindex(){
        return datatables(Test::all())
        ->addColumn('btn', 'system.Cuestionario.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function create() {
        return view('system.Cuestionario.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $data = new Test();
        $data->fill($request->all());
        $data->save();

        return redirect(route('test.index'));
    }

    public function edit($id) {
        $data = Test::find($id);
        
        return view('system.Cuestionario.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = Test::find($id);
        $data->fill($request->all());
        $data->save();

        return redirect(route('test.index'));
    }

    public function destroy($id)
    {
        $data = Test::findOrFail($id);
        $data->delete();
        return redirect(route('test.index'));
    }

    public function testActive($id){
        $data = Test::all(); 
        
        foreach($data as $inactiveTest){
            $inactiveTest->active = 0;
            $inactiveTest->save();
        }

        $test = Test::find($id);
        $test->active = 1;
        $test->save();

        return redirect(route('test.index'));
    }

}
