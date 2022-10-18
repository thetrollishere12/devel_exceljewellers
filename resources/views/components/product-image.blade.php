<div class="main-image-container">
   <img class="main-image" alt="{{$metal}} {{$color}} {{$style}} {{ $name }} Surrey Vancouver Canada Langley Burnaby Richmond" id="{{ $name }}" src="{{ Storage::disk('s3')->url('image/'.$type.'/'.$image.'-1.jpg', env('AWS_TIME')) }}" width="100%" data-magnify-src="{{ Storage::disk('s3')->url('image/'.$type.'/'.$image.'-1.jpg', env('AWS_TIME')) }}">
</div>