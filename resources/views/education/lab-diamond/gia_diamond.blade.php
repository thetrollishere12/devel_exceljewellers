@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
GIA Certified Diamonds, What are they? How do I get one?
@endsection

@section('page-description')
Discover why GIA certified diamonds are worth more than other diamonds. Find out how to buy a diamond from GIA!
@endsection

@section('main')

<div class="container m-auto p-2">


	<div>

		<h1 class="main-t-c text-3xl pt-4 pb-2">What is a GIA Certified Diamond?</h1>
		<img class="pb-6" src="{{ asset('image/services/gia.jpg') }}">
		<div>
			<div>
				<p>A GIA Certified Diamond is a diamond that has been graded by an independent third party laboratory. This means that the diamond's characteristics have been measured and recorded. These measurements are then compared with those of other diamonds of similar size and color. If the measurements match up, the diamond is given a grade based on its clarity, cut, color, and carat weight. A GIA Certified Diamond is a diamond that meets the following criteria:
					<ul class="list-disc">
						<li>It must be at least 0.50 carats (1/2 gram) in size.</li>
						<li>Its color grade must be D or E.</li>
						<li>It must have an SI clarity rating of VS1 or higher.</li>
						<li>It must pass the Gemological Institute of America's rigorous inspection process.</li>
					</ul>
				</p>
				<a href="{{ url('diamonds') }}"><x-standard-button><x-slot name="text">Shop GIA Diamonds</x-slot></x-standard-button></a>
			</div>
		</div>

	</div>

	<div>

		<h2 class="main-t-c text-3xl pt-4 pb-2">Why should I care about GIA Certified Diamonds?</h2>
		<div>
			<div>
				<p>If you're looking for a diamond that will last forever, then a GIA certified diamond is the perfect choice. These diamonds are also known as "The Forever" diamonds because they are guaranteed to retain their value for at least 100 years. These diamonds are guaranteed to meet the highest standards of quality and durability. They also come at a higher price tag, so you'll need to make sure you're getting what you pay for.
				</p>
			</div>
		</div>

	</div>



	<div>

		<h2 class="main-t-c text-3xl pt-4 pb-2">How do I know if my diamond is GIA Certified?</h2>
		<div>
			<div>
				<p>To find out if your diamond is GIA certified, simply ask your jeweler. They should be able to tell you whether or not your diamond has been graded by GIA. You can also check online with the GIA website.
				</p>
			</div>
		</div>

	</div>

</div>


<style type="text/css">


	.container{
		max-width: 1000px;
	}


	

</style>

@endsection