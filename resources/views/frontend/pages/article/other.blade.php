@push('styles')
    <link rel="stylesheet" defer href="{{ asset('') }}frontend/css/article.min.css" type="text/css">
@endpush


<main class="container">
    <div class="row main-section">
        <div class="col-lg-8 article-section">
            <div class="bc">
                <ul class="breadcrumb-container">
                    <li class="breadcrumb">
                        <a href="{{ url('/') }}">
                            Home
                        </a>
                    </li>
                    ⇢
                    <li class="breadcrumb">
                        <a href="{{ route('singleArticle', $article->category->slug) }}">
                            {{ $article->category->title }}
                        </a>
                    </li>
                    ⇢
                    <li class="breadcrumb active">
                        <span class="text-capitalize">
                            {{ $article->title }}
                        </span>
                    </li>
                </ul>
            </div>

            @include('frontend.pages.article.components.title-section')

            <div class="featured-image">
                <img src="{{ $article->image }}" class=""
                alt="{{ $article->featured_image_alt_text }}" width="750" height="500">
            </div>
            @include('frontend.pages.article.components.table_of_content')
            <div class="content-detail">
                {!! $article->body !!}
            </div>
        </div>
        <div class="col-lg-4 sidebar-section mt-3">
            <div class="sidebar-section-wrap">

            </div>
        </div>
        <div class="col-md-12">
            @include('frontend.pages.article.components.tags')
        </div>
    </div>
    <div class="similar-post-section ">
    </div>
</main>
