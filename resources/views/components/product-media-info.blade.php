<div class="social-media">
 <ul class="text-sm p-0">
    @if($type == "engagement-ring" || $type == "wedding-band")
    <li class="main-text-c py-2"><span class="icon-hammer"></span> Special Order</li>
    @endif
    <li class="main-text-c py-2"><span class="icon-truck"></span> Get In On 

       @if($type == "engagement-ring")
           @if($brand == "Verragio")
           {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(42)->format('D M d') }}
           @else
           {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }}
            @endif

       @elseif($type == "wedding-band")
           @if($brand == "Verragio")
           {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(42)->format('D M d') }}
           @elseif($brand == "Malo")
           {{ Carbon\Carbon::now()->addDays(14)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }}
           @else
           {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }}
            @endif

       @elseif($type == "fine-jewellery")
           @if($brand == "GabrielCo")
           {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }}
           @else
           {{ Carbon\Carbon::now()->addDays(14)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }}
           @endif
           @else
           {{ Carbon\Carbon::now()->addDays(14)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }}
       @endif

    </li>
    <li class="py-2"><span class="icon-cart"></span> Free Shipping On Orders Over ${{env('FREE_SHIPPING_AMOUNT')}}</li>
    <li class="py-2"><a href="{{ url('contact')}}"><span class="icon-mail-envelope-closed"></span> Email Us</a></li>
    <li class="py-2"><a href="{{ url('contact')}}"><span class="icon-phone"></span> Call Us</a></li>
    <div class="flex gap-x-1">
       <div>
         @if($type == "engagement-ring" || $type == "wedding-band" || $type == "fine-jewellery")
          <a class="twitter-share-button"
             href="https://twitter.com/intent/tweet?text={{$brand.' '.$name.'💍%20%7C%20'.url()->current()}}"
             data-size="large"></a>
         @else
         <a class="twitter-share-button"
              href="https://twitter.com/intent/tweet?text=Check Out This Beautiful Stone💎%20%7C%20'.url()->current()}}"
              data-size="large"></a>
         @endif

       </div>
       <div>
          <a data-pin-do="buttonBookmark" data-pin-tall="true" href="https://www.pinterest.com/pin/create/button/"></a>
       </div>
       <div>
          <iframe src="https://www.facebook.com/plugins/share_button.php?href={{url()->current()}}&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:visible;vertical-align: top;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
       </div>
    </div>
 </ul>
</div>