<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestContact extends Model
{
    use HasFactory;

    protected $table = 'test_contact';

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'result',
    ];
    
    public function testAnswers(){
        return $this->hasMany(TestAnswer::class, 'test_contact_id', 'id');
    }

}
