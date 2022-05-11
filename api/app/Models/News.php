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
        'abstract_id',
    ];

    public function type_news_id(){
        return $this->hasOne(NewsType::class, 'id', 'type_news_id');
    }

    public function mode_id(){
        return $this->hasOne(Mode::class, 'id', 'mode_id');
    }
    
    public function platform_id(){
        return $this->hasOne(Platform::class, 'id', 'platform_id');
    }
        
    public function abstract_id(){
        return $this->hasOne(Abstracts::class, 'id', 'abstract_id');
    }
}
