<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mode;

class ModeController extends Controller
{

    public function dataindex(){
        
        return datatables(Mode::all())
        ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $data = new Mode();
        $data->fill($request->all());

        $data->save();
        return redirect(route('event.index'));
    }

    public function edit($id) {
        $data = Mode::find($id);
        return view('system.Evento.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = Mode::find($id);
        $data->fill($request->all());

        $data->save();
        return redirect(route('event.index'));
    }

    public function destroy($id)
    {
        $noticia = Mode::findOrFail($id);
        $noticia->delete();
        return redirect(route('event.index'));
    }

}
