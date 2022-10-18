@if(!sizeof($metals) == 0)
<div class="main-text-c text-base pt-1">Available In Metals</div>
<div class="flex flex-wrap gap-2">
   @foreach($metals as $metal)
   @if($metal->color == "Platinum"||$metal->color == "platinum")
   <a href="{{url('/'.$type.'/'.$metal->item_sku.'')}}">
      <div class="metal-case text-gray-600 text-xs mr-1 w-10 text-center py-3.5 {{ $metal->color }}">PLAT</div>
   </a>
   @elseif($metal->color == "Silver"||$metal->color == "silver")
   <a href="{{url('/'.$type.'/'.$metal->item_sku.'')}}">
      <div class="metal-case text-gray-600 text-xs mr-1 w-10 text-center py-3.5 {{ $metal->color }}">SLVR</div>
   </a>
   @else
   <a href="{{url('/'.$type.'/'.$metal->item_sku.'')}}">
      <div class="metal-case text-gray-600 w-10 text-center py-3.5 text-xs mr-1 {{ $metal->color }}">{{ $metal->metal }}{{ $metal->color[0] }}</div>
   </a>
   @endif
   @endforeach
</div>
@endif