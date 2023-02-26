@extends('frontend.layouts.index', [
    'meta_title' => $author->alias_name,
    'meta_description' => "All the articles from {$author->alias_name}",
    'meta_keyword' => getSettingValue('meta_keyword'),
    'image' => getSettingValue('logo'),
    'type' => 'website'
])

@push('styles')
    @include('frontend.assets.css.category_min')
    <style>
        .fa-brands{font-family:"Font Awesome 6 Brands"}
        .author_image,.image{width:200px;height:200px}.intro{font-size:27px;font-weight:600;text-align:center;}.author-bio{display:flex;flex-direction:row;margin:20px 10px;padding:0 10px;gap:20px}.image{margin:auto 0}@media(max-width:520px){.author-bio{display:flex;flex-direction:column;margin:20px 0;gap:20px}.image{margin:0 auto}}.author_image{border-radius:100%;object-fit:cover;object-position:top}.description{font-size:19px;font-weight:500;color:#414141;letter-spacing:.5px;word-spacing:.9px;line-height:32px;text-align:justify; width:650px; }.fa-linkedin:before{content:"\f08c"; color:#0A66C2;}.fa-facebook:before{content:"\f09a";color:#2374E1;}.fa-twitter:before{content:"\f099"; color: #1D9BF0;}
    </style>
@endpush

@push('schema')
    {!! $schema !!}
@endpush


@section('content')
    <main class="container">
        <!-- BreadCrumb -->
        <div class="bc">
            <ul class="breadcrumb-container">
                <li class="breadcrumb">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-solid fa-home"></i> Home
                    </a>
                </li>
                ⇢
                <li class="breadcrumb active">
                    <span class="text-capitalize">
                        {{ $author->alias_name }}
                    </span>
                </li>
            </ul>
        </div>
        @if ($author->description)
        <section class="author-bio">
            <div class="image">
                <img class="author_image" src="{{ asset($author->avatar) }}" alt="">
            </div>
            <div class="description">
                <div class="intro">
                    About <span class="colored">{{ $author->alias_name }}</span>
                </div>
                <span style="font-size: 25px; display: block;">
                    @foreach (json_decode($author->social_links) as $key => $value)
                        @if($value)
                            <a href="{{ $value }}"><i class="fa-brands fa-{{$key}}"></i></a>
                        @endif
                    @endforeach
                </span>
                {!! $author->description !!}
            </div>
        </section>

        @endif

        <section class="category-div">
            <div class="container category-title">
                <h3 class="text-capitalize mb-4 mt-4">All Posts from
                    <span class="colored">
                        {{ $author->alias_name }}
                    </span>
                </h3>
            </div>
        </section>

        <!-- List -->
        <section class="category-section">
            <div class="container">
                @include('frontend.pages.articles', [
                    'articles' => $author->articles()->limit(9)->get(),
                ])

            </div>
        </section>
    </main>
@endsection

@push('scripts')
    @include('frontend.assets.js.author')
@endpush

