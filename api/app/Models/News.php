<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

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
        'platform_id',
    ];

    public function type_news(){
        return $this->belongsTo(TypeNews::class);
    }

    public function mode(){
        return $this->belongsTo(Mode::class);
    }
    
    public function platform(){
        return $this->belongsTo(Platform::class);
    }
}
