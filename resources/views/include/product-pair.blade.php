@if(count($pairs)>0)
<div class="text-center m-auto w-full">
   <div class="text-center text-xl py-8">MATCHING WEDDING BAND</div>
   <div class="inline-block border border-zinc-100 shadow-md rounded px-4 pb-2">
      @foreach($pairs as $pair)
      <a href="{{url('/wedding-band/'.$pair->item_sku)}}">
         <div class="pair-cell">
            <img style="width: 250px;" alt="{{$pair->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/wedding-band-list/'.$pair->image.'-1.jpg') }}">
            <h3 class="text-sm">{{$pair->name}}</h3>
            <p class="main-text-c text-sm">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($pair->currency,$pair->price,session('currency')),2) }}
            </p>
         </div>
      </a>
      @endforeach
   </div>
</div>
@endif