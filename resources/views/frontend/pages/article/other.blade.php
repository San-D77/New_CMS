@push('styles')
    @include('frontend.assets.css.article_min')
@endpush


<main class="container">
    <div class="row main-section">
        <div class="col-lg-8 article-section">
            <div class="bc">
                <ul class="breadcrumb-container">
                    <li class="breadcrumb">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('frontend/svgs/home-icon-svgrepo-com.svg') }}" alt="" style="margin-bottom:5px;" width="20" height="15">Home
                        </a>
                    </li>
                    ⇢
                    <li class="breadcrumb">
                        <a href="{{ route('singleArticle', $article->category->slug) }}"
                            class="text-capitalize">
                            {{ $article->category->slug }}
                        </a>
                    </li>
                    ⇢
                    <li class="breadcrumb active text-capitalize">
                        <span>
                            {{ $article->title }}
                        </span>
                    </li>
                </ul>

            </div>

            @include('frontend.pages.article.components.title-section')

            <div class="featured-image">
                <img src="{{ asset('/uploads/featured/'.$article->image) }}" class=""
                alt="{{ $article->featured_image_alt_text }}" width="750" height="500">
            </div>
            @include('frontend.pages.article.components.table_of_content')
            <div class="content-detail">
                <p>
                    {!! $article->body !!}
                </p>
                @isset($article->faq)
                    <h2>FAQs</h2>
                    @if(count(json_decode($article->faq))>0)
                        @foreach (json_decode($article->faq) as $faq)
                            <div class="one-set">
                                <p class="faq-question">{!! $faq->question !!}</p>
                                <p class="faq-answer">{!! $faq->answer !!}</p>
                            </div>
                        @endforeach
                    @endif
                @endisset
            </div>
        </div>
        <div class="col-md-12">
            @include('frontend.pages.article.components.tags')
        </div>
        <div class="col-lg-4 sidebar-section mt-3">
            <div class="sidebar-section-wrap">

            </div>
        </div>

    </div>
    <div class="heading mt-4 mb-4">
        <div class="category-segment">
            <span>More on  {{$article->category->title}}</span>
        </div>
    </div>
    <div class="similar-post-section">

    </div>
</main>
