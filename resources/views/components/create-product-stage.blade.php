<!-- <div class="stage-container pt-1">
    <div class="wizard2-steps">
        <div class="cyo-bar-step step step-item " data-view-link="/engagement-ring-settings/">
            <div class="node">
                <div class="node-skin" style="border-left: 1px solid #e5e5e5;">
                    <div class="num number-1" style="padding-left: 16px;">1</div>

                    <div class="cont">
                        @if(session('create_ring.engagement-ring'))

                            ${{ number_format(\App\Helper\AppHelper::conversion(session('create_ring.engagement-ring')['currency'],session('create_ring.engagement-ring')['price'],session('currency')),2) }}
                            <a href="{{ url('/engagement-ring/'.session('create_ring.engagement-ring')['id'].'') }}">
                                <div class="view-btn">View</div>
                            </a>
                            <a href="{{ url('/engagement-ring')}}">
                                <div id="change-eng" class="change-btn">Change</div>
                            </a>

                        @else
                        <a class="uncomplete-eng" href="{{ url('/engagement-ring')}}">Select Setting</a> @endif
                    </div>
                    <div class="pho">
                        @if(session('create_ring.engagement-ring'))
                                <img class="stage-img" src="{{ session('create_ring.engagement-ring')['img'] }}">
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="cyo-bar-step step step-item " data-view-link="/design-your-own-engagement-ring/">
            <div class="node">
                <div class="node-skin node-skin-diamond">
                    <div style="padding-left: 16px;" class="num number-2">2</div>

                    <div class="cont">
                        @if(session('create_ring.stone'))

                        <span class="dia_retail">${{ number_format(\App\Helper\AppHelper::conversion(session('create_ring.stone')['currency'],session('create_ring.stone')['retail'],session('currency')),2) }}</span>
                        <a href="{{ url('/diamonds#/'.session('create_ring.stone')['stone_id'].'') }}">
                            <a href="{{ session('create_ring.stone')['url'] }}">
                                <div class="view-btn">View</div>
                            </a>
                        </a>
                        <a href="{{ url('/diamonds') }}">
                            <div id="change-dia" class="change-btn">Change</div>
                        </a>

                        @else
                        <a class="uncomplete-dia select-stones" href="{{ url('/diamonds')}}">Select Stone</a> @endif

                    </div>
                    <div class="pho">
                        @if(session('create_ring.stone'))
                        <img class="stage-img" id="{{ session('create_ring.stone')['stone_id'] }}" src="{{ asset('storage/image/moissanite/gem-shape/'.session('create_ring.stone')['shape'].'.jpg') }}">
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="cyo-bar-step step step-item active-step" data-view-link="/design-your-own-engagement-ring/">
            <div class="node">
                <div class="node-skin" style="border-left: 16px solid transparent;">
                    @if(session('create_ring.stone') && session('create_ring.engagement-ring'))
                    <div class="num number-3 complete-3">3</div>
                    @else
                    <div class="num number-3">3</div>
                    @endif

                    <div class="cont">
                        @if(session('create_ring.stone') && session('create_ring.engagement-ring'))
                        <div>
                            <a class="complete-ring" href="{{ url('/complete-ring')}}">
                                <span class="complete-ring-icon icon-diamond-ring"></span><div class="stage-text view-ring">View Ring</div>
                            </a>
                        </div>
                        @elseif(session('create_ring.engagement-ring'))
                        <a href="{{ url('/diamonds') }}"><div class="stage-text">Complete Ring</div></a>
                        @elseif(session('create_ring.stone'))
                        <a href="{{ url('/engagement-ring') }}"><div class="stage-text">Complete Ring</div></a>
                        @else
                        <div class="stage-text">Complete Ring</div>
                        @endif
                    </div>

                    <div class="pho cont-3"></div>
                </div>
            </div>
        </div>

    </div>
</div>
  
<style type="text/css">

