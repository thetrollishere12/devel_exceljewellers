<nav class="opacity-1 fixed top-0 w-full z-10 bg-white border-b">
   <x-nav-top-info></x-nav-top-info>

   <div class="flex justify-between items-center text-xs">
      <div>

    <!--      <div class="search-container">
            <div class="inner-search-container">
               <span class="icon-close search-exit"></span>
               <form method="GET" action="{{url('/search')}}">
                  <input placeholder="Search Excel Jewellers" required type="text" name="search"><button><span class="icon-search"></span></button>
               </form>
            </div>
         </div> -->

         <div class="flex">
            <div class="px-3"><a href="{{url('/contact')}}"><span class="icon-phone"></span></a></div>
            <div class="pr-3"><a href="{{url('/contact')}}"><span class="icon-mail-envelope-closed"></span></a></div>
            <div class=""><span class="icon-search icon-search-desktop" data-bs-toggle="modal" data-bs-target="#search-moodal" ></span></div>
         </div>

      </div>

      <div class="flex items-center" style="font-size: 10px;">
       
            @guest
            <div class="pr-2">
               <a class="login-nav" href="{{ route('login') }}"><span class="icon-key"></span><span class="top-text">{{ __('LOGIN') }}</span></a>
            </div>
            @else
              <div class="pr-2">
            <a class="login-nav" href="{{url('/dashboard')}}"><span class="icon-user"></span><span class="top-text">PROFILE</span></a>
         </div>
           <div class="pr-2">
            <a class="login-nav" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
            <span class="icon-logout"></span><span class="top-text">{{ __('LOGOUT') }}</span>
            </a>
         </div>
            <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST">
               @csrf
            </form>
            @endguest
    
         <x-nav-shopping-cart></x-nav-shopping-cart>
         <x-currency-nav></x-currency-nav>
      </div>
   </div>

   <div class="border-b py-1">
      <div class="text-center">
         <div class="inline-block">
            <a href="{{ url('/') }}">
              <img class="m-auto w-36 md:w-48" alt="Excel Jewellers Diamond Engagement Ring Bracelet Earring Chain Surrey Langley Vancouver Canada Burnaby" src="{{asset('storage/image/page_img/excel_logo.png')}}">
            </a>
          </div>
      </div>
   </div>

   <div class="relative">
      <ul id="main-menu">
         <li class="li">
            <a class="a" href="{{url('/engagement-ring')}}">ENGAGEMENT RING</a>
            <div class="dropdown-container absolute w-full hidden border-b border-t bg-white left-2/4" style="transform: translate(-50%,10px);">
               @include('nav-component.engagement-ring')
            </div>
         </li>
         <li class="li">
            <a class="a" href="{{url('/wedding-band')}}">WEDDING BAND</a>
            <div class="dropdown-container absolute w-full hidden border-b border-t bg-white left-2/4" style="transform: translate(-50%,10px);">
               @include('nav-component.wedding-band')
            </div>
         </li>
         <li class="li">
            <a class="a" href="{{url('/fine-jewellery')}}">FINE JEWELRY</a>
            <div class="dropdown-container absolute w-full hidden border-b border-t bg-white left-2/4" style="transform: translate(-50%,10px);">
               @include('nav-component.fine-jewellery')
            </div>
         </li>
         <li class="li">
            <a class="a" href="{{url('/diamonds')}}">DIAMONDS</a>
            <div class="dropdown-container absolute w-full hidden border-b border-t bg-white left-2/4" style="transform: translate(-50%,10px);">
               @include('nav-component.diamond')
            </div>
         </li>
         <li class="li">
            <a class="a">EDUCATION</a>
            <div class="dropdown-container absolute w-full hidden border-b border-t bg-white left-2/4" style="transform: translate(-50%,10px);">
               @include('nav-component.education')
            </div>
         </li>
         <li class="li">
            <a class="a">JEWELRY SERVICES</a>
            <div class="dropdown-container absolute w-full hidden border-b border-t bg-white left-2/4" style="transform: translate(-50%,10px);">
               @include('nav-component.service')
            </div>
         </li>
      </ul>
   </div>

   <x-mobilenav></x-mobilenav>
</nav>
<!-- <div class="media-side">
   <div class="media-side-bar">
     <a href="https://www.instagram.com/excel_jewellers/"><div class="icon-instagram ms-instagram"></div></a>
     <a href="https://www.facebook.com/ExcelJewellersCanada"><div class="icon-facebook ms-facebook"></div></a>
     <a href="https://www.pinterest.ca/exceljewellers/"><div class="icon-pinterest2 ms-pinterest"></div></a>
     <a href="mailto:sales@exceljewellers.com"><div class="icon-mail-envelope-closed ms-mail"></div></a>
     <a href="tel:604-588-0085"><div class="icon-phone ms-phone"></div></a>
   </div>
   <div class="arrow-away">
     <svg class="flickity-button-icon" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>
   </div>
   </div> -->



   <script type="text/javascript">
     
    // $(document).ready(function(){

    //   $(".dropdown-container").css({
    //     "top":$("nav").outerHeight()+"px"
    //   })

    // });

   </script>