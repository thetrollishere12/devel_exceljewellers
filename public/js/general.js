function popup(e,p){switch(e){case"red":$("#popup-container").css({background:"#ef4444"});break;case"green":$("#popup-container").css({background:"#22c55e"});break;default:$("#popup-container").css({background:e})}$("#popup-message").text(p),$("#popup-container").stop(!0).fadeIn().delay(3e3).fadeOut()}

$.urlParam = function (e) {
    var a = new RegExp("[?&]" + e + "=([^&#]*)").exec(window.location.href);
    return null == a ? null : decodeURI(a[1]) || 0;
};

$(document).ready(function () {

    $("a[param-name]").each(function () {
        var e = new URL(window.location.href);
        if ($(this).attr("param-value").includes("{}")) {
            (value = $(this).attr("param-value").split("{}")), (names = $(this).attr("param-name").split("{}"));
            for (var a = 0; a < value.length; a++) e.searchParams.set(names[a], value[a]);
        } else e.searchParams.set($(this).attr("param-name"), $(this).attr("param-value"));
        $(this).attr("href", e.toString());
    });

    $("main").append('<div id="popup-container" class="rounded hidden px-10 py-2 text-white shadow-lg z-20 fixed top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4"><div id="popup-message">Status has been saved</div></div>');

    function e() {
        var e = $("nav").outerHeight();
        var t = $("footer").outerHeight();
        $("body").css({ "padding-top": e, "padding-bottom": t });
    }

    $(".arrow-away").click(function () {
        $(".media-side-bar").toggleClass("media-slide"), $(this).toggleClass("arrow-trans"), $(this).children("svg").toggleClass("svg-arrow");
    });

    $.ajax({
        url: window.origin + "/shop-cart-num",
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
        method: "POST",
        success: function (e) {
            $(".cart-text").empty().append(e);
        },
        error: function (e, t, n) {},
    });

    $(".footer-title").click(function () {
        $(this).next().toggle(), $(".footer-title").not($(this)).next().css({ display: "none" }), e();
    });

    e();

    $(window).resize(function () {
        e();
    });

    $(window).scroll(function () {
        e();
    });

    setTimeout(function() {
        e();  
    }, 1000);

});

