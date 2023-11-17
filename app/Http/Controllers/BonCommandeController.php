<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailBonCommande;
use App\Models\BonCommande;
use App\Models\Fournisseur;

class BonCommandeController extends Controller
{
    public function nouveau()
    {
        $fournisseurs =  Fournisseur::all();
        return view('bonCommandes.nouveau', [
            'fournisseurs' => $fournisseurs
        ]);
    }
    public function notiffinance()
    {
        $bonCommande = BonCommande::with('fournisseur')
        ->where('etat', 1)
        ->get();
        return view('bonCommandes.notiffinance', ['bonCommandes' => $bonCommande]);
    }
    public function notifdaf()
    {
        $bonCommande = BonCommande::with('fournisseur')
        ->where('etat', 5)
        ->get();
        return view('bonCommandes.notifdaf', ['bonCommandes' => $bonCommande]);
    }
    public function validerfinance(Request $request)
    {
        $bonCommande = BonCommande::find($request->idBonCommande);
        if ($bonCommande) {
            $bonCommande->etat = 5;
            $bonCommande->save();
            return redirect()->back()->with('success', 'finance confirme');
        }
        return redirect()->back()->with('error', 'bonCommande not found');
    }
    
    public function validerdaf(Request $request)
    {
        $bonCommande = BonCommande::find($request->idBonCommande);
        if ($bonCommande) {
            $bonCommande->etat = 10;
            $bonCommande->save();
            return redirect()->back()->with('success', 'daf confirme');
        }
        return redirect()->back()->with('error', 'bonCommande not found');
    }
    public function liste()
    {
        $bonCommandes = BonCommande::with('fournisseur')->get();
        return view('bonCommandes.liste', [
            'bonCommandes' => $bonCommandes
        ]);
    }
    public function insertion(Request $request){
        BonCommande::create([
            'idFournisseur' => $request->idFournisseur,
            'date' => $request->date,
            'livraison' => $request->livraison,
            'modePaiement' => $request->modePaiement,
            'dureePaiement' => $request->dureePaiement,
            'etat' => $request->etat
        ]);
        return redirect()->back()->with('success', 'bon commande inserer');
    }
    public function details($idBonCommande)
    {
        $detailBonCommande = new DetailBonCommande();
        $details = $detailBonCommande->detailsByBonCommande($idBonCommande);
        $bonCommande = BonCommande::find($idBonCommande);

        return view('bonCommandes.details', ['details' => $details,'bonCommande' => $bonCommande]);
    }

}
