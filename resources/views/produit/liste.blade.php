@extends('./layouts/app')

@section('page-content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Liste des produits</h4>
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
                Nature
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($produit as $p)
            <tr>
              <td>
                {{ $p->idProduit }}
              </td>
              <td>
                {{ $p->nom }}
              </td>
              <td>
                {{ $p->nature }}
              </td>
              <td>
                <a href="{{ route('produit.prixProduit', ['idProduit' => $p->idProduit]) }}" class="btn btn-success">
                  Ajout prix  
                </a>
              </td>
            </tr>
            @empty
              <p>aucun produit</p>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
