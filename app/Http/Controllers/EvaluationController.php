<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\filliere;
use App\Models\UE;
use App\Models\Niveau;
use App\Models\Module;

class EvaluationController extends Controller
{
    /**
     * Affiche la liste des évaluations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = session( 'pagination_per_page' );
        $per_page = ( ! empty( $per_page ) ) ? $per_page : 20;
        $page     = ( ! empty( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $offset   = ( $page * $per_page ) - $per_page;

        $evaluation = Evaluation::orderBy('id','DESC')->paginate($per_page);
        $title       = "Liste des Evaluations";
        $description = "Some description for the page";

        return view('evaluation.index', compact('title', 'description', 'evaluation'));
    }

    /**
     * Affiche le formulaire de création d'une évaluation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = "Ajout d'une Nouvelle Évaluation"; // Définissez la valeur de $title
        $description = "Description de l'évaluation";
        $niveau = Niveau::all();
        $filliere = Filliere::all();

        $ues = UE::all();
        return view('evaluation.create', compact('title', 'description','ues','niveau','filliere'));
    }

    /**
     * Stocke une nouvelle évaluation dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        /*$this->validate($request, [
            'date_evaluation' => 'required|date',
            'duree' => 'required|numeric',
            'libelle' => 'required|string|max:200',
            'pourcentage' => 'required|numeric',
            'ue_id' => 'required|exists:ues,id',
        ]);*/

        // Crée une nouvelle évaluation
        $evaluation = new Evaluation([
            'date_evaluation' => $request->input('date_evaluation'),
            'heure_debut' => $request->input('heure_debut'),
            'duree' => $request->input('duree'),
            'libelle' => $request->input('libelle'),
            'pourcentage' => $request->input('type'),
            'niveau' => $request->input('niveau'),
            'filliere' => $request->input('filliere'),
            'id_ue' => $request->input('id_ue'),
        ]);

        // Sauvegarde l'évaluation dans la base de données
        $evaluation->save();

        // Redirige vers la liste des évaluations avec un message de succès
        return redirect()->route('evaluation.list')->with('success', 'Évaluation créée avec succès.');
    }

    public function getModules($niveauId, $filliereId)
{
    $modules = Module::where('niveau_id', $niveauId)
        ->where('filliere_id', $filliereId)
        ->get();

    return response()->json($modules);
}


    /**
     * Affiche les détails d'une évaluation spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        return view('evaluation.show', compact('evaluation'));
    }

    /**
     * Affiche le formulaire d'édition d'une évaluation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $ues = UE::all();
        return view('evaluation.edit', compact('evaluation', 'ues'));
    }

    /**
     * Met à jour une évaluation dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valide les données du formulaire
        $this->validate($request, [
            'date_evaluation' => 'required|date',
            'duree' => 'required|numeric',
            'libelle' => 'required|string|max:200',
            'pourcentage' => 'required|numeric',
            'ue_id' => 'required|exists:ues,id',
        ]);

        // Trouve l'évaluation existante
        $evaluation = Evaluation::findOrFail($id);

        // Met à jour les attributs de l'évaluation
        $evaluation->date_evaluation = $request->input('date_evaluation');
        $evaluation->duree = $request->input('duree');
        $evaluation->libelle = $request->input('libelle');
        $evaluation->pourcentage = $request->input('pourcentage');
        $evaluation->ue_id = $request->input('ue_id');

        // Sauvegarde les modifications dans la base de données
        $evaluation->save();

        // Redirige vers la liste des évaluations avec un message de succès
        return redirect()->route('evaluation')->with('success', 'Évaluation mise à jour avec succès.');
    }
}
