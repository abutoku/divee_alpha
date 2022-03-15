<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //userモデルのリレーション(userモデルに属する)
    //$log->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}