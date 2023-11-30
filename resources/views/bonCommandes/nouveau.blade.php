@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bon commandes</h4>
        <p class="card-description">
          a
        </p>
        <form class="forms-sample" action="{{ route('bonCommandes.insertion')  }} " method="post" enctype="multipart/form-data">
          @csrf
          @method('post')


          <div class="form-group">
            <label for="exampleInputPassword1">Fournisseur</label>
            <select name="idFournisseur" class="form-control" >
                @forelse ($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->idFournisseur }}">{{ $fournisseur->nom }} </option>
                @empty
                <p>Aucun fournisseur</p>       
                @endforelse
            </select>
            @error('idFournisseur')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Date</label>
            <input type="date" name="date" class="form-control" id="exampleInputUsername1" placeholder="date">
            @error('date')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Duree de livraison</label>
            <input type="text" name="livraison"  class="form-control" id="exampleInputEmail1" placeholder="Duree en jours">
            @error('livraison')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Mode de paiement</label>
            <input type="text" name="modePaiement" class="form-control" id="exampleInputUsername1" placeholder="mode de paiement">
            @error('modePaiement')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Duree de paiement</label>
            <input type="text" name="dureePaiement"  class="form-control" id="exampleInputEmail1" placeholder="Duree en jours">
            @error('dureePaiement')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>
          
          <input type="hidden" name="etat" value="0">

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

