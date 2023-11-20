<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Fournisseur;
use App\Models\PrixProduit;

class produitController extends Controller
{
    public function liste() {
        $produit = Produit::all();

        return view('produit.liste', ['produit' => $produit]);
    }

    public function nouveau()
    {
        return view('produit.nouveau');
    }

    public function inscrire(Request $request)
    {
        Produit::create([
            'nom' => $request->nom,
            'nature' => $request->nature
        ]);
        return redirect()->route('produit.liste');  
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
        $prixProduit = PrixProduit::with('fournisseur')->where('idProduit',$idProduit)->orderBy('prix', 'asc')->get();

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
}
