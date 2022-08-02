<i class="fa-regular fa-heart me-1" id="like"></i>
<label for="like" class="me-3">{{ $article->amount_likes ?? 0 }}</label>

<i class="fa-solid fa-eye me-1" id="view"></i>
<label for="view">{{ $article->amount_views ?? 0 }}</label>