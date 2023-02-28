@extends('frontend.layouts.index')

@push('styles')
    @include('frontend.assets.css.error_min')
@endpush


@section('content')
    <main class="container">
        <div id="notfound">
            <div class="notfound-bg"></div>
            <div class="notfound">
                <div class="notfound-404">
                    <h1>404</h1>
                </div>
                <h2>Oops! Page Not Found!</h2>
                <h2>The page you are looking for does not exist or has been removed!

                </h2>
                <a href="{{ url('/') }}" style="font-size:20px; font-weight:600;color:#4a300e">Back To Homepage</a>
            </div>
        </div>
    </main>
@endsection
