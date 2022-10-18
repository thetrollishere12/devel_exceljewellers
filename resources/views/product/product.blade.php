@extends('layouts.follow')
@section('include')
<link href="{{ asset('css/product.css?'.time().'') }}" rel="stylesheet">

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

<script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/3.0.1/js-cloudimage-360-view.min.js"></script>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection
@section('page-title')
{{ $product->brand }} @if($product->color == "Platinum")Platinum @else {{$product->metal}} {{$product->color}} Gold @endif{{$product->style}} {{$product->name}} Excel Jewellers Surrey Canada Langley Burnaby
@endsection
@section('page-description')
Designer @if($product->color == "Platinum")Platinum @else {{$product->metal}} {{$product->color}} Gold @endif{{$product->style}} {{$product->name}} At Excel Jewellers Canada Langley Surrey Vancouver Burnaby Richmond Abbotsford
@endsection

@section('main')

<x-product-add-cart-notification></x-product-add-cart-notification>

<div class="m-auto" style="max-width: 1000px;">
    <div class="mx-1">
   <x-create-product-stage>
       <x-slot name="stage">ring</x-slot>
   </x-create-product-stage>
    </div>
</div>

@if($type == "engagement-ring")
<x-popup-custom-setting>
    <x-slot name="sku">{{ $product->item_sku }}</x-slot>
    <x-slot name="image">{{ $product->image }}</x-slot>
    <x-slot name="stoneshape">{{ $product->stoneshape }}</x-slot>
</x-popup-custom-setting>
@endif

<div id="item-container" class="m-auto grid" style="max-width: 1000px;" >

   <div class="item-image">

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


        <div class="splide splide_image">
          <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="other-img-ctn m-1 cursor-pointer">
                            <img alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img main-image-session" src="{{ Storage::disk('s3')->url('image/'.$type.'/'.$product->image.'-1.jpg', env('AWS_TIME')) }}">
                        </div>
                    </li>

                    @include('include.product-360')
                    @include('include.product-other-image')
                    @include('include.product-video')

                </ul>
          </div>
        </div>

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
      <h1 class="text-base"><span class="product-name">{{$product->name}} </span>@if($type == "engagement-ring")(Setting Only)@endif</h1>
      @include('include.product-rating')

      @if($product->sale_price)
      <div class="main-text-c">LIMITED TIME OFFER</div>
      <div class="main-text-c text-lg">{{session('currency')}} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($product->currency,$product->sale_price,session('currency')),2) }}</span></div>
      <div class="line-through">{{session('currency')}} $<span>{{ number_format(\App\Helper\AppHelper::conversion($product->currency,$product->price,session('currency')),2) }}</span></div>
      @else
      <div class="main-text-c text-lg" id="{{ $product->price }}">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($product->currency,$product->price,session('currency')),2) }}</div>
      @endif

      @include('include.product-selection')

      <x-product-purchase-section>
          <x-slot name="type">{{ $type }}</x-slot>
          <x-slot name="sku">{{ $product->item_sku }}</x-slot>
      </x-product-purchase-section>

      <x-product-media-info>
          <x-slot name="type">{{ $type }}</x-slot>
          <x-slot name="brand">{{ $product->brand }}</x-slot>
          <x-slot name="name">{{ $product->name }}</x-slot>
      </x-product-media-info>

   </div>
</div>
<div class="bg-zinc-100 mt-4 pb-4">
   @include('include.product-detail')
</div>

@include('include.product-customer-comment')

<x-shipping-info></x-shipping-info>

@include('include.product-similar')


@if(isset($product->image_360) && Storage::disk('s3')->exists('image/'.$type.'-360/'.$product->image_360.'/') == true)
<script type="text/javascript">

$(document).ready(function(){

    $('.img-360,.icon-degrees').click(function(){
        $('.main-image-container').css({'min-height':$('.main-image').innerWidth()+"px"}),
       $('.img-360').css({ border: "solid 1px #d60d8c" });
       $(".other-img,.other-video").not(this).css({ border: "solid 1px #e6e6e6" })
       $('.main-image-container').empty().append('<div class="main-image cloudimage-360" style="z-index: 0 !important;" data-folder="{{ Storage::disk("s3")->url("image/".$type."-360/".$product->image_360) }}/" data-filename="{index}.jpg" data-amount="{{ count(Storage::disk("s3")->allFiles("image/".$type."-360/".$product->image_360."/")) }}" data-spin-reverse autoplay data-speed="300" data-drag-speed="300" data-autoplay data-magnifier="2" data-pointer-zoom="2"></div>');
       window.CI360.init();
   });

});

</script>

@endif

<script type="text/javascript">

$(document).ready(function(){

   $(".other-img").click(function (e) {
    $('.main-image-container').css({'min-height':$('.main-image').innerWidth()+"px"}),
        $(this).css({ border: "solid 1px #d60d8c" }),
       $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
       $(".main-image-container").empty().append("<img class='main-image'>"),
       $(".main-image").attr("src", $(this).attr("src"));
   });
   
   
   $(".video-ctn video").click(function () {
   $(".main-image").length &&
       ($(this).css({ border: "solid 1px #d60d8c" }),
       $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
       $(".main-image").remove(),
       $(".main-image-container").append("<video class='main-image' controls autoplay><source src='" + $(this).get(0).currentSrc + "''></video>"));
   });

});
       
$(document).ready(function () {

    $(".size-btn").click(function (e) {
        $(this).css({ border: "solid 1px #7df048" }).addClass("selected_size"), $(".size-btn").not(this).css({ border: "solid 1px #e6e6e6" }).removeClass("selected_size");
    });

});

</script>

<script type="text/javascript">
    
    var sku = "{{ $product->item_sku }}";
    var type = "{{ $type }}";

</script>

<script type="text/javascript" src="{{ asset('js/product.js?'.time().'') }}"></script>

@endsection