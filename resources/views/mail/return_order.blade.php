<div class="main-background" style="text-align: center !important;font-family: arial, sans-serif !important;">
<div class="back" style="background:white !important;padding: 80px 0px;">
	<div class="logo"><img src="https://www.exceljewellers.com/wp-content/uploads/2016/06/Excel-Logo_Silver-e1438278764431.png"></div>
</div>
<br>
<div style="width: 400px;margin: auto;">We apologize you were not satisfied with your purchase. We're getting your <b>Return for Order #{{$data['order_num']}}</b> return approval and will send  you an email as soon as it gets approved. In the meantime, you can find all the details below.</div>
<hr style="margin: 5px 0px !important;">
<div><b>Return ID:#{{$data['return_num']}}</b></div>
<div>Returning Product(s)</div>
@foreach( $data['return_order'] as $orders => $order)
<div class="order-container" style="padding: 20px 0px !important;">
	<div>
		<img class="order-img" src="{{ asset('storage/image/fine-jewellery/'.$order['item_sku'].'-1.jpg') }}" style="transform: scale(1.1) !important;padding: 5px 0px !important;
		transition: .2s !important;" width="150">
    </div>
    <b>
    <div style="padding: 7px 0px 0px 0px !important;">{{ $order['item_sku'] }}</div>
    <div style="padding: 7px 0px 0px 0px !important;">${{ $order['return_amount'] }} + ${{ $order['return_tax'] }}(Tax)</div>
	</b>
</div>
@endforeach

<div class="order-summary-table" style="background: #d60d8c !important;
	padding: 20px !important;
	color: white !important;
	width: 400px !important;
	margin: auto !important;">
	<h2 style="margin: auto auto 30px auto;">Return Summary</h2>
	<table style="border-collapse: collapse !important;
  color: white !important;
  width:100% !important;">
		<tr>
	    	<th style="text-align: right;padding-right: 20px;">Subtotal</th>
	        <th style="text-align:left;padding-left: 20px;">${{number_format($data['full_total'],2)}} + ${{number_format($data['return_tax'],2)}}(Tax)</th>
	    </tr>
	    <tr>
	    	<th style="text-align: right;padding-right: 20px;">Restock Fee</th>
	        <th style="text-align:left;padding-left: 20px;">${{number_format($data['restock_fee'],2)}}</th>
	    </tr>
	    <tr>
	    	<th style="text-align: right;padding-right: 20px;">Refunded Amount</th>
	        <th style="text-align:left;padding-left: 20px;">${{number_format($data['return_total']+$data['return_tax'],2)}}</th>
	    </tr>
	</table>
</div>
<div>
<div style="font-size: 11px;color:#545454;width: 400px !important;margin:10px auto auto auto;">
All returns may be subject to a review period which can cause a delay in processing your returns. Unfortunately, if we are unable to approve your return, we will need to cancel the returns. We will notify you as soon as possible if this is the case.
We'll send you a shipping label as soon as return is given approval. If you have any questions regarding your order, please contact customer service 24 hours a day, 7 days a week here.
</div>
</div>
</div>
