<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Etudiants;
use App\Models\Note;
use Illuminate\Support\Facades\DB;


class NoteController extends Controller {
    
    /**
     * Display note of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $title = "Note";
        $description = "Some description for the page";
        return view('pages.applications.note.note',compact('title','description'));
    }
    // app/Http/Controllers/NoteController.php
    public function notesForm()
    {
        $evaluations = Evaluation::all(); // Vous devrez récupérer les évaluations depuis la base de données
        $etudiants = Etudiants::all(); // Vous devrez récupérer les étudiants depuis la base de données

        return view('notes.index', compact('evaluations', 'etudiants'));
    }

public function showStudents(Request $request)
{
    // Validez les données du formulaire
    $request->validate([
        'id_evaluation' => 'required|exists:evaluations,id',
    ]);

    // Récupérez l'évaluation sélectionnée
    $evaluation = Evaluation::findOrFail($request->input('id_evaluation'));

    // Récupérez la liste des étudiants concernés par l'évaluation (vous devrez adapter cette partie en fonction de votre structure de base de données)
    $etudiants = $evaluation->niveau->etudiants;

    return view('notes.showStudents', compact('evaluation', 'etudiants'));
}
// app/Http/Controllers/NoteController.php


public function storeNotes(Request $request)
{
    // Validez les données du formulaire selon vos besoins
    $request->validate([
        'evaluation' => 'required|exists:evaluation,id',
        'notes.*' => 'required|numeric', // Assurez-vous que vos notes sont validées correctement
    ]);

    // Récupérez l'évaluation sélectionnée
    $evaluation = Evaluation::findOrFail($request->input('evaluation'));

    // Commencez une transaction de base de données
    //DB::beginTransaction();

    try {
        foreach ($request->input('notes') as $etudiantId => $note) {
            $etudiant = Etudiants::findOrFail($etudiantId);

            // Enregistrez la note dans la base de données
            // Vous devrez ajuster cette partie en fonction de votre structure de base de données
            $etudiant->notes()->create([
                'id_evaluation' => $evaluation->id,
                'note' => $note,
                'id_etudiant'=> $etudiant->id
            ]);
        }

        // Si tout s'est bien passé, validez la transaction
       // DB::commit();

        return redirect()->route('notes.notesForm')->with('success', 'Les notes ont été enregistrées avec succès.');
    } catch (\Exception $e) {
        // En cas d'erreur, annulez la transaction et renvoyez une réponse d'erreur
       // DB::rollback();

        return redirect()->route('notes.notesForm')->with('error', 'Une erreur sest produite lors de lenregistrement des notes.');
    }
}

}