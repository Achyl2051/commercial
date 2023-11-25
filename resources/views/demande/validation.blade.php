@extends('./layouts/app')

@section('page-content')
{{-- <a href="{{ route('demande.generatePDF') }}" class="btn btn-primary">Télécharger PDF</a> --}}

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Liste des demandes de produits</h4>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Produit
              </th>
              <th>
                quantite
              </th>
              <th>
                date
              </th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($demandes as $demande)
            <tr>
              <td>
                {{ $demande->nomProduit }}
              </td>
              <td>
                {{ $demande->quantite }}
              </td>
              <td>
                {{ $demande->dateDemande }}
              </td>
              <td>
                <a href="{{ route('demande.valider', $demande->idDemande ) }}" class="btn btn-success">
                  valider 
                </a>
              </td>
              <td>
                <a href="{{ route('demande.refuser', $demande->idDemande) }}" class="btn btn-danger">
                  refuser
                </a>
              </td>
            </tr>
            @empty
              <p>aucunes demandes</p>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
