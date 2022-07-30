@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{{ $article->title }}</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-2">{{ $article->created_at }}</div>
                <!-- Post categories-->
                @foreach($article->tagsArticle as $tag)
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $tag->title }}</a>
                @endforeach
            </header>

            <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..."></figure>

            <section class="mb-5">
                @foreach($article->text as $paragraph)
                <p class="fs-5 mb-4">{{ $paragraph }}</p>
                @endforeach
            </section>

            @include('includes.form_comment')
        </div>
    </div>
</div>
@endsection