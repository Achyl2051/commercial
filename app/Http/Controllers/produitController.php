<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Fournisseur;
use App\Models\PrixProduit;
use App\Models\Unite;
use Barryvdh\DomPDF\Facade\Pdf;

class produitController extends Controller
{
    public function liste() {
        $produit = Produit::with('unite')->get();

        return view('produit.liste', ['produit' => $produit]);
    }

    public function nouveau()
    {
        $unite=Unite::all();
        return view('produit.nouveau', ['unite' => $unite]);
    }

    public function inscrire(Request $request)
    {
        Produit::create([
            'nom' => $request->nom,
            'nature' => $request->nature,
            'type' => $request->type,
            'idUnite' => $request->idUnite,
        ]);
        return redirect()->route('produit.liste');  
    }

    public function moinsDisant($idProduit){
        $proformas =  Fournisseur::select(
            'fournisseurs.*',
            'produits.nom as nomProduit',
            'produits.nature',
            'prix_produits.prix'
        )
        ->join('prix_produits', 'fournisseurs.idFournisseur', '=', 'prix_produits.idFournisseur')
        ->join('produits', 'prix_produits.idProduit', '=', 'produits.idProduit')
        ->where('produits.idProduit', $idProduit)
        ->orderBy('prix_produits.prix', 'asc')
        ->take(3)
        ->get();

        return redirect()->route('proforma.nouveau');  
    }

    public function prixProduit($idProduit)
    {
        $fournisseur = Fournisseur::all();

        return view('produit.prixProduit', ['fournisseur' => $fournisseur,'idProduit' => $idProduit]); 
    }

    public function insererPrixProduit(Request $request)
    {
        PrixProduit::create([
            'idProduit' => $request->idProduit,
            'idFournisseur' => $request->idFournisseur,
            'prix' => $request->prix
        ]);
        return redirect()->route('produit.liste');  
    }

    public function listePrix($idProduit) {
        $prixProduit = PrixProduit::with('fournisseur')->where('idProduit',$idProduit)->orderBy('prix','asc')->get();

        return view('produit.listePrix', ['prixProduit' => $prixProduit]);
    }
    
    public function modifPrix($idProduit,$idFournisseur) {
        $prixProduit = PrixProduit::where('idFournisseur',$idFournisseur)->where('idProduit',$idProduit)->get();

        return view('produit.modifPrix', ['prixProduit' => $prixProduit]);
    }

    public function updatePrixProduit(Request $request)
    {
        PrixProduit::where('idProduit',$request->idProduit)->where('idFournisseur',$request->idFournisseur)->update(['prix'=>$request->prix]);
        return redirect()->route('produit.liste');  
    }

    public function voirProForma($idProduit,$idFournisseur) {

        // $proforma = PrixProduit::join('produits', 'prix_produits.idProduit', '=', 'produits.idProduit')
        // ->join('fournisseurs', 'prix_produits.idFournisseur', '=', 'fournisseurs.idFournisseur')
        // ->select(
        //     'prix_produits.prix',
        //     'produits.nom as nom_produit',
        //     'produits.nature as nature_produit',
        //     'fournisseurs.nom as nom_fournisseur',
        //     'fournisseurs.adresse',
        //     'fournisseurs.telephone',
        //     'fournisseurs.email',
        //     'fournisseurs.typeProduit'
        // )
        // ->where('prix_produits.idProduit',$idProduit)
        // ->where('prix_produits.idFournisseur',$idFournisseur)
        // ->get();

        $produit = Produit::find($idProduit);
        $fournisseur = Fournisseur::find($idFournisseur);
        $prixProduit = PrixProduit::where('idProduit', $idProduit)
        ->where('idFournisseur', $idFournisseur)
        ->first();

        $pdf = PDF::loadView('pdf.proForma',[
            'produit' => $produit,
            'fournisseur' => $fournisseur,
           'prixProduit' => $prixProduit
         ]);

        return $pdf->stream('proForma.pdf');
    }


}
