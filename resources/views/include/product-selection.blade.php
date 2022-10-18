@if($type == "engagement-ring")

      <div class="py-2">
         <x-product-ring-size></x-product-ring-size>
      </div>

      <x-product-engraving></x-product-engraving>

      @include('include.product-metal')

      @if(isset($shape))

          @if(!sizeof($shape) == 0)
          <div class="main-text-c text-base pt-1">View In Other Shapes</div>
          <div class="flex flex-wrap">
             <div class="text-center main-t-c py-2 pr-6">
                <span class="text-base icon-{{strtolower($product->stoneshape)}}" style="font-weight: 700 !important;"></span>
                <p class="text-xs">{{$product->stoneshape}}</p>
             </div>
             @foreach($shape as $s)
             <a href="{{url('/'.$type.'/'.$s->item_sku)}}">
                <div class="text-center py-2 pr-6">
                   <span class="text-base icon-{{strtolower($s->stoneshape)}}" style="font-weight: 700 !important;"></span>
                   <p class="text-xs">{{$s->stoneshape}}</p>
                </div>
             </a>
             @endforeach
          </div>
          @endif

      @endif

@elseif($type == "wedding-band")

            @if($size)

            <div class="size-container">
                <select onchange="location = this.value;">
                    <option class="size-disabled" selected="true">Ring Size - {{ $product->size }}</option>
                    @foreach($size as $s)
                    <option value="{{url('/wedding-band/'.$s->item_sku)}}">Ring Size - {{ $s->size }}</option>
                    @endforeach
                </select>
            </div>

            @else
            <x-product-ring-size></x-product-ring-size>
            @endif

            <x-product-engraving></x-product-engraving>

            @include('include.product-metal')
            
            @if(count($mm) > 0)
            <div class="py-2">MM Available In</div>
            <div class="stones-container">
                <select onchange="location = this.value">
                        <option value="{{url('/wedding-band/'.$product->width.'')}}" class="width-case {{ $product->width }}">{{$product->width }} MM</option>
                    @foreach($mm as $m)
                        <option value="{{url('/wedding-band/'.$m->item_sku.'')}}" class="width-case {{ $m->width }}">{{ $m->width }} MM</option>
                    @endforeach   
                </select> 
            </div>
            @endif

            @if(count($thickness) > 0)
            <div class="py-2">Thickness Available In</div>
            <div class="stones-container">
                <select onchange="location = this.value">
                        <option value="{{url('/wedding-band/'.$product->item_sku.'')}}" selected class="width-case {{ $product->thickness }}">{{$product->thickness }} MM</option>
                    @foreach($thickness as $t)
                        <option value="{{url('/wedding-band/'.$t->item_sku.'')}}" class="width-case {{ $t->thickness }}">{{ $t->thickness }} MM</option>
                    @endforeach   
                </select> 
            </div>
            @endif
            
            @if(count($carats)>0)
            <div class="py-2">Carats Available In</div>
            <div class="carat-container">
                @foreach($carats as $carat)
                    @if($carat->carat != 0)
                    <a href="{{url('/wedding-band/'.$carat->item_sku.'')}}"><div class="carat-case {{ $carat->carat }}">{{ $carat->carat }} - CT</div></a>
                    @endif
                @endforeach    
            </div>
            @endif

@elseif($type == "fine-jewellery")

            @if($product->category == "Rings" || $product->category == "rings")
            <x-product-ring-size></x-product-ring-size>
            <x-product-engraving></x-product-engraving>
            @endif

            @include('include.product-metal')
            
            <!--  -->
            @if(count($stone_carat)>0)
            <div class="py-2">Carat Available In</div>
            <div class="flex flex-wrap text-xs gap-2">
                @foreach($stone_carat as $size)
                    <a href="{{url('/fine-jewellery/'.$size->item_sku.'')}}"><div class="bg-cyan-100 text-gray-600 w-10 text-center py-3 {{ $size->carat }}">{{ $size->carat }}</div></a>
                @endforeach   
            </div>
            @endif
            <!--  -->

            <!--  -->
            @if(count($fine_size)>0)
            <div class="py-2">Size Available In</div>
            <div class="flex flex-wrap text-xs gap-2">
                @foreach($fine_size as $size)
                    <a href="{{url('/fine-jewellery/'.$size->item_sku.'')}}"><div class="bg-violet-100 text-gray-600 w-10 text-center py-3 {{ $size->size }}">{{ $size->size }}</div></a>
                @endforeach   
            </div>
            @endif
            <!--  -->

            <!--  -->
            @if(count($stone_mm)>0)
            <div class="py-2">MM Available In</div>
            <div class="flex flex-wrap text-xs gap-2">
                @foreach($stone_mm as $size)
                    <a href="{{url('/fine-jewellery/'.$size->item_sku.'')}}"><div class="bg-violet-100 text-gray-600 w-10 text-center py-3 {{ $size->stone_width }}">{{ $size->stone_width }}MM</div></a>
                @endforeach   
            </div>
            @endif

            @if(count($clarity)>0)
            <div class="py-2">Color/Clarity Available In</div>
            <div class="flex flex-wrap text-xs gap-2">
                @foreach($clarity as $c)
                    <a href="{{url('/fine-jewellery/'.$c->item_sku.'')}}"><div class="bg-teal-100 text-gray-600 px-2 text-center py-3">{{ $c->diamond_color }} / {{ $c->diamond_clarity }}</div></a>
                @endforeach   
            </div>
            @endif

            @if(count($initials)>0)
            <div class="py-2">Letters Available In</div>
            <div>
                <select class="text-sm py-0.5 pl-1.5 pr-8" onchange="location = this.value">
                    <option value="{{url('/fine-jewellery/'.$product->item_sku.'')}}" class="stones-case {{ $product->item_sku }}">Letter {{$product->item_sku[6] }}</option>
                @foreach($initials as $initial)

                    <option value="{{url('/fine-jewellery/'.$initial->item_sku.'')}}" class="stones-case {{ $initial->item_sku }}">Letter {{ $initial->item_sku[6] }}</option>

                @endforeach   
                </select> 
            </div>
            @endif

            @if(count($other_stones) > 0)
            <div class="py-2">Stone Available In</div>
            <div>
                <select class="text-sm py-0.5 pl-1.5 pr-8" onchange="location = this.value">
                        <option value="{{url('/fine-jewellery/'.$product->item_sku.'')}}" class="stones-case {{ $product->main_stone }}">{{ucfirst(strtolower($product->main_stone)) }}</option>
                    @foreach($other_stones as $other_stone)
                        <option value="{{url('/fine-jewellery/'.$other_stone->item_sku.'')}}" class="stones-case {{ $other_stone->main_stone }}">{{ ucfirst(strtolower($other_stone->main_stone)) }}</option>
                    @endforeach   
                </select> 
            </div>
            @endif

@endif