<div class="other-container">
   <div class="text-center text-xl py-8">SIMILAR PRODUCTS</div>
   <div class="splide splide_similar">
     <div class="splide__track">
           <ul class="splide__list text-center">

              @if($type == "moissanite")

                @foreach($similar as $similar)
                 
                 <li class="splide__slide text-center text-xs">
                    <div class="p-8">
                       <a href="{{url('/'.$type.'/'.$similar->item_sku)}}">
                          <img class="m-auto" alt="{{$similar->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/moissanite/'.$similar->img_link.'.jpg') }}">
                          <h3 class="text-sm">{{$similar->name}}</h3>
                          <p class="main-text-c">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($similar->currency,$similar->price,session('currency')),2) }}</p>
                       </a>
                    </div>
                 </li>
              
                 @endforeach

              @elseif($type == "lab-grown-diamond" || $type == "diamonds")

                @foreach($similar as $similar)
                 
                 <li class="splide__slide text-center text-xs">
                    <div class="p-8">
                       <a href="{{url('/'.$type.'/'.$similar->item_sku)}}">
                          <img class="m-auto" alt="{{$similar->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ $product->img_link }}">
                          <h3 class="text-sm">{{$similar->name}}</h3>
                          <p class="main-text-c">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($similar->currency,$similar->price,session('currency')),2) }}</p>
                       </a>
                    </div>
                 </li>
              
                 @endforeach

              @else

               @foreach($similar as $similar)
               
               <li class="splide__slide text-center text-xs">
                  <div class="p-8">
                     <a href="{{url('/'.$type.'/'.$similar->item_sku)}}">
                        <img class="m-auto" alt="{{$similar->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{  Storage::disk('s3')->url('image/'.$type.'-list/'.$similar->image.'-1.jpg', env('AWS_TIME')) }}">
                        <h3 class="text-sm">{{$similar->name}}</h3>
                        <p class="main-text-c">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($similar->currency,$similar->price,session('currency')),2) }}</p>
                     </a>
                  </div>
               </li>
            
               @endforeach

              @endif

           </ul>
     </div>
   </div>
</div>



<script type="text/javascript">

var splide = new Splide( '.splide_similar', {
  type   : 'loop',
  perPage: 5,
  perMove: 1,
  focus  : 'center',
  breakpoints: {
    1500: {
      perPage: 4,
     
    },
    1200: {
      perPage: 3,
     
    },
    1000: {
      perPage: 2,
  
    },
    700: {
      perPage: 1,

    },
  },
  updateOnMove : true,
} );

splide.mount();   

</script>

<style type="text/css">
   
.splide__pagination{
   display: none;
}

</style>
