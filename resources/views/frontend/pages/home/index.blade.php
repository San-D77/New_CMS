@extends('frontend.layouts.index')
@push('styles')
    {{-- @include('frontend.assets.css.homepage')
    @include('frontend.assets.css.splide') --}}
     @include('frontend.assets.css.homepage_min')
@endpush
@push('schema')
    {!! getSettingValue('org_schema') !!}
@endpush

@push('scripts')
    @include('frontend.assets.js.splide')
    @include('frontend.assets.js.homepage')
@endpush


@section('content')
    <!-- Slider -->

    <main class="container">
        @if ($data['featured_articles']->count())
            @include('frontend.pages.home.components.slider')
        @endif


        @include('frontend.pages.home.components.first-section', [
            'section' => $data['category_articles'][0],
            'second' => $data['editor_choice']

        ])

        @foreach ($data['category_articles'] as $section)
            @if ($loop->iteration > 1)
                @include('frontend.pages.home.components.category-section', [
                    'section' => $section,
                ])
            @endif
        @endforeach

        <section id="born-today">
        </section>
        <section id="died-today">
        </section>
    </main>
@endsection
