@push('styles')
    @include('frontend.assets.css.biography_min')
@endpush



<main>

        <div class="col-12 biography">
            <div class="row">
                <div class="col-lg-9 col-md-12 main-content-section">
                    <div class="bc">
                        <ul class="breadcrumb-container">
                            <li class="breadcrumb">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('frontend/svgs/home-icon-svgrepo-com.svg') }}" alt="" style="width: 16px; margin-bottom:5px;" width="20" height="15" > Home
                                </a>
                            </li>
                            ⇢
                            <li class="breadcrumb">
                                <a href="{{ route('singleArticle', $article->category->slug) }}/"
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

                    <div class="row">
                        @include('frontend.pages.article.components.title-section')


                        <div class="col-lg-4">
                            <div class="left-section">
                                <div class="featured-image">
                                    <div class="image">
                                        <figure class="m-0">
                                            <img src="{{ asset('/uploads/featured/'.$article->image) }}" alt="{{ $article->featured_image_alt_text }}"
                                                class="image_img" width="425" height="300">
                                        </figure>
                                    </div>
                                </div>
                                @include('frontend.pages.article.components.facts')
                            </div>
                        </div>
                        <div class="right-section col-lg-8">
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
                            <div class="col-md-12">
                                @include('frontend.pages.article.components.tags')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 sidebar-section">
                    <div class="sidebar-section-wrap">
                        @if (count($sidebar_articles)>0)
                            @include('frontend.pages.article.components.sidebar')
                        @endif
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
        </div>

</main>
