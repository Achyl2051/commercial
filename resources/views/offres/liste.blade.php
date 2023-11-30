@extends('./layouts/app')

@section('page-content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste des Offres</h4>
        <p class="card-description">
          Add class <code>.table</code>
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>nom</th>
                <th>nombre de personne(s)</th>
                <th>Service</th>
                <th>date Publication</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($offres as $offre)
                <tr>
                    <td>{{ $offre->nom}}</td>
                    <td>{{ $offre->nombre}}</td>
                    <td>{{ $offre->nom_service}}</td>
                    <td>{{ $offre->date}}</td>
                    <td><label class="{{ $offre->class }}">{{ $offre->status }}</label></td>
                    <td>
                        <a href="{{ route('offres.questionnaire',$offre->idOffre) }} "  type="button" class="btn btn-primary btn-rounded btn-icon">
                            <i class="mdi mdi-animation"></i>
                        </a>
                    </td>
                </tr>
                @empty
                    <p>Aucun service</p>       
                @endforelse
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @endsection