@media only screen and (min-width:0){.stage-img{display:none}.num{display:none!important;width:55px;font-size:25px}.cont{padding-left:16px}}@media only screen and (min-width:480px){.num{display:table-cell!important;width:55px;font-size:25px}.cont{padding-left:0}}@media screen and(max-width:600px){.bd{display:none!important}}@media only screen and (min-width:768px){.stage-img{display:block}}.stage-container{font-size:11px;text-align:center}.wizard2-steps{font-family:'ZapfHumanist601BT-Roman';color:#333;letter-spacing:.8px;margin:20px 0 0 0;padding:0;position:relative;clear:both;display:table;width:100%;height:80px;margin:0 auto;border:1px solid #e2e2e2;border-collapse:separate;table-layout:fixed;line-height:1.3;position:relative;background-color:#e2e2e2;box-sizing:content-box!important;margin-bottom:5px}.wizard2-steps-heading,.wizard2-steps-heading h1,.wizard2-steps-heading h2{font-family:inherit;margin:0;color:inherit;font-size:16px;text-align:center}.wizard2-steps .node{position:relative;display:block;width:auto;height:80px;margin-right:16px;background:#fff;text-decoration:none}.wizard2-steps .node-skin{background-color:inherit}.wizard2-steps .node-skin{position:relative;z-index:2;display:table;table-layout:fixed;width:100%;height:inherit;vertical-align:middle;box-sizing:content-box!important}.wizard2-steps .node-skin>div{display:table-cell;vertical-align:middle}.wizard2-steps .step{position:relative;width:33.3%;display:table-cell;vertical-align:top}.wizard2-steps .pho>img{width:70px;height:auto}.wizard2-steps .node:before{width:0;height:0;border-top:40px solid #fff;border-bottom:40px solid #fff;border-left:15px solid transparent;position:absolute;content:"";top:0;left:-15px}.wizard2-steps .node:after{width:0;height:0;border-top:40px solid transparent;border-bottom:40px solid transparent;border-left:15px solid #fff;position:absolute;content:"";top:0;right:-15px}steps-heading h2{font-family:inherit;margin:0;color:inherit;font-size:16px;text-align:center}.nostyle-heading{color:inherit;display:inline-block;font-family:inherit;font-size:inherit;margin:0;padding:0;text-transform:inherit}.change-btn,.view-btn{transition:.2s;cursor:pointer}.change-btn:hover,.view-btn:hover{color:#d60d8c}.view-ring{color:#d60d8c;}.complete-ring-icon{font-size:30px;color:#d60d8c;}.complete-3{color:#d60d8c;}.cont-3{width: 20%;}

</style> -->

<style type="text/css">

#create-container .bread-item:first-child {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
  padding-left: 6px;
}

#create-container .bread-item:last-child {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}

#create-container .bread-item.active:last-child {
  border-color: #d82bb5;
}

#create-container .bread-item:last-child::after {
  content: initial;
}
#create-container .bread-item .img,
#create-container .bread-item .number {
  width: 45px;
  height: 45px;
  border: 1px dotted #d1d5db;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  z-index: 5;
}

.create-text{
    position: relative;
    z-index: 5;
}

#create-container .bread-item .img img,
#create-container .bread-item .number img {
  display: inline-block;
  width: 90%;
  height: 90%;
}

section #create-container .active {
  background-color: #f7f7f7;
  position: relative;
  border-color: #d82bb5;
}
section #create-container .active .img,
section #create-container .active .number {
  background-color: white;
  border-color: #d82bb5;
  border: 1.5px solid #d82bb5;
}

#create-container .bread-item::after {
    content: "";
    background-color: white;
    position: absolute;
    border: 1.5px solid #d1d5db;
    border-radius: 0px;
    border-left: none;
    border-bottom: none;
    transform: rotate(58deg) skewX(30deg);
    border-top-right-radius: 5px;
    z-index: 2;
}

  #create-container .active::after {
    background-color: #f7f7f7;
    border-color: #d82bb5;
  }

   @media only screen and (min-width:0px) {

       .img{
            margin: auto;
        }

       .bread-item{
        justify-content: flex-start;
        display: block;
        padding: 23px 0px 23px 33px;
       }

       .number{
        display: none !important;
       }

       #create-container .bread-item::after{
            top: 28.5px;
            right: -34px;
            width: 69px;
            height: 69px;
       }

   }
   @media only screen and (min-width:768px) {
/*       #item-container {
       grid-template-columns: 55% 45%
       }*/
        .img{
            margin:0px;
        }

       .bread-item{
        justify-content: space-between;
        display: flex;
        padding: 23px 5px 23px 32px;
       }

       .number{
        display:flex !important;
       }

       #create-container .bread-item::after{
            top: 20.5px;
            right: -25px;
            width: 50px;
            height: 50px;
       }
   }

/*section .breadcrumb .bread-item.active:last-child {
  border-right: 1px solid #d82bb5;
}*/

/*# sourceMappingURL=style.css.map */


.empty:after {
  content: '';
  display: inline-block;
}

</style>

