<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        return view('system.Evento.index');
    }

    public function dataindex(){
        
        return datatables(Event::all())

        ->addColumn('btn', 'system.Evento.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function dataIndexMovil(){
        $data = Event::all();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    public function create() {
        return view('system.Evento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'to' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'mode' => 'required',
            'cost' => 'required',
            'image' => 'required'
        ]);

        $time_formated = date("H:i:s", strtotime($request->event_time));
        
        $data = new Event();
        $data->fill($request->all());

        $data->event_date = $data->event_date . " " . $time_formated;

        if($request->file('image')){
            $data->image = $request->file('image')->store('event', 'public');
        }

        $data->save();
        return redirect(route('event.index'));
    }

    public function edit($id) {
        $data = Event::find($id);
        return view('system.Evento.edit', compact('data'));
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

        $data = Event::find($id);
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
        $noticia = Event::findOrFail($id);
        $noticia->delete();
        return redirect(route('event.index'));
    }
}
