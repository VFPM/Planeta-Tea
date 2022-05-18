<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestAnswer;
use App\Models\TestContact;

class TestAnswerController extends Controller
{
    
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'question_id' => 'required',
        //     'answer_id' => 'required',
        //     'answer' => 'required'
        // ]);

        try{
            
                $data = new TestAnswer();
                $data->test_contact_id = $request->test_contact_id;
                $data->question_id = $request->question_id;
                $data->answer_id = $request->answer_id;
                $data->answer = $request->answer;
                $data->save();
            
                return response()->json([
                    'status' => 'success',
                    'data' => $data,
                    'msg' => 'La respuesta ha sido registrada de forma exitosa'
                ], 200); 
            
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }

        return;
    }
}
