@extends('layouts.nofollow')

@section('include')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

    <script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/3.0.1/js-cloudimage-360-view.min.js"></script>

    <link href="{{ asset('css/product.css?'.time().'') }}" rel="stylesheet">

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

@endsection

@section('page-title')
Completed Engagement Ring With Loose Stone
@endsection

@section('main')

<style type="text/css">

.video-popup-ctn {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    background: rgba(0,0,0,.1);
    width: 100%;
    height: 100%;
    transform: translate(-50%,-50%);
    z-index: 10000;
}

.bkg-dia-black {
    position: fixed;
    top: 50%;
    left: 50%;
    background: rgba(0,0,0,.5);
    width: 100%;
    height: 100%;
    transform: translate(-50%,-50%);
}

.dia-popup {
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    z-index: 10001;
}


@media only screen and (min-width: 0px) {

    .dia-popup {
        width: 70%;
    }

}
@media only screen and (min-width: 768px) {

    .dia-popup {
        width: 60%;
    }

}
@media only screen and (min-width: 1024px) {
    .dia-popup {
        width: 40%;
    }

}


</style>

    <div class="video-popup-ctn">
        <div class="bkg-dia-black"></div>
        <div class="dia-popup">
          <!--       <div class="x icon-close"></div> -->
                <video width="100%" loop muted playsinline>
                   @if(session('create_ring.stone')['stone'] == "moissanite")
                    <source src="{{ asset('storage/image/moissanite/'.session('create_ring.stone')['video'].'.mp4') }}" type="video/mp4">
                    @else
                    <source src="{{ session('create_ring.stone')['video'] }}" type="video/mp4">
                    @endif
                </video>
        </div>
    </div>

    <div class="m-auto px-1" style="max-width: 1000px;">
       <x-create-product-stage></x-create-product-stage>
    </div>

