@extends('layouts.product')

@section('include')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/p_wedding-band.css?'.time().'') }}">
@endsection




@foreach ($bands as $band)
@section('page-title')
{{ $band->itVendorId }} {{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif{{$band->style}} {{ $band->description }} Excel Jewellers Surrey Canada Langley Burnaby
@endsection

@section('page-description')
Designer {{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif{{$band->style}} {{ $band->description }} At Excel Jewellers Canada Langley Surrey Vancouver Burnaby Richmond Abbotsford
@endsection

@endforeach

@section('main')
    <link rel="stylesheet" href="{{ asset('css/magnify.css?12') }}">
    <script src="{{ asset('js/jquery.magnify.js?1') }}"></script>
    <!-- Optional mobile plugin (uncomment the line below to enable): -->
    <!-- <script src="/js/jquery.magnify-mobile.js"></script> -->

    <?php
  	// echo(session('cart'));
    // dd(session('cart'));

    ?>
    
    <div class="add-cart-notification">
        <span class="icon-close notification-close"></span>
        <img class="img-notification">
        <div class="add-cart-name"></div>
        <div>Added To <a class="your-cart" href="{{url('/shopcart')}}">Your Cart</a></div>
    </div>

    <div id="item-container">
        @foreach ($bands as $band)
        <div class="item-image">
            <img class="main-image" alt='{{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif {{$band->style}} {{ $band->description }} Surrey Vancouver Canada Langley Burnaby Richmond' width="100%" id="{{ $band->description }}" src="{{ asset('storage/image/wedding-band/'.$band->image.'') }}" data-magnify-src="{{ asset('storage/image/wedding-band/'.$band->image.'') }}">

            <div class="image-list">
                    <div class="other-img-ctn"><img alt='{{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif {{$band->style}} {{ $band->description }} Surrey Vancouver Canada Langley Burnaby Richmond' class="other-img main-selected" src="{{ asset('storage/image/wedding-band/'.$band->image.'') }}"></div>

                    <div class="other-img-ctn"><img alt='{{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif {{$band->style}} {{ $band->description }} Surrey Vancouver Canada Langley Burnaby Richmond' class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/wedding-band/'.$band->item_sku.'-2.jpg') }}"></div>

                    <div class="other-img-ctn"><img alt='{{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif {{$band->style}} {{ $band->description }} Surrey Vancouver Canada Langley Burnaby Richmond' class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/wedding-band/'.$band->item_sku.'-3.jpg') }}"></div>

                    <div class="other-img-ctn"><img alt='{{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif {{$band->style}} {{ $band->description }} Surrey Vancouver Canada Langley Burnaby Richmond' class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/wedding-band/'.$band->item_sku.'-4.jpg') }}"></div>
            </div>

        </div>
        <div class="selection-container">
            <div class="wedding-name">{{ $band->description }}</div>
            <hr class="selection-hr">
            <div>
                @for($i = 0; $i < $ratings; $i++)
                <span class="yellow">★</span>
                @endfor
                @php
                $missing = 5 - $i 
                @endphp

                @for($i = 0; $i < $missing; $i++)
                <span class="grey">★</span>
                @endfor
                Based on {{ count($reviews) }} Reviews
            </div>
            <div class="price">CAD $<span class="price-number">{{ $band->price }}</span></div>

         <!--    <div class="quantity-container">
                <div>Quantity</div>
                <button class="quantity-btn quantity-minus">-</button><span class="quantity-num">1</span><button class="quantity-btn quantity-add">+</button>
            </div> -->

            @if($size)

            <div class="size-container">
                <select onchange="location = this.value;">
                    <option class="size-disabled" selected="true">Ring Size - {{ $band->size }}</option>
                    @foreach($size as $s)
                    <option value="{{url('/wedding-band/'.$s->item_sku)}}">Ring Size - {{ $s->size }}</option>
                    @endforeach
                </select>
            </div>

            @else
            <div class="size-container">
                <select>
                    <option class="size-disabled" disabled selected="true">Ring Size</option>
                    <option value="3">Size - 3</option>
                    <option value="3.5">Size - 3.5</option>
                    <option value="4">Size - 4</option>
                    <option value="4.5">Size - 4.5</option>
                    <option value="5">Size - 5</option>
                    <option value="5.5">Size - 5.5</option>
                    <option value="6">Size - 6</option>
                    <option value="6.5">Size - 6.5</option>
                    <option value="7">Size - 7</option>
                    <option value="7.5">Size - 7.5</option>
                    <option value="8">Size - 8</option>
                    <option value="8.5">Size - 8.5</option>
                    <option value="9">Size - 9</option>
                    <option value="9.5">Size - 9.5</option>
                    <option value="10">Size - 10</option>
                    <option value="10.5">Size - 10.5</option>
                    <option value="11">Size - 11</option>
                    <option value="11.5">Size - 11.5</option>
                    <option value="12">Size - 12</option>
                    <option value="12.5">Size - 12.5</option>
                    <option value="13">Size - 13</option>
                    <option value="13.5">Size - 13.5</option>
                    <option value="14">Size - 14</option>
                    <option value="14.5">Size - 14.5</option>
                    <option value="15">Size - 15</option>
                </select>
            </div>
            @endif

            <div class="engraving-container">
                <div class="engraving-title">Engraving</div>
                <input class="engraving-input" type="text" maxlength="15" name="engraving" placeholder="Min 15 Letters">
            </div>

            @if(!sizeof($metals) == 0)
            <div class="p-sub">Available In</div>
            <div class="metal-container">
            @foreach($metals as $metal)
                @if($metal->color == "Platinum")
                <a href="{{url('/wedding-band/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">P</div></a>
                @else
                <a href="{{url('/wedding-band/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">{{ $metal->metal }}{{ $metal->color[0] }}</div></a>
                @endif
            @endforeach    
            </div>
            @endif

            <button class="add-to-cart" id="{{$band->id}}">Add To Cart</button>
            @auth
            <button id="{{$band->item_sku}}" class="favourite"><span class="icon-heart-o"></span></button>
            @endauth
            @guest
            <a href="{{ url('/login') }}"><button class="favourite"><span class="icon-heart-o"></span></button></a>
            @endguest
            <div class="social-media">
                <ul>
                    <li class="special-order"><span class="icon-hammer"></span> Special Order</li>
                    <li><span class="icon-cart"></span> Free Shipping On Orders Over $500</li>
                    <br>
                    <li><a href="{{ url('contact')}}"><span class="icon-mail-envelope-closed"></span> Email Us</a></li>
                    <br>
                    <li><a href="{{ url('contact')}}"><span class="icon-phone"></span> Call Us</a></li>
                    <a class="twitter-share-button"
                    href="https://twitter.com/intent/tweet?text={{$band->itVendorId.' '.$band->description.'💍%20%7C%20'.url()->current()}}"
                    data-size="large">
                    <img src="{{url('storage/image/page_img/twitter.jpg')}}"></a>
                    <a data-pin-do="buttonBookmark" data-pin-tall="true" href="https://www.pinterest.com/pin/create/button/"></a>
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href={{url()->current()}}&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:visible;vertical-align: top;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </ul>
            </div>
        
        @endforeach
        </div>
    </div>
    @foreach ($bands as $band)
    <div class="details-container">
        <div class="details-title">PRODUCT DETAILS</div>
        <div class="details-inner">
            <div class="details-case">
                <div><b class="sub-title">RING DESCRIPTION</b></div>
                <hr>
                {{ $band->description }}
            </div>
            <div class="details-case">
                <div><b class="sub-title">RING DETAILS</b></div>
                <hr>
                <div><b>SKU:</b> <span class="item_sku">{{ $band->item_sku }}</span></div>
                <script type="text/javascript">
                    localStorage.setItem("item_sku",$('.item_sku').text());
                </script>
                @if($band->itVendorId)
                <div><b>Brand:</b>

                @if($band->itVendorId == 'Verragio')
                <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                @elseif($band->itVendorId == 'GabrielCo')
                <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                @elseif($band->itVendorId == 'Valina')
                <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                @elseif($band->itVendorId == 'Romance')
                <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                @elseif($band->itVendorId == 'SimonG')
                <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                @elseif($band->itVendorId == 'Malo')
                <img class="logo-corner" src="{{ url('storage/image/logo/malo.png') }}">
                @endif

                </div>
                @endif
                <div><b>Style:</b> {{ $band->style }}</div>
                <div><b>Metal:</b>@if($band->color == "Platinum") Platinum @else {{ $band->metal }} {{ $band->color }} @if($band->metal == "Cobalt") @else Gold @endif @endif</div>
      

            </div>

        </div>
    </div>
    @endforeach
    <div class="review">
        <div class="customer-review-title">CUSTOMER REVIEWS</div>
        
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
                        <div>{{ $reviews->name }}</div>
                </div>
            </div>
            @endforeach
        </div>    
        @else
        <div class="no-review">No Reviews</div>
        @endif

    </div>
    <div class="shipping-container">
        <div class="shipping-title">SHIPPING DETAILS</div>
        <div class="shipping-description">
            <div>
                <div><b>Shipping</b></div>
                <ul>
                    <li>Free Shipping Over $500</li>
                    <li>Free Lifetime Warrenty</li>
                    <li>Order Processing Requires 1-3 Business Days</li>
                    <li>Signature Required For Orders Over $1,000</li>
                </ul>
            </div>
            <div>
                <div><b>Returns</b></div>
                <ul>
                    <li>Free 30 Day Return</li>
                    <li>Please Return Within 30 Days Of Delivery. Upon Receiving Your Return, Item Will Be Reviewed By Customer Service.</li>
                    <li>Jewellery Must Be Unworn, Unaltered & In Good Condition With Original Certificates & Accessories To Be Accepted For Exchange Or Return.</li>
                    <li>Special orders or custom-made merchandise will not be accepted for return or exchange due to the specific tastes and designs of these types of items. Excel Jewellers is not responsible for lost, damaged, or customs returned shipments. Return shipment without the Return Authorization Number written on the outside of the package will not be accepted. Please note: a 15% restocking fee applies to all returned merchandise.</li>
                </ul>
            </div>
            <div>
                <div><b>Disclaimer</b></div>
                <ul>
                    <li>Product weights and dimensions are approximate. Our total diamond weight may have a +/-10% tolerance. All prices on this web site are subject to change without notice. Whilst we make every effort to provide you the most accurate, up-to-date information, occasionally, one or more items on our web site may be mis-priced. In the event a product is listed at an incorrect price due to typographical, photographic, or technical error. Excel Jewellers reserves the right to cancel any orders placed with incorrect price.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="other-container">
        <div class="similar-title">SIMILAR PRODUCTS</div>

        <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
         @foreach($similar as $similar)
          <div class="carousel-cell">
            <a href="{{url('/wedding-band/'.$similar->item_sku)}}">
              <img alt="{{$similar->description}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/wedding-band/'.$similar->image.'') }}">
            </a>
              <h3 class="recently-title">{{$similar->description}}</h3>
              <p class="price">${{$similar->price}}</p>
          </div>
          @endforeach
          </div>
    </div>
<script type="text/javascript" src="{{ URL::asset('js/p_wedding-band.js?'.time().'') }}"></script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
@endsection