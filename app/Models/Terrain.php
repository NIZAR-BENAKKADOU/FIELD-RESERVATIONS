<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'adresse', 'prix', 'note', 'ville_id', 'heure_debut', 'heure_fin', 'jour_off', 'heure_debut_off', 'heure_fin_off'];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function tempsIndisponibles()
    {
        return $this->hasMany(TempsIndisponible::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
