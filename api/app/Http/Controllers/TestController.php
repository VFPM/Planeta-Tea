<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    // Móvil
    public function dataIndexMovil(){
        $data = Test::all();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
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
            'name' => 'required'
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
            'name' => 'required'
        ]);

        $data = Test::find($id);
        $data->fill($request->all());
        $data->save();

        return view('system.Cuestionario.index');
    }

    public function destroy($id)
    {
        $data = Test::findOrFail($id);
        $data->delete();
        return redirect(route('test.index'));
    }
}
