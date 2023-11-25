@extends('./layouts/app')

@section('page-content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Demander Produit(s)</h4>
                <p class="card-description">
                    Basic form layout
                </p>
                <form class="forms-sample" action="{{ route('demande.demander') }} " method="post">
                    @csrf
                    @method('post')


                    <div class="form-group mine">
                        <div class="form-group">
                            <label for="exampleInputPassword1">idProduit</label>
                            <select name="idProduit" class="form-control">
                                @forelse ($produits as $produit)
                                    <option value="{{ $produit->idProduit }}">{{ $produit->nom }} </option>
                                @empty
                                    <option>Aucuns produits</option>
                                @endforelse
                            </select>
                            @error('idProduit')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">idDepartement</label>
                            <select name="idDepartement" class="form-control">
                                @forelse ($departements as $departement)
                                    <option value="{{ $departement->idDepartement }}">{{ $departement->nom }} </option>
                                @empty
                                    <option>Aucunes departement</option>
                                @endforelse
                            </select>
                            @error('idDepartement')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mine">
                        <div class="form-group">
                            <label for="exampleInputUsername1">quantite</label>
                            <input type="text" name="quantite" value="{{ old('quantite') }}" class="form-control"
                                id="exampleInputUsername1" placeholder="quantite">
                            @error('quantite')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mine">
                        <div class="form-group">
                            <label for="exampleInputUsername1">raison</label>
                            <textarea name="raison" value="{{ old('raison') }}" rows="4" cols="50"  placeholder="raison" class="mytextarea"></textarea>
                            @error('raison')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary me-2">Confirmer</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
