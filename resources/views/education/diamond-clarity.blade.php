@extends('layouts.follow')

@section('include')

@endsection


@section('page-title')
About Diamonds Clarity | Excel Jewellers
@endsection

@section('page-description')
Diamond High Quality GIA Diamond Clarity Grade Diamond Clarity Chart Colorless Diamond Surrey BC Canada Burnaby Vancouver Richmond
@endsection

@section('main')

<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="color-container">

	<h1 class="diamond-title">ABOUT DIAMOND CLARITY</h1>
	<div class="diamond-text-container">
		<div class="diamond-text">
			<p>It is important to select a diamond that does not have any inclusions. Clarity refers that how clear the diamond is. Clarity is one of the four Cs of diamond grading, The number, size, color and visibility of inclusion can all affect the clarity of a diamond. Most inclusions present in gem-quality diamonds do not affect the diamonds' performance. However large clouds, cracks close to or breaking the surface may affect the diamonds resistance or clarity. Diamond with higher clarity grades are more valued. There are also several types of inclusions and blemishes, which may affect the clarity of a diamond (Like: Cleavage Bearding, Internal graining, Pinpoint, clouds, feathers and etc). However there are many factors, like the color, Number, Position and nature which may affect the clarity grade of a diamond.</p>
		</div>
	</div>
	<div class="diamond-slide-container">
		<div class="diamond-case">
			<img alt="High Quality Color Diamond Clarity FL VVS1 VVS2 SI1 SI2 12-13 Surrey Langley Canada Vancouver" class="diamond-img m-auto" src="{{ asset('storage/image/page_img/fl.png') }}">
		</div>
		<div id="slider-step"></div>	
	</div>

	<div>
		<img alt="High Quality Color Diamond Clarity FL VVS1 VVS2 SI1 SI2 12-13 Surrey Langley Canada Vancouver" class="chart" src="{{ asset('storage/image/page_img/clarity-chart.jpg') }}">
	</div>

</div>


<style type="text/css">

	.color-container{
		padding: 10px;
	}

/*diamond text */
	.diamond-title{
		text-align: center;
		color: #d60d8c;
    	font-size: 30px;
		padding: 30px 0px 30px 0px;
	}

	.chart{
		padding-top: 60px;
		width: 100%;
	}

/*	*/
	.color-container{
		max-width: 1000px;
		margin: auto;
	}

	.diamond-slide-container{
		padding:0px 20px;
	}

	#slider-step{
		max-width: 500px;
		margin: auto;
	}

	#slider-label{
		max-width: 500px;
		margin: auto;
		display: grid;
		grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
	}

	.slider-j{
		text-align: right;
		padding-right:103px;
	}

	.slider-i{
		text-align: right;
		padding-right:85px;
	}

	.slider-h{
		text-align: right;
		padding-right:65px;
	}

	.slider-g{
		text-align: right;
		padding-right:47px;
	}

	.slider-f{
		text-align: right;
		padding-right:100%;
	}

	.slider-e{
		text-align: right;
		padding-right:60%;
	}

	.slider-d{
		text-align: right;
	}

	.diamond-case{
		text-align: center;
		padding: 5%;
	}

	.diamond-case img{
		width: 30%;
	}

	.noUi-marker-horizontal.noUi-marker-large{
		height: 5px;
	}

	.noUi-value{
		font-size: 12px;
	}

</style>

<script type="text/javascript">

    $(document).ready(function() {

		var stepSlider = document.getElementById('slider-step');

		noUiSlider.create(stepSlider, {
		    range: {
		        'min':0,
		        'max':7
		    },
		    step: 1,
		    start: [7],
		    pips: {
			    mode: 'values',
			    values: [0,1, 2, 3, 4, 5, 6,7],
			    density:100
			}
		});

		var color = [
			"SI2",
			"SI1",
			"VS2",
			"VS1",
			"VVS2",
			"VVS1",
			"IF",
			"FL"
		];

		$('.noUi-value').each(function(values){
			$('.noUi-value[data-value='+values+']').text(color[parseInt(values)]);
		});

		

		stepSlider.noUiSlider.on('update', function (values, handle) {
		    $('.diamond-img').attr('src','storage/image/page_img/'+(color[parseInt(values)])+'.png');
		});

    });
</script>
@endsection