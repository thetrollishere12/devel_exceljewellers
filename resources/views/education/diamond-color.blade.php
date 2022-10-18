@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
About Diamonds Colors | Excel Jewellers
@endsection

@section('page-description')
Diamond High Quality GIA Diamond Color Grade Diamond Color Chart Surrey BC Canada Burnaby Vancouver Richmond
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="color-container">

	<h1 class="diamond-title">ABOUT DIAMOND COLOR</h1>
	<div class="diamond-text-container">
		<div class="diamond-text">
			<p>When shopping for a diamond for your loved one, it is preferred to choose a stone with the least amount of color.</p>
			<p>The highest quality diamonds are usually colorless and thus higher the value, while the diamonds with the poor cut and low quality have noticeable color as yellow, brown or gray.</p>
			<p>Diamonds with less color allow more light to pass refract and reflect, are more brighter and sparkle than the other one.
			There are six categories on the GIA diamond chart, with the range from colorless to light in color.</p>
			<p>Diamonds rated D are the most devoid of color and very rare, while G and H color diamonds are near colorless. The more you move down the color chart, the lower the color grade is, and the more noticeable the light yellow hue becomes.</p>
		</div>
	</div>
	<div class="diamond-slide-container">
		<div class="diamond-case">
			<img alt="High Quality Clarity Diamond Color D E F G H I J K L M N O P Q R S Z Surrey Langley Canada Vancouver" class="diamond-img m-auto" src="{{ asset('storage/image/page_img/clarity/D.png') }}">
		</div>
		<div class="relative -top-20">
			<div id="slider-step"></div>
		</div>
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

	.diamond-case img{
		width: 100%;
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

		var color = [
		"Z",
		"Y",
		"X",
		"W",
		"V",
		"U",
		"T",
		"S",
		"R",
		"Q",
		"P",
		"O",
		"N",
		"M",
		"L",
		"K",
		"J",
		"I",
		"H",
		"G",
		"F",
		"E",
		"D"
		]

		noUiSlider.create(stepSlider, {
		    start: [22],
		    step: 1,
		    range: {
		        'min': [0],
		        'max': [22]
		    },
		    pips: {
		        mode: 'values',
		        values: [0,1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22],
		        density:100
		    }
		});

		$('.noUi-value').each(function(values){
			$('.noUi-value[data-value='+values+']').text(color[parseInt(values)]);
		});

		stepSlider.noUiSlider.on('update', function (values, handle) {
		    $('.diamond-img').attr('src','<?php echo(asset('storage/image/page_img/color')) ?>'+'/'+(color[parseInt(values)])+'.png');
		});

    });
</script>
@endsection