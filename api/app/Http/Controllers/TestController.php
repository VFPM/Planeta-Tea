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

    public function dataindex(){
        $data = Test::all()->orderBy("created_at");

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'test_name' => 'required'
        ]);
        
        $data = new Test();
        $data->fill($request->all());
        $data->save();
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
        $noticia = Test::findOrFail($id);
        $noticia->delete();
    }
}
