@extends('layouts.service')

@section('include')

@endsection

@section('page-title')
Contact Us - Excel Jewellers
@endsection

@section('page-description')
Contact us or call us & book your consultation/appointment today at Excel Jewellers Surrey Langley Lower Mainland Burnaby Abbotsford Richmond Coquitlam Canada. 
@endsection

@section('title')
  Contact Us
@endsection
@section('sub-title')

@endsection
@section('main')

@if($message = Session::get('success'))
<div class="thank-you">Thank You For Contacting Us. We Will Shortly Respond Back</div>
@endif

@if($message = Session::get('error'))
<div class="thank-you-error">{{ Session::get('error') }}</div>
@endif

<div class="phone-container">

	<div class="phone-container-inner rounded grid grid-cols-1 sm:grid-cols-2">

		<div>
			<h4>Guildford</h4>
			<div>604 588 0085</div>
			<div><a href="tel:604-588-0085">Call Now</a></div>
			<div><a href="{{url('/location')}}">Location</a></div>
			<a href="https://calendly.com/exceljewelersappointment/60-minute-guildford_consultation/?month=2022-10"><button class="main-bg-c px-3 py-2 mt-2 text-sm rounded text-white">Book Appointment</button></a>
		</div>

		<div>
			<img class="rounded" src="{{ asset('storage/image/page_img/guildford.jpg') }}">
		</div>

	</div>

	<div class="phone-container-inner rounded grid grid-cols-1 sm:grid-cols-2">

		<div>
		<h4>Langley</h4>
		<div>604-539-7720</div>
		<div><a href="tel:604-539-7720">Call Now</a></div>
		<div><a href="{{url('/location')}}">Location</a></div>
		<a href="https://calendly.com/exceljewelrylangley/60min?month=2022-10"><button class="main-bg-c px-3 py-2 mt-2 text-sm rounded text-white">Book Appointment</button></a>
		</div>

		<div>
			<img class="rounded" src="{{ asset('storage/image/page_img/langley.jpg') }}">
		</div>

	</div>

</div>


<div class="email-us-title">Email Us</div>

<div class="email-container rounded p-2.5">
	<form action="send-mail" method="POST">
		{{ csrf_field() }}

	<div class="grid gap-1 grid-cols-1 sm:grid-cols-2">
		<div>
			<input class="text-sm p-2" required type="text" name="first" placeholder="First Name">
		</div>
		<div>
			<input class="text-sm p-2" required type="text" name="last" placeholder="Last Name">
		</div>
	</div>

	<div class="grid gap-1 grid-cols-1 sm:grid-cols-2">
		<div>
			<input class="text-sm p-2" required type="email" name="email" placeholder="Email Address">
		</div>
		<div>
			<input class="text-sm p-2" required type="number" name="phone" placeholder="Phone Number">
		</div>
	</div>


	<div>
		<textarea class="p-2 resize-none text-sm" required name="message" placeholder="Message"></textarea>
	</div>



		<div>
			<label class="">Guildford
			<input type="radio" required value="guilford" name="store">
			</label>
			<label class="p-2">Langley
			<input type="radio" required value="langley" name="store">
			</label>
		</div>

		<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
	    
	    <input class="main-bg-c text-white py-2 rounded" type="submit" value="Submit">

	</form>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<style type="text/css">

	form div{
		padding-bottom: 5px;
	}

	.phone-container{
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-column-gap:5px;
	}

	.phone-container-inner a{
		text-decoration: none;
		color: #d60d8c;
	}

	.phone-container-inner{
		border:solid 1px #ededed;
		padding: 15px;
	}

	.email-container{
		border:solid 1px #ededed;
		padding: 15px;
		width:100%;
	}

	.email-us-title{
		color: #d60d8c;
	    font-size: 30px;
	    padding: 25px 0px 5px 0px;
	}

	.email-container input:not(input[type=radio]), .email-container textarea{
		width: 100%;
		border:solid 1px #ededed;
		outline: none;
	}

	.thank-you{
		background: #d60d8c;
		color: white;
		padding:10px;
		border-radius: 3px;
		margin-bottom: 5px;
		text-align: center;
	}

	.thank-you-error{
		background:#dc3545!important;
		color: white;
		padding:10px;
		border-radius: 3px;
		margin-bottom: 5px;
		text-align: center;
	}
	.service-title{
		margin-bottom: 0px !important;
	}

</style>

@endsection