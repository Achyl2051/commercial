@extends('../../layouts/app')

@section('page-content')
    <ul class="list-group mt-2">
        @forelse ($my_articles as $article)
            <li class="list-group-item">
                <a href="{{ route('article.show', $article->id )}}">{{ $article->titre}}</a>
            </li>
            @empty   
                <p>aucun article </p>
        @endforelse
    </ul>

@endsection