<div id="item-container" class="m-auto grid" style="max-width: 1000px;" >

   <div class="item-image">


                @if(isset($product->image_360) && Storage::disk('s3')->exists('image/'.$type.'-360/'.$product->image_360.'/') == true)

                  <x-product360-viewer>
                    <x-slot name="link">{{$type}}-360/{{$product->image_360}}</x-slot>
                  </x-product360-viewer>

                  <script type="text/javascript">
                     window.CI360.init();
                  </script>

                  @else

                  <x-product-image>
                     <x-slot name="type">{{ $type }}</x-slot>
                     <x-slot name="metal">{{ $product->metal }}</x-slot>
                     <x-slot name="color">{{ $product->color }}</x-slot>
                     <x-slot name="style">{{ $product->style }}</x-slot>
                     <x-slot name="name">{{ $product->name }}</x-slot>
                     <x-slot name="image">{{ $product->image }}</x-slot>
                     @if(isset($product->image_360))
                     <x-slot name="image_360">{{ $product->image_360 }}</x-slot>
                     @endif
                  </x-product-image>

                  @endif





                <div class="splide splide_image">
                  <div class="splide__track">
                        <ul class="splide__list">

                            <li class="splide__slide">
                                <div class="other-img-ctn m-1 cursor-pointer">
                                    <video width="100%" autoplay loop muted playsinline>
                                        @if(session('create_ring.stone')['stone'] == "moissanite")
                                        <source src="{{ asset('storage/image/moissanite/'.session('create_ring.stone')['video'].'.mp4') }}" type="video/mp4">
                                        @else
                                        <source src="{{ session('create_ring.stone')['video'] }}" type="video/mp4">
                                        @endif
                                    </video>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="other-img-ctn m-1 cursor-pointer">
                                    <img alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img main-image-session" src="{{ Storage::disk('s3')->url('image/'.$type.'/'.$product->image.'-1.jpg', env('AWS_TIME')) }}">
                                </div>
                            </li>

                            @include('include.product-360')
                             @include('include.product-other-image')

                        </ul>
                  </div>
                </div>

                <!-- @if($shapeimg)

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img class="main-image-session" alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img selected" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$shapeimg.'-1.jpg') }}">
                    </div>
                  </div>

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$shapeimg.'-2.jpg') }}">
                    </div>
                  </div>

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$shapeimg.'-3.jpg') }}">
                    </div>
                  </div>

                @else


                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img selected" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$product->image.'-1.jpg') }}">
                    </div>
                  </div>

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$product->image.'-2.jpg') }}">
                    </div>
                  </div>

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$product->image.'-3.jpg') }}">
                    </div>
                  </div>

                @endif -->

                <script type="text/javascript">

            var splide = new Splide( '.splide_image', {
              perPage: 4,
              perMove: 1,
              focus  : 'left',
            } );

            splide.mount();   

            </script>

    </div>


        <div class="selection-container ml-2 text-sm">
            <div class="text-base"><span class="product-name">{{ $product->name }} With <span class="main-text-c">{{session('create_ring.stone')['carat']}} {{session('create_ring.stone')['shape']}} {{session('create_ring.stone')['color']}} {{session('create_ring.stone')['clarity']}} Diamond</span></span></div>

            @if($product->sale_price)
            <div class="main-text-c">LIMITED TIME OFFER</div>
          <div class="main-text-c text-lg">{{session('currency')}} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($product->currency,$product->sale_price,session('currency')),2) }}</span></div>
          <div class="line-through">{{session('currency')}} $<span>{{ number_format(\App\Helper\AppHelper::conversion($product->currency,$product->price,session('currency')),2) }}</span></div>
          @else
          <div class="main-text-c text-lg" id="{{ $product->price }}">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($product->currency,$product->price,session('currency')),2) }}</div>
          @endif

    

          <div class="py-2">
             <x-product-ring-size>
                 <x-slot name="set_size">{{session('create_ring.engagement-ring')['size']}}</x-slot>/
             </x-product-ring-size>
          </div>

          <x-product-engraving>
              <x-slot name="value">{{ session('create_ring.engagement-ring')['engraving'] }}</x-slot>
          </x-product-engraving>


            @if(!in_array(session('create_ring.stone')['shape'],session('create_ring.engagement-ring')['shape']))
            <div class="p-sub">Disclaimer</div>
            <div class="disclaimer-box">Product center stone area will not look exactly like the image due to the indifferent stone shape you have picked out.</div>
            @endif

            <button id="add-to-cart" class="main-bg-c text-white rounded mt-2 py-2 px-8" id="{{$product->id}}">Add To Cart</button>
            
            <x-product-media-info>
                  <x-slot name="type">{{ $type }}</x-slot>
                  <x-slot name="brand">{{ $product->brand }}</x-slot>
                  <x-slot name="name">{{ $product->name }}</x-slot>
              </x-product-media-info>

        
  
        </div>
    </div>


    <div class="bg-zinc-100 mt-4 pb-4">
        <div class="text-center text-xl py-8">PRODUCT DETAILS</div>
        <div class="m-auto grid gap-x-2  grid-cols-3  text-xs" style="max-width: 1000px;">

            <div class="capitalize p-2">
              <div class="border-b font-bold border-zinc-300 pb-0.5 mb-0.5">PRODUCT DESCRIPTION</div>
              {{ $product->description }}
           </div>

            <div class="capitalize p-2">
                <div class="border-b font-bold border-zinc-300 pb-0.5 mb-0.5">PRODUCT DETAILS</div>

                <div class="py-0.5"><b>SKU:</b> <span class="item_sku">{{ $product->item_sku }}</span></div>

                @if(isset($product->brand))
                  <div class="py-0.5 gap-x-1 flex">
                     <b>Brand:</b>
                     @if($product->brand == 'Verragio')
                     <img class="w-20" src="{{ url('storage/image/logo/verragio.png') }}">
                     @elseif($product->brand == 'GabrielCo')
                     <img class="w-20" src="{{ url('storage/image/logo/gabriel.svg') }}">
                     @elseif($product->brand == 'Valina')
                     <img class="w-20" src="{{ url('storage/image/logo/valina.png') }}">
                     @elseif($product->brand == 'Romance')
                     <img class="w-20" src="{{ url('storage/image/logo/romance.png') }}">
                     @elseif($product->brand == 'SimonG')
                     <img class="w-20" src="{{ url('storage/image/logo/simong.png') }}">
                     @elseif($product->brand == 'Malo')
                     <img class="w-20" src="{{ url('storage/image/logo/malo.png') }}">
                     @endif
                  </div>
                  @endif

                @if(isset($product->collection))
                  <div class="py-0.5"><b>Collection:</b> {{ $product->collection }}</div>
                  @endif


                <div class="py-0.5"><b>Style:</b> {{ $product->style }}</div>

      <div class="py-0.5"><b>Metal:</b> @if($product->color == "Platinum"||$product->color == "platinum") Platinum @elseif($product->color == "Silver"||$product->color == "silver") Silver @else {{ $product->metal }} {{ $product->color }} gold @endif</div>

      @if(isset($product->size) && !empty($product->size))
       <div class="py-0.5"><b>Size:</b> {{ $product->size }}</div>
       @endif


                @if(isset($product->carat) && $product->carat > 0)
      <div class="py-0.5"><b>Carat:</b> {{ $product->carat }}</div>
      @endif

                @if(isset($product->width) && !empty($product->width))
      <div class="py-0.5"><b>Width:</b> {{ $product->width }}mm</div>
      @endif

                <div class="py-0.5"><b>product Type:</b> {{ $product->file_type }}</div>
            </div>
            <div class="capitalize p-2">
                <div><b class="border-b font-bold border-zinc-300 pb-0.5 mb-0.5">DIAMOND DETAILS</b></div>
                <hr>
                <div>
                    <div class="py-0.5">Stone Type:</b> {{ session('create_ring.stone')["stone"] }}</div>
                    <div class="py-0.5">Shape:</b> {{ session('create_ring.stone')["shape"] }}</div>
                    <div class="py-0.5">Carat:</b> {{ session('create_ring.stone')["carat"] }}</div>
                    <div class="py-0.5">Size:</b> {{ session('create_ring.stone')["size"] }}</div>
                    <div class="py-0.5">Color:</b> {{ session('create_ring.stone')["color"] }}</div>
                    <div class="py-0.5">Clarity:</b> {{ session('create_ring.stone')["clarity"] }}</div>
                    <input type="hidden" name="dia_id" value='{{ session("create_ring.stone")["stone_id"] }}'>
                    <input type="hidden" name="dia_price" value='{{ session("create_ring.stone")["retail"] }}'>
                </div>
            </div>
        </div>
    </div>

    @include('include.product-similar')

    <x-shipping-info></x-shipping-info>



