@if(!$vid->isEmpty())
   @foreach ($product->vid as $v)
      <li class="splide__slide">
         <div class="other-img-ctn cursor-pointer m-1 video-ctn">
            <div class="icon-play" id="play-video"></div>
            <video class="other-video">
               <source src="{{asset('storage/video/'.$v->video.'')}}" type="video/mp4">
            </video>
         </div>
      </li>
   @endforeach
@endif