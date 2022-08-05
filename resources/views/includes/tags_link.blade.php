    <a href="{{ route('get_articles_by_tag', $tag->slug) }}" class="p-1 border border-secondary rounded-1 d-inline-block mb-1 text-muted {{ isset($tag_slug) && $tag_slug == $tag->slug ? 'active' : '' }}">
        {{ $tag->title }}
    </a>