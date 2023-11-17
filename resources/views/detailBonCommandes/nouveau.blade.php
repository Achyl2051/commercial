@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Details Bon commandes</h4>
        <p class="card-description">
          a
        </p>
        <form class="forms-sample" action="{{ route('detailsBonCommandes.insertion')  }} " method="post" enctype="multipart/form-data">
          @csrf
          @method('post')


          <div class="form-group">
            <label for="exampleInputPassword1">Bon commande </label>
            <select name="idBonCommande" class="form-control" >
                @forelse ($bonCommandes as $bonCommande)
                    <option value="{{ $bonCommande->idBonCommande }}">numero 00{{ $bonCommande->idBonCommande }} </option>
                @empty
                <p>Aucun bon commandes</p>       
                @endforelse
            </select>
            @error('idBonCommande')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Produits </label>
            <select name="idProduit" class="form-control" >
                @forelse ($produits as $produit)
                    <option value="{{ $produit->idProduit }}">{{ $produit->nom }} </option>
                @empty
                <p>Aucun produits</p>       
                @endforelse
            </select>
            @error('idProduit')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Quantite</label>
            <input type="text" name="quantite" class="form-control" id="exampleInputUsername1" placeholder="Quantite">
            @error('quantite')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">TVA</label>
            <select name="tva" class="form-control" >
                    <option value="0"> Aucune </option>
                    <option value="20"> 20% </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Next</label>
            <select name="effet" class="form-control" >
                    <option value="0"> Ajouter autre </option>
                    <option value="1"> conclure </option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
        @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif 
      </div>
    </div>
</div>

@endsection

