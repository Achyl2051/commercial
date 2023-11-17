@extends('./layouts/app')

@section('page-content')


<div class="card mt-3">
    <div class="row mt-2">
        <a href="/">retour</a>
        <div class="card-body"> 
            <h4>Editer article</h4>  
            <form action="{{ route('article.update', $article->id )}}" method="post">
                @method('put')
                @csrf
                <input type="text" value="{{ $article->titre }}" name="titre" id="">
                <input type="text" value="{{ $article->description }}" name="description" id="">
                <button type="submit" class="btn btn-success"> actualiser</button>
            </form>
        </div>
    </div>

</div>
@endsection
