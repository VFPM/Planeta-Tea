<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestAnswer;

class TestAnswerController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'test_contact_id' => 'required',
            'question_id' => 'required',
            'answer_id' => 'required',
            'answer' => 'required'
        ]);
        
        $data = new TestAnswer();
        $data->fill($request->all());
        $data->save();

        return;
    }
}