<section>
    <div id="create-container" class="flex my-1 justify-between">
        <!-- items 1 -->
        <div class="bread-item w-1/3 relative border-t border-b border-l border-gray-200 @if(session('create_ring.engagement-ring')) active @endif">
            <!-- image  -->
            <a href="@if(session('create_ring.engagement-ring')) {{ session('create_ring.engagement-ring')['url'] }} @else {{ url('/engagement-ring')}} @endif">
                <div class="img">
                    @if(session('create_ring.engagement-ring'))
                    <img class="" src="{{ session('create_ring.engagement-ring')['img'] }}">
                    @else
                    <div class="text-3xl text-gray-400 icon-diamond-ring @if($stage == 'ring') main-t-c @endif"></div>
                    @endif
                </div>
            </a>
            <!-- texts  -->
            <div class="text-xs text-center pt-1 block md:flex items-center create-text">

                @if(session('create_ring.engagement-ring'))
                <a href="{{ url('/engagement-ring') }}">
                    <div>${{ number_format(\App\Helper\AppHelper::conversion(session('create_ring.engagement-ring')['currency'],session('create_ring.engagement-ring')['price'],session('currency')),2) }}</div>
                    <div class="">Change</div>
                </a>
                @else
                <a href="{{ url('/engagement-ring')}}">
                    <div class="@if($stage == 'ring') main-t-c @endif">Select Ring</div>
                </a>
                @endif

            </div>
            <!-- number  -->
            <div class="number">
                <div class="num number-1">@if(session('create_ring.engagement-ring')) <span class="text-emerald-400 icon-check-mark-black-outline"></span> @else <span class="@if($stage == 'ring') main-t-c @endif">1</span> @endif</div>
            </div>
        </div>
        <!-- items 2 -->
        <div class="bread-item w-1/3 relative border-t border-b border-gray-200  @if(session('create_ring.stone')) active @endif">
            <!-- image  -->
            <a href="@if(session('create_ring.stone')) {{ session('create_ring.stone')['url'] }} @else {{ url('/diamonds')}} @endif">
                <div class="img">
                    @if(session('create_ring.stone'))
                    <img class="" src="{{ asset('storage/image/moissanite/gem-shape/'.session('create_ring.stone')['shape'].'.jpg') }}">
                    @else
                    <div class="text-3xl text-gray-400 icon-diamond-1 @if($stage == 'stone') main-t-c @endif"></div>
                    @endif
                </div>
            </a>
            <!--   -->
            <div class="text-xs text-center pt-1 block md:flex items-center create-text">

                @if(session('create_ring.stone'))
                <a href="{{ url('/diamonds') }}">
                    <div>${{ number_format(\App\Helper\AppHelper::conversion(session('create_ring.stone')['currency'],session('create_ring.stone')['retail'],session('currency')),2) }}</div>
                    <div class="">Change</div>
                </a>
                @else
                <a href="{{ url('/diamonds')}}">
                    <div class="@if($stage == 'stone') main-t-c @endif">Select Stone</div>
                </a>
                @endif
            </div>
            <!-- number  -->
            <div class="number">
                <div class="num number-2">@if(session('create_ring.stone')) <span class="text-emerald-400 icon-check-mark-black-outline"></span> @else <span class="@if($stage == 'stone') main-t-c @endif">2</span> @endif</div>
            </div>
        </div>
        <!-- items 3 -->
        <div class="bread-item w-1/3 relative border-t border-b border-r border-gray-200 @if(session('create_ring.stone') && session('create_ring.engagement-ring')) active @endif">
            <!-- image  -->
            <div class="img">
                @if(session('create_ring.stone') && session('create_ring.engagement-ring'))
                <a href="{{ url('/complete-ring')}}">
                    <div class="text-3xl icon-wedding-ring main-t-c"></div>
                </a>
                @else
                <div class="text-3xl text-gray-400 icon-t"></div>
                @endif
            </div>
            <!--   -->
            <div class="text-xs text-center pt-1 block md:flex items-center create-text">

                @if(session('create_ring.stone') && session('create_ring.engagement-ring'))
                <a href="{{ url('/complete-ring')}}">
                    <div class="">View Ring</div>
                </a>
                @else
                    <div class="">Complete Ring</div>
                    <div class="empty"></div>
                @endif

            </div>
            <!-- number  -->
            <div class="number">
                <div class="num number-3">@if(session('create_ring.stone') && session('create_ring.engagement-ring')) <span class="text-emerald-400 icon-check-mark-black-outline"></span> @else 3 @endif</div>
            </div>
        </div>
        <!-- items  -->
    </div>
</section>