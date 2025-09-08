<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QrToken extends Model
{
    use HasFactory;

    protected $fillable = ['token','issued_for_date','expires_at','used'];

    protected $casts = [
        'issued_for_date' => 'date',
        'expires_at' => 'datetime',
        'used' => 'boolean',
    ];
}
