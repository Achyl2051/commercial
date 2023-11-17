@extends('./layouts/app')

@section('page-content')


<div class="card mt-3">
    <a href="/">retour</a>
    <div class="card-body">   
        <div class="title">{{ $article->titre }}</div>
       <p>{{ $article->description }}</p>
    </div>

    @auth
        @if(Auth::user()->id === $article->user_id )  
        <div class="card-footer">
            <a href="/articles/{{ $article->id }}/edit" class="btn btn-info">Editer</a>
            
            <form action="{{ route('article.delete', $article->id )}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger">supprimer</button>
            </form>

        </div>
        @endif
    @endauth


</div>
@endsection
