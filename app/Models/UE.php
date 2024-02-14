<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UE extends Model
{
    protected $table = 'ue'; // Spécifiez le nom de la table si différent de la convention Laravel
    protected $fillable = [
        'intitule_ue',
        'volume_horaire',
        'coef_ue',
        'id_enseignant',
        'id_module',
    ];

    // Relation avec le modèle Enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant', 'id');
    }

    // Relation avec le modèle Module
    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module', 'id');
    }
}
