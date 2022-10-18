@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
About Men/Women Wedding Bands | Excel Jewellers
@endsection

@section('page-description')
Diamond Classic Wedding Band Style Set High Quality GIA Diamond Education Surrey BC Canada Burnaby Vancouver Richmond Langley Coquitlam
@endsection


@section('main')

<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<!-- <div class="diamond-title">SHOP BY STYLE</div>
<div class="wedding-gender">For Her</div>
<div class="diamond-container">
	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/curved.jpg') }}">
		<div class="diamond-case-name">Curved</div>
	</div>
	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/eternity.jpg') }}">
		<div class="diamond-case-name">Eternity</div>
	</div>
	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/anniversary.jpg') }}">
		<div class="diamond-case-name">Anniversary</div>
	</div>
	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/stackable.jpg') }}">
		<div class="diamond-case-name">Stackable</div>
	</div>
	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/jacket.jpg') }}">
		<div class="diamond-case-name">Jacket</div>
	</div>
</div>

<div class="wedding-gender">For Him</div>
<div class="mens-wedding-container">

	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/classic-men.jpg') }}">
		<div class="diamond-case-name">Classic</div>
	</div>
	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/alternative.jpg') }}">
		<div class="diamond-case-name">Alternative</div>
	</div>
	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/lux.jpg') }}">
		<div class="diamond-case-name">Lux</div>
	</div>
	<div class="diamond-case">
		<img src="{{ asset('storage/image/page_img/diamond-men.jpg') }}">
		<div class="diamond-case-name">Diamond</div>
	</div>

</div> -->


<div class="education-container">
	<h1 class="education-title">WEDDING BANDS</h1>

	<div class="info-container non-phone">
		<div>
			<img alt="GIA Diamond Gold Wedding Band Style 14K Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/wed-band-2.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Style</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-weddingband-style')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

	<div class="info-container non-phone">
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Alternative Metals</h2>
				<p>There are great options from which you can choose and find the best one for you. You will find various alternative metals in today’s market such as stainless steel, cobalt, tungsten and titanium.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-weddingband-metal')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>	
		</div>
		<div>
			<img alt="Diamond Gold Wedding Band Alternative Metal 14K Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/wed-band-1.jpg') }}">
		</div>
	</div>
<!-- 
	<div class="info-container non-phone">
		<div>
			<img alt="Diamond Gold Wedding Band Size 14K Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/wed-band-3.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Size</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>		
				<div class="learn-btn-case"><a href="{{ url('/education-weddingband-size')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div> -->





	<div class="info-container phone">
		<div>
			<img alt="Diamond Gold Wedding Band Style 14K Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/wed-band-2.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Style</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-weddingband-style')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

	<div class="info-container phone">
		<div>
			<img alt="Diamond Gold Wedding Band Alternative Metal 14K Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/wed-band-1.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Alternative Metals</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>	
				<div class="learn-btn-case"><a href="{{ url('/education-weddingband-metal')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>	
		</div>
	</div>

	<div class="info-container phone">
		<div>
			<img alt="Diamond Gold Wedding Band Size 14K Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/wed-band-3.jpg') }}">
		</div>
		<div class="info-text-case">
			<div class="info-text-inner">
				<h2 class="info-text-title">Size</h2>
				<p>The skill with which a diamond is cut determines how well it reflects and refracts light. Learn how the balance of precision and craftsmanship unlocks a diamond's unique brilliance and luster.</p>		
				<div class="learn-btn-case"><a href="{{ url('/education-weddingband-size')}}"><button class="learn-btn">Learn More</button></a></div>	
			</div>
		</div>
	</div>

<!-- 	<div class="create-container">
		<div class="create-case">
			<img alt="Shop Diamond Gold Wedding Band Ring 14K Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/weddingband-women.jpg') }}">
			<div class="create-text">Shop Wedding Bands</div>
		</div>
		<div class="create-case">
			<img alt="Shop Diamond Gold Engagement Ring 14K Women Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/eng-2.jpg') }}">
			<div class="create-text">Shop Engagement Rings</div>
		</div>
		<div class="create-case">
			<img alt="Shop Diamond Shape Size Color Clarity Round Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Large/Gabriel-14K-White-Yellow-Gold-Round-Diamond-Engagement-Ring~ER14468R4M44JJ-6.jpg">
			<div class="create-text">Shop Diamonds</div>
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
/*
	.create-container{
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
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

	.mens-wedding-container{
		max-width: 590px;
		margin: auto;
		display:flex;
	}

	.mens-wedding-container img{
		width: 100%;
	}

	.wedding-gender{
		text-align: center;
		font-size: 40px;
		padding: 25px 0px;
	}

</style>

@endsection