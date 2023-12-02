@extends('./layouts/app')

@section('page-content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Etat de Stock de {{ $date_fin }}</h4>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Produit
              </th>
              <th>
                Stock Actuel
              </th>
              <th>
                Unite
              </th>
              <th>
                Prix Unitaire
              </th>
              <th>
                Prix Total
              </th>
              <th>
                Magasin
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($apres as $a)
            <tr>
              <td>
                {{ $a->produit }}
              </td>
              <td>
                {{ $a->stock_actuel }}
              </td>
              <td>
                {{ $a->unite }}
              </td>
              <td>
                {{ $a->prixUnitaire }}
              </td>
              <td>
                {{ $a->prixUnitaire * $a->stock_actuel }}
              </td>
              <td>
                {{ $a->magasin }}
              </td>
            </tr>
            @empty
              <p>aucun element dans le stock a cette date</p>
            @endforelse
            <tr>
              <td>
                
              </td>
              <th>
                {{ $totalApres['quantite'] }}
              </td>
              <td>
                
              </td>
              <th>
                {{ $totalApres['prixUnitaire'] }}
              </td>
              <th>
                {{ $totalApres['montantTotal'] }}
              </td>
              <td>
                
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
