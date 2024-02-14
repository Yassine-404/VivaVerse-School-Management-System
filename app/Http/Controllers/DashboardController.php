<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function etudiant() {
        return $this->checkAndReturnView(1, 'pages.dashboard.etudiant', "Tableau de bord Étudiant", "Bienvenue sur la page de tableau de bord de l'étudiant");
    }

    public function agentScolarite() {
        return $this->checkAndReturnView(2, 'pages.dashboard.agentscolarite', "Tableau de bord Agent de scolarité", "Bienvenue sur la page de tableau de bord de l'Agent de scolarité");
    }

    public function agentPedagogique() {
        return $this->checkAndReturnView(3, 'pages.dashboard.agentpedagogique', "Tableau de bord Agent pédagogique", "Bienvenue sur la page de tableau de bord de l'Agent pédagogique");
    }

    public function enseignant() {
        return $this->checkAndReturnView(4, 'pages.dashboard.enseignant', "Tableau de bord Ensiengnant", "Bienvenue sur la page de tableau de bord de l'Agent pédagogique");
    }

    private function checkAndReturnView($role, $view, $title, $description) {
        if (auth()->user()->role == $role) {
            return view($view, compact('title', 'description'));
        } else {
            $userRole = auth()->user()->role;
            switch ($userRole) {
                case 1:
                    return redirect()->route('dashboard.etudiant');
                case 2:
                    return redirect()->route('dashboard.agentscolarite');
                case 3:
                    return redirect()->route('dashboard.agentpedagogique');
                case 4:
                        return redirect()->route('dashboard.enseignant');
                    
                default:
                    abort(403, "Accès refusé");
            }
        }
    }
}


/*namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    
    public function etudiant() {
        $title = "Tableau de bord Étudiant";
        $description = "Bienvenue sur la page de tableau de bord de l'étudiant";

        if (auth()->user()->role == 1) {
            return view('pages.dashboard.etudiant', compact('title', 'description'));
        }
        abort(403," Accès refusé ");
        // Si le rôle n'est pas 3, rediriger vers la page de connexion avec un messag
    }

    public function agentScolarite() {
        $title = "Tableau de bord Agent de scolarité";
        $description = "Bienvenue sur la page de tableau de bord de l'Agent de scolarité";

        if (auth()->user()->role == 2) {
            return view('pages.dashboard.agentscolarite', compact('title', 'description'));
        }
        abort(403," Accès refusé ");
        // Si le rôle n'est pas 3, rediriger vers la page de connexion avec un message
    }

    public function agentPedagogique() {
        $title = "Tableau de bord Agent pédagogique";
        $description = "Bienvenue sur la page de tableau de bord de l'Agent pédagogique";

        if (auth()->user()->role == 3) {
            return view('agentpedagogique', compact('title', 'description'));
        }

        // Si le rôle n'est pas 2, rediriger vers la page de connexion avec un message
        abort(403," Accès refusé ");
    }
}*/
