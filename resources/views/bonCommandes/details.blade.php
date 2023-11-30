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
        </div>
     </div>
</div>
@endsection