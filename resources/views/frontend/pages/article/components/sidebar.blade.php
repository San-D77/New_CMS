<div class="heading">
    <div class="category-segment">
        <span>You May Also Like</span>
    </div>
</div>
<div class="row">
    @isset ($sidebar_articles)
        @foreach ($sidebar_articles as $article )
            <div class="sidebar-post col-md-6 col-lg-12 mt-3">
                <div class="image">
                    <figure class="m-0">
                        <a href="{{ route('singleArticle', $article->slug) }}/">
                            <img src="{{ asset('/uploads/thumbnail/'.$article->image) }}" alt="{{ $article->title }}" class="image_img">
                        </a>
                    </figure>
                </div>
                <div class="sidebar-post-title mx-2">

                    <h2 class="title">
                        <a href="{{ route('singleArticle', $article->slug) }}/">
                            {{ $article->title  }}
                        </a>
                    </h2>
                </div>

            </div>
        @endforeach
    @endisset
</div>
