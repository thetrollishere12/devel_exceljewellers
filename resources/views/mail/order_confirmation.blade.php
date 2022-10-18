<div class="main-background" style="text-align: center !important;font-family: arial, sans-serif !important;">
<div class="back" style="background:white !important;padding: 80px 0px;">
	<div class="logo"><img src="https://www.exceljewellers.com/storage/image/page_img/excel_logo.png"></div>
</div>
<br>
<div style="width: 400px;margin: auto;"><b>Thank You</b> for choosing <b>Excel Jewellers</b>. We're getting your <b>Order #{{$data['order'][0]['order_num']}}</b> ready and will send  you an email as soon as it ships. In the meantime, you can find all the details below.</div>
<hr style="margin: 5px 0px !important;">
<div>Estimated Delivery</div>
<b>{{$data['customer']['time']}}</b>
<div>Deliver To</div>
<div>{{$data['customer']['address']}}</div>
<div>{{$data['customer']['city']}}, {{$data['customer']['spr']}} {{$data['customer']['zipcode']}}</div>
<div>{{$data['customer']['country']}}</div>
@foreach( $data['order'] as $orders => $order)
<div class="order-container" style="padding: 20px 0px !important;">
	<div>
		<img class="order-img" src="{{ $order['img'] }}" style="transform: scale(1.1) !important;padding: 5px 0px !important;
		transition: .2s !important;" width="150">
    </div>
    <b>
    <div class="pink" style="color: #d60d8c !important;padding: 7px 0px 0px 0px !important;">{{ $order['brand'] }}</div>
    <div style="padding: 7px 0px 0px 0px !important;">{{ $order['item_sku'] }}</div>
    <div class="pink" style="color: #d60d8c !important;padding: 7px 0px 0px 0px !important;">{{ $order['item_name'] }} @if($order['size'])Size {{ $order['size'] }}@endif</div>
    <div style="padding: 7px 0px 0px 0px !important;">${{ $order['price'] }}</div>
	</b>

	@if(isset($order['stone']))
	<div>
		<img class="order-img" src="{{ $order['stone']['default_img'] }}" style="transform: scale(1.1) !important;padding: 5px 0px !important;
		transition: .2s !important;" width="150">
    </div>
    <b>
   
    <div style="padding: 7px 0px 0px 0px !important;">{{ $order['stone']['diamond_sku'] }}</div>
    <div class="pink" style="color: #d60d8c !important;padding: 7px 0px 0px 0px !important;">{{ $order['stone']['name'] }}</div>
    <div style="padding: 7px 0px 0px 0px !important;">${{ $order['stone']['price'] }}</div>
	</b>
	@endif
</div>
@endforeach

<div class="order-summary-table" style="background: #d60d8c !important;
	padding: 20px !important;
	color: white !important;
	width: 400px !important;
	margin: auto !important;">
	<h2 style="margin: auto auto 30px auto;">Order Summary</h2>
	<table style="border-collapse: collapse !important;
  color: white !important;
  width:100% !important;">
		<tr>
	    	<th style="text-align: right;padding-right: 20px;">Subtotal</th>
	        <th style="text-align:left;padding-left: 20px;">${{number_format($data['customer']['subtotal'],2)}}</th>
	    </tr>
	    <tr>
	    	<th style="text-align: right;padding-right: 20px;">Shipping</th>
	        <th style="text-align:left;padding-left: 20px;">@if($data['customer']['shipping'] == 0) FREE @else ${{number_format($data['customer']['shipping'],2)}} @endif</th>
	    </tr>
	    <tr>
	    	<th style="text-align: right;padding-right: 20px;">Tax</th>
	        <th style="text-align:left;padding-left: 20px;">${{number_format($data['customer']['tax'],2)}}</th>
	    </tr>

	    @if($data['customer']['discount'])

	    <tr>
	    	<th style="text-align: right;padding-right: 20px;">Discount</th>
	        <th style="text-align:left;padding-left: 20px;">-${{number_format($data['customer']['discount'],2)}}</th>
	    </tr>

	    @endif

	    <tr>
	    	<th style="text-align: right;padding-right: 20px;">Total</th>
	        <th style="text-align:left;padding-left: 20px;">${{number_format($data['customer']['total'],2)}}</th>
	    </tr>
	</table>
</div>
<div>
<div style="font-size: 11px;color:#545454;width: 400px !important;margin:10px auto auto auto;">
All orders may be subject to a review period which can cause a delay in processing your order. Unfortunately, if we are unable to locate your item(s), we will need to cancel those item(s) from your order. We will notify you as soon as possible if this is the case.
We'll ship your item(s) as soon as they're available. You may receive them in multiple packages at no extra shipping cost.
If you have any questions regarding your order, please contact customer service 24 hours a day, 7 days a week here.
</div>
</div>
</div>