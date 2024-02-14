<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public $timestamps = false;

    protected $table = 'evaluation'; // Spécifiez le nom de la table si différent de la convention Laravel
    protected $fillable = [
        'date_evaluation',
        'heure_debut',
        'duree',
        'libelle',
        'pourcentage',
        'id_ue',
    ];

    // Relation avec le modèle UE
    public function ue()
    {
        return $this->belongsTo(UE::class, 'id_ue', 'id');
    }
}
