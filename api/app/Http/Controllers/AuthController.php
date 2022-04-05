<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()
                ->json(['status' => 'error', 'msg' => 'Algunos campos contienen errores.', 'detail' => $validator->errors()->all()], 400);
        }
        try {

            $user = User::where('email', $request->email)->first();


            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Usuario o Contraseña incorrectos.'
                ], 400);
            }

            return response()->json([
                'authToken' => $user->createToken('user-token')
            ],200);

        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }
    }


    public function listUser(){
        // traer toda la lista de usuarios
        $user = User::all();
        return response()->json([
            "user" => $user
        ], 200 );
    }

}
