@extends('frontend.layouts.index')

@push('styles')
    @include('frontend.assets.css.search_min')
@endpush

@section('content')
    <main class="container">

        <form action="/search/" method="get" class="col-lg-6 form">
            <input value="{{ isset($search_for)?$search_for:'' }}" type="text" name="q" id="" class="form-control search-place">
            <button type="submit" style="background:rgb(48, 48, 48); color:white; height: 30px; border-radius:10px; position:relative; right:0; top:23px;">Search</button>
        </form>


        <section class="category-div mt-3 mb-3">
            <div class="container category-title">
                <h3 class="text-capitalize">Search Results On <span class="colored">
                        {{ $search_for }}
                    </span></h3>
            </div>
        </section>
        <section class="search-results col-lg-8 col-md-11">
            @foreach ($articles as $article)
            <div class="single-article">
                <div class="image-section">
                    <a href="{{ route('singleArticle',$article->slug)}}/">
                        <img src="{{asset('/uploads/medium/'.$article->image)}}" width="300" alt="">
                    </a>
                </div>
                <div class="title-section">
                    <a href="/{{$article->slug}}">
                        <h2 class="article-title">{{ $article->title }}</h2>
                    </a>
                    <p class="summary">{!! $article->summary !!}</p>
                </div>
            </div>
            @endforeach

            @if(count($subArticles) > 0 )
                @foreach ($subArticles as $article)
                    <div class="single-article">
                        <div class="image-section">
                            <a href="{{ route('singleArticle',$article->slug)}}/">
                                <img src="{{asset('/uploads/medium/'.$article->image)}}" width="300" alt="">
                            </a>
                        </div>
                        <div class="title-section">
                            <a href="/{{$article->slug}}">
                                <h2 class="article-title">{{ $article->title }}</h2>
                            </a>
                            <p>{!! $article->summary !!}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
    </main>
@endsection
