@extends('layouts.payment')

@section('page-title')
Excel Jewellers | Payment Type
@endsection

@section('main')
<link rel="stylesheet" type="text/css" href="{{ asset('css/billing.css?'.time().'') }}" rel="stylesheet">
<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLIENT_ID')}}&currency=CAD"></script>
<script src="https://js.stripe.com/v3/"></script>
<main>
   <div class="shopping-cart-section">
      @include('payment.summary-header')
      <div class="full-cart-price"><h2 class="font-bold text-4xl text-black">CA${{ number_format(session('cart.shopping_cart_detail')['total_cost'],2) }}</h2></div>
      <div class="shopping-cart-container">
         @if(session('cart.shopping_cart') && !empty(session('cart.shopping_cart')))
         @include('payment.summary')
         <div class="final_total shipping_total">
            <div>Shipping</div>
            <div class="text-right shipping-cost">CA${{ number_format(session('cart.shopping_cart_detail')['shipping_amount'],2) }}</div>
         </div>
         <div class="final_total tax_total">
            <div>Sales Tax ({{ floatval(session('cart.shopping_cart_detail')['tax_rate']) }}%)</div>
            <div class="text-right tax-cost">CA${{ number_format(session('cart.shopping_cart_detail')['estimate_total_tax'],2) }}</div>
         </div>
         <div class="final_total total_due_total">
            <div>Total Due</div>
            <div class="text-right total-cost">CA${{ number_format(session('cart.shopping_cart_detail')['total_cost'],2) }}</div>
         </div>
         <input type="hidden" name="total-cost" value="{{ session('cart.shopping_cart_detail')['total_cost'] }}">
         @endif
      </div>
      <div class="term-service-container">
         <a href="{{ url('terms-condition') }}">Terms</a>
         <a href="{{ url('privacy-policy') }}">Privacy</a>
      </div>
   </div>
   <div class="payment-section">
      <div><b>Contact Information</b></div>
      <div class="email-information">
         <div><span><b>Name</b> </span>{{ session('cart.address')['contact_name'] }}</div>
         <div><span><b>Email</b> </span>{{ session('cart.address')['email_address'] }}</div>
         <div class="phone-number-div"><span><b>Phone Number</b> </span>{{ session('cart.address')['phone_number'] }}</div>
      </div>
      @if(session('cart.shipping_location') == "Ship To Customer Shipping Address")
      <div><b>Shipping Address</b></div>
      <div class="shipping-address-container">
         <div class="shipping-address-line1">{{ session('cart.address')['contact_name'] }}</div>
         <div class="shipping-address-line2">{{ session('cart.address')['address'] }}</div>
         <div class="shipping-address-line3">{{ session('cart.address')['spr'] }} {{ session('cart.address')['city'] }} {{ session('cart.address')['zipcode'] }} {{ session('cart.address')['country'] }}</div>
      </div>
      @else
      <div><b>Pickup Address</b></div>
      <div class="shipping-address-container">
         <div class="shipping-address-line1">{{ session('cart.shipping_location') }}</div>
         <div class="shipping-address-line2">{{ session('cart.address')['address']." ".session('cart.address')['line2']}}</div>
         <div class="shipping-address-line3">{{ session('cart.address')['spr'] }} {{ session('cart.address')['city'] }} {{ session('cart.address')['zipcode'] }} {{ session('cart.address')['country'] }}</div>
      </div>
      @endif
      <div><b>Payment Method</b></div>
      <div class="payment-btn-ctn">
         <div class="card-btn">
            <div class="flex justify-center leading-8">
               <img src="{{asset('storage/image/icons/card.svg')}}">
               <span class="card-span">Card</span>
            </div>
         </div>
         <div id="paypal-button-container"></div>
      </div>
      <form action="stripe-payment" method="POST" id="paymentFrm">
         @csrf
         <div class="card-info-b"><b>Card Information</b></div>
         <div id="paymentResponse"></div>
         <div class="credit-card-container">
            <div class="form-group card-number-container">
               <div id="card_number" class="field"></div>
               <div class="flex absolute top-2.5 right-2">
                  <img src="{{asset('storage/image/icons/visa.svg')}}">
                  <img src="{{asset('storage/image/icons/mastercard.svg')}}">
                  <img src="{{asset('storage/image/icons/ae.svg')}}">
               </div>
            </div>
            <div class="card-container-ex-cvc">
               <div class="form-group expiry-date-container">
                  <div id="card_expiry" class="field"></div>
               </div>
               <div class="form-group cvc-container">
                  <div id="card_cvc" class="field"></div>
               </div>
            </div>
         </div>
         @if(session('cart.shipping_location') == "Ship To Customer Shipping Address")
         <div class="billing-checkbox-ctn">
            <input checked type="checkbox" name="billing_checkbox" class="mb-1"><b class="pl-1 text-sm">Billing Address is same as shipping</b>
         </div>
         <div class="billing-address-container">
            <div><b>Name On Card</b></div>
            <input type="name" name="billing-name">
            <div><b>Billing Address</b></div>
            <div class="billing-info text-sm">
               <select name="billing_country">
                  @foreach(array_column($json,'name') as $key => $value)
                  <option id="{{ $key }}" value="{{ $json[$key]['name'] }}">{{ ($json[$key]['name']) }}</option>
                  @endforeach
               </select>
               <input placeholder="Address Line 1" type="address" name="billing_address_line_1">
               <input placeholder="Address Line 2" type="" name="billing_address_line_2">
               <input placeholder="City" type="city" name="billing_city">
               <select name="billing_s_p_r">
                  @foreach($json[0]['states'] as $key => $value)
                  <option id="{{ $key }}" value="{{ $value }}">{{ $value }}</option>
                  @endforeach
               </select>
               <input type="postal" placeholder="Postal Code/Zip Code" name="billing_postal_zipcode">
            </div>
         </div>
         @else
         <input value="pickup_billing_checkbox" type="hidden" name="billing_input">
         <div style="display: block !important;" class="billing-address-container">
            <div><b>Name On Card</b></div>
            <input required type="name" name="billing-name">
            <div><b>Billing Address</b></div>
            <div class="billing-info text-sm">
               <select name="billing_country">
                  @foreach(array_column($json,'name') as $key => $value)
                  <option id="{{ $key }}" value="{{ $json[$key]['name'] }}">{{ ($json[$key]['name']) }}</option>
                  @endforeach
               </select>
               <input required placeholder="Address Line 1" type="address" name="billing_address_line_1">
               <input placeholder="Address Line 2" type="" name="billing_address_line_2">
               <input required placeholder="City" type="city" name="billing_city">
               <select name="billing_s_p_r">
                  @foreach($json[0]['states'] as $key => $value)
                  <option id="{{ $key }}" value="{{ $value }}">{{ $value }}</option>
                  @endforeach
               </select>
               <input required type="postal" placeholder="Postal Code/Zip Code" name="billing_postal_zipcode">
            </div>
         </div>
         @endif
         <button type="submit" class="submit-payment-btn" id="payBtn">Pay {{session('cart.shopping_cart_detail')['currency'] }}${{number_format(session('cart.shopping_cart_detail')['total_cost'] ,2)}}</button>
      </form>
   </div>
