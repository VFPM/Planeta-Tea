<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;

class PlatformController extends Controller
{
    public function dataindex(){
        
        return datatables(Platform::all())
        ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $data = new Platform();
        $data->fill($request->all());

        $data->save();
        return redirect(route('event.index'));
    }

    public function edit($id) {
        $data = Platform::find($id);
        return view('system.Evento.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = Platform::find($id);
        $data->fill($request->all());

        $data->save();
        return redirect(route('event.index'));
    }

    public function destroy($id)
    {
        $noticia = Platform::findOrFail($id);
        $noticia->delete();
        return redirect(route('event.index'));
    }
}
