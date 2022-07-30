@extends('layouts.main')

@section('content')

@include('includes.header_index')

<div class="container">
    <div class="row">

        @foreach($articles as $article)
        <div class="col-lg-4 col-md-6 d-flex">
            <!-- Article preview-->
            <div class="card mb-4">
                <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." />
                <div class="card-body">
                    <div class="small text-muted">{{ $article->created_at }}</div>
                    <a href="{{ route('show_article', $article->slug) }}">
                        <h2 class="card-title h4">{{ $article->title }}</h2>
                    </a>
                    <p class="card-text">{{ Str::of(head($article->text))->limit(100) }}</p>
                    <!-- <a class="btn btn-primary" href="#!">Read more →</a> -->
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection