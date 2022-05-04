<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Móvil

    public function mobileDataIndex(){
        $data = Contact::all()->last();
        
        return response()->json(
            $data
        , 200); 
    }

    // Web
    public function index()
    {
        $data = Contact::all()->last();
        return view('system.Contacto.index', compact('data'));
    }

    public function dataindex(){
        $data = Contact::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ], 200); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);

        try{
            $data = new Contact();
            $data->fill($request->all());
            $data->save();
            return redirect(route('contact.index'));
            
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);

        try{
            $data = Contact::find($id);
            $data->fill($request->all());
            $data->save();
            return $data;
            
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        return $data;
    }
}
