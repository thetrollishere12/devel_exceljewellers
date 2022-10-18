@if($type == "engagement-ring")
<button data-bs-toggle="modal" data-bs-target="#custom-modal" class="main-bg-c text-white rounded mt-2 py-2 px-8">Choose This Setting</button>
@elseif($type == "moissanite" || $type == "lab-grown-diamond" || $type == "diamonds")
<button data-bs-toggle="modal" data-bs-target="#custom-modal" class="main-bg-c text-white rounded mt-2 py-2 px-8">Choose Stone</button>
@else
<button class="add-to-cart main-bg-c text-white rounded mt-2 py-2 px-8" id="add-to-cart">Add To Cart</button>
@endif

@auth
<button id="{{$sku}}" class="favourite main-bg-c text-white rounded py-2 px-3"><span class="icon-heart-o"></span></button>
@endauth
@guest
<a href="{{ url('/login?link=') }}{{ $_SERVER['REQUEST_URI'] }}"><button class="favourite main-bg-c text-white rounded py-2 px-3"><span class="icon-heart-o"></span></button></a>
@endguest