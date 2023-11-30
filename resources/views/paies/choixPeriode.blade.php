@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Période pour l'état de paie:</h4>
        <form class="forms-sample" action="{{ route('paies.ficheAvecDetail')}} " method="post">
          @csrf
          @method('post')
            <div class="form-group">
                <label for="exampleInputPassword1">Date</label>
                <select name="periodePaiement" class="form-control" >
                    @forelse ($periodes as $p)
                        <option value="{{ $p}}">{{ $p }} </option>
                    @empty
                    @endforelse
                </select>
            </div>
          <button type="submit" class="btn btn-primary me-2">Regarder</button>
        </form>
      </div>
    </div>
</div>
@endsection