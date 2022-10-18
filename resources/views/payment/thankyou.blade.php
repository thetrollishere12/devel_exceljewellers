@extends('layouts.nofollow')

@section('page-title')
Excel Jewellers | Thank You
@endsection

@section('include')

@endsection

@section('main')

	@if($thankyou)

		<div style="max-width: 1000px;" class="p-1 mx-auto my-10">
			<div class="p-12 border">
				<h4><div><span class="bold">Thank you</span> For Choosing <span class="main-t-c">Excel Jewellers</span></div></h4>
				<div>Your Order <span class="main-t-c">{{ session('order_num') }}</span> Has Been Succesfully Fulfilled</div>
				@if(Auth::user())
				<div>To View Your Orders Please <a class="main-t-c" href="{{ url('/orders')}}">Click Here</a></div>
				@else
				<div>To View Your Order Please Check Your Email</div>
				@endif
			</div>
		</div>
	@endif

@endsection