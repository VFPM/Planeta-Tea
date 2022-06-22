<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Web
    public function index()
    {
        $data = User::all();
        return view('system.Administrador.index', compact('data'));
    }

    public function dataindex(){
        return datatables(User::all())

        ->addColumn('btn', 'system.Administrador.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function activarUsuario($id){
        $data = User::find($id);
        $data->active = 1;
        $data->save();
        return redirect(route('admin.index'))->with('success', 'Usuario activado con exito');
    }

    public function desactivarUsuario($id){
        $data = User::find($id);
        $data->active = 0;
        $data->save();
        return redirect(route('admin.index'))->with('success', 'Usuario desactivado con exito');
    }
}
