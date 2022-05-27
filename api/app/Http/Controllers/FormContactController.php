<?php

namespace App\Http\Controllers;

use App\Models\FormContact;
use Illuminate\Http\Request;

class FormContactController extends Controller
{

    public function data(){
        $data = FormContact::all()->where('deleted_at', null);

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ],200);
    }

    
    public function store(Request $request)
    {
        try{

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required'
            ]);
            
            // Registrar los datos recibidos del formulario de contacto
            $data = new FormContact();
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->name = $request->name;
            $data->subject = $request->subject;
            $data->message = $request->message;
            $data->save();

            return response()->json([
               'status' => 'success',
               'data'=> $data,
               'msg' => 'La respuesta ha sido registrada de forma exitosa'
            ], 200); 
            
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }

        return;
    }
}
