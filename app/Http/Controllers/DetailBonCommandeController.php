<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\BonCommande;
use App\Models\DetailBonCommande;

class DetailBonCommandeController extends Controller
{
    public function nouveau()
    {
        $produits =  Produit::all();
        $bonCommande = BonCommande::where('etat', 0)->get();
        return view('detailBonCommandes.nouveau', [
            'bonCommandes' => $bonCommande,
            'produits' => $produits
        ]);
    }
    public function insertion(Request $request){
        $produit = Produit::find($request->idProduit);
        $bonCommande = BonCommande::find($request->idBonCommande);
        if ($produit) {
            $pu = $produit->getPrixProduit($bonCommande->fournisseur->idFournisseur);
        }
        DetailBonCommande::create([
            'idBonCommande' => $request->idBonCommande,
            'idProduit' => $request->idProduit,
            'quantite' => $request->quantite,
            'prixUnitaire' => $pu,
            'tva' => $request->tva
        ]);
        if($request->effet==1){
            $bonCommande = BonCommande::find($request->idBonCommande);
            if ($bonCommande) {
                $bonCommande->etat = 1;
                $bonCommande->save();
                return redirect()->back()->with('success', 'conclure');
            }
        }
        return redirect()->back()->with('success', 'bon commande inserer');
    }
}
