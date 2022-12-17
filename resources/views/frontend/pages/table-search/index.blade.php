@php
function getTitle($value)
{
    $path = explode('/', Request::path())[2];
    switch ($path) {
        case 'birth-year':
        case 'birth-month':
            return "Celebrities born in <span class='colored'>$value</span>";
        case 'birth-day':
            return "Celebrities born on <span class='colored'>$value</span>";
            case 'nationality':
            return "<span class='colored'>$value</span> Celebrities";
        default:
            return "Celebrites of <span class='colored'>$value</span>";
    }
}
@endphp
@extends('frontend.layouts.index')
{{-- [
    'meta_title' => $author->alias_name,
    'meta_description' => "All the articles from {$author->alias_name}",
    'meta_keyword' => getSettingValue('meta_keyword'),
    'image' => getSettingValue('logo'),
    'type' => 'website'
] --}}

@push('styles')
    @include('frontend.assets.css.category')
@endpush


@section('content')
    <main class="container">


        <section class="category-div">
            <div class="container category-title">
                <h1 class="text-capitalize">{!! getTitle($value) !!}

                </h1>
            </div>
        </section>
        <!-- List -->
        <section class="category-section">
            <div class="container">
                @include('frontend.pages.articles', [
                    'articles' => $articles,
                ])
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    @include('frontend.assets.js.category')
@endpush
