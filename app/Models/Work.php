<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['name_en', 'name_ar', 'image','description_en','description_ar','link'];


    public function categories()
    {
        return $this->hasMany(Cat_Work::class);
    }
}
