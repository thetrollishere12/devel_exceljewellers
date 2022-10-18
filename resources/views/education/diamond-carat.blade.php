@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
About Diamonds Carat Size Shape | Excel Jewellers
@endsection

@section('page-description')
Diamond High Quality GIA Diamond Carat Size Shape Grade Diamond Carat Chart Colorless Diamond Surrey BC Canada Burnaby Vancouver Richmond
@endsection

@section('main')

<div class="color-container">

	<h1 class="diamond-title">ABOUT DIAMOND CARAT WEIGHT</h1>
	<div class="diamond-text-container">
		<div class="diamond-text">
			<p>Carat weight means the weight of the diamond. In the twentieth century diamonds were measured by carob seeds, which were very small and fit as a counter weight for the diamonds. So the term “Carat” is derived from carob. Simply, the carat is a unit of mass equal to 200mg, and is used for measuring gemstones, diamonds and pearls. The size of a diamond is proportional to its carat weight, when a rough diamond cut and polished to convert into furnish diamond, it’s  ⅔ of the total carat weight. When looking for the diamond engagement rings, it is difficult to measure the diamond carat weight. Although carat weight affect the cost of a diamond quite a bit.</p>
		</div>
	</div>
	<div>
		<img alt="High Quality Color Diamond Carat FL VVS1 VVS2 SI1 SI2 12-13 Surrey Langley Canada Vancouver" class="chart" src="{{ asset('storage/image/page_img/size-chart.jpg') }}">
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
    $(document).on('ready', function() {

		var stepSlider = document.getElementById('slider-step');

		var color = [
		"1/4",
		"1/3",
		"1/2",
		"3/4",
		"1",
		"1 1/5",
		"2",
		"3",
		"4",
		"5"
		]

		noUiSlider.create(stepSlider, {
		    start: [7],
		    step: 1,
		    range: {
		        'min': [0],
		        'max': [7]
		    },
		    pips: {
		        mode: 'values',
		        values: [0,1, 2, 3, 4, 5, 6,7],
		        density:100
		    }
		});

		$('.noUi-value').each(function(values){
			$('.noUi-value[data-value='+values+']').text(color[parseInt(values)]);
		});

		

		stepSlider.noUiSlider.on('update', function (values, handle) {
		    // $('.diamond-img').attr('src','image/page_img/'+(color[parseInt(values)])+'.png');
		});

    });
</script>
@endsection