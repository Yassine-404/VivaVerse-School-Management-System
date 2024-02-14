<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiants extends Model
{
    protected $primaryKey = 'id_etudiant';

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_etudiant'); // Assurez-vous que 'User' est le modèle d'utilisateur correct
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'id_niveau'); // Assurez-vous que 'Niveau' est le modèle d'utilisateur correct
    }
    public function salle()
    {
        return $this->belongsTo(Salle::class, 'id_salle'); // Assurez-vous que 'Niveau' est le modèle d'utilisateur correct
    }
    public function filliere()
    {
        return $this->belongsTo(Filliere::class, 'id_filliere'); // Assurez-vous que 'Niveau' est le modèle d'utilisateur correct
    }

    // Dans votre modèle Etudiant

    public function getDateNaissAttribute($value)
    {
        // Formatez la date à afficher ici si nécessaire
        return date('d-m-Y', strtotime($value));
    }

    public function getLieuNaissAttribute($value)
    {
        // Aucun formattage spécial n'est nécessaire ici
        return $value;
    }


    public static function generateMatricule()
    {
        // Obtenez l'année actuelle au format "Y" (par exemple, "2023")
        $currentYear = date('Y');
    
        // Recherchez le dernier matricule enregistré cette année
        $latestMatricule = self::where('matriculeE', 'like', '%' . $currentYear . '%')->latest()->first();
    
        if ($latestMatricule) {
            // Si un matricule existe déjà cette année, incrémente le compteur
            $lastCount = (int)substr($latestMatricule->matriculeE, -4); // Récupère les 4 derniers chiffres
            ++$lastCount; // Incrémente le compteur de 1
        } else {
            // Si aucun matricule n'existe encore cette année, commence à 1
            $lastCount = 1;
        }
    
        // Formatte le compteur avec quatre chiffres
        $formattedCount = str_pad($lastCount, 4, '0', STR_PAD_LEFT); // Utilisez '0' pour le padding
    
        // Crée le matricule final
        $matricule = $currentYear . '.CMR.' . $formattedCount;
    
        return $matricule;
    }
    


   // ...
}

