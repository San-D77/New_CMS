<div class="readmore-container row">
    <p class="readmore-text">Also Read:</p>
    @foreach ($articles as $article)
        <div class="readmore-article col-12 col-md-6">
            <div class="readmore-image">
                <a href="{{ route('singleArticle', ['slug' => $article->slug]) }}">
                    <img src="{{ asset('/uploads/medium/'.$article->image) }}" alt="{{ $article->title }}"
                        class="readmore-image-img" width="190" height="120">
                </a>
                <p class="readmore-title">
                    <a href="{{ route('singleArticle', ['slug' => $article->slug]) }}">
                        {{ $article->title }}
                    </a>
                </p>
            </div>
        </div>
    @endforeach
</div>
