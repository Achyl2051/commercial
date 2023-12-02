@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Entre de stock</h4>
        <form class="forms-sample" action="{{ route('stock.insertEntre')}}" method="post" enctype="multipart/form-data">
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
            <label for="exampleInputUsername1">date</label>
            <input type="date" name="daty" class="form-control" id="exampleInputUsername1">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Quantite</label>
            <input type="number" name="quantite"  class="form-control" id="exampleInputEmail1" placeholder="quantite" step="0.01">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Priix Unitaire</label>
            <input type="number" name="prixUnitaire"  class="form-control" id="exampleInputEmail1" placeholder="prix unitaire" step="0.01">
          </div>

          <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
      </div>
    </div>
</div>

@endsection

