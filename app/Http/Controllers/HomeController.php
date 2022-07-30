<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->limit(6)->get();

        return view('pages.index', [
            "articles" => $articles
        ]);
    }

    public function show_all_articles()
    {
        $tags = Tag::all();
        $articles = Article::latest()->paginate(6);

        return view('pages.show_all_articles', [
            "tags" => $tags,
            "articles" => $articles
        ]);
    }

    public function show_article($slug)
    {

        $article = Article::where('slug', $slug)->first();

        // dd($article->comments->sortDesc());

        return view('pages.show_article', [
            "article" => $article
        ]);
    }
}
