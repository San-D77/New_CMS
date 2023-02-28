<!DOCTYPE html>
<html lang="en">

<head>
    <meta name='robots' content='noindex' />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset(getSettingValue('favicon')) }}" sizes="64x64">

    <title>{{ unSlug($page->key) }}</title>
    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="theme-color" content="#111">
    <meta name="msapplication-navbutton-color" content="#111">
    <meta name="apple-mobile-web-app-status-bar-style" content="#111">
    <meta name="google-site-verification" content="{{ getSettingValue('google_search_console_code')  }}" />
    @include('frontend.assets.css.statitc-page_min')
</head>
<body>
    @include('frontend.layouts.partials.header')
    <div class="sidebar-overlay"></div>
    <main class="container">
        <div class="row main-section">
            <div class="col-lg-8 article-section">
                <div class="bc">
                    <ul class="breadcrumb-container">
                        <li class="breadcrumb">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/svgs/home-icon-svgrepo-com.svg') }}" alt="" style="width: 16px; margin-bottom:5px;" width="20" height="15" >Home
                            </a>
                        </li>
                        ⇢
                        <li class="breadcrumb active">
                            <span class="text-capitalize">
                                {{ unSlug($page->key) }}
                            </span>
                        </li>
                    </ul>
                </div>


                <div class="title">
                    <h1> {{ unSlug($page->key) }} </h1>

                </div>
                <div class="content-detail">
                    {!! $page->value !!}
                </div>
            </div>
        </div>

    </main>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <img style="position:absolute;top:3px; right:0px;" src="{{ asset('frontend/svgs/up-arrow-circle-svgrepo-com.svg') }}" width="50" height="auto;">
    </button>
    @include('frontend.assets.js.script')
    @include('frontend.assets.js.main')
    @include('frontend.layouts.partials.footer')
    @stack('scripts')
</body>
