<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salle extends Model
{
    use HasFactory;
    protected $table = 'salle'; // Assurez-vous que c'est le nom correct de votre table.

    // Les autres attributs de votre modèle...

    // Méthode pour récupérer les salles en fonction du niveau et de la filière
    public static function getSallesByNiveauFiliere($niveauId, $filiereId)
    {
        return self::where('id_niveau', $niveauId)
                   ->where('id_filiere', $filiereId)
                   ->get();
    }
}
