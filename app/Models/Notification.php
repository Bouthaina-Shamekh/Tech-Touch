<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory,softDeletes;


    protected $fillable = [
        'user_id',
        'data',
        'read_at',
        'type',
        'source',
    ];


    public function getDataAttribute($value)
    {
        return json_decode($value, true); // تحويل JSON إلى مصفوفة
    }

    // Mutator لحفظ البيانات كـ JSON عند الحفظ في قاعدة البيانات
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value); // تحويل المصفوفة إلى JSON قبل الحفظ
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifiable()
    {
        return $this->morphTo();
    }
}
