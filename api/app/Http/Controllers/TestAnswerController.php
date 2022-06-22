<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TestAnswer;
use App\Models\TestContact;

class TestAnswerController extends Controller
{
    // Móvil
    public function mobileDataIndex(){
        
        $data = TestContact::with('testAnswers')->get();
        
        return response()->json(
            $data
            ,200);
    }
    
    public function store(Request $request)
    {
        try{

            DB::beginTransaction();

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'telephone' => 'required',
                'result' => 'required',
                'test_answers' => 'required'
            ]);
            
            // Registrar el usuario
            $testContact = new TestContact();
            $testContact->name = $request->name;
            $testContact->email = $request->email;
            $testContact->telephone = $request->telephone;
            $testContact->result = $request->result;
            $testContact->save();
            
            // Registrar las respuestas del usuario
            foreach($request->test_answers as $testAnswer){
                $dataTestAnswer = new TestAnswer();

                $dataTestAnswer->test_contact_id = $testContact->id;
                $dataTestAnswer->question_id = $testAnswer['question_id'];
                
                if(array_key_exists('answer_id', $testAnswer)){ 
                    $dataTestAnswer->answer_id = $testAnswer['answer_id'];
                }
                
                if(array_key_exists('answer', $testAnswer)){ 
                    $dataTestAnswer->answer = $testAnswer['answer']; 
                }
                
                $dataTestAnswer->save();
            }

            DB::commit();

            // Obtener usuario con sus respuestas
            $data = TestContact::with('testAnswers')->where('id', $testContact->id)->get();

            return response()->json([
               'status' => 'success',
               'data'=> $data,
               'msg' => 'La respuesta ha sido registrada de forma exitosa'
            ], 200); 
            
        }catch (\Exception $exception) {

            DB::rollback();

            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()], 400);
        }

        return;
    }
    
}