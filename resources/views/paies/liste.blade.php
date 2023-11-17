@extends('./layouts/app')

@section('page-content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Liste des fiches de paie</h4>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                fiche numéro
              </th>
              <th>
                Matricule
              </th>
              <th>
                Nom
              </th>
              <th>
                Salaire de Base
              </th>
              <th>
                Mode de Payement
              </th>
              <th>
                Période
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($fichesDePaie as $fiche)
            <tr>
              <td>
                <a href="{{ route('paies.details', ['idFichePaie' => $fiche->idFichePaie,'idEmploye' => $fiche->employe->idEmploye]) }}">{{ $fiche->idFichePaie }}</a>
              </td>
              <td>
                {{ $fiche->employe->matricule }}
              </td>
              <td>
                {{ $fiche->employe->nom }}
              </td>
              <td>
                {{ $fiche->salaireBase }}
              </td>
              <td>
                {{ $fiche->modePaiement }}
              </td>
              <td>
                {{ $fiche->periodePaiement }}
              </td>
              <td>
                <a href="{{ route('paies.nouveauDetail', ['idFichePaie' => $fiche->idFichePaie]) }}" class="btn btn-success">
                  Ajout détails  
                </a>
              </td>
            </tr>
            @empty
              <p>aucunes fiches de paies</p>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
