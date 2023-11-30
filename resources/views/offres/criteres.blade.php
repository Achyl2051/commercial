@extends('./layouts/app')

@section('page-content')

@forelse ($domaines as $domaine)
    <p>{{$domaine->nom}}</p>
    <form action="{{ route('offres.ajouter_typedomaine_cv')}}" method="post" class="domaine_cv forms-sample">
        @csrf
        @method('post')
        <input type="hidden" name="idOffre" value="{{ $offre->idOffre }}">
        <input type="hidden" name="idDomainecv" value="{{ $domaine->idDomainecv }}">
        
        <div class="myform-group">
            <input type="text"  class="myform-control" name="nom" placeholder="nom type domaine" >
            <input type="number" class="myform-control" name="points" placeholder="points" >
            <button type="submit" class="btn btn-primary btn-rounded btn-icon">
                <i class="uil uil-plus"></i>
            </button>
        </div>

        <div class="Typedomainecvs">
            @forelse ($domaine->Typedomainecvs as $Typedomainecvs)
                <p>{{ $Typedomainecvs->nom }} : {{ $Typedomainecvs->points  }}</p>
            @empty
                <p>vide</p>
            @endforelse
        </div>
    </form>
@empty
<p>aucun domaines</p>
    
@endforelse

@endsection