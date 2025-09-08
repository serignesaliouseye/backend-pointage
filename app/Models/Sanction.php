<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sanction extends Model
{
    use HasFactory;

    protected $fillable = ['stagiaire_id','coach_id','motif','description','niveau','date'];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
