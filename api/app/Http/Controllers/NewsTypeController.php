<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NewsType;

class NewsTypeController extends Controller
{
    public function dataindex(){
        
        return datatables(NewsType::all())
        ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $data = new NewsType();
        $data->fill($request->all());

        $data->save();
        return redirect(route('event.index'));
    }

    public function edit($id) {
        $data = NewsType::find($id);
        return view('system.Evento.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = NewsType::find($id);
        $data->fill($request->all());

        $data->save();
        return redirect(route('event.index'));
    }

    public function destroy($id)
    {
        $noticia = NewsType::findOrFail($id);
        $noticia->delete();
        return redirect(route('event.index'));
    }




}
