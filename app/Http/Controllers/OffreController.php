<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
use App\Models\Domainecv;
use App\Models\Offre;
use App\Models\Qreponse;
use App\Models\Qreponsejuste;
use App\Models\Questionnaire;
use App\Models\Service;
use App\Models\Typedomainecv;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffreController extends Controller
{
    public function liste()
    {
        // $offres =  Offre::all();

        $offres = DB::table('offres')
            ->leftJoin('services', 'offres.idservice', '=', 'services.idservice')
            ->select('offres.*', 'services.nom AS nom_service')
            ->get();

        foreach ($offres as $offre) {
            $offre->status = $this->status($offre->isValid);
            $offre->class = $this->badge_class($offre->isValid);
        }


        return view('offres.liste', [
            'offres' => $offres
        ]);
    }


    public function status($isvalid)
    {
        switch ($isvalid) {
            case 0:
                // Code à exécuter si $choix est égal à 'option1'
                return "en Cours";
                break;
            case -1:
                // Code à exécuter si $choix est égal à 'option2'
                return "en Pause";
                break;
            case -10:
                // Code à exécuter si $choix ne correspond à aucun des cas précédents
                return "Cloturé";
                break;
        }
    }

    public function badge_class($isvalid)
    {
        switch ($isvalid) {
            case 0:
                // Code à exécuter si $choix est égal à 'option1'
                return "badge badge-warning";
                break;
            case -1:
                // Code à exécuter si $choix est égal à 'option2'
                return "badge badge-success";
                break;

            case -10:
                // Code à exécuter si $choix ne correspond à aucun des cas précédents
                return "badge badge-danger";
                break;
        }
    }

    public function questionnaire($Offre)
    {

        $offre = DB::table('offres')
            ->where('idOffre', $Offre)->first();

        // dd($offre);

        $questions = DB::table('questionnaires')
            ->where('idOffre', $Offre)->get();

        foreach ($questions as $question) {
            $reponses = DB::table('Qreponses')
                ->where('idQuestionnaire', $question->idQuestionnaire)->get();

            $question->reponses = $reponses;
        }

        return view('offres.questionnaire', [
            'questions' => $questions,
            'offre' => $offre
        ]);
    }

    public function nouveau()
    {
        $services =  Service::all();

        return view('offres.nouveau', [
            'services' => $services
        ]);
    }

    public function ajouter(OffreRequest $request)
    {
        $tempsTotal = $request->tempsTotal;
        $tempsHomme = $request->tempsHomme;

        $nombre = $tempsTotal / $tempsHomme;

        // upload
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('images', $imageName);
        
        Offre::create([
            'nom' => $request->nom,
            'nombre' => $nombre,
            'idservice' => $request->idservice,
            'date' => Carbon::now(),
            'isValid' => 0,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'L\'offre est enregistrer');
    }

    public function editer_offre($Offre)
    {
        // $offre = DB::table('offres')
        //     ->where('idOffre', $Offre)->first();

        $offre = DB::table('offres')
            ->leftJoin('services', 'offres.idservice', '=', 'services.idservice')
            ->select('offres.*', 'services.nom AS nom_service')
            ->where('idOffre', $Offre)->first();

        $services =  Service::all();
// dd($services);
        return view('offres.offre_edit', [
            'offre' => $offre,
            'services' => $services
        ]);
    }

    public function update_offre($idOffre, Request $request)
    {
        $offre = Offre::find($idOffre);

        $offre->nom = $request->nom;
        $offre->nombre = $request->nombre;
        $offre->idservice = $request->idservice;
        $offre->isValid = $request->isValid;

        $offre->save();

        return redirect()->back()->with('success', 'L\'offre est modifié');
    }


    public function ajouter_question(Request $request)
    {
        $nouveau_question = Questionnaire::create([
            'idOffre' => $request->idOffre,
            'question' => $request->question,
            'coefficient' => $request->coefficient,
        ]);

        $reponses =  $request->reponses;
        // reponse::true

        foreach ($reponses as $reponse) {
            $tab = explode("::", $reponse);
            Qreponse::create([
                'idQuestionnaire' => $nouveau_question->id,
                'reponse' => $tab[0]
            ]);

            if ($tab[1] == "true") {
                Qreponsejuste::create([
                    'idQuestionnaire' => $nouveau_question->id,
                    'reponse' => $tab[0]
                ]);
            }
        }

        return redirect()->back()->with('success', 'La question est enregistrer');
    }

    public function ajouter_reponse(Request $request)
    {
        Qreponse::create([
            'idQuestionnaire' => $request->idQuestionnaire,
            'reponse' => $request->reponse,
        ]);
    }

    public function criteres($Offre)
    {
        $domaines = Domainecv::all();

        $offre = DB::table('offres')
            ->where('idOffre', $Offre)->first();
        // Typedomainecvs pour chaque domaines cv d'une offre
        // select * from Typedomainecvs where idOffre = idoffre and idDomainecv = idDomainecv
        foreach ($domaines as $domaine) {
            $Typedomainecvs = DB::table('Typedomainecvs')
                ->where('idOffre', $Offre)
                ->where('idDomainecv', $domaine->idDomainecv)
                ->get();
            $domaine->Typedomainecvs = $Typedomainecvs;
        }


        return view('offres.criteres', [
            'domaines' => $domaines,
            'offre' => $offre
        ]);
    }


    public function ajouter_typedomaine_cv(Request $request)
    {
        Typedomainecv::create([
            'idOffre' => $request->idOffre,
            'idDomainecv' => $request->idDomainecv,
            'nom' => $request->nom,
            'points' => $request->points
        ]);

        return redirect()->back()->with('success', 'enregistrer');
    }
}
