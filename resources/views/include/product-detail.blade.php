<div class="text-center text-xl py-8">PRODUCTS DETAILS</div>

<div class="m-auto grid gap-x-2 grid-cols-1 @if($type == 'engagement-ring') md:grid-cols-3 @else md:grid-cols-2 @endif text-xs" style="max-width: 1000px;">


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

      @if(isset($product->carat) && $product->carat > 0)
      <div class="py-0.5"><b>Carat:</b> {{ $product->carat }}</div>
      @endif

      @if(isset($product->width) && !empty($product->width))
      <div class="py-0.5"><b>Width:</b> {{ $product->width }}mm</div>
      @endif

      @if(isset($product->setting_type) && !empty($product->setting_type))
      <div class="py-0.5"><b>Setting Type:</b> {{ $product->setting_type }}</div>
      @endif

       @if(isset($product->main_stone) && !empty($product->main_stone))
       <div class="py-0.5"><b>Main Stones:</b> {{ $product->main_stone }}</div>
       @endif
       @if(isset($product->other_stone) && !empty($product->other_stone))
       <div class="py-0.5"><b>Other Stones:</b> {{ $product->other_stone }}</div>
       @endif

       @if(isset($product->diamond_color) && !empty($product->diamond_color))
       <div class="py-0.5"><b>Diamond Color:</b> {{ $product->diamond_color }}</div>
       @endif

       @if(isset($product->diamond_clarity) && !empty($product->diamond_clarity))
       <div class="py-0.5"><b>Diamond Clarity:</b> {{ $product->diamond_clarity }}</div>
       @endif

       @if(isset($product->size) && !empty($product->size))
       <div class="py-0.5"><b>Size:</b> {{ $product->size }}</div>
       @endif

      @if(isset($product->width) && !$product->width == 0)
      <div class="py-0.5"><b>Width:</b> {{ $product->width }}mm</div>
      @endif

      @if(isset($product->thickness) && !empty($product->thickness))
      <div class="py-0.5"><b>Thickness:</b> {{ $product->thickness }}mm</div>
      @endif

      @if(isset($product->category) && !empty($product->category))
      <div class="py-0.5"><b>Category:</b> {{$product->category}}</span></div>
      @endif

   </div>

   @if(isset($product->stoneshape))
   <div class="capitalize p-2">
      <div class="border-b font-bold border-zinc-300 pb-0.5 mb-0.5">CAN BE SET WITH</div>
      <div>
         <div>{{ $product->stoneshape }} <span class="icon-{{strtolower($product->stoneshape)}}" style="font-weight: 700 !important;"></span></div>
         @foreach($shape as $s)
         <div>{{$s->stoneshape}} <span class="icon-{{strtolower($s->stoneshape)}}" style="font-weight: 700 !important;"></span></div>
         @if($s->stoneshape == "Princess")
         <div>Square <span class="icon-square" style="font-weight: 700 !important;"></span></div>
         @endif
         @endforeach
      </div>
      <div style="font-size: 10px;">*Can be set with center stone size from 0.50 ct to 1 carat. Other stone shape & sizes above 1 carat price maybe higher.</div>
      <div style="font-size: 10px;">*Other stone shape & sizes require a quotation</div>
   </div>
   @endif


</div>