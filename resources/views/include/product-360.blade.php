@if(isset($product->image_360))
   @if(Storage::disk('s3')->exists('image/'.$type.'-360/'.$product->image_360.'/') == true)
      <li class="splide__slide">
         <div class="other-img-ctn m-1 cursor-pointer other-img-ctn-360">
            <div class="click-360">
               <img class="img-360" src="{{ asset('storage/image/icons/360.jpg') }}">
               <div class="icon-degrees text-5xl absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2"></div>
            </div>
         </div>
      </li>
   @endif
@endif