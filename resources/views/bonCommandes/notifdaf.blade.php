@extends('./layouts/app')

@section('page-content')

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Striped Table</h4>
      <p class="card-description">
        Add class <code>.table-striped</code>
      </p>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Bon Commande
              </th>
              <th>
               Date
              </th>
              <th>
                Valider
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($bonCommandes as $bonCommande)
            <tr>
              <td>
                Numero 00{{ $bonCommande->idBonCommande }}
              </td>
              <td>
                {{ $bonCommande->date }} 
              </td>
              <td>
                <form action="{{ route('bonCommandes.validerdaf')  }} " method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="hidden" name="idBonCommande" value={{ $bonCommande->idBonCommande }}">
                    <input type="submit" value="valider"  class="btn btn-success">
                </form>
              </td>
            </tr>
            @empty
              <p>aucune demande</p>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
