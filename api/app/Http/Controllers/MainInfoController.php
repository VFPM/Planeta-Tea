<?php

namespace App\Http\Controllers;

use App\Models\MainInfo;
use Illuminate\Http\Request;

class MainInfoController extends Controller
{    
    public function index()
    {
        return "Index";
    }

    public function dataindex(){
        return MainInfo::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'values' => 'required',
            'services' => 'required'
        ]);
        
        $data = new MainInfo();
        $data->fill($request->all());
        $data->save();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'body' => 'required',
            'values' => 'required',
            'services' => 'required'
        ]);

        $data = MainInfo::find($id);
        $data->fill($request->all());
        $data->save();
    }

    public function destroy($id)
    {
        $noticia = MainInfo::findOrFail($id);
        $noticia->delete();
    }
}
