
<div style="max-width:1000px;margin: auto;">

	<h1 class="navy">Customer</h1>

	<div style="border:solid 1px #969696;padding:10px;">
	<p><span class="navy">Email Address:</span> {{ $data['customer']['email'] }}</p>
	<p><span class="navy">Name:</span> {{ $data['customer']['contact_name'] }}</p>
	<p><span class="navy">Phone:</span> {{ $data['customer']['phone_number'] }}</p>
	<p><span class="navy">Address:</span> {{ $data['customer']['address'] }}</p>
	<p><span class="navy">Country:</span> {{ $data['customer']['country'] }}</p>
	<p><span class="navy">S/P/R:</span> {{ $data['customer']['spr'] }}</p>
	<p><span class="navy">City:</span> {{ $data['customer']['city'] }}</p>
	<p><span class="navy">Zipcode/Postal Code:</span> {{ $data['customer']['zipcode'] }}</p>
	</div>


	<h1 class="green">Payment Details</h1>

	<div style="border:solid 1px #969696;padding:10px;">
		@if($data['payment_method'] == "stripe")
		<p><span class="green">Method:</span> Stripe</p>

		<p><span class="green">ID:</span> {{ $data["payment_info"]["id"] }}</p>

		<p><span class="green">BRAND:</span> {{ $data['payment_info']['source']->brand }}</p>

		<p><span class="green">COUNTRY:</span> {{ $data['payment_info']['source']->country }}</p>

		<p><span class="green">EXP MONTH:</span> {{ $data['payment_info']['source']->exp_month }}</p>

		<p><span class="green">EXP YEAR:</span> {{ $data['payment_info']['source']->exp_year }}</p>

		<p><span class="green">LAST 4:</span> {{ $data['payment_info']['source']->last4 }}</p>
		@elseif($data['payment_method'] == "paypal")
		<p><span class="green">Method:</span> Paypal</p>
		@else
		<p><span class="green">Method:</span> Underfined</p>
		@endif

		<p><span class="green">Subtotal:</span> ${{number_format($data['customer']['subtotal'],2)}}</p>

		<p><span class="green">Shipping:</span> @if($data['customer']['shipping'] == 0) FREE @else ${{number_format($data['customer']['shipping'],2)}} @endif</p>

		<p><span class="green">Tax:</span> ${{number_format($data['customer']['tax'],2)}}</p>

		@if($data['customer']['discount'])
		<p><span class="green">Discount:</span> -${{number_format($data['customer']['discount'],2)}}</p>
		@endif

		<p><span class="green">Total:</span> ${{number_format($data['customer']['total'],2)}}</p>

	</div>

	<h1 style="color: #d60d8c !important;">Orders ({{ count($data['order']) }})</h1>
	@foreach( $data['order'] as $orders => $order)
	<div class="pink" style="padding:10px 0px;">Product Details - {{ $orders+1 }}</div>
	<div style="border:solid 1px #969696;padding:10px;">
	@if(isset($order['stone']))
	<h3>Custom Engagement Ring With Stone Added</h3>
	@endif
	<p><span class="pink">Product Image:</span><br><img style="width:150px;" src="{{ $order['img'] }}"></p>
	<p><span class="pink">Order Number:</span> {{ $order['order_num'] }}</p>
	<p><span class="pink">Item SKU:</span> {{ $order['item_sku'] }}</p>
	<p><span class="pink">Item Name:</span> {{ $order['item_name'] }}</p>
	<p><span class="pink">Price:</span> {{ $order['price'] }}</p>
	<p><span class="pink">Brand:</span> {{ $order['brand'] }}</p>
	<p><span class="pink">Size:</span> {{ $order['size'] }}</p>
	<p><span class="pink"><b>Engraving:</b></span> {{ $order['engraving'] }}</p>
	<p><a href="{{ $order['link'] }}">Product Web Link</a></p>

	@if(isset($order['stone']))
	<h3>Added Stone</h3>
	<p><span class="pink">Stone Image:</span><br><img style="width:150px;" src="{{ $order['stone']['default_img'] }}"></p>
	<p><span class="pink">Stone Cert:</span> {{ $order['stone']['cert_num'] }}</p>
	<p><span class="pink">Stone ID:</span> {{ $order['stone']['diamond_id'] }}</p>
	<p><span class="pink">Stone SKU:</span> {{ $order['stone']['diamond_sku'] }}</p>
	<p><span class="pink">Stone Name:</span> {{ $order['stone']['name'] }}</p>
	<p><span class="pink">Stone Price:</span> {{ $order['stone']['price'] }}</p>
	<p><span class="pink">Stone Size:</span> {{ $order['stone']['size'] }}</p>
	<p><a href="{{ $order['stone']['link'] }}">Product Web Link</a></p>
	@endif
	</div>

	@endforeach

</div>


<style type="text/css">
	
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

*{
	font-family: 'Montserrat', sans-serif;
}

.navy{
	color:#042894 !important;
	font-weight: bold;
}

.pink{
	color: #d60d8c !important;
	font-weight: bold;
}

.green{
	color: #049451 !important;
	font-weight: bold;
}

a{
	color: #d60d8c !important; 
	font-weight: bold;
}

hr{
	margin: 0px;
	padding: 0px;
}

p{
	font-size: 12px;
}

</style>