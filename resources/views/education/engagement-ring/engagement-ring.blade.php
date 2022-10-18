@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
Diamond Engagement Ring | Excel Jewellers Canada
@endsection

@section('page-description')
About Engagement Ring Style Setting GIA Certified Diamond Education Excel Jewellers Canada Langley Surrey Burnaby Coquitlam Richmond Victoria Vancouver
@endsection

@section('main')
<script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/3.0.1/js-cloudimage-360-view.min.js"></script>

<!-- <div class="diamond-title">SHOP BY STYLE</div>
<div class="diamond-container">
	<div class="diamond-case">
		<img alt="Three-Stone Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/three-stone.jpg') }}">
		<h3 class="diamond-case-name">Three-Stone</h3>
	</div>
	<div class="diamond-case">
		<img alt="Straight Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/straight.jpg') }}">
		<h3 class="diamond-case-name">Straight</h3>
	</div>
	<div class="diamond-case">
		<img alt="Free Form Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/freeform.jpg') }}">
		<h3 class="diamond-case-name">Free Form</h3>
	</div>
	<div class="diamond-case">
		<img alt="Halo Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/halo.jpg') }}">
		<h3 class="diamond-case-name">Halo</h3>
	</div>
	<div class="diamond-case">
		<img alt="Solitaire Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/solitaire.jpg') }}">
		<h3 class="diamond-case-name">Solitaire</h3>
	</div>
	<div class="diamond-case">
		<img alt="Split Shank Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/splitshank.jpg') }}">
		<h3 class="diamond-case-name">Split Shank</h3>
	</div>
	<div class="diamond-case">
		<img alt="Pave Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/pave.jpg') }}">
		<h3 class="diamond-case-name">Pave</h3>
	</div>
	<div class="diamond-case">
		<img alt="Double Halo Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/doublehalo.jpg') }}">
		<h3 class="diamond-case-name">Double Halo</h3>
	</div>
</div> -->

<div class="education-container">
	<h1 class="education-title">ABOUT ENGAGEMENT RINGS</h1>

	<div class="info-container non-phone">
		<div>
			<div class="main-image cloudimage-360" data-folder="{{ url('storage/image/engagement-ring-360/ER914546R0W44JJ.CSD4/') }}/" data-filename="{index}.jpg" data-amount="380" data-spin-reverse autoplay data-speed="300" data-drag-speed="300"></div>
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Style</h2>
				<p>One of the most important steps in buying an engagement ring in it's ring style. Classic engagement
rings can feature your timeless designs and traditional cuts. The attractive style of rings can attract
anyone from the lover of tradition to those who simply want a get gorgeous sparkle.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-eng-style')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

	<div class="info-container non-phone">
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Setting</h2>
				<p>The prong setting is the most common and classic ring setting. Engagement rings has a variety of setting
techniques used to secure and set loose stones. It can set the style of your ring.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-eng-setting')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>	
		</div>
		<div>
			<div class="main-image cloudimage-360" data-folder="{{ url('storage/image/engagement-ring-360/INSIGNIA-7100OV/') }}/" data-filename="{index}.jpg" data-amount="159" data-spin-reverse autoplay data-speed="300" data-drag-speed="300"></div>
		</div>
	</div>

<!-- 	<div class="info-container non-phone">
		<div>
			<img alt="Diamond Gold Engagement Ring Size 14K Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/eng-5.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Size</h2>
				<p>Find your ring size, there is the vast majority of engagement rings size will be in the range according to
your needs and design. Most common ring sizes for women are 6, 6.5, and 7.</p>		
				<div class="learn-btn-case"><a href="{{ url('/education-eng-size')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div> -->







	<div class="info-container phone">
		<div>
			<img alt="Diamond Gold Engagement Ring Style 14K Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/eng-3.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Style</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-eng-style')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

	<div class="info-container phone">
		<div>
			<img alt="Diamond Gold Engagement Ring Setting Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/eng-4.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Setting</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-eng-setting')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>	
		</div>
	</div>

<!-- 	<div class="info-container phone">
		<div>
			<img alt="Diamond Gold Engagement Ring Size 14K Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/eng-5.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Size</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>		
				<div class="learn-btn-case"><a href="{{ url('/education-eng-size')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div> -->
<!-- 
	<div class="create-container">
		<div class="create-case">
			<img alt="Shop Diamond Gold Engagement Ring 14K Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/eng-1.jpg') }}">
			<div class="create-text">Shop Engagement Rings</div>
		</div>
		<div class="create-case">
			<img alt="Shop Diamond Shape Size Color Clarity Round Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/diamond.jpg') }}">
			<div class="create-text">Shop Diamonds</div>
		</div>
		<div class="create-case">
			<img alt="Shop Diamond Gold Wedding Band Ring 14K Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Large/Gabriel-14K-White-Yellow-Gold-Round-Diamond-Engagement-Ring~ER14468R4M44JJ-6.jpg">
			<div class="create-text">Shop Wedding Bands</div>
		</div>
	</div> -->
		
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

/*	.create-container{
		display: grid;
		padding-top: 30px;
	}

	.create-case{
		margin: 0px 15px;
	}

	.create-case img{
		width: 100%;
	}

	.create-text{
		text-align: center;
		font-weight: bold;
		padding: 10px;
	}*/

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
		font-size: 35px;
	}

	.learn-btn{
		outline: none;
		color: white;
		background:#d60d8c;
		padding:7px 18px;
		border: none;
		border-radius: 4px;
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

</style>

<script type="text/javascript">

    window.CI360.init();


</script>

@endsection