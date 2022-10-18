<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Search Results | Excel Jewellers</title>  
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="robots" content="noindex, nofollow">
<meta name="author" content="Brandon Huynh">

    <x-header-tag></x-header-tag>
</head>
<body>
    <x-search-modal></x-search-modal>
	<header>
		<x-nav></x-nav>
	</header>
  
	<main>
    <div class="p-1 mx-auto" style="max-width: 1000px;">
      
      <div id="shop">

        <div id="shop-product-container-filter" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-1">

            <a param-name="category" param-value="engagement-ring">
            <div class="border rounded cursor-pointer">
                <div class="icon-Halo-01 text-center text-4xl pt-1"></div>
                <div class="text-center main-t-c text-xs py-4">Engagement Rings</div>
            </div>
            </a>

            <a param-name="category" param-value="wedding-band">
            <div class="border rounded cursor-pointer">
                <div class="icon-Curved-01 text-center text-4xl pt-1"></div>
                <div class="text-center main-t-c text-xs py-4">Wedding Bands</div>
            </div>
            </a>

            <a param-name="category" param-value="fine-jewellery">
            <div class="border rounded cursor-pointer">
                <div class="grid grid-cols-2">
                    <div class="icon-Studs-01 text-center text-4xl pt-1"></div>
                    <div class="icon-Bar-01 text-center text-4xl pt-1"></div>
                </div>
                <div class="text-center main-t-c text-xs py-4">Fine Jewellery</div>
            </div>
            </a>

            <a param-name="category" param-value="lab-grown-diamond">
            <div class="border rounded cursor-pointer">
                <div class="icon-diamond1 text-center text-4xl pt-1" style="color: #b8c5d1;"></div>
                <div class="text-center main-t-c text-xs py-4">Lab Diamond</div>
            </div>
            </a>

            <a param-name="category" param-value="natural-diamond">
            <div class="border rounded cursor-pointer">
                <div class="icon-diamond1 text-center text-4xl pt-1" style="color: #adc7c3;"></div>
                <div class="text-center main-t-c text-xs py-4">Natural Diamond</div>
            </div>
            </a>

            <a param-name="category" param-value="moissanite">
            <div class="border rounded cursor-pointer">
                <div class="icon-diamond1 text-center text-4xl pt-1" style="color: #c27a99;"></div>
                <div class="text-center main-t-c text-xs py-4">Moissanite</div>
            </div>
            </a>

          </div>

        <div class="text-center main-t-c text-3xl py-5">Search For: {{$keyword}}</div>

        @if(count($products) > 0)
          <div id="shop-product-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-1">
         
            @include('shop.ajax.search')

          </div>
        @else
          <div class="no-results">No Results Were Found</div>
        @endif

      </div>
    </div>

	</main>
  
	<x-footer></x-footer>
    <x-footer-tag></x-footer-tag>
</body>
</html>

<script type="text/javascript">
  
  var all = @json($all);
  
  var page = {{ $count }};

</script>

<script type="text/javascript">



$(document).ready(function(){


    var e = 0;
    var a = 0;

    $(window).scroll(function () {
        if ((console.log($(window).scrollTop() + $(window).height()), console.log($("footer").offset().top), $(window).scrollTop() + $(window).height() >= $("footer").offset().top - $(".shop-products-inner").height())) {

            clearTimeout(e),
                (e = setTimeout(function () {
                    a++;
                    product  = all.slice(24*a,24*(a+1));
                        !$(".loading-more").length && a < page && $('<div class="loading-more main-bg-c text-white p-1 my-1 rounded text-sm text-center">Loading More...</div>').insertAfter("#shop"),
                        a < page &&
                            $.ajax({
                                url: "{{ url('search') }}",
                                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                                method: "POST",
                                data: {
                                    product:product,
                                    gem: $.urlParam("gem")
                                },
                                beforeSend: function () {},
                                success: function (e) {
                                  console.log(e);
                                    $(".loading-more").remove();
                                    $("#shop-product-container").append(e);
                                        // $("#fine-jewellery .ajax-img").on("load", function () {
                                        //     $(this).prev().fadeOut(0);
                                        // }),
                                        // $(".loading-more").remove();
                                },
                                error: function (e, a, s) {
                                    console.log(e);
                                },
                            });
                }, 50));
        }
    });


});

</script>

<style type="text/css">
.Rose-code,.rose-code{background:#fc656f;border:solid 1.5px #fc656f}.Yellow-code,.yellow-code{background:#ffe957;border:solid 1.5px #ffe957}.Platinum-code,.platinum-code{background:#adc7c3;border:solid 1.5px #adc7c3}.Silver-code,.silver-code{background:#ebebeb;border:solid 1.5px #dedede}.White-code,.white-code{background:#dedede;border:solid 1.5px #dedede}.Palladium-code,.palladium-code{background:#9ec7e6;border:solid 1.5px #9ec7e6}.RoseYellow-code,.YellowRose-code{background:linear-gradient(to right,#ffe957 0,#ffe957 50%,#fc656f 50%,#fc656f 100%);border:solid 1.5px #fc656f}.WhiteYellow-code,.YellowWhite-code{background:linear-gradient(to right,#ffe957 0,#ffe957 50%,#dedede 50%,#dedede 100%);border:solid 1.5px #dedede}.RoseWhite-code,.WhiteRose-code{background:linear-gradient(to right,#dedede 0,#dedede 50%,#fc656f 50%,#fc656f 100%);border:solid 1.5px #fc656f}.PlatinumYellow-code,.YellowPlatinum-code,.platinumyellow-code,.yellowplatinum-code{background:linear-gradient(to right,#ffe957 0,#ffe957 50%,#adc7c3 50%,#adc7c3 100%);border:solid 1.5px #dedede}.PlatinumRose-code,.RosePlatinum-code,.platinumrose-code,.roseplatinum-code{background:linear-gradient(to right,#fc656f 0,#fc656f 50%,#adc7c3 50%,#adc7c3 100%);border:solid 1.5px #dedede}.WhiteRose-code,
.Whiterose-code {
    background: linear-gradient(to right, #dedede 0, #dedede 50%, #fc656f 50%, #fc656f 100%);
    border: solid 1.5px #fc656f;
}
</style>