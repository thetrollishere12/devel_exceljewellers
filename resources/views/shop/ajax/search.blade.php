@foreach($products as $product)      
  <div class="shop-products-inner border pb-1">

    @if($product['file_type'] == "natural-diamond")
    <a href="{{url('/diamonds/'.$product['link_sku'])}}">
    @else
    <a href="{{url('/'.$product['file_type'].'/'.$product['link_sku'])}}">
    @endif

      <div class="ajax-ctn relative">
        
        <div class="absolute w-full t-1 flex justify-between items-center px-2 pt-1">

        <x-shop-360-logo>
          <x-slot name="view">{{ $product['image_360']}}</x-slot>
        </x-shop-360-logo>

        <x-shop-brand-logo>
          <x-slot name="brand">{{ $product['brand'] }}</x-slot>
        </x-shop-brand-logo>

        </div>
        
   <!--      <div class="preloader-ctn">
          <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
        </div> -->

        <img class="ajax-img" alt='@if($product["color"] == "Platinum")Platinum @else {{$product["metal"]}} {{$product["color"]}} Gold @endif {{$product["style"]}} {{$product["name"]}}  {{$product["brand"]}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ $product['image'] }}">

      </div>

      <div class="colors text-center">
          <div class="rounded-full inline-block p-1.5 {{ $product['color']}}-code alt-m"></div>
      </div>

      @if($product['sale_price'])
      <div class="main-bg-c text-center text-white text-sm py-1 my-1">LIMITED TIME OFFER</div>
      @endif

      <div class="p-1">
        <div class="text-xs text-center product-name">{{$product['name']}}</div>

        @if($product['sale_price'])
        <div class="text-sm text-center">
          <span class="main-text-c product-price">${{ number_format(\App\Helper\AppHelper::conversion($product['currency'],$product['sale_price'],session('currency')),2) }}</span>
          <span class="line-through">${{ number_format(\App\Helper\AppHelper::conversion($product['currency'],$product['price'],session('currency')),2) }}</span>
        </div>
        @else
        <div class="main-text-c text-sm text-center product-price">${{ number_format(\App\Helper\AppHelper::conversion($product['currency'],$product['price'],session('currency')),2) }}</div>
        @endif  

      </div>

    </a>
  </div>
@endforeach