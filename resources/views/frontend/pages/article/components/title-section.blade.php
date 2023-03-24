<div class="title">
    <h1> {{ $article->title }} </h1>
    <div class="meta-section">
        <div class="meta-property">
            <span class="mx-1">
                <span class="published-on"><img src="{{ asset('frontend/svgs/clock-svgrepo-com.svg') }}" alt="" style="width: 16px; margin-bottom:2px;" width="35" height="20"> </span><span class="published-date">
                    {{ dateFormat($article->published_at) }} &nbsp; |</span>
            </span>
            @if ($article->updated_at > $article->published_at)
                <span>
                    <img src="{{ asset('frontend/svgs/edit-svgrepo-com.svg') }}" width="35" height="20" alt="" style="width: 16px;"></span><span class="updated-date">
                    {{ dateFormat($article->updated_at) }} &nbsp;|&nbsp;
                </span>
            @endif
            <span class="article-author"><a
                    href="{{ route('authorArticle', $article->author->slug) }}/"><img src="{{ asset('frontend/svgs/person-svgrepo-com.svg') }}" width="25" height="20" alt="" style="width: 16px;"> {{ $article->author->alias_name }}</a>
            </span>
        </div>
        <div class="social-share">
            Share:
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"><img src="{{ asset('frontend/svgs/facebook-svgrepo-com.svg') }}" alt="" style="width: 30px; margin-bottom:2px;" width="30" height="25"></a>
            <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" target="_blank"><img src="{{ asset('frontend/svgs/twitter-svgrepo-com.svg') }}" alt="" style="width: 30px; margin-bottom:2px;" width="30" height="25"></a>
            <a href="https://pinterest.com/pin-builder/?url={{ Request::url() }}/&media={{ $article->image }}&description={{ $article->meta_description}}" target="_blank"><img src="{{ asset('frontend/svgs/pinterest-1-svgrepo-com.svg') }}" alt="" width="30" height="25" style="width: 30px; margin-bottom:2px;" ></a>
        </div>
    </div>
</div>