(function(e){"use strict";function t(e){return new RegExp("(^|\\s+)"+e+"(\\s+|$)")}var n,r,o;function a(e,t){(n(e,t)?o:r)(e,t)}o="classList"in document.documentElement?(n=function(e,t){return e.classList.contains(t)},r=function(e,t){e.classList.add(t)},function(e,t){e.classList.remove(t)}):(n=function(e,n){return t(n).test(e.className)},r=function(e,t){n(e,t)||(e.className=e.className+" "+t)},function(e,n){e.className=e.className.replace(t(n)," ")}),e.classie={hasClass:n,addClass:r,removeClass:o,toggleClass:a,has:n,add:r,remove:o,toggle:a}})(window),window.Modernizr=function(e,t){function n(e,t){return typeof e===t}var r,o,a={},i=e.documentElement,c=e.createElement("modernizr"),s=c.style,l={},u=[],f=u.slice,d={}.hasOwnProperty;for(var p in o=n(d,"undefined")||n(d.call,"undefined")?function(e,t){return t in e&&n(e.constructor.prototype[t],"undefined")}:function(e,t){return d.call(e,t)},Function.prototype.bind||(Function.prototype.bind=function(e){var t=this;if("function"!=typeof t)throw new TypeError;var n=f.call(arguments,1),r=function(){if(this instanceof r){function o(){}o.prototype=t.prototype;var a=new o,i=t.apply(a,n.concat(f.call(arguments)));return Object(i)===i?i:a}return t.apply(e,n.concat(f.call(arguments)))};return r}),l)o(l,p)&&(r=p.toLowerCase(),a[r]=l[p](),u.push((a[r]?"":"no-")+r));return a.addTest=function(e,t){if("object"==typeof e)for(var n in e)o(e,n)&&a.addTest(n,e[n]);else{if(e=e.toLowerCase(),void 0!==a[e])return a;t="function"==typeof t?t():t,i.className+=" "+(t?"":"no-")+e,a[e]=t}return a},s.cssText="",c=null,function(e,t){function n(){var e=m.elements;return"string"==typeof e?e.split(" "):e}function r(e){var t=p[e[f]];return t||(t={},d++,e[f]=d,p[d]=t),t}function o(e,n,o){return n=n||t,c?n.createElement(e):(a=(o=o||r(n)).cache[e]?o.cache[e].cloneNode():u.test(e)?(o.cache[e]=o.createElem(e)).cloneNode():o.createElem(e)).canHaveChildren&&!l.test(e)?o.frag.appendChild(a):a;var a}function a(e){var a,s,l,u,f,d=r(e=e||t);return!m.shivCSS||i||d.hasCSS||(d.hasCSS=(u=(l=e).createElement("p"),f=l.getElementsByTagName("head")[0]||l.documentElement,u.innerHTML="x<style>article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}</style>",!!f.insertBefore(u.lastChild,f.firstChild))),c||(a=e,(s=d).cache||(s.cache={},s.createElem=a.createElement,s.createFrag=a.createDocumentFragment,s.frag=s.createFrag()),a.createElement=function(e){return m.shivMethods?o(e,a,s):s.createElem(e)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+n().join().replace(/\w+/g,function(e){return s.createElem(e),s.frag.createElement(e),'c("'+e+'")'})+");return n}")(m,s.frag)),e}var i,c,s=e.html5||{},l=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,u=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f="_html5shiv",d=0,p={};!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",i="hidden"in e,c=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return void 0===e.cloneNode||void 0===e.createDocumentFragment||void 0===e.createElement}()}catch(e){c=i=!0}}();var m={elements:s.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:!1!==s.shivCSS,supportsUnknownElements:c,shivMethods:!1!==s.shivMethods,type:"default",shivDocument:a,createElement:o,createDocumentFragment:function(e,o){if(e=e||t,c)return e.createDocumentFragment();for(var a=(o=o||r(e)).frag.cloneNode(),i=0,s=n(),l=s.length;i<l;i++)a.createElement(s[i]);return a}};e.html5=m,a(t)}(this,e),a._version="2.6.2",i.className=i.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+" js "+u.join(" "),a}(this.document),function(e,t){function n(e){return"[object Function]"==m.call(e)}function r(e){return"string"==typeof e}function o(){}function a(e){return!e||"loaded"==e||"complete"==e||"uninitialized"==e}function i(){var e=h.shift();v=1,e?e.t?d(function(){("c"==e.t?u.injectCss:u.injectJs)(e.s,0,e.a,e.x,e.e,1)},0):(e(),i()):v=0}function c(e,n,o,c,s){return v=0,n=n||"j",r(e)?function(e,n,r,o,c,s,l){function f(t){if(!y&&a(m.readyState)&&(C.r=y=1,v||i(),m.onload=m.onreadystatechange=null,t))for(var r in"img"!=e&&d(function(){E.removeChild(m)},50),S[n])S[n].hasOwnProperty(r)&&S[n][r].onload()}l=l||u.errorTimeout;var m=t.createElement(e),y=0,b=0,C={t:r,s:n,e:c,a:s,x:l};1===S[n]&&(b=1,S[n]=[]),"object"==e?m.data=n:(m.src=n,m.type=e),m.width=m.height="0",m.onerror=m.onload=m.onreadystatechange=function(){f.call(this,b)},h.splice(o,0,C),"img"!=e&&(b||2===S[n]?(E.insertBefore(m,g?null:p),d(f,l)):S[n].push(m))}("c"==n?C:b,e,n,this.i++,o,c,s):(h.splice(this.i++,0,e),1==h.length&&i()),this}function s(){var e=u;return e.loader={load:c,i:0},e}var l,u,f=t.documentElement,d=e.setTimeout,p=t.getElementsByTagName("script")[0],m={}.toString,h=[],v=0,y="MozAppearance"in f.style,g=y&&!!t.createRange().compareNode,E=g?f:p.parentNode,b=(f=e.opera&&"[object Opera]"==m.call(e.opera),f=!!t.attachEvent&&!f,y?"object":f?"script":"img"),C=f?"script":b,j=Array.isArray||function(e){return"[object Array]"==m.call(e)},N=[],S={},w={timeout:function(e,t){return t.length&&(e.timeout=t[0]),e}};(u=function(e){function t(e,t,r,o,a){var i=function(e){e=e.split("!");var t,n,r,o=N.length,a=e.pop(),i=e.length;for(a={url:a,origUrl:a,prefixes:e},n=0;n<i;n++)r=e[n].split("="),(t=w[r.shift()])&&(a=t(a,r));for(n=0;n<o;n++)a=N[n](a);return a}(e),c=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(t=t&&(n(t)?t:t[e]||t[o]||t[e.split("/").pop().split("?")[0]]),i.instead?i.instead(e,t,r,o,a):(S[i.url]?i.noexec=!0:S[i.url]=1,r.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":void 0,i.noexec,i.attrs,i.timeout),(n(t)||n(c))&&r.load(function(){s(),t&&t(i.origUrl,a,o),c&&c(i.origUrl,a,o),S[i.url]=2})))}function a(e,a){function i(e,o){if(e){if(r(e))o||(f=function(){var e=[].slice.call(arguments);d.apply(this,e),p()}),t(e,f,a,0,l);else if(Object(e)===e)for(s in c=function(){var t,n=0;for(t in e)e.hasOwnProperty(t)&&n++;return n}(),e)e.hasOwnProperty(s)&&(o||--c||(n(f)?f=function(){var e=[].slice.call(arguments);d.apply(this,e),p()}:f[s]=function(e){return function(){var t=[].slice.call(arguments);e&&e.apply(this,t),p()}}(d[s])),t(e[s],f,a,s,l))}else o||p()}var c,s,l=!!e.test,u=e.load||e.both,f=e.callback||o,d=f,p=e.complete||o;i(l?e.yep:e.nope,!!u),u&&i(u)}var i,c,l=this.yepnope.loader;if(r(e))t(e,0,l,0);else if(j(e))for(i=0;i<e.length;i++)r(c=e[i])?t(c,0,l,0):j(c)?u(c):Object(c)===c&&a(c,l);else Object(e)===e&&a(e,l)}).addPrefix=function(e,t){w[e]=t},u.addFilter=function(e){N.push(e)},u.errorTimeout=1e4,null==t.readyState&&t.addEventListener&&(t.readyState="loading",t.addEventListener("DOMContentLoaded",l=function(){t.removeEventListener("DOMContentLoaded",l,0),t.readyState="complete"},0)),e.yepnope=s(),e.yepnope.executeStack=i,e.yepnope.injectJs=function(e,n,r,c,s,l){var f,m,h=t.createElement("script");for(m in c=c||u.errorTimeout,h.src=e,r)h.setAttribute(m,r[m]);n=l?i:n||o,h.onreadystatechange=h.onload=function(){!f&&a(h.readyState)&&(f=1,n(),h.onload=h.onreadystatechange=null)},d(function(){f||n(f=1)},c),s?h.onload():p.parentNode.insertBefore(h,p)},e.yepnope.injectCss=function(e,n,r,a,c,s){var l;for(l in n=s?i:n||o,(a=t.createElement("link")).href=e,a.rel="stylesheet",a.type="text/css",r)a.setAttribute(l,r[l]);c||(p.parentNode.insertBefore(a,p),d(n,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};

var menuLeft = document.getElementById("cbp-spmenu-s1"),
    showLeft = document.getElementById("showLeft"),
    body = document.body;
    (shadow = document.getElementsByClassName("shadow")[0]),
    (showLeft.onclick = function () {
        classie.toggle(this, "active"), classie.toggle(menuLeft, "cbp-spmenu-open"), classie.toggle(shadow, "activate");
    }),
    (shadow.onclick = function () {
        classie.toggle(showLeft, "active"), classie.toggle(menuLeft, "cbp-spmenu-open"), classie.toggle(this, "activate");
    }),
    (goback.onclick = function () {
        classie.toggle(showLeft, "active"), classie.toggle(menuLeft, "cbp-spmenu-open"), classie.toggle(shadow, "activate");
    }),
    $(".side-nav-h3").click(function () {
        $(this).next().slideToggle();
    }),
    setTimeout(function () {
        let e = $(window).height(),
            t = $(window).width();
        document.querySelector("meta[name=viewport]").setAttribute("content", "height=" + e + "px, width=" + t + "px, initial-scale=1.0");
    }, 300);
    e();
