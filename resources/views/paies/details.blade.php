@extends('./layouts/app')

@section('page-content')
    @php  
        $total=0;
    @endphp
    
    @forelse ($details as $d)
        @php  
            $total=$total+($d->taux * $d->nombre * $d->type);
        @endphp
    @empty
    @endforelse

    @php  
        $tauxJournalier=$fichesDePaie->salaireBase / 30;
        $tauxHoraire=$fichesDePaie->salaireBase / 173.33;
        $indice=$fichesDePaie->salaireBase / 1334;
    @endphp
    
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <div class="text-center mt-4">
            <h1>Fiche de paie de l'employé</h1>
        </div>
        <!-- Informations de l'entreprise -->
        <div class="row mt-4">
            <div class="col-6">
                <p><strong>Adresse de l'entreprise:</strong> Antananarivo,Madagascar</p>
                <p><strong>Période de paiement:</strong>{{ $fichesDePaie->periodePaiement }}</p>
                <p><strong>Mode de paiement:</strong> {{ $fichesDePaie->modePaiement }}</p>
                <p><strong>Taux journalier:</strong> {{ $tauxJournalier }}</p>
                <p><strong>Taux horaire:</strong> {{ $tauxHoraire }}</p>
                <p><strong>Indice:</strong> {{ $indice }}</p>
            </div>
        </div>

        <!-- Informations de l'employé -->
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom et Prénom</th>
                            <th>Fonction</th>
                            <th>Direction</th>
                            <th>Salaire de base</th>
                            <th>Date d'embauche</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $employe->matricule }}</td>
                            <td>{{ $employe->nom }} {{ $employe->prenom }}</td>
                            <td>{{ $employe->fonction->nom }}</td>
                            <td>{{ $employe->direction->nom }}</td>
                            <td>{{ $fichesDePaie->salaireBase }}</td>
                            <td>{{ $employe->dateEmbauche }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Détails de la paie -->
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Désignation</th>
                            <th>Nombre</th>
                            <th>Taux</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse ($details as $d)
                        <tr>
                            <td>{{ $d->designation }}</td>
                            <td>{{ $d->nombre }}</td>
                            <td>{{ $d->taux }}</td>
                            <td>{{ $d->taux * $d->nombre * $d->type }}</td>
                        </tr>
                    @empty
                    <p>aucunes données</p>
                    @endforelse
                        <tr>
                            <td></td>
                            <td></td>
                            <th>Salaire brute</th>
                            <th>{{ $fichesDePaie->salaireBase+$total }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
     </div>
</div>
@endsection