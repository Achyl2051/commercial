<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index()
    {
        // $articles =  Article::all();
        $articles =  Article::paginate(5);

        return view('accueil', [
            'articles' => $articles
        ]);
    }

    public function store(Article $article, ArticleRequest $request)
    {
        Article::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'user_id' => Auth::id(),

        ]);

        return redirect()->back()->with('success', 'L\'article est enregistrer');
    }

    // public function show($id)
    // {
    //     $article = Article::find($id);
    //     // dd($article);
    //     return view('articles.show', [
    //         'article' => $article
    //     ]);
    // }
    public function show(Article $article)
    {
        // $article = Article::find($id);

        // dd($article);
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function edit(Article $article)
    {
        // $article = Article::find($id);

        // dd($article);
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Article $article,Request $request)
    {

        $article->titre = $request->titre;
        $article->description = $request->description;

        $article->save();

        return redirect('/')->with('success','L\'article est mise a jour');
    }

    public function delete(Article $article){
        $article->delete();
        return redirect('/')->with('success','L\'article a ete supprimer');

    }

    public function mine(){
        $myArticles = Article::where('user_id',Auth::id())->get();

        return view('articles.mine',[
            'my_articles' => $myArticles
        ]);
    }
}
