<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abstracts extends Model
{
    use HasFactory;
    
    protected $table = 'abstract';

    protected $fillable = [
        'description'.
        'path',
    ];
}
