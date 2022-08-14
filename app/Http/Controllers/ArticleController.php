<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
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

        return view('pages.show_article', [
            "article" => $article
        ]);
    }

    public function view_up(Request $request)
    {
        $flight = Article::findOrFail($request->id);
        $flight->amount_views = ++$flight->amount_views;
        $flight->save();

        $flight = Article::findOrFail($request->id);
        return response()->json(['success' => $flight->amount_views]);
    }

    public function like_up(Request $request)
    {
        $flight = Article::findOrFail($request->id);
        $flight->amount_likes = $request->flag === 'true' ? ++$flight->amount_likes : --$flight->amount_likes;
        $flight->save();

        $flight = Article::findOrFail($request->id);
        return response()->json(['success' => $flight->amount_likes]);
    }

    public function get_articles_by_tag($tag_slug)
    {
        $tags = Tag::all();
        $articles = Tag::where('slug', $tag_slug)->first()->articlesTag()->latest()->paginate(2);

        return view('pages.show_all_articles', [
            "tag_slug" => $tag_slug,
            "tags" => $tags,
            "articles" => $articles
        ]);
    }
}
