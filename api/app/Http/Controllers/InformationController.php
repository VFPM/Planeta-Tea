<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index()
    {
        return view('system.Informacion.index');
    }

    public function dataindex(){        
        return datatables(Information::all())

        ->addColumn('btn', 'system.Informacion.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function dataindexMovil(){
        $data = Information::all(); 
        
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    public function create() {
        return view('system.Informacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pdf' => 'required',
        ]);

        $data = new Information();
        $data->fill($request->all());

        if($request->file('pdf')){
            $data->pdf = $request->file('pdf')->store('information', 'public');
        }

        $data->save();
        return redirect(route('information.index'));
    }

    public function edit($id) {
        $data = Information::find($id);
        return view('system.Informacion.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = Information::find($id);
        $data->fill($request->all());

        if($request->file('pdf') != '')
        {
            Storage::delete($data->pdf);
            $data->pdf = $request->file('pdf')->store('information', 'public');
        }

        $data->save();
        return redirect(route('information.index'));
    }

    public function destroy($id)
    {
        $noticia = Information::findOrFail($id);
        $noticia->delete();
        return redirect(route('information.index'));
    }
}
