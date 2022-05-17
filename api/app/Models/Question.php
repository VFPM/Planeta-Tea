<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'questions';

    protected $fillable = [
        'description',
        'question_type_id',
        'test_id'
    ];

    public function questionType(){
        return $this->hasOne(QuestionType::class);
    }

    public function test(){
        return $this->hasOne(Test::class);
    }
    
}
