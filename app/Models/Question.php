<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_en', 'question_ar','name_ar' ,'name_en'];

    

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function serviceSelections()
    {
        return $this->hasMany(ServiceSelection::class);
    }
}
