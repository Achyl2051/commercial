@extends('./layouts/app')

@section('page-content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Role creation</h4>
        <p class="card-description">
          Basic form layout
        </p>
        <form class="forms-sample" action="{{ route('role.create')  }} " method="post">
          @csrf
          @method('post')

          <div class="form-group mine">
            <div class="form-group">
                <label for="role">Nom</label>
                <input type="text" name="role" value="{{ old('role')}}" class="form-control" id="role" placeholder="role">
                @error('role')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <button type="submit" class="btn btn-primary me-2">enregistrer</button>
        </form>
        @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif 
      </div>
    </div>
</div>

<div class="col-md-12 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Permission creation</h4>
          <p class="card-description">
            Basic form layout
          </p>
          <form class="forms-sample" action="{{ route('permission.create')  }} " method="post">
            @csrf
            @method('post')
  
            <div class="form-group mine">
              <div class="form-group">
                  <label for="role">Nom</label>
                  <input type="text" name="permission" value="{{ old('permission')}}" class="form-control" id="permission" placeholder="permission">
                  @error('permission')
                      <div class="text text-danger">{{ $message }}</div>
                  @enderror
                </div>
            </div>
  
            <button type="submit" class="btn btn-primary me-2">enregistrer</button>
          </form>
          @if (session()->has('error'))
          <div class="alert alert-danger">{{ session()->get('error') }}</div>
          @endif 
        </div>
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
