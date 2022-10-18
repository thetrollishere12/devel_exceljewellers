@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
{{ $data['title'] }}
@endsection

@section('page-description')
@if($type == "engagemment-ring")
Shop & Create Your Own Unique Custom <?php if(isset($param->metal)){ echo(strtoupper($param->metal)." "); } ?><?php if(isset($param->color) && $param->color != 'platinum'){ echo(ucfirst($param->color)." Gold "); } ?><?php if(isset($param->shape)){ echo(ucfirst($param->shape)." Shape Cut "); } ?><?php if(isset($param->category)){ echo(ucfirst($param->category)." "); } ?><?php if(isset($param->brand)){ echo(ucfirst($param->brand)." "); } ?>Diamond Moissanite Engagement Ring - Excel Jewellers Guildford Langley
@elseif($type == "wedding-band")
Shop & Explore Our <?php if(isset($param->metal)){ echo(strtoupper($param->metal)." "); } ?><?php if(isset($param->color) && $param->color != 'platinum'){ echo(ucfirst($param->color)." Gold "); } ?><?php if(isset($param->category)){ echo(ucfirst($param->category)." "); } ?><?php if(isset($param->brand)){ echo(ucfirst($param->brand)." "); } ?>Diamond Wedding Bands Excel Jewellers Guildford Langley
@else
Shop & Explore Our <?php if(isset($param->metal)){ echo(strtoupper($param->metal)." "); } ?><?php if(isset($param->color) && $param->color != 'platinum'){ echo(ucfirst($param->color)." Gold "); } ?><?php if(isset($param->style)){ echo(ucfirst($param->style)." "); } ?>Diamond <?php if(isset($param->gem) && $param->gem != 'Diamond'){ echo(ucfirst($param->gem)." "); } ?><?php if(isset($param->category)){ echo(ucfirst($param->category)." "); } ?><?php if(isset($param->brand)){ echo(ucfirst($param->brand)." "); } ?>Fine Jewellery - Excel Jewellers Guildford Langley
@endif
@endsection

@section('main')
    
    <div class="p-1 mx-auto" style="max-width: 1000px;">
      <h1 class="main-text-c text-3xl text-center py-3 uppercase">@if(isset($param->gem) && $param->gem != 'Diamond'){{$param->gem}}@endif @if(isset($param->color)){{$param->color}}@endif @if(isset($param->shape)){{$param->shape}}@endif {{ $data['h1'] }}</h1>
      
      @if($type == "engagement-ring")
      <x-create-product-stage>
          <x-slot name="stage">ring</x-slot>
      </x-create-product-stage>
      @endif

      <x-shop-filter :filter="$filter">
        <x-slot name="type">{{ $type }}</x-slot>
      </x-shop-filter>

      <div id="shop">

        @if(count($products) > 0)
          <div id="shop-product-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-1">
         
          @include('shop.ajax.products')

          </div>
        @else
          <div class="no-results">No Results Were Found</div>
        @endif

      </div>
    </div>


<script type="text/javascript">
  
  var all = @json($all);
  
  var page = {{ $count }};

</script>

<script type="text/javascript">

        $(document).on("click", "a .alt-m", function (e) {
            e.preventDefault(),

            $(this).parent().prev().children(".ajax-img").attr("src", $(this).attr("data-img")),
            $(this).parent().next().children(".product-name").text($(this).attr("data-name")),
            $(this)
                .parent()
                .next()
                .children(".product-price")
                .text("$" + $(this).attr("data-price")),
            $(this).parents("a").attr("href", $(this).attr("data-link"));
        });

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
                                url: "{{ url($type) }}",
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

    $(document).on('click','.filter-name',function(){
        $(this).next().slideToggle(), $(".filter-dropdown-outer").not($(this).next()).slideUp();
    });

        $(document).mouseup(function (e) {
            $(event.target).hasClass("filter-name") || (0 === $(e.target).closest(".filter-dropdown-outer").length && $(".filter-dropdown-outer").slideUp("fast"));
        }),
        $(".phone-filter-container").click(function () {
            $(".filter-case-container").not($(this).next()).fadeOut(), $(this).next().fadeToggle("fast");
        }),
        // $(".ajax-img")
        //     .one("load", function () {
        //         $(this).prev().fadeOut(0);
        //     })
        //     .each(function () {
        //         this.complete && ($(this).load(), $(this).prev().fadeOut(0));
        //     }),

        $("#" + $.urlParam("video")).css({ background: "#d60d8c", color: "white" }),
        $("#" + $.urlParam("video"))
            .parent("a")
            .attr("param-value", ""),

        $('a[param-value="' + $.urlParam("sort") + '"] .sort-by-case').addClass("selected"),
        $('a[param-value="' + $.urlParam("metal") + "{}" + $.urlParam("color") + '"] .metal-case').addClass("selected");

