@extends('./layouts/app')

@section('page-content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Editer Offre</h4>
        <p class="card-description">
          Basic form layout
        </p>
        <form class="forms-sample" action="{{ route('offres.update_offre',$offre->idOffre)  }} " method="post">
          @csrf
          @method('put')

         <div class="form-group">
            <label for="exampleInputUsername1">Nom</label>
            <input type="text" name="nom" value="{{$offre->nom}}" class="form-control" id="exampleInputUsername1" placeholder="nom">
            @error('nom')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Nombre de personnes</label>
            <input type="number" name="nombre" value="{{$offre->nombre }}"  class="form-control" id="exampleInputEmail1" placeholder="Temps Total requis">
            @error('nombre')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Services</label>
            <select name="idservice" class="form-control" >
                @forelse ($services as $service)
                    <option value="{{ $service->idService }}" {{ ($offre->idservice == $service->idService) ? 'selected' : '' }}>{{ $service->nom }}</option>
                @empty
                <p>Aucun service</p>       
                @endforelse
            </select>
            @error('idservice')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <select name="isValid" class="form-control" >
                <option value="0" >en cours</option>
                <option value="-1" >en pause</option>
                <option value="-10" >cloturé</option>

                <p>Aucun service</p>       
            </select>
            @error('idservice')
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