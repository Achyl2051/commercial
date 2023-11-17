@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Contrat</h4>
        <p class="card-description">
          Basic form layout
        </p>
        <form class="forms-sample" action="{{ route('contrats.signer')  }} " method="post" enctype="multipart/form-data">
          @csrf
          @method('post')


          <div class="form-group">
            <label for="exampleInputPassword1">Type Contrat</label>
            <select name="idTypeContrat" class="form-control" >
                @forelse ($typeContrats as $typeContrat)
                    <option value="{{ $typeContrat->idTypeContrat }}">{{ $typeContrat->abreviation }}</option>
                @empty
                <p>Aucun type contrat</p>       
                @endforelse
            </select>
            @error('idTypeContrat')
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
            <label for="exampleInputUsername1">date Fin</label>
            <input type="date" name="dateFin" class="form-control" id="exampleInputUsername1" placeholder="dateDebut">
            @error('dateFin')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          
          <div class="form-group">
            <label for="exampleInputEmail1">lieuTravail</label>
            <input type="text" name="lieuTravail"  class="form-control" id="exampleInputEmail1" placeholder="lieuTravail">
            @error('lieuTravail')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">salaire</label>
            <input type="text" name="salaire"  class="form-control" id="exampleInputEmail1" placeholder="salaire">
            @error('salaire')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">attentes</label>
          <textarea type="text" name="attentes" class="mytextarea" id="exampleInputUsername1" placeholder="attentes" rows="3" cols="50" ></textarea>
          @error('attentes')
              <div class="text text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">conditionResiliation</label>
          <textarea type="text" name="conditionResiliation" class="mytextarea" id="exampleInputUsername1" placeholder="conditionResiliation" rows="3" cols="50" ></textarea>
          @error('conditionResiliation')
              <div class="text text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">avantagesdEtDroits</label>
          <textarea type="text" name="avantagesdEtDroits" class="mytextarea" id="exampleInputUsername1" placeholder="avantagesdEtDroits" rows="3" cols="50" ></textarea>
          @error('avantagesdEtDroits')
              <div class="text text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">ModalitesDeTransition</label>
          <textarea type="text" name="ModalitesDeTransition" class="mytextarea" id="ModalitesDeTransition" placeholder="attentes" rows="3" cols="50" ></textarea>
          @error('ModalitesDeTransition')
              <div class="text text-danger">{{ $message }}</div>
          @enderror
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

