<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return "Index";
    }

    public function dataindex(){
        $data = User::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'msg' => 'Se ha mostrado la información correctamente'
        ], 200); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        try{
            $data = new User();
            $data->fill($request->all());
            $data->password = Hash::make($request->password);
            $data->save();
            
            return response()->json([
                'status' => 'success',
                'data' => $data,
                'msg' => 'El usuario ha registrado de manera exitosa'
            ], 200); 
            
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        try{
            $data = User::find($id);
            $data->fill($request->all());
            $data->save();
            return $data;
            
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return $data;
    }
}
