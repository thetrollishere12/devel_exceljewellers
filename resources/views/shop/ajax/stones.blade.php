@foreach($products as $product)
<div class="shop-products-inner border pb-1">
   <a href="{{url('/'.$type.'/'.$product->item_sku)}}">
      <div class="ajax-ctn relative">

         <div class="absolute w-full t-1 flex justify-between items-center px-2 pt-1">

        <div class="icon-degrees-_1_ z-0 w-20 text-3xl"></div>

        <x-shop-brand-logo>
            <x-slot name="brand">{{ $product->company }}</x-slot>
         </x-shop-brand-logo>
         @if(strpos($product->report,'gia.edu'))
         <img class="w-16" src="{{ url('storage/image/page_img/gia.png') }}">
         @endif
        </div>

         <!--      <div class="preloader-ctn">
            <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
            </div> -->
         <x-shop-stone-product-image>
            <x-slot name="type">{{ $type }}</x-slot>
            <x-slot name="MM">{{ $product->MM }}</x-slot>
            <x-slot name="carat">{{ $product->carat }}</x-slot>
            <x-slot name="shape">{{ $product->shape }}</x-slot>
            <x-slot name="img_link">{{ $product->img_link }}</x-slot>
         </x-shop-stone-product-image>

      </div>
      <div class="p-1">
         <div class="text-xs text-center">{{$product->name}}</div>
         <div class="flex justify-center gap-x-2 text-xs">
            <div><b>Color:</b> {{$product->color}}</div>
            <div><b>Clarity:</b> {{ $product->clarity }}</div>
            @if($product->cut)
            <div><b>Cut:</b> {{ $product->cut }}</div>
            @endif
         </div>
         <div class="main-text-c text-sm text-center">${{ number_format(\App\Helper\AppHelper::conversion($product->currency,$product->price,session('currency')),2) }}</div>
      </div>
   </a>
</div>
@endforeach