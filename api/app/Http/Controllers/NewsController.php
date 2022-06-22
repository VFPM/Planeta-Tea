<?php

namespace App\Http\Controllers;

use App\Models\Abstracts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Mode;
use App\Models\Platform;

class NewsController extends Controller
{

    // Móvil
    public function mobileDataIndex(){
        $data = News::with('images')->with('type_news_id')->with('mode_id')->with('platform_id')->where('deleted_at', null)->get();

        return response()->json(
            $data
        ,200);
    }

    public function mobileSpecificNews($id){
        $data = News::with('images')->with('type_news_id')->with('mode_id')->with('platform_id')->where('id', $id)->get();

        return response()->json(
            $data[0]
        ,200);
    }
    
    public function mobileNewsList(){
        $data = News::select('id', 'title', 'news_date')->where('deleted_at', null)->get();

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
        $newsType = NewsType::all();
        $mode = Mode::where('active',1)->get();
        $plataform = Platform::all();
        
        return view('system.Evento.create', compact('newsType','mode','plataform'));
        //return view('system.Evento.create', compact('mode','plataform'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'news_date' => 'required',
            'link' => 'required',
            'cost' => 'required',
            'type_news_id' => 'required',
            'mode_id' => 'required',
            'platform_id' => 'required',
            'to' => 'required',
            'news_time' => 'required',
            'image' => 'required',
        ]);

        $time_formated = date("H:i:s", strtotime($request->news_time));
    
        $data = new News();
        $data->fill($request->all());
        $data->platform_description = 'descripcion de plataforma';
        $data->news_date = $data->news_date . " " . $time_formated;
        $data->save();

        $host= $_SERVER["HTTP_HOST"];
        $dataImage = new Abstracts();
        $dataImage->path = "http://" . $host . "/storage/" . $request->file('image')->store('news', 'public');
        $dataImage->description = "Descripcion de la imagen";
        $dataImage->new_id = $data->id;
        $dataImage->save();

        return redirect(route('event.index'));
    }

    public function edit($id) {
        $data = News::find($id);
        $newsType = NewsType::all();
        $mode = Mode::where('active',1)->get();
        $plataform = Platform::all();

        return view('system.Evento.edit', compact('data','newsType','mode','plataform'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'news_date' => 'required',
            'link' => 'required',
            'cost' => 'required',
            'type_news_id' => 'required',
            'mode_id' => 'required',
            'platform_id' => 'required',
            'to' => 'required',
            'news_time' => 'required',
        ]);

        $time_formated = date("H:i:s", strtotime($request->news_time));

        $data = News::find($id);
        $data->fill($request->all());
        $data->news_date = $data->news_date . " " . $time_formated;
        $data->save();

        if($request->file('image') != '')
        {
            $host= $_SERVER["HTTP_HOST"];
            $dataImage = Abstracts::select('id', 'description', 'path', 'new_id')->where('new_id', $id)->first();
            Storage::delete($dataImage->path);
            $dataImage->path = "http://" . $host . "/storage/" . $request->file('image')->store('news', 'public');
            $dataImage->save();
        }

        return redirect(route('event.index'));
    }

    public function destroy($id)
    {
        $noticia = News::findOrFail($id);
        $noticia->delete();
        return redirect(route('event.index'));
    }

}
