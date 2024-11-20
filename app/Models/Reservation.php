<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'terrain_id', 'heure_debut', 'heure_fin', 'montant', 'validee', 'date_de_reservation', 'date_de_match'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function terrain()
    {
        return $this->belongsTo(Terrain::class, 'terrain_id');
    }
}
