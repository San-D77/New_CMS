<script>
    const tblOfContents=document.querySelector(".table-of-contents");document.getElementById("collapse-btn").addEventListener("click",function(){"true"==this.getAttribute("aria-expanded")?(this.setAttribute("aria-expanded","false"),this.classList.add("collapsed"),document.getElementById("collapseOne").classList.remove("show"),tblOfContents.classList.remove("content-height")):(this.setAttribute("aria-expanded","true"),this.classList.remove("collapsed"),document.getElementById("collapseOne").classList.add("show"),tblOfContents.classList.add("content-height"))});var headingList=document.querySelector(".content-detail").querySelectorAll(["h2","h3"]),contentSection=document.querySelector(".list");function string_to_slug(e){return e=(e=e.toLowerCase().trim()).replace(/\s+/g,"-").replace(/-+/g,"-")}0==headingList.length&&(document.querySelector(".table-of-contents").style="display:none;");for(var i=0;i<headingList.length;i++)if("h2"==headingList[i].localName){var e=string_to_slug(headingList[i].innerText);headingList[i].id=`${e}`,contentSection.innerHTML+=`<li class="head-2"><a href="#${e}">${headingList[i].innerText}</a></li>`}else if("h3"==headingList[i].localName){var e=string_to_slug(headingList[i].innerText);contentSection.innerHTML+=`<li class="head-3"><a href="#${e}">${headingList[i].innerText}</a></li>`,headingList[i].id=`${e}`}else if("h4"==headingList[i].localName){var e=string_to_slug(headingList[i].innerText);contentSection.innerHTML+=`<li class="head-4"><a href="#${e}">${headingList[i].innerText}</a></li>`,headingList[i].id=`${e}`}else if("h5"==headingList[i].localName){var e=string_to_slug(headingList[i].innerText);contentSection.innerHTML+=`<li class="head-5"><a href="#${e}">${headingList[i].innerText}</a></li>`,headingList[i].id=`${e}`}else if("h6"==headingList[i].localName){var e=string_to_slug(headingList[i].innerText);contentSection.innerHTML+=`<li class="head-6"><a href="#${e}">${headingList[i].innerText}</a></li>`,headingList[i].id=`${e}`}setTimeout(()=>{fetch("{{ route('ajax.youMayAlsoLike', $article->id) }}").then(e=>e.json()).then(e=>{document.querySelector(".sidebar-section-wrap").innerHTML=e.data.youMayAlsoLike}).catch(e=>{console.log(e)})},9e3);var page=1,loading=0;if(window.onscroll=function(){var e=document.querySelector(".similar-post-section");e&&window.innerHeight+window.scrollY>e.offsetTop&&0===loading&&(loading=1,fetch("{{ route('ajax.moreOnCategory', $article->id) }}").then(e=>e.json()).then(t=>{t.data&&t.data.length>0&&e.insertAdjacentHTML("beforeend",t.data)}).catch(e=>{console.log(e)}))},fetch("{{ route('ajax.readMoreSectionAjax', $article->id) }}").then(e=>e.json()).then(e=>{var t=document.querySelectorAll(".readmore");if(t.length>0)for(let n=0;n<t.length;n++)t[n].innerHTML=e.readMoreSection}),document.addEventListener("copy",()=>{var e=window.getSelection();if(""!=e){copytext=e+(pagelink=" Read more at: "+document.location.href);var t=document.createElement("textarea");t.value=copytext,document.body.appendChild(t),t.style.opacity=0,t.select(),navigator.clipboard.writeText(t.value),e.deleteFromDocument(),t.remove()}}),window.onload=function(){},document.querySelectorAll(".instagram-media").length){var e=document.createElement("script");e.src="//www.instagram.com/embed.js",e.defer=!0,e.async=!0;var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}if(document.querySelectorAll(".twitter-tweet").length){var e=document.createElement("script");e.src="//platform.twitter.com/widgets.js",e.defer=!0,e.async=!0;var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}
</script>
