@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Nouvelle fiche de paie</h4>
        <form class="forms-sample" action="{{ route('produit.insererPrixProduit')}} " method="post">
          @csrf
          @method('post')
            <div class="form-group">
                <label for="exampleInputPassword1">Fournisseur</label>
                <select name="idFournisseur" class="form-control" >
                    @forelse ($fournisseur as $f)
                        <option value="{{ $f->idFournisseur}}">{{ $f->nom }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Prix</label>
                <input type="text" name="prix" class="form-control" id="exampleInputUsername1" placeholder="prix">
          </div>
          <input type="hidden" name="idProduit" value="{{ $idProduit }}">
          <button type="submit" class="btn btn-primary me-2">Inserer</button>
        </form>
      </div>
    </div>
</div>
@endsection