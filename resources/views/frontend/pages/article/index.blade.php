@extends('frontend.layouts.index', [
    'meta_title' => $article->seo->meta_title,
    'meta_description' => $article->seo->meta_description,
    'meta_keyword' => $article->seo->meta_keyword,
    'image' => $article->image,
    'type' => 'article',
])


@push('schema')
    {!! $article->schema !!}
    {!! $article->faq_schema !!}
@endpush

@push('styles')
    <style>
        .one-set{margin-left:5px}.faq-question::before{content:"❖";margin-right:5px;font-weight:500}.faq-answer::before{content:"✦";margin-right:5px;font-weight:500}.faq-question{font-size:22px;font-weight:600}.faq-answer{font-size:19px;margin-left:25px;font-weight:400}
    </style>
@endpush

@push('head')
    <meta name="article:author" content="{{ $article->author->alias_name }}">
    <meta name="article:published_time" content="{{ $article->published_at }}">
    <meta property="og:article:published_time" content="{{ $article->published_at }}">
@endpush

@section('content')
    @if ($article->tables)
        @include('frontend.pages.article.biography')
    @else
        @include('frontend.pages.article.other')
    @endif
@endsection



@push('scripts')
    @include('frontend.assets.js.article')
@endpush
