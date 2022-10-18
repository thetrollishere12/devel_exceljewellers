 @foreach($images as $img)
<li class="splide__slide">
    <div class="other-img-ctn cursor-pointer m-1">
      <img alt="{{$product->metal}} {{$product->color}} {{$product->style}} {{ $product->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ Storage::disk('s3')->url('image/'.$type.'/'.$img, env('AWS_TIME')) }}">
    </div>
</li>
 @endforeach