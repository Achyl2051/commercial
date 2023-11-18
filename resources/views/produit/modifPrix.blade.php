@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Modification du prix du produit</h4>
        <form class="forms-sample" action="{{ route('produit.updatePrixProduit')}} " method="post">
          @csrf
          @method('post')
          @foreach ($prixProduit as $p)
          <div class="form-group">
                <label for="exampleInputUsername1">Prix</label>
                <input type="text" name="prix" class="form-control" id="exampleInputUsername1" value="{{ $p->prix }}">
          </div>
          <input type="hidden" name="idProduit" value="{{ $p->idProduit }}">
          <input type="hidden" name="idFournisseur" value="{{ $p->idFournisseur }}">
          <button type="submit" class="btn btn-primary me-2">Inserer</button>
          @endforeach
        </form>
      </div>
    </div>
</div>
@endsection