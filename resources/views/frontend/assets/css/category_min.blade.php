<style>
    /*! CSS Used from: Embedded */
*,::after,::before{box-sizing:border-box;}
body{margin:0;font-family:var(--bs-font-sans-serif);font-size:1rem;font-weight:400;line-height:1.5;color:#212529;background-color:#fff;-webkit-text-size-adjust:100%;-webkit-tap-highlight-color:transparent;}
h2,h3{margin-top:0;margin-bottom:.5rem;font-weight:500;line-height:1.2;}
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
a:hover{color:#0a58ca;}
figure{margin:0 0 1rem;}
img{vertical-align:middle;}
button{border-radius:0;}
button:focus{outline:dotted 1px;outline:-webkit-focus-ring-color auto 5px;}
button,input{margin:0;font-family:inherit;font-size:inherit;line-height:inherit;}
button{text-transform:none;}
[type=button],button{-webkit-appearance:button;}
[type=button]:not(:disabled),button:not(:disabled){cursor:pointer;}
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
.col-md-6{flex:0 0 auto;width:50%;}
}
@media (min-width:992px){
.col-lg-4{flex:0 0 auto;width:33.3333333333%;}
.col-lg-6{flex:0 0 auto;width:50%;}
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
.btn{display:inline-block;font-weight:400;line-height:1.5;color:#212529;text-align:center;text-decoration:none;vertical-align:middle;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
@media (prefers-reduced-motion:reduce){
.btn{transition:none;}
}
.btn:hover{color:#212529;}
.btn:focus{outline:0;box-shadow:0 0 0 .25rem rgba(13,110,253,.25);}
.btn:disabled{pointer-events:none;opacity:.65;}
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
.mx-auto{margin-right:auto!important;margin-left:auto!important;}
.mt-3{margin-top:1rem!important;}
.mb-1{margin-bottom:.25rem!important;}
.mb-3{margin-bottom:1rem!important;}
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
::selection{background:#012835;color:#d2d2d4;}
.meta{margin:0;}
body{font-family:Helvetica, Sans-serif;letter-spacing:.3px;}
.meta{padding:0;text-align:right;display:block;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;}
.bc{display:-webkit-box;overflow:hidden;-webkit-line-clamp:1;-webkit-box-orient:vertical;}
.breadcrumb-container{text-transform:uppercase;display:inline;margin:10px 0;padding:0;list-style:none;}
.breadcrumb-container li{display:inline;font-size:15px;line-height:30px;font-weight:600;color:#555657;}
.breadcrumb-container li a{color:#3535b1;position:relative;}
.article-author a:hover,.breadcrumb-container li a:hover{color:#00a6ff;}
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
.colored{color:#00a6ff!important;}
.container{max-width:1200px;}
.adver{margin-top:20px;margin-bottom:20px;}
main{padding-bottom:50px;}
.load .btn{color:#313131!important;}
.load .btn{font-size:16px;font-weight:400;line-height:12px!important;border:1px solid #888!important;border-radius:5px!important;padding:15px 30px;-webkit-transition:.2s;transition:.2s;}
.load .btn:hover{background:#505050!important;border:1px solid #505050!important;border-radius:5px;color:#fff!important;}
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
.category-post .image,.category-post .image_img{max-height:230px;min-height:230px;width:100%;}
.category-post-container .single-post{display:flex;}
.category-section .category-post{display:flex;flex-direction:column!important;flex:1;margin-bottom:20px;padding:0;border:1px solid rgba(122, 122, 122, .8);border-radius:20px;box-shadow:2px 1px rgba(31, 30, 30, .7);min-width:100%;max-width:100%;}
.bc{margin-left:10px;}
.category-post .image_img{border-top-right-radius:20px;border-top-left-radius:20px;min-width:100%;object-fit:cover;object-position:top;}
.category-post .category-post-title{padding:15px 15px 0;font-weight:600;color:#1f1a1a;font-size:15px;display:flex!important;flex-direction:column!important;justify-content:space-between;flex:1;}
.category-post .category-post-title .title{display:-webkit-box;overflow:hidden;-webkit-line-clamp:2;-webkit-box-orient:vertical;}
</style>
