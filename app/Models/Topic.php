<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [ // поля, который заполнены по умолчанию
        'name',
        'text',
        'admin_id',
        'admin_name',
        'count',
        'speed_avg',
        'accuracy_avg',
    ];
    public function user(){ // ф. для запроса связанных данных (всё из БД)
        return $this->belongsTo(User::class);
    }
}
