<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $fillable = [
        'name',
        'description', // Agregar después de que funcione el front
        'active',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'test_id', 'id');
    }
}
