<script>
    document.addEventListener("DOMContentLoaded",function(e){document.querySelectorAll("a").forEach(e=>{-1===e.href.indexOf(location.hostname)&&(e.target="_blank",e.rel="noopener")})});const loadImage=()=>{if("loading"in HTMLImageElement.prototype)document.querySelectorAll("img").forEach(e=>{e.dataset.src&&(e.src=e.dataset.src)});else{let e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js",document.body.appendChild(e)}};setTimeout(()=>{loadImage()},1e3);var el=document.querySelectorAll(".sidebar .dropdown-trigger");el.forEach(e=>{e.addEventListener("click",()=>{var l,t=e.parentElement.querySelector(".dropdown-mobile");e.parentElement.querySelector(".fa-caret-down").classList.toggle("rotate-icon"),t.classList.toggle("display-menu")})}),window.addEventListener("load",()=>{var e=document.querySelector("#search-label"),l=document.querySelector(".search-box"),t=document.querySelector("#search-container"),r=document.querySelector(".close-search");e.addEventListener("click",()=>{t.style.display="block",e.style.display="none",l.focus()}),r.addEventListener("click",()=>{t.style.display="none",e.style.display="block"})});
</script>
