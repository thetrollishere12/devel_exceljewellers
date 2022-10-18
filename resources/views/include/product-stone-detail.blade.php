<div class="text-center text-xl py-8">PRODUCTS DETAILS</div>

<div class="m-auto grid gap-x-2 grid-cols-1 md:grid-cols-3 text-xs" style="max-width: 1000px;">


   <div class="capitalize p-2">
      <div class="border-b font-bold border-zinc-300 pb-0.5 mb-0.5">PRODUCT DESCRIPTION</div>
      {{ $product->name }}
   </div>


   <div class="capitalize p-2">
      <div class="border-b font-bold border-zinc-300 pb-0.5 mb-0.5">PRODUCT DETAILS</div>
      <div class="py-0.5"><b>SKU:</b> <span class="item_sku">{{ $product->item_sku }}</span></div>

      @if($type == "moissanite")
      <div class="py-0.5 gap-x-1 flex">
         <b>Brand:</b><img class="w-20" src="{{ url('storage/image/logo/charlescolvard.svg') }}">
      </div>
      @endif

      @if(isset($product->type) && !empty($product->type))
      <div><b>Style:</b> {{ $product->type }}</div>
      @endif

      @if(isset($product->shape) && !empty($product->shape))
      <div><b>Shape:</b> {{ $product->shape }}</div>
      @endif

      @if(isset($product->grade) && !empty($product->grade))
      <div><b>Grade:</b> D-E-F Colour</div>
      @endif

      @if(isset($product->carat) && !empty($product->carat))
      <div><b>Carat:</b> {{ $product->carat }}</div>
      @endif

      @if(isset($product->width) && !empty($product->width))
      <div><b>Width:</b> {{ $product->MM }}mm</div>
      @endif

      @if(isset($product->color) && !empty($product->color))
      <div><b>Color:</b> {{ $product->color }}</div>
      @endif

      @if(isset($product->clarity) && !empty($product->clarity))
      <div><b>Clarity:</b> {{ $product->clarity }}</div>
      @endif

      @if(isset($product->cut) && !empty($product->cut))
      <div><b>Cut:</b> {{ $product->cut }}</div>
      @endif

      @if(isset($product->polish) && !empty($product->polish))
      <div><b>Polish:</b> {{ $product->polish }}</div>
      @endif

      @if(isset($product->MM) && !empty($product->MM))
      <div><b>MM:</b> {{ $product->MM }}</div>
      @endif

      @if($type == "moissanite")
      <div class="py-0.5"><b>Color:</b> D-E-F Color</span></div>
      @endif

      @if(isset($product->report) && !empty($product->report))

      <div class="capitalize pt-2">
         <div class="border-b font-bold border-zinc-300 pb-0.5 mb-0.5">STONE CERTIFICATION</div>

         <div><b>Certificate Number:</b> <span class="item_certificate">{{ $product->certificate }}</span></div>

         <div><b>Certificate Report:</b> <a href="{{$product->report}}" target="_blank">Click To View Report</a></div>

         <div>@if(strpos($product->report,'gia.edu')) <img class="w-20" src="{{ url('storage/image/page_img/gia.png') }}">@endif</div>

      </div>

      @endif

   </div>
  
   <div class="capitalize p-2">
      <div class="border-b font-bold border-zinc-300 pb-0.5 mb-0.5">STONE DIMENSION</div>

      <div class="product-diagram-ctn p-2 w-52 relative">

         @if($type == "moissanite")
            
            @if($product->shape == "Round" || $product->shape == "Cushion" || $product->shape == "Trillion" || $product->shape == "Square" || $product->shape == "Asscher" || $product->shape == "Heart")
            <div class="top absolute bg-zinc-100">{{ $product->MM }}mm</div>
            <div class="side absolute bg-zinc-100">{{ $product->MM }}mm</div>
            @else
            <div class="top absolute bg-zinc-100">{{ explode("x",$product->MM)[1] }}mm</div>
            <div class="side absolute bg-zinc-100">{{ explode("x",$product->MM)[0] }}mm</div>
            @endif

         @else
         <div class="top absolute bg-zinc-100">{{ $product->width }}mm</div>
         <div class="side absolute bg-zinc-100">{{ $product->length }}mm</div>
         @endif

         <img class="product-diagram" src="{{url('storage/image/moissanite/gem-shape/dimension/'.$product->shape.'.png')}}">        
      </div>
   </div>


</div>


<style type="text/css">
 
.product-diagram-ctn .top {
    top: 8%;
    left: 60%;
    transform: translate(-50%,-50%);
    padding:10px;
}

.product-diagram-ctn .side {
    top: 55%;
    left:-5%;
    transform: translate(-50%,-50%);
    padding:10px;
    -ms-transform: rotate(-90deg);
    transform: rotate(-90deg);
}

</style>