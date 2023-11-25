<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\ProForma;

class ProFormaController extends Controller
{
    
    public function nouveau()
    {
        return view('proforma.nouveau');
    }

    public function inserer(Request $request)
    {
        ProForma::create([
            'idProduit' => $request->idProduit,
            'idFournisseur' => $request->idFournisseur,
            'dateModification' => $request->dateModification,
            'prix' => $request->prix,
        ]);
        return redirect()->route('proforma.nouveau');  
    }

    public function moinsDisant($idProduit){
        $proformas = ProForma::where('idProduit', $idProduit)
        ->orderBy('prix', 'asc')
        ->take(3) 
        ->get();

        return redirect()->route('proforma.nouveau');  
    }
}
