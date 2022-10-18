	<div>
		<div class="shopping-cart">
			@if(session('cart.shopping_cart'))
			<div class="cart-name"><b>Shopping Cart ({{ count(session('cart.shopping_cart')) }})</b></div>
			@else
			<div class="cart-name"><b>Shopping Cart (0)</b></div>
			@endif
			<div>

				@if(session('cart.shopping_cart') && !empty(session('cart.shopping_cart')))

		            @foreach(session('cart.shopping_cart') as $sku => $details)			
		 	 
					  		<div class="item-container" id="{{ $details['id'] }}">
								<div class="item-img-container">
									<img src="{{ $details['default_img'] }}">
								</div>
								<div class="item-img-description">
									<div>{{ $details['sku'] }}</div>
									<a href="{{ $details['url'] }}"><div>{{ $details['name'] }}@if($details['size']) Size {{ $details['size']}}@endif @if($details['engraving']) ({{ $details['engraving']}} Engraved)@endif</div></a>
									<div>@if(session('currency')) {{ session('currency') }} @else CAD @endif${{ number_format(\App\Helper\AppHelper::conversion( $details['currency'], $details['price'],session('currency')),2)  }}</div>
								</div>
								<div class="item-option">
									<div>
										<button class="remove-btn" id="{{ $sku }}">X</button>
									</div>
								</div>
							</div>
							@if(isset($details['stone']))
							<div class="item-container" id="{{ $details['stone']['stone_id'] }}">
								<div class="item-img-container">
									<img src="{{ $details['stone']['default_img'] }}">
								</div>
								<div class="item-img-description">
									<div>{{ $details['stone']['cert_num'] }}</div>
									<a href="{{ $details['stone']['url'] }}"><div>{{ $details['stone']['name'] }}</div></a>
									<div>@if(session('currency')) {{ session('currency') }} @else CAD @endif${{ number_format(\App\Helper\AppHelper::conversion( $details['stone']['currency'], $details['stone']['price'],session('currency')),2) }}</div>
								</div>
								<div class="item-option">
							
								</div>
							</div>
							@endif
							<hr>
		 
		            @endforeach
		        <div>
					<input type="text" name="promo_code" placeholder="Promo Code (Optional)"><button class="promo_btn">Apply</button>
				</div>    
		        @else
		        <div>Empty</div>
		        @endif
			</div>
			
		</div>
	</div>
	<div>
		<div class="order-summary">
			<div class="summary-name"><b>Order Summary</b></div>
			<div class="total">
				<div>Subtotal</div>
				<div class="total-num">CAD ${{ number_format($total,2) }}</div>
			</div>
			<div class="total">
				<div>Shipping</div>
				<div class="total-num">
					--
				</div>
			</div>
			<div class="total">
				<div>Tax</div>
				<div class="total-num">
					--
				</div>
			</div>

			@if(session('cart.coupon_code_applied'))
			<div class="total">
				<div>Promo</div>
				<div class="total-num" style="color: #d60d8c;">
					<button id="remove-coupon-btn" style="padding: 0px 6px !important;font-size: 13px !important;margin:0px 7px 0px 0px !important;">Remove</button>{{ session('cart.coupon_code_applied.coupon_code') }}
				</div>
			</div>


			<div class="text-sm text-left p-3 my-2 border rounded main-t-c">
				@if(session('cart.coupon_code_applied.minimum'))
					<span>
						Purchase must be minimum a ${{ number_format(session('cart.coupon_code_applied.minimum'),2) }}.
					</span>
				@endif

				@if(session('cart.coupon_code_applied.type'))
				<span>
						Only applies to {{ session('cart.coupon_code_applied.type_name') }} products.
				</span>
				@endif

				@if(session('cart.coupon_code_applied.expiry_date'))
				<span>
						Must be redeemed by {{ Carbon\Carbon::parse(session('cart.coupon_code_applied.expiry_date'))->format('M d Y') }}.
				</span>
				@endif

			</div>

			<div class="total">
				<div>Discount</div>
				@if(session('cart.coupon_code_applied.discount') != 0)
				<div class="total-num" style="color: #d60d8c;">- ${{ number_format(session('cart.coupon_code_applied.discount'),2) }}</div>
				@else
				<div class="total-num" style="color: #d60d8c;">$0.00</div>
				@endif
			</div>
			@endif

			<hr>
			<div class="final">
				<div>Total</div>
				<div class="final_total">CAD ${{ number_format($total-session('cart.coupon_code_applied.discount'),2) }}</div>
			</div>
			@if(!empty(session('cart')))
				@guest
				<div>
					<a href="checkout"><button class="buy-btn">Guest Checkout</button></a>
					<a href="{{ url('login?link=shopcart') }}"><button class="buy-btn">Login</button></a>
				</div>
				@else
				<div><a href="checkout"><button class="buy-btn">Buy Now</button></a></div>
				@endguest
			
			@endif
		</div>
	</div>

<script type="text/javascript">
	
	$("#remove-coupon-btn").click(function(){
		
		$.ajax({
            url: window.origin + "/remove-coupon",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
            data:{},
            method: "POST",
            success: function (t) {
            	console.log(t);
		    	$.ajax({
		            url: window.origin + "/refresh",
		            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
		            method: "POST",
		            success: function (e) {
		                $(".cart-container").empty().append(e);
		                popup("red", t.message);
		            },
		            error: function (e, t, n) {
		                console.log(e);
		                popup("red","Error Please Contact Us");
		            },
		        });
				  
            },
            error: function (t, e, n) {
                console.log(t);
                popup("red",t.responseJSON.message);
            },
        });

	});

	$(".promo_btn").click(function () {
        $.ajax({
            url: window.origin + "/apply-coupon",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
            data:{coupon_code:$('input[name=promo_code]').val()},
            dataType: 'json',
            method: "POST",
            success: function (t) {
            	console.log(t);
		    	$.ajax({
		            url: window.origin + "/refresh",
		            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
		            method: "POST",
		            success: function (e) {
		                $(".cart-container").empty().append(e);
		                popup("green", t.message);
		            },
		            error: function (e, t, n) {
		                console.log(e);
		                popup("red","Error Please Contact Us");
		            },
		        });
				  
            },
            error: function (t, e, n) {
                console.log(t);
                popup("red",t.responseJSON.message);
            },
        });
    });

</script>