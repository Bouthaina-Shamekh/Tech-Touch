<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_Work extends Model
{
    use HasFactory;

    protected $table = 'cat_works';

    protected $fillable = ['name_en', 'name_ar', 'work_id'];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
