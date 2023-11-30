<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Type_conge;
use App\Models\Conge;

class CongeController extends Controller
{
    
    public function nouveau()
    {
        $employes =  Employe::all();
        $types =  Type_conge::all();

        return view('conges.nouveau', [
            'employes' => $employes,
            'types' => $types
        ]);
    }

    public function demander(Request $request){
        $employee = Employe::find($request->idEmploye);
        $congerestant = $employee->getConge();
        $valide=0;
        if($request->etat=="sortie"){
            $valide=1;
        }
        if($congerestant<=$request->duree&&$request->etat=="sortie"){
            return redirect()->back()->with('error', 'Pas de conge en stock');        
        }else{
            Conge::create([
                'idEmploye' => $request->idEmploye,
                'idTypeConge' => $request->idTypeConge,
                'dateDebut' => $request->dateDebut,
                'duree' => $request->duree,
                'etat' => $request->etat,
                'choisisseur' => $request->choisisseur,
                'valid' => $valide
            ]);
        }
        return redirect()->back()->with('success', 'Conge demander');
    }

    public function notif()
    {
        $conges = Conge::with('employe')
        ->where('valid', 1)
        ->get();
        return view('conges.notif', ['conges' => $conges]);
    }
    public function valider(Request $request)
    {
        $conge = Conge::find($request->idConge);
        if ($conge) {
            $conge->valid = 0;
            $conge->save();
            return redirect()->back()->with('success', 'Conge confirmer');
        }
        return redirect()->back()->with('error', 'Conge not found');
    }
    public function historique()
    {
        $employes =  Employe::all();
        return view('conges.historique', [
            'employes' => $employes
        ]);
    }
    public function liste(Request $request)
    {
        $employee = Employe::find($request->idEmploye);
        $congerestant = $employee->getConge();
        $conges = Conge::with('type_conge')->where('idEmploye', $request->idEmploye)->get();
        return view('conges.liste', [
            'congerestant' => $congerestant,
            'conges' => $conges
        ]);
    }
}
