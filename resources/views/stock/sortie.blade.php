@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sortie de stock</h4>
        <form class="forms-sample" action="{{ route('stock.sortiStock')}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('post')

          <div class="form-group">
            <label for="exampleInputPassword1">Entre</label>
            <select name="idEntre" class="form-control" >
                @forelse ($entre as $e)
                    <option value="{{ $e->idEntre }}">{{ $e->magasin->nom }} , {{ $e->produit->nom }} , {{ $e->date }}</option>
                @empty
                <p>Aucune entre</p>       
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

          <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
      </div>
    </div>
</div>

@endsection

