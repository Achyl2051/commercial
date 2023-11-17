@extends('./layouts/app')

@section('page-content')

    @php    
        $totalBase=0;
        $totalBrut=0;
    @endphp

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Liste des fiches de paie</h4>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Matricule
              </th>
              <th>
                Nom & Prenom
              </th>
              <th>
                Salaire de Base
              </th>
              <th>
                Salaire de Brut
              </th>
              <th>
                Mode de Payement
              </th>
              <th>
                Période
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($fichesDePaieAvecDetails as $fiche)
                @php  
                    $total=0;
                @endphp

                @foreach ($fiche->detailsFichePaie as $d)
                    @php  
                        $total=$total+($d->taux * $d->nombre * $d->type);
                    @endphp
                @endforeach
            <tr>
              <td>
                {{ $fiche->employe->matricule }}
              </td>
              <td>
                {{ $fiche->employe->nom }} {{ $fiche->employe->prenom }}
              </td>
              <td>
                {{ $fiche->salaireBase }}
              </td>
              <td>
                {{ $fiche->salaireBase+$total }}
              </td>
              <td>
                {{ $fiche->modePaiement }}
              </td>
              <td>
                {{ $fiche->periodePaiement }}
              </td>
            </tr>
                @php  
                    $totalBase=$totalBase+$fiche->salaireBase;
                    $totalBrut=$totalBrut+($fiche->salaireBase+$total);
                @endphp
            @empty
              <p>aucunes fiches de paies</p>
            @endforelse
            <tr>
              <th>
                Total
              </th>
              <td>
                
              </td>
              <th>
                {{ $totalBase }}
              </th>
              <th>
                {{ $totalBrut }}
              </th>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
