@extends('./layouts/app')

@section('page-content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajout Offre</h4>
        <p class="card-description">
          Basic form layout
        </p>
        <form class="forms-sample" action="{{ route('offres.ajouter')  }} " method="post" enctype="multipart/form-data">
          @csrf
          @method('post')

          <input type="file" name="image" id="file" accept="image/*" hidden>
          <div class="img-area" data-img="">
            <i class='fas fa-cloud-upload icon'></i>
            <h3>Upload Images</h3>
          </div>

         <div class="form-group">
            <label for="exampleInputUsername1">Nom</label>
            <input type="text" name="nom" class="form-control" id="exampleInputUsername1" placeholder="nom">
            @error('nom')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Description</label>
            <textarea type="text" name="description" class="mytextarea" id="exampleInputUsername1" placeholder="Votre question question" rows="3" cols="50" ></textarea>
            @error('description')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Temps Total requis (h)</label>
            <input type="number" name="tempsTotal"  class="form-control" id="exampleInputEmail1" placeholder="Temps Total requis">
            @error('tempsTotal')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
        </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Temps moyenne par personne (h)</label>
            <input type="number" name="tempsHomme"  class="form-control" id="exampleInputEmail1" placeholder="temps moyenne par personne">
            @error('tempsHomme')
                <div class="text text-danger">{{ $message }}</div>
            @enderror    
        </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Services</label>
            <select name="idservice" class="form-control" >
                @forelse ($services as $service)
                    <option value="{{ $service->idService }}">{{ $service->nom }}</option>
                @empty
                <p>Aucun service</p>       
                @endforelse
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

<script src="{{ asset('js/selectImage.js') }}"></script>

