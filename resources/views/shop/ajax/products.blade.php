@foreach($products as $product)

  <div class="shop-products-inner border pb-1">

    <a href="{{url('/'.$type.'/'.$product['product']->item_sku)}}">
      <div class="ajax-ctn relative">

        <div class="absolute w-full t-1 flex justify-between items-center px-2 pt-1">

        <x-shop-360-logo>
          <x-slot name="view">{{ $product['product']->image_360 }}</x-slot>
        </x-shop-360-logo>

        <x-shop-brand-logo>
          <x-slot name="brand">{{ $product['product']->brand }}</x-slot>
        </x-shop-brand-logo>

        </div>

   <!--      <div class="preloader-ctn">
          <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
        </div> -->

        <x-shop-product-image>
          <x-slot name="type">{{ $type }}</x-slot>
          <x-slot name="color">{{ $product["product"]->color }}</x-slot>
          <x-slot name="style">{{ $product["product"]->style }}</x-slot>
          <x-slot name="brand">{{ $product["product"]->brand }}</x-slot>
          <x-slot name="name">{{ $product["product"]->name }}</x-slot>
          <x-slot name="image">{{ $product["product"]->image }}</x-slot>
          <x-slot name="metal">{{ $product["product"]->metal }}</x-slot>
        </x-shop-product-image>

      </div>

      <div class="colors text-center">

          <div class="rounded-full inline-block p-1.5 {{$product['product']->color}}-code alt-m" data-img="{{ Storage::disk('s3')->url('image/'.$type.'-list/'.$product['product']->image.'-1.jpg', env('AWS_TIME')) }}" data-link="{{url('/'.$type.'/'.$product['product']->item_sku)}}" data-name="{{$product['product']->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($product['product']->currency,$product['product']->price,session('currency')),2) }}"></div>

          @foreach($product['other_color'] as $other => $o)
            <div class="rounded-full inline-block p-1.5 {{$o->color}}-code alt-m" data-img="{{ Storage::disk('s3')->url('image/'.$type.'-list/'.$o->image.'-1.jpg', env('AWS_TIME')) }}" data-link="{{url('/'.$type.'/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
          @endforeach

      </div>

      @if($product['product']->sale_price)
      <div class="main-bg-c text-center text-white text-sm py-1 my-1">LIMITED TIME OFFER</div>
      @endif

      <div class="p-1">
        <div class="text-xs text-center product-name">{{$product['product']->name}}</div>
        @if($product['product']->sale_price)
        <div class="text-sm text-center">
          <span class="main-text-c product-price">${{ number_format(\App\Helper\AppHelper::conversion($product['product']->currency,$product['product']->sale_price,session('currency')),2) }}</span>
          <span class="line-through">${{ number_format(\App\Helper\AppHelper::conversion($product['product']->currency,$product['product']->price,session('currency')),2) }}</span>
        </div>
        @else
        <div class="main-text-c text-sm text-center product-price">${{ number_format(\App\Helper\AppHelper::conversion($product['product']->currency,$product['product']->price,session('currency')),2) }}</div>
        @endif  
      </div>

    </a>
  </div>
@endforeach