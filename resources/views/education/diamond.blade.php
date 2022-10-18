@extends('layouts.follow')

@section('include')

@endsection


@section('page-title')
Diamonds-Shape,Color,Size,Clarity,Carat,Cut | Excel Jewellers
@endsection

@section('page-description')
The 4 C'S Diamond Color Diamond Clarity Diamond Carat Size Diamond Cut Diamond Shape Round Oval Princess Surrey BC Canada Burnaby Vancouver Richmond
@endsection

@section('main')

<h2 class="diamond-title">SHOP BY SHAPE</h2>
<div class="diamond-container">
	<div class="diamond-case">
		<img alt="High Quality Round Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Round-cut.png') }}">
		<div class="diamond-case-name">Round</div>
	</div>
	<div class="diamond-case">
		<img alt="High Quality Princess Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Princess-cut.png') }}">
		<div class="diamond-case-name">Princess</div>
	</div>
	<div class="diamond-case">
		<img alt="High Quality Emerald Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Emerald-cut.png') }}">
		<div class="diamond-case-name">Emerald</div>
	</div>
	<div class="diamond-case">
		<img alt="High Quality Oval Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Oval-cut.png') }}">
		<div class="diamond-case-name">Oval</div>
	</div>
	<div class="diamond-case">
		<img alt="High Quality Pear Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Pear-cut.png') }}">
		<div class="diamond-case-name">Pear</div>
	</div>
	<div class="diamond-case">
		<img alt="High Quality Marquise Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Marquise-cut.png') }}">
		<div class="diamond-case-name">Marquise</div>
	</div>
	<div class="diamond-case">
		<img alt="High Quality Cushion Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Cushion-cut.png') }}">
		<div class="diamond-case-name">Cushion</div>
	</div>
</div>
<div class="learn-diamond-ctn"><a href="{{ url('/education-diamond-shape')}}"><button class="learn-diamond">Learn About Diamond Shapes</button></a></div>


<div class="education-container">
	<h1 class="education-title">THE FOUR C'S</h1>

	<div class="info-container non-phone">
		<div>
			<img alt="High Quality Carat Diamond Gemstone Canada Vancouver BC Surrey Langley Burnaby Abbotsford Victoria" src="{{ asset('storage/image/page_img/carat.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">CARAT</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-diamond-carat')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

	<div class="info-container non-phone">
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Clarity</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>		
				<div class="learn-btn-case"><a href="{{ url('/education-diamond-clarity')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>	
		</div>
		<div>
			<img alt="High Quality Clarity Diamond Gemstone Canada Vancouver BC Surrey Langley Burnaby Abbotsford Victoria" src="{{ asset('storage/image/page_img/clarity.jpg') }}">
		</div>
	</div>

	<div class="info-container non-phone">
		<div>
			<img alt="High Quality Cushion Color Diamond Gemstone Canada Vancouver BC Surrey Langley Burnaby Abbotsford Victoria" src="{{ asset('storage/image/page_img/color.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Color</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>
				<div class="learn-btn-case"><a href="{{ url('/education-diamond-color')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

	<div class="info-container non-phone">
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Cut</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>
				<div class="learn-btn-case"><a href="{{ url('/education-diamond-cut')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
		<div>
			<img alt="High Quality Cut Diamond Gemstone Canada Vancouver BC Surrey Langley Burnaby Abbotsford Victoria" src="{{ asset('storage/image/page_img/cut.jpg') }}">
		</div>
	</div>





	<div class="info-container phone">
		<div>
			<img src="{{ asset('storage/image/page_img/carat.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">CARAT</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-diamond-carat')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

	<div class="info-container phone">
		<div>
			<img src="{{ asset('storage/image/page_img/clarity.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Clarity</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>
				<div class="learn-btn-case"><a href="{{ url('/education-diamond-clarity')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>	
		</div>
	</div>

	<div class="info-container phone">
		<div>
			<img src="{{ asset('storage/image/page_img/color.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Color</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>			
				<div class="learn-btn-case"><a href="{{ url('/education-diamond-color')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

	<div class="info-container phone">
		<div>
			<img src="{{ asset('storage/image/page_img/cut.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Cut</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>		
				<div class="learn-btn-case"><a href="{{ url('/education-diamond-cut')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

		
</div>

<style type="text/css">

/* SMARTPHONES PORTRAIT */
	@media only screen and (min-width:0px) {

    	.info-text-inner{
		    width: 100%;
		    padding: 20px 10px;
		}

		.info-container{
			grid-template-columns: 1fr 1fr;
		}

		.non-phone{
    		display:none;
    	}
    }

    @media only screen and (min-width: 300px) {

    }

    /* SMARTPHONES LANDSCAPE */
    @media only screen and (min-width: 480px) {

    }

    /* TABLETS PORTRAIT */
    @media only screen and (min-width: 768px) {
    	.info-text-inner{
			position: absolute;
		    top: 50%;
		    left: 50%;
		    width: 100%;
		    transform: translate(-50%, -50%);
		    padding: 0px 10px;
		}

    	.phone{
    		display: none !important;
    	}

    	.non-phone{
    		display: grid;
    	}
    }

    /* TABLET LANDSCAPE / DESKTOP */
    @media only screen and (min-width: 1024px) {

    }

	.education-container{
		max-width: 1000px;
		margin: auto;
	}

	.education-title{
		text-align: center;
		padding: 50px;
		font-size:40px;
	}

	.carousel-cell {
	  width: 20%;
	  padding:100px 0px 50px 0px;
	}

	.carousel-cell img{
	    width: 100%;
	    padding:5%;
	}

	.carousel-cell.is-selected {

	  transform: scale(1.2);
	}

	.info-container img{
		width:100%;
	}

	.info-text-case{
		position: relative;
		width: 100%;
		text-align: center;
	}

	.info-text-title{
		font-weight: bold;
	}

	.learn-btn{
		background:transparent;
		outline: none;
		border: solid 1px #d60d8c;
		padding:5px 15px;
	}

	/*Diamond Case*/

	.diamond-title{
		text-align: center;
	    padding: 50px;
	    font-size: 40px;
	}

	.diamond-container{
		max-width: 1000px;
		margin: auto;
		display:flex;
	}

	.diamond-container img{
		width: 100%;
	}

	.diamond-case-name{
		text-align: center;
		padding: 10px 0px 0px 0px;
		font-size: 12px;
	}

	.learn-diamond{
		background:#d60d8c;
		color: white;
		border: none;
		padding: 8px 24px;
		margin: 30px 0px 0px 0px;
	}

	.learn-diamond-ctn{
		text-align: center;
	}

</style>

@endsection