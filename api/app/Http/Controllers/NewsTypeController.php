<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NewsType;
use App\Models\Mode;
use App\Models\Platform;

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

        $newsType = NewsType::all();
        $mode = Mode::where('active',1)->get();
        $plataform = Platform::all();
        
        return redirect(route('news.create', compact('newsType','mode','plataform')));
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
        
        $newsType = NewsType::all();
        $mode = Mode::where('active',1)->get();
        $plataform = Platform::all();
        
        return redirect(route('news.create', compact('newsType','mode','plataform')));
    }

    public function destroy($id)
    {
        $noticia = NewsType::findOrFail($id);
        $noticia->delete();
        return redirect(route('event.index'));
    }




}
