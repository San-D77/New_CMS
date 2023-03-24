@php
    $parentCategories = [];
    $childCategories = [];
    $soloCategories = [];

    foreach ($categories as $category){
        foreach ($categories as $cat){
            if ($category->id == $cat->parent_id){
                array_push($parentCategories, $category);
                break;
            }
        }
        if($category->parent_id == null){
            array_push($soloCategories, $category);
        }else{
            array_push($childCategories, $category);
        }
    }
    $soloCategories = array_diff($soloCategories, $parentCategories);

@endphp
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="d-flex">
                <button class="navbar-toggler btn-menu d-block" id="sidebarBtnOpen" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="">
                        <img src="{{ asset('frontend/svgs/align-left-svgrepo-com.svg') }}" alt="" style="width: 39px;" width="50" height="35">
                    </span>
                </button>
                <a href="{{ url('/') }}" class="ml-3 brand-logo d-none" id="navScroll-btn">
                    {{ getSettingValue('website_title') }}
                </a>
            </div>

            <a href="{{ url('/') }}" class="navbar-brand d-lg" style="padding-bottom: 15px">
               <img src=" {{ asset(getSettingValue('logo')) }}" height="50" width="150" alt="">
            </a>
            @php
                $current_url = isset($article) ? route('singleArticle', ['slug' => $article->category?->slug ?? 'null']) : Request::url();
            @endphp

            <div class="collapse navbar-collapse d-none d-lg-block menu-items" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto text-uppercase">
                    @foreach ($soloCategories as $category)
                        <li class="nav-item">
                            <a class="nav-link {{ $current_url == route('singleArticle', ['slug' => $category->slug]) ? 'active' : '' }}"
                                href="{{ route('singleArticle', ['slug' => $category->slug]) }}/">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                    @foreach ($parentCategories as $cat)
                        <li class="nav-item">

                            <div class="nav-link parent" style="padding:6px 8px;">
                                {{ $cat->title }}<img src="{{ asset('frontend/svgs/triangle-down-svgrepo-com.svg') }}" class="fa-caret-down" alt="" style="width: 28px;padding-bottom:3px; margin-left:-4px;" width="40" height="25">
                                 </i>
                                 <ul class="dropdown-list">
                                    @foreach ($childCategories as $c)
                                        @if ($cat->id == $c->parent_id)
                                            <li >
                                                <a class=" {{ $current_url == route('singleArticle', ['slug' => $c->slug]) ? 'active' : '' }}"
                                                    href="{{ route('singleArticle', ['slug' => $c->slug]) }}/">
                                                    {{ $c->title }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>


                        </li>
                    @endforeach

                </ul>
            </div>

            <div class="sidebar" id="sidebar">
                <div class="d-flex justify-content-end">
                    <div class="sidebar__btn-close" id="sidebarBtnClose">
                        <img src="{{ asset('frontend/svgs/cross-svgrepo-com.svg') }}" alt="" style="width: 30px;" width="40" height="25">
                    </div>
                </div>
                <ul class="pt-3 pt-lg-0 nav-menu menu">

                    @foreach ($soloCategories as $category)
                        <li class="nav-item">
                            <a class="nav-link {{ $current_url == route('singleArticle', ['slug' => $category->slug]) ? 'active' : '' }}"
                                href="{{ route('singleArticle', ['slug' => $category->slug]) }}/">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                    @foreach ($parentCategories as $cat)
                        <li class="nav-item">
                            <span id="{{ $cat->slug }}" class="nav-link dropdown-trigger text-uppercase">
                                {{ $cat->title }} <img src="{{ asset('frontend/svgs/triangle-down-svgrepo-com.svg') }}" alt="" style="width: 28px;padding-bottom:3px; margin-left:-4px;" class="fa-caret-down" width="45" height="30">
                            </span>
                            <ul class="dropdown-mobile text-uppercase">
                                @foreach ($childCategories as $c)
                                    @if ($cat->id == $c->parent_id)
                                        <li >
                                            <a class=""
                                                href="{{ route('singleArticle', ['slug' => $c->slug]) }}/">
                                                {{ $c->title }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <div class="sub">
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="/about-us" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contact-us" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="/privacy-policy" class="nav-link">Privacy Policy</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">Terms Conditions</a>
                        </li> --}}
                        <!-- <li class="nav-item">
                            <a href="Ads" class="nav-link">Ads</a>
                        </li> -->
                    </ul>
                </div>
        </div>

            <div class="search">
                <img src="{{ asset('frontend/svgs/magnifying-glass-8-svgrepo-com.svg') }}" alt="" width="40" height="25" style="width: 21px;" id="search-label">
                <div id="search-container">
                    <form action="/search/" method="get">
                        <input type="text" name="q" id="" class="form-control search-box">
                        <span class="close-search">X</span>
                    </form>
                </div>
            </div>

        </div>
    </nav>
</header>

