@extends('./layouts/app')
@section('page-content')
    @php  
        $total=0;
    @endphp
    
    @forelse ($details as $d)
        @php  
            $total=$total+(($d->quantite*$d->prixUnitaire)+(($d->quantite*$d->prixUnitaire)*$d->tva/100));
        @endphp
    @empty
    @endforelse
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <div class="text-center mt-4">
            <h1>Detail bon de commande numero 00{{ $bonCommande->idBonCommande }}</h1>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <p><strong>Adresse de l'entreprise:</strong> Antananarivo,Madagascar</p>
                <p><strong>DATE:</strong> {{ $bonCommande->date }}</p>
                <p><strong>Mode de paiement:</strong> {{ $bonCommande->modePaiement }}</p>
                <p><strong>Livraison:</strong> {{ $bonCommande->livraison }}</p>
                <p><strong>Duree Paiement:</strong> {{ $bonCommande->dureePaiement }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fournisseur</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $bonCommande->fournisseur->idFournisseur }}</td>
                            <td>{{ $bonCommande->fournisseur->nom }}</td>
                            <td>{{ $bonCommande->fournisseur->adresse }}</td>
                            <td>{{ $bonCommande->fournisseur->telephone }}</td>
                            <td>{{ $bonCommande->fournisseur->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Désignation</th>
                            <th>Quantite</th>
                            <th>Prix Unitaire</th>
                            <th>TVA</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse ($details as $d)
                        <tr>
                            <td>{{ $d->produit->nom }}</td>
                            <td>{{ $d->quantite }}</td>
                            <td>{{ $d->prixUnitaire }}</td>
                            <td>{{ $d->tva }}</td>
                            <td>{{  ($d->quantite*$d->prixUnitaire)+(($d->quantite*$d->prixUnitaire)*$d->tva/100) }}</td>
                        </tr>
                    @empty
                    <p>aucunes données</p>
                    @endforelse
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Total TTC</th>
                            <th>{{ $total }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br/>
        <h3> Bon de commande arrete a la somme de {{ convertirEnLettres($total) }} Ariary </h3>
        </div>
     </div>
</div>
@endsection
@php
function convertirEnLettres($chiffre)
{
    $unites = ['', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf'];
    $dizaines = ['', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingt', 'quatre-vingt-dix'];

    $chiffre = (int) $chiffre;

    if ($chiffre < 0 || $chiffre > 999999999) {
        return 'Valeur invalide';
    }

    $resultat = convertirTroisChiffres($chiffre % 1000, $unites, $dizaines);

    $milliards = $chiffre / 1000000000;
    $milliardsPartieEntiere = floor($milliards);
    $milliardsReste = $chiffre % 1000000000;

    if ($milliardsPartieEntiere > 0) {
        $resultat = convertirTroisChiffres($milliardsPartieEntiere, $unites, $dizaines) . ' milliard' . ($milliardsPartieEntiere > 1 ? 's' : '');
    }

    $millions = $milliardsReste / 1000000;
    $millionsPartieEntiere = floor($millions);
    $millionsReste = $milliardsReste % 1000000;

    if ($millionsPartieEntiere > 0) {
        $resultat .= ($resultat ? ' ' : '') . convertirTroisChiffres($millionsPartieEntiere, $unites, $dizaines) . ' million' . ($millionsPartieEntiere > 1 ? 's' : '');
    }

    $milliers = $millionsReste / 1000;
    $milliersPartieEntiere = floor($milliers);
    $unitesRestantes = $millionsReste % 1000;

    if ($milliersPartieEntiere > 0) {
        $resultat .= ($resultat ? ' ' : '') . convertirTroisChiffres($milliersPartieEntiere, $unites, $dizaines) . ' mille';
    }

    if ($unitesRestantes > 0) {
        $resultat .= ($resultat ? ' ' : '') . convertirTroisChiffres($unitesRestantes, $unites, $dizaines);
    }

    return ucfirst($resultat);
}

function convertirTroisChiffres($nombre, $unites, $dizaines)
{
    $resultat = '';

    $centaines = floor($nombre / 100);
    $reste = $nombre % 100;

    if ($centaines > 0) {
        $resultat .= $unites[$centaines] . ' cent';
    }

    if ($reste > 0) {
        if ($centaines > 0) {
            $resultat .= ' ';
        }

        if ($reste < 10) {
            $resultat .= $unites[$reste];
        } elseif ($reste < 20) {
            $resultat .= 'dix-' . $unites[$reste % 10];
        } else {
            $resultat .= $dizaines[floor($reste / 10)];

            $unite = $reste % 10;
            if ($unite > 0) {
                $resultat .= '-' . $unites[$unite];
            }
        }
    }

    return $resultat;
}
@endphp