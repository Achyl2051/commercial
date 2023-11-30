@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Nouveau fournisseur</h4>
        <form class="forms-sample" action="{{ route('fournisseur.inscrire')}} " method="post">
          @csrf
          @method('post')
          <div class="form-group">
                <label for="exampleInputUsername1">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputUsername1" placeholder="nom">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername2">Adresse</label>
                <input type="text" name="adresse" class="form-control" id="exampleInputUsername2" placeholder="adresse">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername3">Téléphone</label>
                <input type="text" name="telephone" class="form-control" id="exampleInputUsername3" placeholder="telephone">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername4">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputUsername4" placeholder="email">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername5">Type de produit</label>
                <input type="text" name="typeProduit" class="form-control" id="exampleInputUsername5" placeholder="type de produit">
          </div>
          <button type="submit" class="btn btn-primary me-2">Inserer</button>
        </form>
      </div>
    </div>
</div>
@endsection