@if(isset($product->image_360) && Storage::disk('s3')->exists('image/'.$type.'-360/'.$product->image_360.'/') == true)
<script type="text/javascript">

$(document).ready(function(){

        $('.img-360,.icon-degrees').click(function(){
            $('.main-image-container').css({'min-height':$('.main-image').innerWidth()+"px"}),
            $('.img-360').css({ border: "solid 1px #d60d8c" });
            $(".other-img,.other-video").not(this).css({ border: "solid 1px #e6e6e6" });
            $('.main-image-container').empty().append('<div class="main-image cloudimage-360" style="z-index: 0 !important;" data-folder="{{ Storage::disk("s3")->url("image/".$type."-360/".$product->image_360) }}/" data-filename="{index}.jpg" data-amount="{{ count(Storage::disk("s3")->allFiles("image/".$type."-360/".$product->image_360."/")) }}" data-spin-reverse autoplay data-speed="300" data-drag-speed="300" data-autoplay data-magnifier="2" data-pointer-zoom="2"></div>');
           window.CI360.init();
        });

});

</script>

@endif

<script type="text/javascript">

    $(document).ready(function(){

        $('.other-img-ctn video').click(function(){
            if ($(this).prop('readyState') == 4) {
                $('.video-popup-ctn').fadeIn();
                $('.video-popup-ctn video').trigger('play');
                
            }
        });

        $('.bkg-dia-black,.x').click(function(){
            $('.video-popup-ctn').fadeOut();
            $('.video-popup-ctn video').trigger('pause');
        });

        $('.video-popup-ctn video').click(function(){
            if ($(this).get(0).paused) {
                $(this).trigger('play');
            }else{
                $(this).trigger('pause');
            }
        })


        $('#add-to-cart').click(function(){

            if ($('select[name=ring-size]').length) {

              if (!$("select[name=ring-size]").val()) {
                $('.modal').modal('hide');
                popup("red","Please Select Ring Size");
                return false;
              }

            }

            $.ajax({
                url:window.origin + "/add-complete-ring-to-cart",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method:"POST",
                data:{
                    type:"complete-ring",
                    size:$("select[name=ring-size]").val(),
                    engraving:$("input[name=engraving]").val() || null,
                },
                success:function(result){
                    popup("green",'Added To Cart');
                    window.location.href = "shopcart";
                },
                error: function (e, t, n) {
                    popup("red",e.responseJSON.message);
                }
            });
        });


          $(".other-img").click(function (e) {
            $('.main-image-container').css({'min-height':$('.main-image').innerWidth()+"px"}),
            $(this).css({ border: "solid 1px #d60d8c" }),
            $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
            $(".main-image-container").empty().append("<img class='main-image'>"),
            $(".main-image").attr("src", $(this).attr("src"));

                // $('.main-image-container').css({'min-height':$('.main-image').innerHeight()+"px"});
        });


        $(".video-ctn video").click(function () {
            $(".main-image").length &&
                ($(this).css({ border: "solid 1px #d60d8c" }),
                $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
                $(".main-image").remove(),
                $(".main-image-container").append("<video class='main-image' controls autoplay><source src='" + $(this).get(0).currentSrc + "''></video>"));
        });
        

    });

</script>

@endsection

