@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
{{ $data['title'] }}
@endsection

@section('page-description')
{{ $data['description'] }}
@endsection

@section('main')
    
    <div class="p-1 mx-auto" style="max-width: 1000px;">

      <x-create-product-stage>
          <x-slot name="stage">stone</x-slot>
      </x-create-product-stage>

      <x-stone-shop-filter>
        <x-slot name="type">{{ $type }}</x-slot>
        @if($type != "moissanite")
        <x-slot name="carat">{{ $carat }}</x-slot>
        <x-slot name="high">{{ $high }}</x-slot>
        @endif
      </x-stone-shop-filter>

      <h1 class="main-text-c text-3xl text-center py-3">{{ $data['h1'] }}</h1>

      <div id="shop">

        @if(count($products) > 0)
          <div id="shop-product-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-1">
         
          @include('shop.ajax.moissanite')

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
  
$(document).ready(function() {

    var a, e, t = 0;

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $("footer").offset().top) {
            clearTimeout(a), a = setTimeout(function() {
                t++;
                product = all.slice(24 * t, 24 * (t + 1));
                !$(".loading-more").length && 24 * t - 24 < e && $('<div class="loading-more main-bg-c text-white p-1 my-1 rounded text-sm text-center">Loading More...</div>').insertAfter("#shop"),
                t < page &&
                $.ajax({
                    url: "{{ url($type) }}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    method: "POST",
                    data: {
                        product: product
                    },
                    beforeSend: function() {
                    },
                    success: function(a) {
                        $(".loading-more").remove();
                        $("#shop-product-container").append(a);
                    },
                    error: function(a, e, t) {
                      console.log(a);
                    }
                })
            }, 50)
        }
    });


    $('a[param-value="' + $.urlParam("carat") + '"] label').css({
        background: "#d60d8c",
        color: "white"
    });

    $('a[param-value="' + $.urlParam("width") + '"] label').css({
        background: "#d60d8c",
        color: "white"
    });


    $("#{{ ($param->shape != '') ? $param->shape:'all' }}").css({
        background: "#d60d8c",
        color: "white !important"
    });

    $("#{{ ($param->shape != '') ? $param->shape:'all' }}").find("div,span").css({
        color: "white"
    });




    // $(document).on("mouseenter", ".shop-products-inner", function() {
    //     4 == $(this).find("video").prop("readyState") && ($(this).find(".ajax-img").fadeOut(1), $(this).find("video").trigger("play"))
    // }),

    // $(document).on("mouseleave", ".shop-products-inner", function() {
    //     $(this).find("video").trigger("pause")
    // }),

    // $(".shop-products-inner .ajax-img").on("load", function() {
    //     $(this).prev().fadeOut(0)
    // }),

    // $(".ajax-img").one("load", function() {
    //     $(this).prev().fadeOut(0)
    // }).each(function() {
    //     this.complete && ($(this).load(), $(this).prev().fadeOut(0))
    // });
});

</script>


@endsection