<div class="modal fade" id="stone-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel">Start With Stone</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="modal-inventory" class="modal-body">
       
          <div class="grid grid-cols-3">

            <div class="hover:scale-105 duration-200">
                <a href="{{url('/diamonds')}}">
                    <div><img class="w-32 mx-auto p-2" src="{{ asset('storage/image/page_img/stone_natural.png?1') }}"></div>
                    <div class="text-xs text-center">Look At Natural Diamond</div>
                </a>
            </div>

            <div class="hover:scale-105 duration-200">
                <a href="{{url('/lab-grown-diamond')}}">
                  <div><img class="w-32 mx-auto p-2" src="{{ asset('storage/image/page_img/stone_lab.png?1') }}"></div>
                  <div class="text-xs text-center">Look At Lab Diamond</div>
                </a>
            </div>

            <div class="hover:scale-105 duration-200">
                <a href="{{url('/moissanite')}}">
                    <div><img class="w-32 mx-auto p-8" src="{{ asset('storage/image/page_img/stone_moissanite.png?1') }}"></div>
                    <div class="text-xs text-center">Look At Moissanite</div>
                  </a>
            </div>

          </div>
        
      </div>

    </div>
  </div>
</div>