<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class NewsController extends Controller
{

    // Móvil
    public function mobileDataIndex(){
        $data = News::all()->where('deleted_at', null); 
        return response()->json(
            $data
            ,200);
    }

    // Web 
    public function index()
    {
        return view('system.Evento.index');
    }

    public function dataindex(){
        
        return datatables(News::all())

        ->addColumn('btn', 'system.Evento.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function create() {
        return view('system.Evento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'platform_description' => 'required',
            'news_date' => 'required',
            'link' => 'required',
            'cost' => 'required',
            'type_news_id' => 'required',
            'mode_id' => 'required',
            'platform_id' => 'required',

            'news_time' => 'required',
        ]);

        $time_formated = date("H:i:s", strtotime($request->news_time));
        
        $data = new News();
        $data->fill($request->all());

        $data->news_date = $data->news_date . " " . $time_formated;

        // if($request->file('image')){
        //     $data->image = $request->file('image')->store('event', 'public');
        // }

        $data->save();
        return redirect(route('event.index'));
    }

    public function edit($id) {
        $data = News::find($id);
        return view('system.Evento.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $time_formated = date("H:i:s", strtotime($request->event_time));

        $data = News::find($id);
        $data->fill($request->all());

        $data->event_date = $data->event_date . " " . $time_formated;

        if($request->file('image') != '')
        {
            Storage::delete($data->image);
            $data->image = $request->file('image')->store('event', 'public');
        }

        $data->save();
        return redirect(route('event.index'));
    }

    public function destroy($id)
    {
        $noticia = News::findOrFail($id);
        $noticia->delete();
        return redirect(route('event.index'));
    }
}
