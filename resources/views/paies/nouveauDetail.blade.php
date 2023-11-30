@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajout de détails</h4>
        <form class="forms-sample" action="{{ route('paies.ajoutDetail')}} " method="post">
          @csrf
          @method('post')
          <div class="form-group">
                <label for="exampleInputUsername1">Désignation</label>
                <input type="text" name="designation" class="form-control" id="exampleInputUsername1" placeholder="désignation">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername1">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="exampleInputUsername1" placeholder="nombre">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername1">Taux</label>
                <input type="text" name="taux" class="form-control" id="exampleInputUsername1" placeholder="taux">
          </div>
          <div class="form-group">
                <label for="exampleInputPassword1">Type</label>
                <select name="type" class="form-control" >
                        <option value="1">Positif </option>
                        <option value="-1">Négatif </option>
                </select>
            </div>
            <input type="hidden" name="idFichePaie" value="{{ $idFichePaie }}">
          <button type="submit" class="btn btn-primary me-2">Ajouter</button>
        </form>
      </div>
    </div>
</div>
@endsection