@extends('layouts.payment')

@section('page-title')
Excel Jewellers | Payment Type
@endsection

@section('main')

<link rel="stylesheet" type="text/css" href="{{ asset('css/shipping.css?'.time().'') }}" rel="stylesheet">
<main>
   <div class="shopping-cart-section">
      @include('payment.summary-header')
      <div class="full-cart-price"><h2 class="font-bold text-4xl text-black">CA${{ number_format($subtotal,2) }}</h2></div>
      <div class="shopping-cart-container">
         @if(session('car.shopping_cart')|| !empty(session('cart.shopping_cart')))
         @include('payment.summary')
         <div class="final_total shipping_total">
            <div>Shipping</div>
            <div class="text-right shipping-cost">--</div>
         </div>
         <div class="final_total tax_total">
            <div>Sales Tax</div>
            <div class="text-right tax-cost">--</div>
         </div>
         <div class="final_total total_due_total">
            <div>Total Due</div>
            <div class="text-right total-cost">CA${{ number_format($subtotal-session('cart.coupon_code_applied.discount'),2) }}</div>
         </div>
         <input type="hidden" name="total-cost" value="{{ $subtotal }}">
         @endif
      </div>
      <div class="term-service-container">
         <a href="{{ url('terms-condition') }}">Terms</a>
         <a href="{{ url('privacy-policy') }}">Privacy</a>
      </div>
   </div>
   <div class="payment-section">
      <form action="payment-type" method="POST" id="paymentFrm">
         @csrf
         @if($errors->any())
         <div class="error-container">
            @if($errors->first())
            {{$errors->first()}}
            @else
            Please Try Again!
            @endif
         </div>
         @endif
         <div class="shipping-address-container">
            <div><b>Contact Information</b></div>
            @auth
            <input type="name" placeholder="Full Name" require value="{{ Auth::user()->name }}" name="shipping_name">
            <input type="phone" placeholder="Phone Number" required name="shipping_phone">
            <input type="email" placeholder="Email Address" required value="{{ Auth::user()->email }}" name="shipping_email_address">
            @else
            <input type="name" placeholder="Full Name" required name="shipping_name">
            <input type="phone" placeholder="Phone Number" required name="shipping_phone">
            <input type="email" placeholder="Email Address" required name="shipping_email_address">
            @endauth
            <div><b>Shipping Address</b></div>
            <div class="shipping-info">
               <div class="choice-container">
                  <select name="choice_select">
                     <option value="customer_address">Enter Shipping Address</option>
                     <option value="store_pickup">Store Pick Up</option>
                  </select>
               </div>
               <div class="pickup-main-container">
                  <div class="pickup-container pickup-container-langley">
                     <input type="radio" value="Excel Jewellers Langley SmartCentre" name="pickup[]"><b class="pickup-ctn-b">Langley</b>
                     <div>
                        <div class="pickup-section">
                           <div class="address-section">
                              <b>Address</b>
                              <div>20202 66 Ave #370</div>
                              <div>Langley City BC V2Y 1P3</div>
                              <div>604-539-7720</div>
                           </div>
                           <div class="hour-section">
                              <b>Store Hours</b>
                              <div>Monday-Friday: 10:00am - 5:30pm</div>
                              <div>Saturday: 10:00am - 5:00pm</div>
                              <div>Sunday: Closed</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="pickup-container">
                     <input type="radio" value="Excel Jewellers Guildford Mall" name="pickup[]"><b class="pickup-ctn-b">Surrey/Guildford</b>
                     <div>
                        <div class="pickup-section">
                           <div class="address-section">
                              <b>Address</b>
                              <div>Upper Level, 10355 152 St #2203</div>
                              <div>Surrey BC V3R 7C1</div>
                              <div>604-588-0085</div>
                           </div>
                           <div class="hour-section">
                              <b>Store Hours</b>
                              <div>Monday-Saturday: 10:00am - 7:00pm</div>
                              <div>Sunday: 11:00am - 7:00pm</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="customer_address_container">
                  <select name="shipping_country">
                     @foreach(array_column($json,'name') as $key => $value)
                     <option id="{{ $key }}" value="{{ $json[$key]['name'] }}|{{ $json[$key]['code'] }}">{{ ($json[$key]['name']) }}</option>
                     @endforeach
                  </select>
                  <input placeholder="Address Line 1" required type="" name="shipping_address_line_1">
                  <input placeholder="Address Line 2" type="" name="shipping_address_line_2">
                  <input placeholder="City" type="" required name="shipping_city">
                  <select name="shipping_s_p_r">
                     @foreach($json[0]['states'] as $key => $value)
                     <option id="{{ $key }}" value="{{ $value }}">{{ $value }}</option>
                     @endforeach
                  </select>
                  <input type="" placeholder="Postal Code/Zip Code" required name="shipping_postal_zipcode">
               </div>
            </div>
         </div>
         <a href="{{url('checkout')}}"><button class="submit-payment-btn">Continue To Payment Method</button></a>
      </form>
   </div>
</main>

<script type="text/javascript" src="{{ asset('js/shipping.js?'.time().'') }}"></script>

	<script type="text/javascript">
		e = @json($json);

		$("select[name=shipping_country]").change(function () {
			
			val = $(this).children("option:selected").attr("id"),

            $('select[name=shipping_s_p_r]').empty();
            for (var i = 0; i < e[val].states.length; i++) {
            	$('select[name=shipping_s_p_r]').append('<option value="' + e[val].states[i] + '">' + e[val].states[i] + "</option>");
            }

        });

		
	</script>
@endsection