</main>

<script type="text/javascript">

		var stripe = Stripe("{{ env('STRIPE_PK') }}");

    	var item_list = [];

    	<?php foreach(session('cart.shopping_cart') as $sku => $details){ ?>

    	item = {}

    	item ["name"] = '<?php echo($details['name']); ?>';
    	item ["unit_amount"] = {
    		value:'<?php echo($details['cad_price']); ?>',
    		currency:'CAD',
    	};
    	item ["quantity"] = "1";
    	item ["sku"] = '<?php echo($details['sku']); ?>';
    	item_list.push(item);

    	<?php } ?>

      paypal.Buttons({
	    locale: 'en_US',
	    style: {
	        height: 31,
	        label:'pay',
	        color: 'blue',
	        layout: 'horizontal',
    		tagline: 'false',
	    },
        createOrder: function(data, actions) {
 
          return actions.order.create({

			"application_context": {
				brand_name:'Excel Jewellers',
				shipping_preference: 'SET_PROVIDED_ADDRESS'
			},
			purchase_units: [{
				amount: {
					currency_code:'CAD',
					value:'<?php echo(session('cart.shopping_cart_detail')['total_cost']); ?>',
					breakdown: {
                        item_total: {value: '<?php echo(session('cart.shopping_cart_detail.subtotal')); ?>', currency_code: 'CAD'},

                        <?php if(session('cart.coupon_code_applied.discount')) { ?>

                        discount:{value: '<?php echo(session('cart.coupon_code_applied.discount')); ?>', currency_code: 'CAD'},
                        
                        <?php } ?>

                        tax_total: {value: '<?php echo(session('cart.shopping_cart_detail.estimate_total_tax')); ?>', currency_code: 'CAD'},
                        shipping: {value: '<?php echo(session('cart.shopping_cart_detail.shipping_amount')); ?>', currency_code: 'CAD'},

                    }
				},

				items: [

		    	<?php foreach(session('cart.shopping_cart') as $sku => $details){ ?>
				{
					name: '<?php echo($details['name']); ?>',
					unit_amount: {value:'<?php echo($details['cad_price']); ?>', currency_code: 'CAD'},
					quantity: '1',
					sku:'<?php echo($details['sku']); ?>'
				},

				<?php if (isset($details['stone'])) { ?>

				{
					name: '<?php echo($details['stone']['stone_sku']." ".$details['stone']['name']." with ring"); ?>',
					unit_amount: {value:'<?php echo($details['stone']['cad_price']); ?>', currency_code: 'CAD'},
					quantity: '1',
					sku:'<?php echo($details['stone']['stone_sku']); ?>'
				},

				<?php }
				
					} ?>

                ],

				shipping: {
					address: {
						address_line_1: '{{ session("cart.address")["address"] }}',
						address_line_2: '{{session("cart.address")["line2"]}}',
						admin_area_2: '{{session("cart.address")["city"]}}',
						admin_area_1: '{{ session("cart.address")["spr"] }}',
						postal_code: '{{ session("cart.address")["zipcode"] }}',
						country_code: '{{ session("cart.address")["country_code"] }}'
					}
				},
			}],

          });
        },

        onApprove: function(data, actions) {

          return actions.order.capture().then(function(details) {
  
            if (details.status === "COMPLETED") {

           $.ajax({
                url: "process",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                method: "POST",
                data: {paypal_id:details.id,customer:details.payer,purchase_units:details.purchase_units},
                beforeSend: function () {
                    processing_show();
                },
                success: function (t) {
                	var base = window.location.origin;
                	window.location.replace(base+'/thankyou');
                  processing_hide();
                },
                error: function (t, e, n) {
                    console.log(t);
                    processing_hide();
                },
            });

            }
          });
        }
      }).render('#paypal-button-container');

</script>
<script type="text/javascript">
	
		e = @json($json);


			$('input[type=checkbox]').prop('checked',true);
    		$('input[name=billing-name],input[name=billing_address_line_1],input[name=billing_address_line_2],input[name=billing_city],input[name=billing_postal_zipcode]').val(null);


		$("select[name=billing_country]").change(function () {
				
			val = $(this).children("option:selected").attr("id"),

            $('select[name=billing_s_p_r]').empty();
            for (var i = 0; i < e[val].states.length; i++) {
            	$('select[name=billing_s_p_r]').append('<option value="' + e[val].states[i] + '">' + e[val].states[i] + "</option>");
            }

        });

</script>
<script type="text/javascript" src="{{ asset('js/billing.js?'.time().'') }}"></script>



@endsection