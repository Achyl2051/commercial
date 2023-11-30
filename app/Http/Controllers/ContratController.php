<?php

namespace App\Http\Controllers;

use App\Models\TypeContrat;
use App\Models\Contrat;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function contrat()
    {
        $typeContrats = TypeContrat::all();

        return view('contrats.nouveau', [
            'typeContrats' => $typeContrats
        ]);
    }

    public function signer(Request $request)
    {
        Contrat::create([
            'idEmploye' => 3,
            'idTypeContrat' => $request->idTypeContrat,
            'dateDebut' => $request->dateDebut,
            'dateFin' => $request->dateFin,
            'lieuTravail' => $request->lieuTravail,
            'salaire' => $request->salaire,
            'attentes' => $request->attentes,
            'conditionResiliation' => $request->conditionResiliation,
            'avantagesdEtDroits' => $request->avantagesdEtDroits,
            'ModalitesDeTransition' => $request->ModalitesDeTransition
        ]);
    }
}
