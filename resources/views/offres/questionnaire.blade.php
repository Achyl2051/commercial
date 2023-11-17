@extends('./layouts/app')

@section('page-content')
{{-- ajout question --}}
<a href="{{ route('offres.criteres',$offre->idOffre)}}"  class="mybutton btn btn-warning ">Critères</a>

<a href="{{ route('offres.editer_offre',$offre->idOffre)}}" type="button"  class="mybutton btn btn-primary btn-rounded btn-icon">
    <i class="uil uil-edit-alt"></i>
</a>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajout Questions</h4>
        <p class="card-description">
          Votre question
        </p>
        <form class="forms-sample" action="{{ route('offres.ajouter_question')  }} " method="post">
          @csrf
          @method('post')

          <input type="hidden" name="idOffre" value="{{ $offre->idOffre }}">
         <div class="form-group">
            {{-- <label for="exampleInputUsername1">Nom</label> --}}
            <textarea type="text" name="question" class="mytextarea" id="exampleInputUsername1" placeholder="Votre question question" rows="3" cols="50" ></textarea>
            @error('question')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Coefficient</label>
            <input type="number" name="coefficient"  class="form-control" id="exampleInputEmail1" placeholder="coefficient">
            @error('coefficient')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
         </div>

         <div class="reponses">
            <label for="exampleInputEmail1">Réponses</label>
            <input type="text" name="reponses[]"  class="form-control" id="reponse" placeholder="reponse">
            <input type="text" name="reponses[]"  class="form-control" id="reponse" placeholder="reponse">
         </div>
         
         <button href=""  type="button" id="ajouter_reponse" class="btn btn-primary btn-rounded btn-icon">
             <i class="uil uil-plus"></i>
         </button>
         <br>
         <br>

          <button type="submit" class="btn btn-primary me-2">Submit</button>
          
        </form>


        @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif 
      </div>
    </div>
</div>

@forelse ($questions as $question)
    
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ $question->question }}</h4>

        <p class="card-description">
            {{ $question->coefficient }}
        </p>

        <div style="display: flex" class="reponses-flex">
            @forelse ($question->reponses as $reponse)
                <p class="souligne">{{$reponse->reponse }}</p>
            @empty
                <p>aucune reponses</p>
            @endforelse
        </div>
        <a href="" type="button"  class="btn btn-primary btn-rounded btn-icon">
            <i class="uil uil-edit-alt"></i>
        </a>
      </div>
    </div>
    
</div>
@empty
    <p>aucune question</p>
    
@endforelse



{{-- ajout critere --}}

@endsection