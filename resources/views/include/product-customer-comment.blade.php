<div class="review">
   <div class="text-center text-xl py-8">CUSTOMER REVIEWS</div>
   @if(count($reviews) > 0)
   <div class="review-container">
      @foreach($reviews as $reviews)
      <div class="review-inner">
         <div class="review-comment">
            @for($i = 0; $i < $reviews->ratings; $i++)
            <span class="yellow">★</span>
            @endfor
            @php
            $missing = 5 - $i 
            @endphp
            @for($i = 0; $i < $missing; $i++)
            <span class="grey">★</span>
            @endfor
            <div>{{ \Carbon\Carbon::parse($reviews->created_at)->format('M d, Y') }}</div>
            <div class="review-img">
               <img src="{{ asset('storage/image/page_img/profile.jpg') }}">
            </div>
            <div>{{ $reviews->comment }}</div>
            <div>Brandon Khang</div>
         </div>
      </div>
      @endforeach
   </div>
   @else
   <div class="text-center text-sm py-12">No Reviews</div>
   @endif
</div>