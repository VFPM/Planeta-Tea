<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestContact;

class TestContactController extends Controller
{
    // Móvil 0
    public function mobileDataIndex(){
        $data = TestContact::all()->where('deleted_at', null); 
        return response()->json(
            $data
            ,200);
    }

    // Web
    public function index()
    {
        return view('system.TestContact.index');
    }

    public function dataindex(){        
        return datatables(TestContact::all())

        ->addColumn('btn', 'system.TestContact.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'result' => 'required',
        ]); 

        $data = new TestContact();
        $data->fill($request->all());

        $data->save();
        return redirect(route('testcontact.index'));
    }

    public function destroy($id)
    {
        $noticia = TestContact::findOrFail($id);
        $noticia->delete();
        return redirect(route('testcontact.index'));
    }
}