</script>

<script type="text/javascript">
   

            var e = $.urlParam("category");
            if (e){
                switch (($(".filter-append").remove(), e.toLowerCase())) {
                    case "bracelets":
                        $(".filter-inner:last").after(
                            '<div class="filter-inner filter-append"> <div class="filter-name">Style</div><div class="filter-dropdown-outer"> <div class="filter-dropdown"> <a href="fine-jewellery?style=bangle&category=bracelets"> <div class="filter-case-inner style-case"><span class="icon-Bangle-Bracelet-01 text-3xl"></span> <div class="style-text">Bangle</div></div></a> <a href="fine-jewellery?style=chain&category=bracelets"> <div class="filter-case-inner style-case"><span class="icon-Chain-bracelet-01 text-3xl"></span> <div class="style-text">Chain</div></div></a> <a href="fine-jewellery?style=charm&category=bracelets"> <div class="filter-case-inner style-case"><span class="icon-Charm-Bracelet-01 text-3xl"></span> <div class="style-text">Charm</div></div></a> <a href="fine-jewellery?style=cuff&category=bracelets"> <div class="filter-case-inner style-case"><span class="icon-Cuff-Bracelet-01 text-3xl"></span> <div class="style-text">Cuff</div></div></a> <a href="fine-jewellery?style=heart&category=bracelets"> <div class="filter-case-inner style-case"><span class="icon-Heart-01 text-3xl"></span> <div class="style-text">Heart</div></div></a> <a href="fine-jewellery?style=tennis&category=bracelets"> <div class="filter-case-inner style-case"><span class="icon-Tennis-Bracelet-01 text-3xl"></span> <div class="style-text">Tennis</div></div></a> </div></div></div>'
                        );
                        break;
                    case "rings":
                        $(".filter-inner:last").after(
                            '<div class="filter-inner filter-append"> <div class="filter-name">Style</div><div class="filter-dropdown-outer"> <div class="filter-dropdown"> <a href="fine-jewellery?category=rings&gem=diamond"> <div class="filter-case-inner style-case"><span class="icon-Diamond-Ring-01 text-3xl"></span> <div class="style-text">Diamond</div></div></a> <a href="fine-jewellery?category=rings&gem=gemstone"> <div class="filter-case-inner style-case"><span class="icon-Gem-Stone-Ring-01 text-3xl"></span> <div class="style-text">Gemstone</div></div></a> <a href="fine-jewellery?category=rings&gem=pearl"> <div class="filter-case-inner style-case"><span class="icon-Pearl-Ring-01 text-3xl"></span> <div class="style-text">Pearl</div></div></a> </div></div></div>'
                        );
                        break;
                    case "necklaces":
                        $(".filter-inner:last").after(
                            '<div class="filter-inner filter-append"> <div class="filter-name">Style</div><div class="filter-dropdown-outer"> <div class="filter-dropdown"> <a href="fine-jewellery?style=bar&category=necklaces"> <div class="filter-case-inner style-case"><span class="icon-Bar-01 text-3xl"></span> <div class="style-text">Bar</div></div></a> <a href="fine-jewellery?style=Choker&category=necklaces"> <div class="filter-case-inner style-case"><span class="icon-Choker-01 text-3xl"></span> <div class="style-text">Choker</div></div></a> <a href="fine-jewellery?style=fashion&category=necklaces"> <div class="filter-case-inner style-case"><span class="icon-Fashion-01 text-3xl"></span> <div class="style-text">Fashion</div></div></a> <a href="fine-jewellery?style=heart&category=necklaces"> <div class="filter-case-inner style-case"><span class="icon-Heart-01 text-3xl"></span> <div class="style-text">Heart</div></div></a> <a href="fine-jewellery?style=locket&category=necklaces"> <div class="filter-case-inner style-case"><span class="icon-Locket-01 text-3xl"></span> <div class="style-text">Locket</div></div></a> <a href="fine-jewellery?style=y knots&category=necklaces"> <div class="filter-case-inner style-case"><span class="icon-Y-Knots-01 text-3xl"></span> <div class="style-text">Y Knots</div></div></a> </div></div></div>'
                        );
                        break;
                    case "earrings":
                        $(".filter-inner:last").after(
                            '<div class="filter-inner filter-append"> <div class="filter-name">Style</div><div class="filter-dropdown-outer"> <div class="filter-dropdown"> <a href="fine-jewellery?style=drop&category=earrings"> <div class="filter-case-inner style-case"><span class="icon-Drops-01 text-3xl"></span> <div class="style-text">Drop</div></div></a> <a href="fine-jewellery?style=huggies&category=earrings"> <div class="filter-case-inner style-case"><span class="icon-Huggies-01 text-3xl"></span> <div class="style-text">Huggies</div></div></a> <a href="fine-jewellery?style=hoops&category=earrings"> <div class="filter-case-inner style-case"><span class="icon-Hoops-01 text-3xl"></span> <div class="style-text">Hoops</div></div></a> <a href="fine-jewellery?style=stud&category=earrings"> <div class="filter-case-inner style-case"><span class="icon-Studs-01 text-3xl"></span> <div class="style-text">Stud</div></div></a> </div></div></div>'
                        );
                }
            }

