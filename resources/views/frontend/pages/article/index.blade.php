@extends('frontend.layouts.index', [
    'meta_title' => $article->seo->meta_title,
    'meta_description' => $article->seo->meta_description,
    'meta_keyword' => $article->seo->meta_keyword,
    'image' => $article->image,
    'type' => 'article',
])


@push('schema')
    {!! $article->schema !!}
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

<script>
        const tblOfContents = document.querySelector('.table-of-contents');
        document.getElementById('collapse-btn').addEventListener('click', function() {
            if (this.getAttribute('aria-expanded') == 'true') {
                this.setAttribute('aria-expanded', 'false');
                this.classList.add('collapsed');
                document.getElementById('collapseOne').classList.remove('show');
                tblOfContents.classList.remove('content-height');
            } else {
                this.setAttribute('aria-expanded', 'true');
                this.classList.remove('collapsed');
                document.getElementById('collapseOne').classList.add('show');
                tblOfContents.classList.add('content-height')
            }
        });
    </script>
    <script>
        var headingList = document.querySelector('.content-detail').querySelectorAll("h2");
        var contentSection = document.querySelector('.list');

        // Slugify function
        function string_to_slug(str) {
            str = str.toLowerCase().trim();
            str = str.replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes
            return str;
        }

        if (headingList.length == 0) {
            document.querySelector('.table-of-contents').style = "display:none;"
        }

        for (var i = 0; i < headingList.length; i++) {
            if (headingList[i].localName == 'h2') {
                var slug = string_to_slug(headingList[i].innerText);
                headingList[i].id = `${slug}`
                contentSection.innerHTML += `<li class="head-2"><a href="#${slug}">${headingList[i].innerText}</a></li>`
            } else if (headingList[i].localName == 'h3') {
                var slug = string_to_slug(headingList[i].innerText);
                contentSection.innerHTML += `<li class="head-3"><a href="#${slug}">${headingList[i].innerText}</a></li>`
                headingList[i].id = `${slug}`
            } else if (headingList[i].localName == 'h4') {
                var slug = string_to_slug(headingList[i].innerText);
                contentSection.innerHTML += `<li class="head-4"><a href="#${slug}">${headingList[i].innerText}</a></li>`
                headingList[i].id = `${slug}`
            } else if (headingList[i].localName == 'h5') {
                var slug = string_to_slug(headingList[i].innerText);
                contentSection.innerHTML += `<li class="head-5"><a href="#${slug}">${headingList[i].innerText}</a></li>`
                headingList[i].id = `${slug}`
            } else if (headingList[i].localName == 'h6') {
                var slug = string_to_slug(headingList[i].innerText);
                contentSection.innerHTML += `<li class="head-6"><a href="#${slug}">${headingList[i].innerText}</a></li>`
                headingList[i].id = `${slug}`
            }
        }
    </script>

    <script>
        setTimeout(() => {
            fetch("{{ route('ajax.youMayAlsoLike', $article->id) }}")
                .then(res => res.json())
                .then(res => {
                    document.querySelector('.sidebar-section-wrap').innerHTML = res.data.youMayAlsoLike;
                    document.querySelector('.similar-post-section').innerHTML = res.data.more;
                    // document.querySelector('.table-holder').innerHTML = res.data.tables ?? '';
                    // document.querySelector('.view-count').innerHTML = res.value;
                }).catch(err => {
                    console.log(err);
                })
        }, 5000);
    </script>


    <script>
        var page = 1;
        var loading = 0;
        var extra = 500;
        window.onscroll = function() {
            const scrollContent = document.getElementById('scroll-content');
            if (scrollContent && window.innerHeight + window.scrollY > scrollContent.offsetHeight - extra && loading ===
                0) {
                // extra = 0;
                loading = 1;
                fetch("{{ route('categoryArticles', $article->category->slug) }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            "X-Requested-With": "XMLHttpRequest",
                            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            page,
                        })
                    })
                    .then(response => response.json())
                    .then(d => {

                        if (d && d.length > 0) {
                            // var r = d.data;
                            var html = '';

                            for (let index = 0; index < d.length; index++) {
                                html += `<div class="col-md-4 col-lg-3 post-section article-card">`;
                                html +=
                                    '<div class="similar-post">';
                                html += '<div class="image">';
                                html += '<figure class="m-0">';
                                html += '<a href="' + d[index].url + '">';
                                html += '<img src="' + d[index].image + '" alt="" class="image_img img-fluid">';
                                html += '</a>';
                                html += '</figure>';
                                html += '</div>';
                                html +=
                                    '<div class="similar-post-title">';
                                html += '<div class="title mb-3">';
                                html += '<a href="' + d[index].url + '">';
                                html += d[index].title;
                                html += '</a>';
                                html += '</div>';
                                html += '<div class="meta"><p class = "article-date" >' + d[index]
                                    .published_at + ' | </p>';
                                html += '<p class="article-author">';
                                html += '<a href="' + d[index].author.url + '"> ' + d[index].author.name +
                                    '</a></p>';

                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }


                            scrollContent.insertAdjacentHTML('beforeend', html);
                            page++;
                            loading = 0;
                        }
                    })
            }
        }
    </script>



    <script>
        // count number of p tag in content-detail div
        var pTag = document.querySelectorAll('.content-detail p');

        // var pTag = document.querySelectorAll('p');
        var readMoreSection = Math.round(pTag.length / 2);
        fetch("{{ route('ajax.readMoreSectionAjax', $article->id) }}")
        .then(res => res.json())
        .then(res => {
            // remove and replace
            // get all read more section
            var readMoreSections = document.querySelectorAll('.readmore');
                // loop through all read more section
                if(readMoreSections.length > 0){
                    console.log("helloe");
                    for (let index = 0; index < readMoreSections.length; index++) {
                        // remove all read more section
                        readMoreSections[index].innerHTML = res.readMoreSection;
                    }
                }

                var splide = document.querySelectorAll("div.splide");
                if (splide.length > 0) {
                    var slider = document.querySelectorAll("slider");
                    for (let index = 0; index < slider.length; index++) {
                        slider[index].style.display = "";
                    }
                    new Splide('.splide', {
                        type: 'loop',
                        perPage: 4,
                        gap: '5px',
                        autoplay: true,
                        perMove: 1,
                        breakpoints: {
                            '820': {
                                perPage: 2,
                                gap: '10px',
                            },
                            '480': {
                                perPage: 1,
                                gap: '10px'
                            }
                        }
                    }).mount();

                }

            })
    </script>
@endpush
