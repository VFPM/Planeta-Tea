<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return "Index";
    }

    public function dataindex(){
        $data = Event::all()->orderBy("created_at");

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'to' => 'required',
            'event_date' => 'required',
            'mode' => 'required',
            'cost' => 'required',
            'image' => 'required'
        ]);
        
        $data = new Event();
        $data->fill($request->all());
        $data->save();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'to' => 'required',
            'event_date' => 'required',
            'mode' => 'required',
            'cost' => 'required',
            'image' => 'required'
        ]);

        $data = Event::find($id);
        $data->fill($request->all());
        $data->save();
    }

    public function destroy($id)
    {
        $noticia = Event::findOrFail($id);
        $noticia->delete();
    }
}
