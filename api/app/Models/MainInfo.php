<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainInfo extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'main_info';

    protected $fillable = [
        'body',
        'values',
        'services'
    ];
}
