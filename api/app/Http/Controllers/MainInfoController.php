<?php

namespace App\Http\Controllers;

use App\Models\MainInfo;
use Illuminate\Http\Request;


class MainInfoController extends Controller
{    
    // Mobile 
    public function mobileDataIndex(){
        $data = MainInfo::all()->last();

        return response()->json(
            $data,
            200);
    }

    // Web 
    public function index()
    {
        $data = MainInfo::all()->last();
        return view('system.InformacionPrincipal.index', compact('data'));
    }

    public function dataindex(){
        $data = MainInfo::all();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'values' => 'required',
            'services' => 'required'
        ]);
        

        try{
            $data = new MainInfo();
            $data->fill($request->all());
            $data->save();
            return redirect(route('main-info.index'))->with('success', 'Informacion actualizada con exito');
            
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'body' => 'required',
            'values' => 'required',
            'services' => 'required'
        ]);

        $data = MainInfo::find($id);
        $data->fill($request->all());
        $data->save();
    }

    public function destroy($id)
    {
        $noticia = MainInfo::findOrFail($id);
        $noticia->delete();
    }
}
