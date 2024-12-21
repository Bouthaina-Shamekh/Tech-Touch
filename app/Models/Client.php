<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected $fillable = [
        'name_en',
        'name_ar',
        'image',
        'job',
        'feedback_en',
        'feedback_ar',
        'stars',
    ];
}