</script>

<style type="text/css">
.Rose-code,.rose-code{background:#fc656f;border:solid 1.5px #fc656f}.Yellow-code,.yellow-code{background:#ffe957;border:solid 1.5px #ffe957}.Platinum-code,.platinum-code{background:#adc7c3;border:solid 1.5px #adc7c3}.Silver-code,.silver-code{background:#ebebeb;border:solid 1.5px #dedede}.White-code,.white-code{background:#dedede;border:solid 1.5px #dedede}.Palladium-code,.palladium-code{background:#9ec7e6;border:solid 1.5px #9ec7e6}.RoseYellow-code,.YellowRose-code{background:linear-gradient(to right,#ffe957 0,#ffe957 50%,#fc656f 50%,#fc656f 100%);border:solid 1.5px #fc656f}.WhiteYellow-code,.YellowWhite-code{background:linear-gradient(to right,#ffe957 0,#ffe957 50%,#dedede 50%,#dedede 100%);border:solid 1.5px #dedede}.RoseWhite-code,.WhiteRose-code{background:linear-gradient(to right,#dedede 0,#dedede 50%,#fc656f 50%,#fc656f 100%);border:solid 1.5px #fc656f}.PlatinumYellow-code,.YellowPlatinum-code,.platinumyellow-code,.yellowplatinum-code{background:linear-gradient(to right,#ffe957 0,#ffe957 50%,#adc7c3 50%,#adc7c3 100%);border:solid 1.5px #dedede}.PlatinumRose-code,.RosePlatinum-code,.platinumrose-code,.roseplatinum-code{background:linear-gradient(to right,#fc656f 0,#fc656f 50%,#adc7c3 50%,#adc7c3 100%);border:solid 1.5px #dedede}.WhiteRose-code,
.Whiterose-code {
    background: linear-gradient(to right, #dedede 0, #dedede 50%, #fc656f 50%, #fc656f 100%);
    border: solid 1.5px #fc656f;
}
</style>


@endsection

