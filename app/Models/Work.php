<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category()
    {
        return $this->hasMany(Cate_Work::class);
    }

    
}
