<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view('system.Noticias.index');
    }

    public function dataindex(){
        
        return datatables(News::all())

        ->addColumn('btn', 'system.Noticias.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function dataIndexMovil(){
        $data = News::all();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    public function create() {
        return view('system.Noticias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'to' => 'required',
            'news_date' => 'required',
            'news_time' => 'required',
            'mode' => 'required',
            'cost' => 'required',
            'image' => 'required'
        ]);

        $time_formated = date("H:i:s", strtotime($request->news_time));
        
        $data = new News();
        $data->fill($request->all());

        $data->event_date = $data->event_date . " " . $time_formated;

        if($request->file('image')){
            $data->image = $request->file('image')->store('news', 'public');
        }

        $data->save();
        return redirect(route('news.index'));
    }

    public function edit($id) {
        $data = News::find($id);
        return view('system.Noticias.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'to' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'mode' => 'required',
            'cost' => 'required'
        ]);

        $time_formated = date("H:i:s", strtotime($request->event_time));

        $data = News::find($id);
        $data->fill($request->all());

        $data->event_date = $data->event_date . " " . $time_formated;

        if($request->file('image') != '')
        {
            Storage::delete($data->image);
            $data->image = $request->file('image')->store('news', 'public');
        }

        $data->save();
        return redirect(route('news.index'));
    }

    public function destroy($id)
    {
        $noticia = News::findOrFail($id);
        $noticia->delete();
        return redirect(route('news.index'));
    }
}
