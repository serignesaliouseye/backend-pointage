<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function stagiaires(): BelongsToMany
    {
        return $this->belongsToMany(Stagiaire::class, 'coach_stagiaire')
                    ->withTimestamps()
                    ->withPivot('started_at', 'ended_at');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function sanctions(): HasMany
    {
        return $this->hasMany(Sanction::class);
    }
}