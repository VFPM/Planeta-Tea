<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index()
    {
        return "Index";
    }

    public function dataindex(){
        return "Data index";
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
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'pdf' => 'required',
        ]);

        $data = Information::find($id);
        $data->fill($request->all());

        if($request->file('pdf') != '')
        {
            Storage::delete($data->pdf);
            $data->pdf = $request->file('pdf')->store('information', 'public');
        }

        $data->save();
    }

    public function destroy($id)
    {
        $noticia = Information::findOrFail($id);
        $noticia->delete();
    }
}
