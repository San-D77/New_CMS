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
        .col-md-12 { flex: 0 0 auto; width: 100%; }.author_image,.image{width:200px;height:200px}.intro{font-size:27px;font-weight:600;text-align:center;}.author-bio{display:flex;flex-direction:row;margin:20px 10px;padding:0 10px;gap:20px}.image{margin:auto 0}@media(max-width:520px){.desc{width:100%;}.author-bio{display:flex;flex-direction:column;margin:20px 0;gap:20px}.image{margin:0 auto}}.author_image{border-radius:100%;object-fit:cover;object-position:top}.description{font-size:19px;font-weight:500;color:#414141;letter-spacing:.5px;word-spacing:.9px;line-height:32px;text-align:justify; max-width:650px; }
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
                        <img src="{{ asset('frontend/svgs/home-icon-svgrepo-com.svg') }}" alt="" style="margin-bottom:5px;" width="20" height="15">Home
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
            <div class="description col-md-12">
                <div class="intro">
                    About <span class="colored">{{ $author->alias_name }}</span>
                </div>
                <span style="font-size: 25px; display: block;">
                    @foreach (json_decode($author->social_links) as $key => $value)
                        @if($value)
                            <a href="{{ $value }}"><img src="{{ asset('frontend/svgs/'.$key.'-svgrepo-com.svg') }}" alt="" style="width: 30px;" width="30" height="25"></a>
                        @endif
                    @endforeach
                </span>
                <div class="desc">
                    {!! $author->description !!}
                </div>
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

