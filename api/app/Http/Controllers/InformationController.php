<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    // Móvil 
    public function mobileDataIndex(){
        $data = Information::all()->where('deleted_at', null); 
        return response()->json(
            $data
            ,200);
    }

    // Web
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
            $host= $_SERVER["HTTP_HOST"];
            $data->pdf = "http://" . $host . "/storage/" . $request->file('pdf')->store('information', 'public');
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
            $host= $_SERVER["HTTP_HOST"];
            $data->pdf = "http://" . $host . "/storage/" . $request->file('pdf')->store('information', 'public');
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
