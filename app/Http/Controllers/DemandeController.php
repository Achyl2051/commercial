<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Produit;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class DemandeController extends Controller
{
    public function nouveau()
    {

        $produits =  Produit::all();
        $departements =  Departement::all();

        return view('demande.nouveau',
        [
            'produits' => $produits,
            'departements' => $departements
        ]
    );
    }

    // public function liste()
    // {
    //     return view('demande.liste');
    // }

    public function demandes($nomDepartement,$validite){
        // 0 si pas encore accepter par le directeur
        // 1 si deja accepter accepter par le directeur

        $demandes = Demande::select(
            'departements.idDepartement',
            'departements.nom AS nomDepartement',
            'produits.idProduit',
            'produits.nom AS nomProduit',
            'produits.nature',
            'demandes.*',
        )
        ->join('produits', 'demandes.idProduit', '=', 'produits.idProduit')
        ->join('departements', 'demandes.idDepartement', '=', 'departements.idDepartement')
        ->where('departements.nom', $nomDepartement)
        ->where('demandes.valider', $validite)
        ->get();

    // Faites ce que vous voulez avec le résultat ici.

         return $demandes;

    }
    
    public function validation()
    {
        $user = User::find(Auth::user()->idUser);
        $demandes = array();

        if ($user->hasRole('Directeur Informatique')) {

            $demandes = $this->demandes('Informatique',0);
        }
        if ($user->hasRole('Directeur Financier')) {
   
            $demandes = $this->demandes('Finance',0);

        }
        if ($user->hasRole('Directeur Commercial')) {
            $demandes = $this->demandes('Commercial',0);

        }
        if ($user->hasRole('Directeur RH')) {
            $demandes = $this->demandes('Resource Humaine',0);
        }

        return view('demande.validation',[
            'demandes' => $demandes
        ]);
    }

    public function demander(Request $request)
    {
        Demande::create([
            'idProduit' => $request->idProduit,
            'idDepartement' => $request->idDepartement,
            'quantite' => $request->quantite,
            'dateDemande' => Carbon::now(),
            'raison' => $request->raison
        ]);

        return redirect()->back()->with('success', 'L\'article est enregistrer');

    }

    public function valider($idDemande)
    {
        $demande = Demande::find($idDemande);

        if ($demande) {
            $demande->update(['valider' => 1]);
            // Ajoutez d'autres actions si nécessaire
        }

        return redirect()->back()->with('success', 'La demande a ete valider');

    }

    public function refuser($idDemande){
        $demande = Demande::find($idDemande);

        if ($demande) {
            $demande->update(['valider' => -1]);
            // Ajoutez d'autres actions si nécessaire
        }

        return redirect()->back()->with('success', 'La demande a ete refuser');
    }

    public function recu($idDemande){
        $demande = Demande::find($idDemande);

        if ($demande) {
            $demande->update(['recu' => 1]);
            // Ajoutez d'autres actions si nécessaire
        }

        return redirect()->back()->with('success', 'Le produit a ete bien reçu');
    }

    public function demandes_valide(){
        $user = User::find(Auth::user()->idUser);
        $demandes = array();

        if ($user->hasRole('Directeur Informatique')) {

            $demandes = $this->demandes('Informatique',1);
        }
        if ($user->hasRole('Directeur Financier')) {
   
            $demandes = $this->demandes('Finance',1);

        }
        if ($user->hasRole('Directeur Commercial')) {
            $demandes = $this->demandes('Commercial',1);

        }
        if ($user->hasRole('Directeur RH')) {
            $demandes = $this->demandes('Resource Humaine',1);
        }

        return view('demande.valide',[
            'demandes' => $demandes
        ]);
    }

    public function generateProForma(Request $requset)
    {
        $fournisseur = Fournisseur::find($request->idFournisseur);
        $produit = Fournisseur::find($request->idFournisseur);
        $pdf = PDF::loadView('pdf.bonjour');

        return $pdf->stream('bonjour.pdf');
    }


    
}
