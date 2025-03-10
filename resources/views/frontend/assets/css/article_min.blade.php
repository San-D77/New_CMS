<style>
    /*! CSS Used from: Embedded */
*,::after,::before{box-sizing:border-box;}
body{margin:0;font-family:var(--bs-font-sans-serif);font-size:1rem;font-weight:400;line-height:1.5;color:#212529;background-color:#fff;-webkit-text-size-adjust:100%;-webkit-tap-highlight-color:transparent;}
hr{margin:1rem 0;color:inherit;background-color:currentColor;border:0;opacity:.25;}
hr:not([size]){height:1px;}
h1,h2,h3{margin-top:0;margin-bottom:.5rem;font-weight:500;line-height:1.2;}
h1{font-size:calc(1.375rem + 1.5vw);}
@media (min-width:1200px){
h1{font-size:2.5rem;}
}
h2{font-size:calc(1.325rem + .9vw);}
@media (min-width:1200px){
h2{font-size:2rem;}
}
h3{font-size:calc(1.3rem + .6vw);}
@media (min-width:1200px){
h3{font-size:1.75rem;}
}
p{margin-top:0;margin-bottom:1rem;}
ul{padding-left:2rem;}
ul{margin-top:0;margin-bottom:1rem;}
ul ul{margin-bottom:0;}
blockquote{margin:0 0 1rem;}
strong{font-weight:bolder;}
a:hover{color:#0a58ca;}
a:not([href]):not([class]),a:not([href]):not([class]):hover{color:inherit;text-decoration:none;}
figure{margin:0 0 1rem;}
img{vertical-align:middle;}
table{caption-side:bottom;border-collapse:collapse;}
tbody,td,tr{border-color:inherit;border-style:solid;border-width:0;}
button{border-radius:0;}
button:focus{outline:dotted 1px;outline:-webkit-focus-ring-color auto 5px;}
button,input{margin:0;font-family:inherit;font-size:inherit;line-height:inherit;}
button{text-transform:none;}
[type=button],button{-webkit-appearance:button;}
[type=button]:not(:disabled),button:not(:disabled){cursor:pointer;}
iframe{border:0;}
.img-fluid{max-width:100%;height:auto;}
.container{width:100%;padding-right:var(--bs-gutter-x,.75rem);padding-left:var(--bs-gutter-x,.75rem);margin-right:auto;margin-left:auto;}
@media (min-width:576px){
.container{max-width:540px;}
}
@media (min-width:768px){
.container{max-width:720px;}
}
@media (min-width:992px){
.container{max-width:960px;}
}
@media (min-width:1200px){
.container{max-width:1140px;}
}
@media (min-width:1400px){
.container{max-width:1320px;}
}
.row{--bs-gutter-x:1.5rem;--bs-gutter-y:0;display:flex;flex-wrap:wrap;margin-top:calc(var(--bs-gutter-y) * -1);margin-right:calc(var(--bs-gutter-x)/ -2);margin-left:calc(var(--bs-gutter-x)/ -2);}
.row>*{flex-shrink:0;width:100%;max-width:100%;padding-right:calc(var(--bs-gutter-x)/ 2);padding-left:calc(var(--bs-gutter-x)/ 2);margin-top:var(--bs-gutter-y);}
.col-12{flex:0 0 auto;width:100%;}
@media (min-width:768px){
.col-md-4{flex:0 0 auto;width:33.3333333333%;}
.col-md-6{flex:0 0 auto;width:50%;}
.col-md-12{flex:0 0 auto;width:100%;}
}
@media (min-width:992px){
.col-lg-3{flex:0 0 auto;width:25%;}
.col-lg-4{flex:0 0 auto;width:33.3333333333%;}
.col-lg-6{flex:0 0 auto;width:50%;}
.col-lg-8{flex:0 0 auto;width:66.6666666667%;}
.col-lg-12{flex:0 0 auto;width:100%;}
}
@media (min-width:1200px){
.col-xl-6{flex:0 0 auto;width:50%;}
}
.form-control{display:block;width:100%;padding:.375rem .75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#212529;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;-webkit-appearance:none;-moz-appearance:none;appearance:none;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
@media (prefers-reduced-motion:reduce){
.form-control{transition:none;}
}
.form-control:focus{color:#212529;background-color:#fff;border-color:#86b7fe;outline:0;box-shadow:0 0 0 .25rem rgba(13,110,253,.25);}
.form-control::placeholder{color:#6c757d;opacity:1;}
.form-control:disabled{background-color:#e9ecef;opacity:1;}
.collapse:not(.show){display:none;}
.nav-link{display:block;padding:.5rem 1rem;text-decoration:none;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;}
@media (prefers-reduced-motion:reduce){
.nav-link{transition:none;}
}
.navbar{position:relative;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;padding-top:.5rem;padding-bottom:.5rem;}
.navbar>.container{display:flex;flex-wrap:inherit;align-items:center;justify-content:space-between;}
.navbar-brand{padding-top:.3125rem;padding-bottom:.3125rem;margin-right:1rem;font-size:1.25rem;text-decoration:none;white-space:nowrap;}
.navbar-nav{display:flex;flex-direction:column;padding-left:0;margin-bottom:0;list-style:none;}
.navbar-nav .nav-link{padding-right:0;padding-left:0;}
.navbar-collapse{align-items:center;width:100%;}
.navbar-toggler{padding:.25rem .75rem;font-size:1.25rem;line-height:1;background-color:transparent;border:1px solid transparent;border-radius:.25rem;transition:box-shadow .15s ease-in-out;}
@media (prefers-reduced-motion:reduce){
.navbar-toggler{transition:none;}
}
.navbar-toggler:hover{text-decoration:none;}
.navbar-toggler:focus{text-decoration:none;outline:0;box-shadow:0 0 0 .25rem;}
.navbar-toggler-icon{display:inline-block;width:1.5em;height:1.5em;vertical-align:middle;background-repeat:no-repeat;background-position:center;background-size:100%;}
@media (min-width:992px){
.navbar-expand-lg{flex-wrap:nowrap;justify-content:flex-start;}
.navbar-expand-lg .navbar-nav{flex-direction:row;}
.navbar-expand-lg .navbar-nav .nav-link{padding-right:.5rem;padding-left:.5rem;}
.navbar-expand-lg .navbar-collapse{display:flex!important;}
.navbar-expand-lg .navbar-toggler{display:none;}
}
.breadcrumb{display:flex;flex-wrap:wrap;padding:0 0;margin-bottom:1rem;list-style:none;}
.d-block{display:block!important;}
.d-flex{display:flex!important;}
.d-none{display:none!important;}
.justify-content-end{justify-content:flex-end!important;}
.m-0{margin:0!important;}
.mx-1{margin-right:.25rem!important;margin-left:.25rem!important;}
.mx-2{margin-right:.5rem!important;margin-left:.5rem!important;}
.mx-auto{margin-right:auto!important;margin-left:auto!important;}
.mt-3{margin-top:1rem!important;}
.mt-4{margin-top:1.5rem!important;}
.mb-4{margin-bottom:1.5rem!important;}
.pt-3{padding-top:1rem!important;}
.pb-3{padding-bottom:1rem!important;}
.text-uppercase{text-transform:uppercase!important;}
.text-capitalize{text-transform:capitalize!important;}
.text-center{text-align:center!important;}
@media (min-width:992px){
.d-lg-block{display:block!important;}
.pt-lg-0{padding-top:0!important;}
}
/*! CSS Used from: Embedded */
body a{color:#454545;}
p{text-align:justify!important;}
#myBtn,#search-container{display:none;}
#search-container form{display:flex;gap:10px;padding-top:10px;}
.close-search{padding-top:5px;font-weight:400;font-size:20px;}
.navbar-nav .nav-item{position:relative;text-transform:uppercase;}
.dropdown-mobile,.navbar-nav .dropdown-list{display:none;list-style:none;}
.display-menu,.navbar-nav .nav-link:hover>ul{display:block;}
.parent:hover>.fa-caret-down,.rotate-icon{transform:rotate(90deg);}
.navbar-nav .dropdown-list{position:absolute;background:#3a3b3c;top:90%;left:0;border-radius:0 0 7px 7px;min-width:300px;padding:20px 0;}
.navbar-nav .dropdown-list li{float:none;padding:15px 10px;}
.navbar-nav .dropdown-list li a{color:#fff;}
.nav-item:active,.nav-item:hover{background:0 0!important;}
blockquote{position:relative;}
.panel-title:active,.panel-title:focus,.panel-title:hover{text-decoration:none;}
::selection{background:#012835;color:#d2d2d4;}
.instagram-media,.twitter-tweet{margin:auto!important;}
.meta{margin:0;}
iframe{width:100%;}
body{font-family:Helvetica, Sans-serif;letter-spacing:.3px;}
blockquote{background:linear-gradient(to right, #9f9f9f, #c4c3c3 50%, #eee 100%)!important;font-style:italic;font-weight:500;font-size:1.15rem;margin:25px;padding:10px 20px 10px 24px;border-top-right-radius:20px;border-bottom-right-radius:5px;max-width:85%;}
blockquote::before{content:"";left:0;position:absolute;height:100%;bottom:0;width:6px;background:rgba(39, 37, 36, .8)!important;border-radius:20px;}
.meta{padding:0;text-align:right;display:block;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;}
.bc{display:-webkit-box;overflow:hidden;-webkit-line-clamp:1;-webkit-box-orient:vertical;}
.breadcrumb-container{text-transform:uppercase;display:inline;margin:10px 0;padding:0;list-style:none;}
.breadcrumb-container li{display:inline;font-size:15px;line-height:30px;font-weight:600;color:#555657;}
.breadcrumb-container li a{color:#3535b1;position:relative;}
.article-author a:hover,.breadcrumb-container li a:hover{color:#00a6ff;}
.panel-title::before{font-size:14px!important;}
.panel-title::before{content:"Hide";float:right!important;padding:5px;background:rgba(127, 167, 181, .668);color:#484545;border-radius:5px;}
@media (max-width:720px){
#navScroll-btn{display:none;}
}
.footer-section{background:#151414;}
.footer-section ul{margin:0 35px 0 0;padding:0;list-style:none;display:flex;flex-direction:row;color:#d2d2d4;font-size:13px;}
.footer-section li a{color:#d4d4d2;}
.footer-section .footer-content{padding:0 35px;position:relative;z-index:2;}
.footer-section .footer-logo h2 a{color:#b0aeae!important;font-size:24px;text-transform:uppercase;letter-spacing:5px;}
.footer-section .copyright-text p{margin:0;font-style:italic;font-size:12px;color:#d2d2d2;}
.footer-section .copyright-text p a,.navbar #sidebar .menu li a:hover,.navbar #sidebar .sub-menu li a:hover{color:#fff!important;}
.footer-section ul li{margin-right:15px;}
a{text-decoration:none!important;}
.container{max-width:1200px;}
.adver{margin-top:20px;margin-bottom:20px;}
main{padding-bottom:50px;}
.category-segment{color:#fff;border-bottom:3px solid #1e2129;margin:0;}
.category-segment span{background-color:#1e2129;border-top-left-radius:3px;border-top-right-radius:3px;font-size:18px;padding:7px 10px 4px;margin:0;}
.heading{font-weight:400!important;text-transform:uppercase;}
.heading{font-size:16px!important;}
header{position:-webkit-sticky;position:sticky;background-color:#fff;top:0;z-index:87;}
header .navbar{height:70px;padding:0;background-color:#242526;}
.article-author,.article-author a,.article-date{color:#555657;font-weight:700;padding:5px 0;font-size:11px;}
header .navbar .brand-logo{padding:0;font-size:20px;font-weight:600;text-transform:uppercase;letter-spacing:3px;color:#2f3846;margin-left:20px;}
header .navbar .navbar-brand{padding:0;font-size:26px;line-height:200%;font-weight:500;color:#d4d2d2!important;align-items:center;text-align:center;text-transform:uppercase;letter-spacing:3px;transition:.3s;}
@media (max-width:820px){
p{text-align:left!important;}
.navbar-brand{padding:10px 0 0 0!important;margin:0!important;}
header .navbar .navbar-brand{padding:0;font-size:26px;line-height:125%;font-weight:500;color:#d4d2d2!important;align-items:center;text-align:center;text-transform:uppercase;letter-spacing:3px;transition:.3s;}
}
header .navbar .navbar-brand:hover{font-weight:500;color:#878787!important;text-transform:uppercase;letter-spacing:3px;}
header .navbar .navbar-brand img{width:130px;height:40px;margin-top:10px;}
@media (max-width: 500px){
header .navbar .navbar-brand img{width:130px;height:45px;margin-top:5px;}
}
@media (min-width: 505px) and (max-width: 820px){
header .navbar .navbar-brand img{width:130px;height:40px;margin-top:10px;}
}
header .navbar .navbar-nav .nav-item .nav-link{font-size:13px!important;font-weight:700!important;line-height:20px!important;color:#d4d2d2!important;letter-spacing:1px;position:relative;}
header .navbar .navbar-nav .nav-item .active,header .navbar .navbar-nav .nav-item .nav-link:hover{background-color:#3a3b3c;border-radius:5px;}
@media (max-width:720px){
.navbar-brand{line-height:200%;}
}
.article-date{display:inline-block;margin:0;}
.article-author,.article-author a{margin:0;display:inline;}
@media (max-width:992px){
.navbar-brand{-webkit-transform:translateX(-50%);transform:translateX(-50%);left:50%;top:-4px;position:absolute;}
}
#myBtn{position:fixed;bottom:20px;right:30px;z-index:99;border:none;outline:0;background-color:#878787!important;color:#fff;cursor:pointer;padding:1rem;border-radius:50px;width:50px;height:50px;-webkit-transition:.2s;transition:.2s;}
#myBtn:hover{background-color:#888!important;}
.search{color:#fff;cursor:pointer;}
.search #search-label{font-size:20px;cursor:pointer;color:#fff;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;z-index:100;}
input{z-index:130;}
.navbar #sidebar,.sidebar-overlay{top:0;left:-100%;position:fixed;width:100%;}
.navbar #sidebar{background-color:#2a2726!important;color:#fff!important;height:100vh;margin:0;z-index:100;overflow-y:auto;-webkit-transition:.2s cubic-bezier(.17, .67, .83, .67);transition:.2s cubic-bezier(.17, .67, .83, .67);}
.navbar #sidebar .sidebar__btn-close{cursor:pointer;text-align:center;font-size:29px;margin-top:10px;margin-right:10px;margin-left:10px;width:15%;line-height:60px;height:45px;}
.navbar #sidebar .menu,.navbar #sidebar .sub-menu{list-style:none;margin:0;padding:0;}
.navbar #sidebar .menu li{padding:5px;border-bottom:1px solid #fff!important;}
.navbar #sidebar .menu li:hover,.navbar #sidebar .sub-menu li:hover{background-color:#020739;}
.navbar #sidebar .menu li a,.navbar #sidebar .sub-menu li a{color:#fff;-webkit-transition:.2s;transition:.2s;text-transform:uppercase;}
.navbar #sidebar .sub-menu li{padding:5px;border-bottom:1px solid #a9aaac;}
.navbar .btn-menu{border:none;border-radius:5px;color:transparent;cursor:pointer;outline:0;padding-left:0;-webkit-animation:2s fadein;animation:2s fadein;}
.sidebar-overlay{background:rgba(0, 0, 0, .5);height:100%;z-index:86;}
@media (min-width:992px){
.navbar #sidebar{width:20%;position:fixed;left:-100%;top:0;}
}
/*! CSS Used from: Embedded */
.one-set{margin-left:5px;}
.faq-question::before{content:"❖";margin-right:5px;font-weight:500;}
.faq-answer::before{content:"✦";margin-right:5px;font-weight:500;}
.faq-question{font-size:22px;font-weight:600;}
.faq-answer{font-size:19px;margin-left:25px;font-weight:400;}
/*! CSS Used from: Embedded */
.twitter-tweet{margin:0 auto!important;}
h1{text-transform:capitalize;}
.meta-property,.meta-property a{flex:1;margin:0;color:#555657;font-weight:700;padding:5px 0;font-size:11px;}
.meta-section{display:flex;margin-bottom:10px;}
.featured-image img{border-radius:5px;margin-bottom:15px;object-fit:cover;object-position:top;}
@media (max-width:525px){
.featured-image img{border-radius:5px;margin-bottom:15px;object-fit:cover;object-position:top;width:100%;height:250px;}
}
@media (min-width:825px){
.featured-image img{border-radius:5px;margin-bottom:15px;max-width:728px;min-width:728px;max-height:455px;min-height:455px;object-fit:cover;object-position:top;}
}
h1{font-size:2rem;font-weight:600;max-width:728px;}
.main-section{margin-top:25px;}
.content-detail figure{width:80%;margin:10px auto;display:block;text-align:center;border:1px solid #ddd8d8;padding:10px;border-radius:5px;}
@media (max-width:525px){
.content-detail figure{width:100%;margin:10px 0px;}
}
.content-detail figure.image img{width:100%;}
.content-detail figure figcaption{padding:0 5px;font-size:.85rem;font-weight:300;margin:auto;width:95%;text-align:center;font-style:italic;}
.content-detail img{width:100%;height:auto;object-fit:cover;object-position:top;}
.content-detail{margin-top:5px;font-size:16px;font-weight:400;line-height:28px;max-width:728px;color:#212121;}
.content-detail a{color:#00f;font-weight:700;}
.content-detail h2,.content-detail h3{font-weight:600;max-width:728px;line-height:2.7rem;text-transform:capitalize;scroll-margin-top:100px;}
.content-detail a:hover{color:#00a6ff;text-decoration:underline!important;text-underline-offset:5px;transition:text-underline-offset .3s;}
.content-detail a:visited{color:#a90b7e;}
.content-detail h2{font-size:1.75rem;}
.content-detail h3{font-size:1.4rem;}
.sidebar-section{position:relative;margin-bottom:30px;padding-left:15px;}
.sidebar-section-wrap{position:sticky;top:4rem;}
.post-section,.sidebar-section-wrap .sidebar-post{display:flex;}
.tags .single-tag,.tags a{display:inline-block;}
.sidebar-section-wrap .sidebar-post .image{width:30%;margin-right:10px;}
.sidebar-section .sidebar-post .image_img{min-width:100%;max-height:70px;min-height:70px;object-fit:cover;object-position:top;border-radius:5px;}
.sidebar-post .sidebar-post-title{width:65%;max-height:70px;min-height:70px;}
.sidebar-post .sidebar-post-title h2{font-size:15px;line-height:25px;font-weight:700;display:-webkit-box;overflow:hidden;-webkit-line-clamp:2;-webkit-box-orient:vertical;}
.tags a{text-transform:uppercase;color:#f6f6f6!important;padding:6px 12px 5px;margin-right:8px;margin-bottom:8px;font-size:12px!important;font-weight:400!important;background:#241f1f;border:1px solid #241f1f;border-radius:5px;transition:.3s;-webkit-transition:.3s;-moz-transition:.3s;outline:0;}
.tags a:hover{color:#212121!important;background-color:#e7e7e7!important;border-color:#e7e7e7!important;}
.similar-post-section .similar-post{display:flex;flex-direction:column!important;flex:1;margin-bottom:20px;padding:0;border:1px solid rgba(122, 122, 122, .8);border-radius:20px;box-shadow:2px 1px rgba(31, 30, 30, .7);width:100%;}
.similar-post-section .image_img{border-top-right-radius:20px;border-top-left-radius:20px;min-width:100%;max-width:100%;max-height:230px;min-height:230px;object-fit:cover;object-position:top;}
.similar-post-section .similar-post-title{padding:15px 15px 0;font-weight:600;color:#1f1a1a;font-size:15px;display:flex!important;flex-direction:column!important;justify-content:space-between;flex:1;}
.similar-post-title .title{display:-webkit-box;overflow:hidden;-webkit-line-clamp:2;-webkit-box-orient:vertical;}
@media (max-width:820px){
body{overflow-x:hidden;}
}
.social-share{flex:1;margin-right:40px;text-align:right;}
@media (max-width:500px){
.social-share{flex:1;margin-right:0;}
}
.table-of-contents{background-color:#f8f9fa;padding:10px;border:1px solid #a2a9b1;border-radius:5px;}
.contents-heading:hover{color:#000;cursor:pointer;}
.table-of-contents ul{list-style:circle;color:#454545;}
.head-2{padding-left:0;font-size:1rem;font-weight:600;margin-bottom:10px;}
.head-3{margin-left:30px;font-weight:500;font-size:1rem;margin-bottom:10px;}
.also-read{margin:10px;border:1px solid #ccc;border-radius:10px;background-color:rgb(209, 239, 255);}
.articles{padding:0px 20px 10px 5px;margin:0px;}
.also-read-article{display:flex;flex-direction:row;gap:10px;}
@media (min-width: 600px){
.articles .col-md-6{width:48%;}
}
.also-read-article .also-read-image{width:100px;height:90px;}
.also-read-intro{padding:10px 15px 0px 15px;font-size:20px;font-weight:600;color:#dd3000;}
.also-read-article a,.also-read-article a:visited{color:#333;text-decoration:none!important;margin:0px;padding:0px;display:-webkit-box;-webkit-line-clamp:3;overflow:hidden;-webkit-box-orient:vertical;}
table{display:block;border:1px solid #ddd;}
td{width:100%;padding:10px;text-align:left;}
tbody{display:block;min-width:100%;max-height:400px;overflow:auto;}
tr:nth-child(even){background-color:#d6d4d4;}
tr:nth-child(1){background-color:#aaf8d8;font-weight:700!important;font-size:18px;}
tr:hover{background-color:rgb(178, 178, 178);}
#myBtn{position:fixed;bottom:20px;right:30px;z-index:99;border:none;outline:0;background-color:#878787!important;color:#fff;cursor:pointer;padding:1rem;border-radius:50px;width:50px;height:50px;-webkit-transition:.2s;transition:.2s;}
#myBtn:hover{background-color:#888!important;}.readmore-container{border:1px solid #ccc;border-radius:5px;margin:7px 2px;padding:10px;background:#e9f8fa}.readmore-title,.readmore-title a,.readmore-title a:visited{font-size:17px;margin-top:5px;font-weight:700;color:#000;text-decoration:none!important;line-height:25px;text-align:left!important}.readmore-title{margin:0;padding:0;display:-webkit-box;-webkit-line-clamp:3;overflow:hidden;-webkit-box-orient:vertical}@media(max-width:520px){.readmore-title{display:-webkit-box;-webkit-line-clamp:3;overflow:hidden;-webkit-box-orient:vertical}}.readmore-text{margin-left:2px;font-size:22px;font-weight:700;color:#c41111}.readmore-image{display:flex;flex-direction:row;gap:10px;margin-bottom:10px}.readmore-image-img{width:100px!important;height:80px!important}
</style>
