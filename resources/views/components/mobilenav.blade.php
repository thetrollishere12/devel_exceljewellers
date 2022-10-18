<div class="shadow"></div>

<ul id="side-menu">
  <div id="showLeft" class="icon-menu cursor-pointer"></div>
</ul>

<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <div id="outer-nav">
        <div class="outer-arrow">
            <div class="icon-close cursor-pointer" id="goback"></div>
        </div>
            <div class="mobile-nav-search p-1 border-b">
                <button class="text-white w-full rounded main-bg-c py-2 text-sm" data-bs-toggle="modal" data-bs-target="#search-moodal">Search Products</button>
            </div>
        @guest
            <div>
                <a class="login-nav-mobile" href="{{ route('login') }}"><h3><span class="icon-key"></span> {{ __('Login') }}</h3></a>
            </div>
        @else
            <div>
                <a href="{{url('/dashboard')}}"><h3><span class="icon-user"></span> Profile</h3></a>
            </div>
            <div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><h3><span class="icon-logout"></span> {{ __('Logout') }}</h3>
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
        <div>
            <h3 class="side-nav-h3">Engagement Rings<span class="icon-chevron-down"></span></h3>
            <div class="dropdown-outer">
                @include('nav-component.engagement-ring')
            </div>
                
        </div>
        <div>
            <h3 class="side-nav-h3">Wedding bands<span class="icon-chevron-down"></span></h3>
            <div class="dropdown-outer">
                @include('nav-component.wedding-band')
            </div>
        </div>
        <div>
            <h3 class="side-nav-h3">Fine Jewellery<span class="icon-chevron-down"></span></h3>
            <div class="dropdown-outer">
                @include('nav-component.fine-jewellery')
            </div>
        </div>
        <div>
            <h3 class="side-nav-h3">Diamonds<span class="icon-chevron-down"></span></h3>
            <div class="dropdown-outer">
                <div class="dropdown-container">
                @include('nav-component.diamond')
              </div>
            </div>
        </div>
        <div>
            <h3 class="side-nav-h3">Education<span class="icon-chevron-down"></span></h3>
            <div class="dropdown-outer">
                <div class="dropdown-container">
                @include('nav-component.education')
              </div>
            </div>
        </div>
        <div>
            <h3 class="side-nav-h3">Jewelry Services<span class="icon-chevron-down"></span></h3>
            <div class="dropdown-outer">
                <div class="dropdown-container">
                @include('nav-component.service')
              </div>
            </div>
        </div>
        <div>
            <a href="{{ url('contact') }}"><h3>Contact Us</h3></a>
        </div>
    </div>
</div>
