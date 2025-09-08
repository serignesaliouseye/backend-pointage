<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',   // ex: "2025 - Dév Web"
        'annee',     // année de promotion
        'date_debut',
        'date_fin',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    // Relation avec les stagiaires
    public function stagiaires()
    {
        return $this->hasMany(Stagiaire::class);
    }
}
