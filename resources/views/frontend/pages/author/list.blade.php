@extends('frontend.layouts.index')

@push('styles')
    @include('frontend.assets.css.author_min')

    <style>
        .wrap{height:300px;display:flex;flex-direction:row;gap:25px;border:1px solid #cac9c9;box-shadow:.5px .5px #959494;margin-bottom:20px;border-radius:10px;padding:0 20px}.image,.title{margin:auto 0}.image_img{width:150px;height:150px;object-fit:cover;object-position:top;border-radius:100%}.title{font-size:23px;font-weight:600;color:#111}@media(max-width:820px){.wrap{flex-direction:column;gap:10px}.image,.title{margin:auto}}
    </style>
@endpush


@section('content')
    <main class="container">
        <div class="bc mx-4">
            <ul class="breadcrumb-container">
                <li class="breadcrumb">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-solid fa-home"></i>
                    </a>
                </li>
                ⇢
                <li class="breadcrumb active">
                    <span class="text-capitalize">
                        Authors
                    </span>
                </li>
            </ul>
        </div>

        <section class="category-div m-3">
            <div class="container category-title">
                <h3 class="text-capitalize">Our Authors</h3>
            </div>
        </section>

        <!-- List -->
        <section class="author-section">
            <div class="container">
                <div class="row">
                    @forelse ($authors as $author)
                        @if(count($author->articles)> 0)
                            <div class="col-md-6 author">
    
                               <div class="wrap">
    
                                    <div class="image"> 
                                        <a href="{{ route('authorArticle', $author->slug) }}">
                                            <img src="{{ asset($author->avatar) }}" alt="" class="image_img">
                                        </a>
                                    </div>
                                    <div class="title">
                                        <a href="{{ route('authorArticle', $author->slug) }}">
                                            {{ $author->alias_name }}
                                        </a>
                                    </div>
    
                               </div>
    
                            </div>
                        @endif
                    @empty
                        <p>No Authors Found</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection

