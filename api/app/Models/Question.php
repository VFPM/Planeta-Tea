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
        'type_id',
        'test_id',
        'active'
    ];

    public function test(){
        return $this->hasOne(Test::class, 'id', 'test');
    }
    
}
