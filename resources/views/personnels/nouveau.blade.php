@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Recruter Employé</h4>
        <p class="card-description">
          Basic form layout
        </p>
        <form class="forms-sample" action="{{ route('employes.recruter')  }} " method="post" enctype="multipart/form-data">
          @csrf
          @method('post')

          <input type="file" name="image" id="file" accept="image/*" hidden>
          <div class="img-area little" data-img="">
            <i class='fas fa-cloud-upload icon'></i>
            <h3>Upload photo</h3>
          </div>  

          <div class="form-group mine">
            <div class="form-group">
                <label for="exampleInputUsername1">Nom</label>
                <input type="text" name="nom" value="{{ old('nom')}}" class="form-control" id="exampleInputUsername1" placeholder="nom">
                @error('nom')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Prenom</label>
                <input type="text" name="prenom" value="{{ old('prenom')}}" class="form-control" id="exampleInputUsername1" placeholder="prenom">
                @error('prenom')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="form-group mine">
            <label for="exampleInputPassword1">Genre</label>
            <div id="exampleInputPassword1" >
                <input type="radio"  name="genre" value="M">Masculin
                <input type="radio" name="genre" value="F">Feminin
            </div>
            @error('genre')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Adresse</label>
            <input type="text" name="adresse" value="{{ old('adresse')}}" class="form-control" id="exampleInputUsername1" placeholder="adresse">
            @error('adresse')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group mine">
          <div class="form-group">
            <label for="exampleInputUsername1">Telephone</label>
            <input type="text" name="telephone" value="{{ old('telephone')}}" class="form-control" id="exampleInputUsername1" placeholder="telephone">
            @error('telephone')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Email</label>
            <input type="email" name="email" value="{{ old('email')}}" class="form-control" id="exampleInputUsername1" placeholder="email">
            @error('email')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>


        <div class="form-group mine">

          <div class="form-group">
            <label for="exampleInputUsername1">date de naissance</label>
            <input type="date" name="dateNaissance" value="{{ old('dateNaissance')}}" class="form-control" id="exampleInputUsername1" placeholder="dateNaissance">
            @error('dateNaissance')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">date de embauche</label>
            <input type="date" name="dateEmbauche" value="{{ old('dateEmbauche')}}" class="form-control" id="exampleInputUsername1" placeholder="dateEmbauche">
            @error('dateEmbauche')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-group mine">
          <div class="form-group">
            <label for="exampleInputPassword1">Direction</label>
            <select name="idDirection" class="form-control" >
                @forelse ($directions as $direction)
                    <option value="{{ $direction->idDirection}}">{{ $direction->nom }}</option>
                @empty
                <option >Aucunes Direction</option>
                @endforelse
            </select>
            @error('idDirection')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Fonction</label>
            <select name="idFonction" class="form-control" >
                @forelse ($fonctions as $fonction)
                <option value="{{ $fonction->idFonction}}">{{ $fonction->nom }}</option>
            @empty
            <option >Aucunes Direction</option>
            @endforelse
            </select>
            @error('idFonction')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>
        </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Superieur</label>
            <select name="idSuperieur" class="form-control" >
                @forelse ($employes as $employe)
                <option value="{{ $employe->idEmploye}}">{{ $employe->nom }} </option>
            @empty
            <option value="">Aucunes Employes</option>
            @endforelse
            </select>
            @error('idSuperieur')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

        <div class="form-group mine">
          <div class="form-group">
            <label for="exampleInputPassword1">TypeContrat</label>
            <select name="idTypeContrat" class="form-control" >
                @forelse ($typeContrats as $typeContrat)
                <option value="{{ $typeContrat->idTypeContrat}}">{{ $typeContrat->abreviation }} </option>
            @empty
            <option >Aucunes TypeContrat</option>
            @endforelse
            </select>
            @error('idTypeContrat')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">StatutMarital</label>
            <select name="idStatutMarital" class="form-control" >
                @forelse ($statutMaritals as $statutMarital)
                <option value="{{ $statutMarital->idStatutMarital}}">{{ $statutMarital->situation }} </option>
            @empty
            <option >Aucunes StatutMarital</option>
            @endforelse
            </select>
            @error('idStatutMarital')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>
        </div>


          <button type="submit" class="btn btn-primary me-2">Recruter</button>
          <button class="btn btn-light">Cancel</button>
        </form>
        @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif 
      </div>
    </div>
</div>

<div class="lds-ring"><div></div><div></div><div></div><div></div></div>


@endsection

<script src="{{ asset('js/selectImage.js') }}"></script>
<script>
  document.addEventListener("submit", (event) => {
    event.preventDefault(); // Empêche l'envoi initial du formulaire
    $('.lds-ring').css('display','block');
    // Attendre 2 secondes (2000 millisecondes) avant de soumettre le formulaire
    setTimeout(() => {
      event.target.submit(); // Soumet le formulaire
    }, 1500);
  });
</script>


