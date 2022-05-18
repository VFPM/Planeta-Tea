<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mode;
use App\Models\NewsType;
use App\Models\Platform;

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
        
        $newsType = NewsType::all();
        $mode = Mode::where('active',1)->get();
        $plataform = Platform::all();
        
        return redirect(route('news.create', compact('newsType','mode','plataform')));
    }
    public function create() {
        return view('system.Evento.create');
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
        
        $newsType = NewsType::all();
        $mode = Mode::where('active',1)->get();
        $plataform = Platform::all();
        
        return redirect(route('news.create', compact('newsType','mode','plataform')));
    }

    public function destroy($id)
    {
        $noticia = Mode::findOrFail($id);
        $noticia->delete();
        return redirect(route('event.index'));
    }

}
