@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Nouveau produit</h4>
        <form class="forms-sample" action="{{ route('produit.inscrire')}} " method="post">
          @csrf
          @method('post')
          <div class="form-group">
                <label for="exampleInputUsername1">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputUsername1" placeholder="nom">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername2">Nature</label>
                <input type="text" name="nature" class="form-control" id="exampleInputUsername2" placeholder="nature">
          </div>
          <div class="form-group">
                <label for="exampleInputPassword1">Type</label>
                <select name="type" class="form-control" >
                  <option value="LIFO">LIFO </option>
                  <option value="FIFO">FIFO </option>
                  <option value="CUMP">CUMP </option>
                </select>
          </div>
          <div class="form-group">
                <label for="exampleInputPassword1">Unite</label>
                <select name="idUnite" class="form-control" >
                @foreach ($unite as $u)
                  <option value="{{ $u->idUnite }}">{{ $u->nom }} </option>
                @endforeach
                </select>
          </div>
          <button type="submit" class="btn btn-primary me-2">Inserer</button>
        </form>
      </div>
    </div>
</div>
@endsection