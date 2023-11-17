@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Nouvelle fiche de paie</h4>
        <form class="forms-sample" action="{{ route('paies.inscrire')}} " method="post">
          @csrf
          @method('post')
            <div class="form-group">
                <label for="exampleInputPassword1">Employe</label>
                <select name="idEmploye" class="form-control" >
                    @forelse ($employes as $employe)
                        <option value="{{ $employe->idEmploye}}">{{ $employe->nom }} {{ $employe->prenom }} </option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Salaire de Base</label>
                <input type="text" name="salaireBase" class="form-control" id="exampleInputUsername1" placeholder="salaire">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername1">Mode de paiement</label>
                <input type="text" name="modePaiement" class="form-control" id="exampleInputUsername1" placeholder="mode de paiement">
          </div>
          <div class="form-group">
                <label for="exampleInputUsername1">Période de paiement</label>
                <input type="text" name="periodePaiement" class="form-control" id="exampleInputUsername1" placeholder="periode de paiement">
          </div>
          <button type="submit" class="btn btn-primary me-2">Inserer</button>
        </form>
      </div>
    </div>
</div>
@endsection