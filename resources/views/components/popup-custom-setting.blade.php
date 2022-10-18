<div class="modal fade" id="custom-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
  
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="modal-inventory" class="modal-body">
       
          <div class="grid grid-cols-1 md:grid-cols-3">

            <div>


                @if(session('create_ring.engagement-ring'))
               <div><img class="w-24 m-auto" src="{{ Storage::disk('s3')->url('image/engagement-ring-list/'.$image.'-1.jpg', env('AWS_TIME')) }}"></div>
               <div class="text-center">
               <button id="select-custom-product" class="text-sm main-bg-c text-white rounded border-0 px-4 py-2">CHANGE SETTING</button>
           </div>
               @elseif(session('create_ring.stone'))

                <div class="grid grid-cols-1 md:grid-cols-3 content-center">

                    <div>
                        <img class="w-24 m-auto" src="{{ Storage::disk('s3')->url('image/engagement-ring-list/'.$image.'-1.jpg', env('AWS_TIME')) }}">
                    </div>

                    <div class="grid content-center text-center">
                        <div class="text-3xl text-gray-700">+</div>
                    </div>

                    <div><img class="w-24 m-auto" src="{{ asset('storage/image/moissanite/gem-shape/'.$stoneshape.'.jpg') }}"></div>

                </div>



               <div class="text-center">
                   <button  id="select-custom-product" class="text-sm main-bg-c text-white rounded border-0 px-4 py-2">ADD SETTING WITH STONE</button>
               </div>
               @else
               <div>
                   <img class="w-24 m-auto" src="{{ asset('storage/image/moissanite/gem-shape/'.$stoneshape.'.jpg') }}">
               </div>
               <div class="text-center">
                   <button id="select-custom-product" class="text-sm main-bg-c text-white rounded border-0 px-4 py-2">ADD WITH STONE</button>
               </div>
               @endif


            </div>

            <div class="grid content-center text-center">
                <div class="py-10">
                    <div class="main-bg-c text-white rounded-full inline-block p-3">OR</div>
                </div>
            </div>

            <div>
                <div>
                   <img class="w-24 m-auto" src="{{ asset('storage/image/moissanite/gem-shape/'.$stoneshape.'.jpg') }}">
               </div>
               <div class="text-center">
                <button id="add-to-cart" class="text-sm main-bg-c text-white rounded border-0 px-4 py-2">BUY WITH FREE 6.5MM {{ strtoupper($stoneshape) }} CZ CENTER STONE</button>
            </div>
            </div>

          </div>
        
      </div>

    </div>
  </div>
</div>