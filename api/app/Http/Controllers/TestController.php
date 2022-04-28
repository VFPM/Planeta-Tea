<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('system.Cuestionario.index');
    }

    public function dataindexMovil(){
        $data = Test::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);              
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
            'test_name' => 'required'
        ]);
        
        $data = new Test();
        $data->fill($request->all());
        $data->save();

        return view('system.Cuestionario.index');
    }

    public function edit($id) {
        $data = Test::find($id);
        return view('system.Cuestionario.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'test_name' => 'required'
        ]);

        $data = Test::find($id);
        $data->fill($request->all());
        $data->save();
    }

    public function destroy($id)
    {
        $data = Test::findOrFail($id);
        $data->delete();
        return redirect(route('test.index'));
    }
}
