<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    use HasFactory;

    protected $table = 'test_answer';

    protected $fillable = [
        'test_contact_id',
        'question_id',
        'answer_id',
        'answer',
    ];

    
    public function test_contact_id(){
        return $this->hasOne(TestContact::class, 'id', 'test_contact_id');
    }
    
    public function question_id(){
        return $this->hasOne(Question::class, 'id', 'question_id');
    }
        
    public function answer_id(){
        return $this->hasOne(Answer::class, 'id', 'answer_id');
    }
}
