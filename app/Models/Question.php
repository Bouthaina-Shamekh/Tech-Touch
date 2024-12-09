<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_en', 'question_ar'];

    // protected $casts = [
    //     'options' => 'array',
    // ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function serviceSelections()
    {
        return $this->hasMany(ServiceSelection::class);
    }
}
