<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempsIndisponible extends Model
{
    use HasFactory;
    protected $fillable = ['date_debut', 'date_fin', 'heure_debut', 'heure_fin', 'terrain_id'];

    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }
}
