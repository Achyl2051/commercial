<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FicheDePaie;
use App\Models\DetailFichePaie;
use App\Models\Employe;

class ficheDePaieController extends Controller
{
    public function liste() {
        $fichesDePaie = FicheDePaie::with('employe')->get();

        return view('paies.liste', ['fichesDePaie' => $fichesDePaie]);
    }

    public function details($idFichePaie,$idEmploye)
    {
        $detailFichePaieModel = new DetailFichePaie();
        $details = $detailFichePaieModel->detailsByFichePaie($idFichePaie);

        $employes = Employe::with('fonction')->with('direction')->find($idEmploye);

        $fichesDePaie = FicheDePaie::find($idFichePaie);

        return view('paies.details', ['details' => $details,'employe' => $employes,'fichesDePaie' => $fichesDePaie]);
    }

    public function nouveau()
    {
        $employes =  Employe::all();

        return view('paies.nouveau', ['employes' => $employes]);
    }

    public function nouveauDetail($idFichePaie)
    {
        return view('paies.nouveauDetail', ['idFichePaie' => $idFichePaie]);
    }

    public function inscrire(Request $request)
    {
        FicheDePaie::create([
            'idEmploye' => $request->idEmploye,
            'salaireBase' => $request->salaireBase,
            'modePaiement' => $request->modePaiement,
            'periodePaiement' => $request->periodePaiement
        ]);
        return redirect()->route('paies.liste');  
    }

    public function ajoutDetail(Request $request)
    {
        DetailFichePaie::create([
            'idFichePaie' => $request->idFichePaie,
            'designation' => $request->designation,
            'nombre' => $request->nombre,
            'taux' => $request->taux,
            'type' => $request->type
        ]);
        return redirect()->route('paies.liste');  
    }

    public function choixPeriode()
    {
        $periodes = FicheDePaie::getUniquePeriodes();

        return view('paies.choixPeriode')->with('periodes', $periodes);
    }

    public function ficheAvecDetail(Request $request)
    {
        $fichesDePaieAvecDetails = FicheDePaie::with('employe')->with('detailsFichePaie')
            ->where('periodePaiement', $request->periodePaiement)
            ->get();

        return view('paies.ficheAvecDetail')->with('fichesDePaieAvecDetails', $fichesDePaieAvecDetails);
    }
}
