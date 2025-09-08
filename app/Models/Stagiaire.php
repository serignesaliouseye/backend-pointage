<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stagiaire extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','promotion_id','date_debut','date_fin'];

    // Ajoutez cette méthode
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($stagiaire) {
            if (!$stagiaire->user_id) {
                $stagiaire->user_id = auth()->id();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'coach_stagiaire')
                    ->withTimestamps()
                    ->withPivot('started_at','ended_at');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function sanctions()
    {
        return $this->hasMany(Sanction::class);
    }
}