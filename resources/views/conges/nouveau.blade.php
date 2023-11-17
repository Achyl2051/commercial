@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Conges</h4>
        <p class="card-description">
          a
        </p>
        <form class="forms-sample" action="{{ route('conges.demander')  }} " method="post" enctype="multipart/form-data">
          @csrf
          @method('post')


          <div class="form-group">
            <label for="exampleInputPassword1">Employer</label>
            <select name="idEmploye" class="form-control" >
                @forelse ($employes as $employe)
                    <option value="{{ $employe->idEmploye }}">{{ $employe->nom }}  {{ $employe->prenom }}</option>
                @empty
                <p>Aucun Employe</p>       
                @endforelse
            </select>
            @error('idEmploye')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Type Contrat</label>
            <select name="idTypeConge" class="form-control" >
                @forelse ($types as $type)
                    <option value="{{ $type->idTypeConge }}">{{ $type->nom }}</option>
                @empty
                <p>Aucun type conges</p>       
                @endforelse
            </select>
            @error('idTypeConge')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

         <div class="form-group">
            <label for="exampleInputUsername1">date Debut</label>
            <input type="date" name="dateDebut" class="form-control" id="exampleInputUsername1" placeholder="dateDebut">
            @error('dateDebut')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Duree</label>
            <input type="text" name="duree"  class="form-control" id="exampleInputEmail1" placeholder="Duree en jours">
            @error('duree')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Etat</label>
            <select name="etat" class="form-control" >
                    <option value="entrer"> entrer </option>
                    <option value="sortie"> sortie </option>
                    <option value="neutre"> non cumulable </option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Choisisseur</label>
            <select name="choisisseur" class="form-control" >
                    <option value="employer"> employer </option>
                    <option value="employeur"> employeur </option>
            </select>
          </div>
          <input type="hidden" name="valid" value="1">

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

