<div class="modal fade" id="search-moodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel">Search</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="modal-inventory" class="modal-body">
       
          <div>

            <form method="GET" action="{{url('/search')}}">
              <div class="grid grid-cols-8">
                <div class="col-span-7"><input placeholder="Search For Anything" required class="text-sm border-t border-l border-b w-full border-r-0 border-inherit rounded-l-lg" type="text" name="search"></div>
                <div><button class="text-sm px-3 py-2 main-bg-c main-b-c border text-white rounded-r-lg w-full"><span class="icon-search"></span></button></div>
              </div>
            </form>

            <div>
              
              <div class="pt-4 pb-2 text-center">What Others Have Looked At</div>

              <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-1">
                  @foreach($products as $product)      
                    <div class="shop-products-inner p-1 border">

                      @if($product['file_type'] == "natural-diamond")
                      <a href="{{url('/diamonds/'.$product['item_sku'])}}">
                      @else
                      <a href="{{url('/'.$product['file_type'].'/'.$product['item_sku'])}}">
                      @endif

                        <div class="ajax-ctn relative">
                     <!--      <div class="preloader-ctn">
                            <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
                          </div> -->

                          <x-shop-product-image>
                              <x-slot name="type">{{ $product["file_type"] }}</x-slot>
                              <x-slot name="color">{{ $product["color"] }}</x-slot>
                              <x-slot name="style">{{ $product["style"] }}</x-slot>
                              <x-slot name="brand">{{ $product["brand"] }}</x-slot>
                              <x-slot name="name">{{ $product["name"] }}</x-slot>
                              <x-slot name="image">{{ $product["image"] }}</x-slot>
                              <x-slot name="metal">{{ $product["metal"] }}</x-slot>
                            </x-shop-product-image>

                        </div>

                        @if($product['sale_price'])
                        <div class="sale_label">LIMITED TIME OFFER</div>
                        @endif

                        <div style="font-size:11px;">
                          <p class="text-center">{{$product['name']}}</p>
                          @if($product['sale_price'])
                          <p><span class="text-sale-price">${{ number_format(\App\Helper\AppHelper::conversion($product['currency'],$product['sale_price'],session('currency')),2) }}</span> <span class="cross-text-price">${{ number_format(\App\Helper\AppHelper::conversion($product['currency'],$product['price'],session('currency')),2) }}</span></p>
                          @else
                          <p class="main-text-c text-center product-price">${{ number_format(\App\Helper\AppHelper::conversion($product['currency'],$product['price'],session('currency')),2) }}</p>
                          @endif  
                        </div>

                      </a>
                    </div>
                  @endforeach
              </div>

            </div>


          </div>
        
      </div>

    </div>
  </div>
</div>