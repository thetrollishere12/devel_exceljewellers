<div class="summary-tab">
	<div class="slidedown mt-2"><span class="icon-cart"></span> Show Order</div>
</div>

<div class="cart-product-container">
@foreach(session('cart.shopping_cart') as $sku => $details)			
  					
		<div class="flex" id="{{ $details['id'] }}">
			<div class="grid grid-cols-3 items-center">
			<div class="pr-1">
				<img src="{{ $details['default_img'] }}">
			</div>
			<div class="text-xs font-bold col-span-2 pr-1">
				<div>{{ $details['sku'] }}</div>
				<div>{{ $details['name'] }}</div>
				<div>@if($details['engraving']) ( {{ $details['engraving']}} Engraved )@endif</div>
			</div>
		</div>
		<div class="flex text-sm items-center justify-end">
			<div><b>${{  number_format($details['cad_price'],2) }}</b></div>
		</div>
	</div>

	@if(isset($details['stone']))

	<div class="flex" id="{{ $details['stone']['stone_id'] }}">
		
		<div class="grid grid-cols-3 items-center">
			<div class="pr-1">
				<img src="{{ $details['stone']['default_img'] }}">
			</div>
			<div class="text-xs font-bold col-span-2 pr-1">
				<div>{{ $details['stone']['cert_num'] }}</div>
				<div>{{ $details['stone']['name'] }}</div>
			</div>
		</div>
		<div class="flex text-sm items-center justify-end">
			<div><b>${{  number_format($details['stone']['cad_price'],2) }}</b></div>
		</div>

	</div>

	@endif

@endforeach
</div>


<div class="final_total subtotal_total"><div>Subtotal</div><div class="text-right">CA${{ number_format($subtotal,2) }}</div></div>

@if(session('cart.coupon_code_applied'))

<div class="final_total shipping_total" style="padding-bottom: 0px !important;">
	<div>Promo</div> <div class="text-right shipping-cost">{{ session('cart.coupon_code_applied.coupon_code') }}</div>
</div>

<div class="final_total shipping_total" style="padding-bottom: 0px !important;">
	<div>Discount</div> <div class="text-right shipping-cost">-CA${{ number_format(session('cart.coupon_code_applied.discount'),2) }}</div>
</div>

@endif