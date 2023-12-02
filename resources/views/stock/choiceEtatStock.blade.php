@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Etat de stock</h4>
        <form class="forms-sample" action="{{ route('stock.etatStock')}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('post')

          <div class="form-group">
            <label for="exampleInputPassword1">Produit</label>
            <select name="idProduit" class="form-control" >
                @forelse ($produit as $p)
                    <option value="{{ $p->idProduit }}">{{ $p->nom }}</option>
                @empty
                <p>Aucun produit</p>       
                @endforelse
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Magasin</label>
            <select name="idMagasin" class="form-control" >
                @forelse ($magasin as $m)
                    <option value="{{ $m->idMagasin }}">{{ $m->nom }}</option>
                @empty
                <p>Aucun magasin</p>       
                @endforelse
            </select>
          </div>

         <div class="form-group">
            <label for="exampleInputUsername1">date debut</label>
            <input type="date" name="date_debut" class="form-control" id="exampleInputUsername1">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">date fin</label>
            <input type="date" name="date_fin" class="form-control" id="exampleInputUsername1">
          </div>

          <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
      </div>
    </div>
</div>

@endsection

