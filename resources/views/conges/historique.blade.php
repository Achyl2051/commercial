@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Conges</h4>
        <p class="card-description">
          a
        </p>
        <form class="forms-sample" action="{{ route('conges.liste')  }} " method="post" enctype="multipart/form-data">
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

