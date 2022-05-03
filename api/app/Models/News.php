<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'description',
        'platform_description',
        'news_date',
        'link',
        'cost',
        'type_news_id',
        'mode_id',
        'platform_id'
    ];

}
