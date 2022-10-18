@extends('layouts.follow')

@section('include')
<link href="{{ asset('css/product.css?'.time().'') }}" rel="stylesheet">

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

<script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/3.0.1/js-cloudimage-360-view.min.js"></script>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection

@section('page-title')

    @if($type == "moissanite")
        Forever One {{ $product->shape }} Moissanite Diamond Jewelry Canada
    @elseif($type == "lab-grown-diamond")
        Lab Created {{ $product->shape }} Diamond Gemstone Jewelry Canada
    @elseif($type == "diamonds")
        Natural Mined {{ $product->shape }} Diamond gemstone Jewelry Canada
    @endif

@endsection

@section('page-description')

    @if($type == "moissanite")
        Shop Forever One Shape {{ $product->shape }} Cut Style Moissanite Brilliant Cut Diamond Stones.Forever Brilliant Moissanite Engagement Rings Canada Surrey Vancouver Langley
    @elseif($type == "lab-grown-diamond")
        Shop Lab Grown Created {{ $product->shape }} Cut Style Diamond Gemstone Stones.Man created synthetic gemstone Engagement Rings Canada Surrey Vancouver Langley
    @elseif($type == "diamonds")
        Shop Natural Mined {{ $product->shape }} Cut Style Diamond gemstone Stones. Earth created made gemstone Engagement Rings Canada Surrey Vancouver Langley
    @endif

@endsection

@section('main')

<x-product-add-cart-notification></x-product-add-cart-notification>

<div class="m-auto" style="max-width: 1000px;">
    <div class="mx-1">
       <x-create-product-stage>
           <x-slot name="stage">stone</x-slot>
       </x-create-product-stage>
    </div>
</div>

<x-popup-custom-stone>
    <x-slot name="shape">{{ $product->shape }}</x-slot>
</x-popup-custom-stone>

<div id="item-container" class="m-auto grid" style="max-width: 1000px;" >

   <div class="item-image">

    @if($type == "moissanite")

    <x-product360-viewer>
        <x-slot name="link">{{$type}}/{{ $product->video_link}}</x-slot>
    </x-product360-viewer>

    <script type="text/javascript">
     window.CI360.init();
    </script>
    
    @else

      @if(strpos($product->video_link,'.mp4') == true || strpos($product->video_link,'.MP4') == true)
      <video width="100%" style="@if(strpos($product->company,'RAJGIR GEMS')) filter: saturate(0.2) hue-rotate(128deg) contrast(1.5) sepia(0); @endif" autoplay loop muted playsinline>
         <source src="{{ $product->video_link }}" type="video/mp4">
      </video>
      @else

      <div class="parent">
         <iframe class="w-full" style="height: 500px;" src="{{$product->video_link}}"></iframe>
      </div>
      
      @endif

    @endif

    <div class="grid grid-cols-4">
        
        <div class="other-img-ctn m-1 cursor-pointer">
            @if($type == "moissanite")
            <img class="other-img main-image-session" alt='{{$product->MM}} {{$product->shape}} {{$product->weight}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ Storage::disk('s3')->url('image/moissanite/'.$product->img_link.'.jpg', env('AWS_TIME')) }}">
            @else
            <img class="other-img main-image-session" alt="{{$product->width}} {{$product->shape}} {{$product->carat}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ $product->img_link }}">
            @endif
        </div>

    </div>

   </div>
   <div class="selection-container ml-2 text-sm">
      <h1 class="text-base"><span class="product-name">{{ $product->name }}</span></h1>

      @if($type == "moissanite")
      @include('include.product-rating')
      @endif

      <div class="main-text-c text-lg" id="{{ $product->price }}">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($product->currency,$product->price,session('currency')),2) }}</div>

      @include('include.product-selection')

      <x-product-purchase-section>
          <x-slot name="type">{{ $type }}</x-slot>
          <x-slot name="sku">{{ $product->item_sku }}</x-slot>
      </x-product-purchase-section>

      <x-product-media-info>
          <x-slot name="type">{{ $type }}</x-slot>
          <x-slot name="name">{{ $product->name }}</x-slot>
      </x-product-media-info>

   </div>
</div>
<div class="bg-zinc-100 mt-4 pb-4">
   @include('include.product-stone-detail')
</div>

@if($type == "moissanite")
@include('include.product-customer-comment')
@endif

<x-shipping-info></x-shipping-info>

@include('include.product-similar')

<script type="text/javascript">
    
    var sku = "{{ $product->item_sku }}";
    var type = "{{ $type }}";

</script>

<script type="text/javascript" src="{{ asset('js/product.js?'.time().'') }}"></script>

@endsection