<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entre;
use App\Models\Produit;
use App\Models\Magasin;
use App\Models\EtatStock;
use App\Models\Sortie;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockController extends Controller
{
    public function lastSortie($idProduit,$idMagasin)
    {
        $result = DB::select('SELECT max(sorties.date) as max FROM sorties join entres on sorties.identre=entres.identre WHERE entres.idProduit=? AND idMagasin=?', [$idProduit,$idMagasin]);
        if (!empty($result[0]->max)) {
            $date = Carbon::parse($result[0]->max);
            return $date;
        }
        $dateString = "1990-01-01";
        $dateFormatPattern = "Y-m-d";
        $datyy = Carbon::createFromFormat($dateFormatPattern, $dateString);
        return $datyy;
    }

    public function insertEntre(Request $request)
    {
        if ($this->lastSortie($request->idProduit, $request->idMagasin)->gt($request->daty)) {
            return;
        }
        Entre::create([
            'idProduit' => $request->idProduit,
            'idMagasin' => $request->idMagasin,
            'date' => $request->daty,
            'quantite' => $request->quantite,
            'prixUnitaire' => $request->prixUnitaire
        ]);
        return redirect()->route('stock.entre'); 
    }

    public function entre()
    {
        $produit = Produit::all();
        $magasin = Magasin::all();

        return view('stock.entre', ['produit' => $produit,'magasin' => $magasin]);
    }

    public function choiceEtatStock()
    {
        $produit = Produit::all();
        $magasin = Magasin::all();

        return view('stock.choiceEtatStock', ['produit' => $produit,'magasin' => $magasin]);
    }

    public function totalEtatStock($etatStock)
    {
        $quantite=0;
        $montantTotal=0;
        foreach($etatStock as $e)
        {
            $quantite += $e->stock_actuel;
            $montantTotal += ($e->prixUnitaire*$e->stock_actuel);
        }
        $pu=$montantTotal/$quantite;
        $result = [
            'quantite' => $quantite,
            'prixUnitaire' => $pu,
            'montantTotal' => $montantTotal
        ];
    
        return $result;
    }

    public function etatStock(Request $request)
    {
        $produit = Produit::find($request->idProduit);
        if(strcasecmp($produit->type, "LIFO") == 0)
        {
            $avant = $this->getEtatStockByProduitDesc($request->idProduit,$request->date_debut,$request->idMagasin);
            $apres = $this->getEtatStockByProduitDesc($request->idProduit,$request->date_fin,$request->idMagasin);
            $totalAvant = $this->totalEtatStock($avant);
            $totalApres = $this->totalEtatStock($apres);
        }
        elseif(strcasecmp($produit->type, "FIFO") == 0)
        {
            $avant = $this->getEtatStockByProduitAsc($request->idProduit,$request->date_debut,$request->idMagasin);
            $apres = $this->getEtatStockByProduitAsc($request->idProduit,$request->date_fin,$request->idMagasin);
            $totalAvant = $this->totalEtatStock($avant);
            $totalApres = $this->totalEtatStock($apres);
        }

        $date_debut=$request->date_debut;
        $date_fin=$request->date_fin;
        return view('stock.etatStock', ['avant' => $avant,'apres' => $apres,'date_debut' => $date_debut,'date_fin' => $date_fin,'totalAvant' => $totalAvant,'totalApres' => $totalApres]);
    }

    public function sortie()
    {
        $entre = Entre::with('produit')->with('magasin')->get();

        return view('stock.sortie', ['entre' => $entre]);
    }

    public function insertSortie(Request $request)
    {
        Sortie::create([
            'idEntre' => $request->idEntre,
            'date' => $request->daty,
            'quantite' => $request->quantite
        ]);
        return; 
    }

    public function getEtatStockByProduitAsc($idProduit, $date, $magasin)
    {
        $result = EtatStock::selectRaw("
            p.nom AS produit,
            COALESCE(quantite - qtt, quantite, 0) AS stock_actuel,
            u.nom AS unite,
            e.prixUnitaire,
            m.nom AS magasin
        ")
        ->from('entreS as e')
        ->leftJoin(DB::raw("(SELECT idEntre,sum(quantite) AS qtt FROM sorties WHERE sorties.date<='$date' GROUP BY idEntre) AS s"), 'e.idEntre', '=', 's.idEntre')
        ->join('produits as p', 'e.idProduit', '=', 'p.idProduit')
        ->join('unites as u', 'p.idUnite', '=', 'u.idUnite')
        ->join('magasins as m', 'e.idMagasin', '=', 'm.idMagasin')
        ->where('e.date', '<=', $date)
        ->where('p.idProduit', $idProduit)
        ->where('e.idMagasin', $magasin)
        ->orderBy('e.date','asc')
        ->get();

        return $result;
    }

    public function getEtatStockByProduitDesc($idProduit, $date, $magasin)
    {
        $result = EtatStock::selectRaw("
            p.nom AS produit,
            COALESCE(quantite - qtt, quantite, 0) AS stock_actuel,
            u.nom AS unite,
            e.prixUnitaire,
            m.nom AS magasin
        ")
        ->from('entreS as e')
        ->leftJoin(DB::raw("(SELECT idEntre,sum(quantite) AS qtt FROM sorties WHERE sorties.date<='$date' GROUP BY idEntre) AS s"), 'e.idEntre', '=', 's.idEntre')
        ->join('produits as p', 'e.idProduit', '=', 'p.idProduit')
        ->join('unites as u', 'p.idUnite', '=', 'u.idUnite')
        ->join('magasins as m', 'e.idMagasin', '=', 'm.idMagasin')
        ->where('e.date', '<=', $date)
        ->where('p.idProduit', $idProduit)
        ->where('e.idMagasin', $magasin)
        ->orderBy('e.date','desc')
        ->get();

        return $result;
    }

    public function totalStock($stock)
    {
        $result=0;
        foreach($stock as $s)
        {
            $result=$result+$s->stock_actuel;
        }
        return $result;
    }

    public function sortiStock(Request $request)
    {
        $entre = Entre::find($request->idEntre);
        $produit = Produit::find($entre->idProduit);
        if(strcasecmp($produit->type, "LIFO") == 0)
        {
            $etatStock = $this->getEtatStockByProduitDesc($entre->idProduit,$request->daty,$entre->idMagasin);
        }
        elseif(strcasecmp($produit->type, "FIFO") == 0)
        {
            $etatStock = $this->getEtatStockByProduitAsc($entre->idProduit,$request->daty,$entre->idMagasin);
        }
        $quantiterest=$request->quantite;
        foreach($etatStock as $e)
        {
            if($this->totalStock($etatStock)<$request->quantite)
            {
                return redirect()->route('stock.sortie'); 
            }
            else
            {
                $qte=0;
                if($quantiterest>=$e->stock_actuel)
                {
                    $qte=$e->stock_actuel;
                }  
                else
                {
                    $qte=$quantiterest;
                }
                if($quantiterest!=0)
                {
                    $this->insertSortie($request);
                    $quantiterest=$quantiterest-$qte;
                }
                else
                {
                    return redirect()->route('stock.sortie'); 
                }
            }
        }
        return redirect()->route('stock.sortie'); 
    }

}