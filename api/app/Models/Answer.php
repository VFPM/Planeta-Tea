<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'answers';

    protected $fillable = [
        'description',
        'question_id'
    ];

    public function question(){
        return $this->hasOne(Question::class, 'id', 'question_id');
    }
    
}
