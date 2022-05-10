<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    use HasFactory;

    protected $table = 'type_news';

    protected $fillable = [
        'name'
    ];
}
