<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'form_contacts';

    protected $fillable = [
        'email',
        'phone',
        'name',
        'subject',
        'message',
    ];
}
