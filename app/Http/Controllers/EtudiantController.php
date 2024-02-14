<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Validator;
use App\Models\Niveau;
use App\Models\Salle;
use App\Models\Filliere;
use App\Models\User;
use App\Models\Etudiants;
use App\Mail\PasswordMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{

    /**
     * Display view all users of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $per_page = session( 'pagination_per_page' );
        $per_page = ( ! empty( $per_page ) ) ? $per_page : 20;
        $page     = ( ! empty( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $offset   = ( $page * $per_page ) - $per_page;

        $etudiants = Etudiants::orderBy('id_etudiant','DESC')->paginate($per_page);
        $title       = "Liste des Etudiants inscrits";
        $description = "Some description for the page";
        

        
        return view('etudiant.list', compact('title', 'description', 'etudiants'));
    }

    /**
     * Display create users of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = "Ajout d'un Nouveau Etudiant";
        $description = "Inscription";
        $niveau = Niveau::all(); // Récupère toutes les lignes de la table "niveau"
        $salle = salle::all(); // Récupère toutes les lignes de la table "niveau"
        $filliere = filliere::all(); // Récupère toutes les lignes de la table "niveau"
    
        return view('etudiant.add', compact('title', 'description', 'niveau','salle','filliere'));
    }

    /**
     * Store a newly created customer resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
         $validators = Validator::make($request->all(), [
             'name' => 'required',
             
             'email' => 'required|email|unique:users',
             
         ]);
     
         if ($validators->fails()) {
             return redirect()->route('etudiant.create', app()->getLocale())->withErrors($validators)->withInput();
         } else {

            $password = Str::random(8);

            $user = new User();
     
             $user->name = $request->name;
             $user->first_name = $request->first_name;
             $user->email = $request->email;
             $user->phone = $request->phone;
             $user->sexe = $request->sexe;
             $user->date_naiss = $request->date_naiss;
             $user->lieu_naiss = $request->lieu_naiss;
             $user->statut = $request->statut;
             $user->role = 1; // Assure-toi d'utiliser la valeur correcte pour le rôle
             $user->password = bcrypt($password); // Utilise Hash::make() pour sécuriser le mot de passe
     
             $user->save();
     
             $etudiants = new Etudiants();
             $etudiants->id_etudiant = $user->id;
             $etudiants->id_niveau = $request->niveau;
             $etudiants->id_filliere = $request->filliere;
             $etudiants->id_salle = $request->salle;
             $etudiants->matriculeE = Etudiants::generateMatricule();
     
             $etudiants->save();
     
             Mail::to($request->email)->send(new PasswordMail($user, $etudiants, $password));

             return redirect()->route('etudiant.list', app()->getLocale())->with('create', 'Etudiant ajouté avec succès');
         }
     }
     

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
     {
         $title         = 'Modifier étudiant';
         $description   = 'Some description for the page';

        $niveau = Niveau::all(); // Récupère toutes les lignes de la table "niveau"
        $salle = salle::all(); // Récupère toutes les lignes de la table "niveau"
        $filliere = filliere::all(); // Récupère toutes les lignes de la table "niveau"

         $find_customer = Etudiants::where('id_etudiant', $id)->get();
 
         return view('etudiant.edit', compact('title', 'description', 'find_customer', 'niveau', 'salle', 'filliere'));
     }
 

    public function getSalles($niveau, $filiere) {
        $salles = Salle::getSallesByNiveauFiliere($niveau, $filiere);
        return response()->json($salles);
    }
    
    
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
 
      public function update(Request $request, $id)
      {
          // Valider les données de la requête
          $validators = Validator::make($request->all(), [
              'name' => 'required',
              'email' => 'required|email|unique:users,email,' . $id,
              // Ajoutez d'autres règles de validation au besoin
          ]);
      
          if ($validators->fails()) {
              return redirect()->route('etudiant.edit', ['locale' => app()->getLocale(), 'id' => $id])
                  ->withErrors($validators)
                  ->withInput();
          } else {
              // Mettez à jour l'utilisateur
              $user = User::find($id);
      
              if (!$user) {
                  // Gérez le cas où l'utilisateur n'est pas trouvé
                  return redirect()->route('etudiant.list', app()->getLocale())->with('error', 'User not found.');
              }
      
              $user->name = $request->name;
              $user->first_name = $request->first_name;
              $user->email = $request->email;
              $user->phone = $request->phone;
              $user->sexe = $request->sexe;
              $user->date_naiss = $request->date_naiss;
              $user->lieu_naiss = $request->lieu_naiss;
              $user->statut = $request->statut;
      
              $user->save();
      
              // Mettez à jour l'étudiant
              $etudiant = Etudiants::where('id_etudiant', $id)->first();
      
              if (!$etudiant) {
                  // Gérez le cas où l'étudiant n'est pas trouvé
                  return redirect()->route('etudiant.list', app()->getLocale())->with('error', 'Student not found.');
              }
      
              $etudiant->id_niveau = $request->niveau;
              $etudiant->id_filliere = $request->filliere;
              $etudiant->id_salle = $request->salle;
      
              $etudiant->save();
      
              return redirect()->route('etudiant.list', app()->getLocale())->with('update', 'Etudiant updated successfully!');
          }
      }
      
    }