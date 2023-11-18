<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;

class fournisseurController extends Controller
{
    public function liste() {
        $fournisseur = Fournisseur::all();

        return view('fournisseur.liste', ['fournisseur' => $fournisseur]);
    }

    public function nouveau()
    {
        return view('fournisseur.nouveau');
    }

    public function inscrire(Request $request)
    {
        Fournisseur::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'typeProduit' => $request->typeProduit
        ]);
        return redirect()->route('fournisseur.liste');  
    }
}
