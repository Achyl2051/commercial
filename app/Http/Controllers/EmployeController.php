<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Models\Direction;
use App\Models\Employe;
use App\Models\Fonction;
use App\Models\Contrat;
use App\Models\StatuMarital;
use App\Models\StatutMarital;
use App\Models\TypeContrat;
use Illuminate\Http\Request;

class EmployeController extends Controller
{

    public function liste(){
        $employes =  Employe::with('fonction')->with('direction')->get();

        return view('personnels.liste', [
            'employes' => $employes,
        ]);
    }
    public function voir(){
        $employes =  Contrat::with('employe')->with('typeContrat')->get();

        return view('personnels.voir', [
            'employes' => $employes,
        ]);
    }

    public function nouveau()
    {
        $directions =  Direction::all();
        $fonctions =  Fonction::all();
        $employes =  Employe::all();
        $typeContrats = TypeContrat::all();
        $statutMaritals = StatutMarital::all();

        return view('personnels.nouveau', [
            'directions' => $directions,
            'fonctions' => $fonctions,
            'employes' => $employes,
            'typeContrats' => $typeContrats,
            'statutMaritals' => $statutMaritals
        ]);
    }

    public function recruter(EmployeRequest $request){
        /*$image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('employes', $imageName);*/

        $superieur = empty($request->idSuperieur) ? null : $request->idSuperieur ; 

        Employe::create([
            'matricule' => "EMP0000",
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'genre' => $request->genre,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'photo' => '$imageName',
            'dateNaissance' => $request->dateNaissance,
            'dateEmbauche' => $request->dateEmbauche,
            'idDirection' => $request->idDirection,
            'idFonction' => $request->idFonction,
            'idSuperieur' => $superieur,
            'idTypeContrat' => $request->idTypeContrat,
            'idStatutMarital' => $request->idStatutMarital,
        ]);

        // return redirect()->back()->with('success', 'L\'employe a était recruter');
        $typeContrats = TypeContrat::all();

        return view('contrats.nouveau', [
            'typeContrats' => $typeContrats
        ]);
    }


}
