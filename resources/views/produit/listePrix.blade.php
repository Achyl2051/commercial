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
                Fournisseur
              </th>
              <th>
                Prix
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($prixProduit as $p)
            <tr>
              <td>
                {{ $p->fournisseur->nom }}
              </td>
              <td>
                {{ $p->prix }}
              </td>
              <td>
                <a href="{{ route('produit.modifPrix', ['idProduit' => $p->idProduit,'idFournisseur' => $p->fournisseur->idFournisseur]) }}" class="btn btn-success">
                  Modifier prix  
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
