@extends('./layouts/app')

@section('page-content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Liste des fournisseurs</h4>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Identifiant
              </th>
              <th>
                Nom
              </th>
              <th>
                Adresse
              </th>
              <th>
                Telephone
              </th>
              <th>
                Email
              </th>
              <th>
                Type de produit
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($fournisseur as $f)
            <tr>
              <td>
                {{ $f->idFournisseur }}
              </td>
              <td>
                {{ $f->nom }}
              </td>
              <td>
                {{ $f->adresse }}
              </td>
              <td>
                {{ $f->telephone }}
              </td>
              <td>
                {{ $f->email }}
              </td>
              <td>
                {{ $f->typeProduit }}
              </td>
            </tr>
            @empty
              <p>aucun fournisseur</p>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
