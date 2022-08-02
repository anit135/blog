@extends('layouts.main')

@section('content')

<div class="container mt-4">
    <div class="row">

        <div class="col-lg-4">
            <div class="small text-muted">
                @foreach($tags as $tag)
                <div class="p-1 border border-secondary rounded-1 d-inline-block mb-1">{{ $tag->title }}</div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-8">
            @foreach($articles as $article)
            <!-- Article preview-->
            <div class="card mb-4">
                <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." />
                <div class="card-body">
                    <div class="small text-muted">{{ $article->created_at }}</div>
                    <h2 class="card-title h4">{{ $article->title }}</h2>
                    <p class="card-text mb-2">{{ Str::of(head($article->text))->limit(100) }}</p>
                    <div class="small text-muted mb-2">
                        @foreach($article->tagsArticle as $tag_article)
                        <div class="p-1 border border-secondary rounded-1 d-inline-block mb-1">{{ $tag_article->title }}</div>
                        @endforeach
                    </div>
                    <div class="text-end">
                        @include('includes.show_likes_views')
                    </div>
                    <a class=" btn btn-primary" href="{{ route('show_article', $article->slug) }}">Read more →</a>
                </div>
            </div>
            @endforeach
        </div>

        {!! $articles->links() !!}

    </div>
</div>

@endsection