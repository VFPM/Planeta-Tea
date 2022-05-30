<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    // Móvil
    public function mobileDataIndex(){
        $data = Donate::all()->last();
        
        return response()->json(
            $data
        , 200); 
    }

    // Web
    public function index()
    {
        $data = Donate::all()->last();
        return view('system.Donativo.index', compact('data'));
    }

    public function dataindex(){
        $data = Donate::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ], 200); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'account' => 'required',
            'clabe' => 'required',
            'card' => 'required',
            'paypal' => 'required'
        ]);

        try{
            $data = new Donate();
            $data->fill($request->all());
            $data->save();
            return redirect(route('donate.index'));
            
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }
    }
}
