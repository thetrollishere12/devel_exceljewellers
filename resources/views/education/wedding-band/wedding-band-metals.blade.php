@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
About Wedding Bands Metals | Excel Jewellers
@endsection

@section('page-description')
Diamond Classic Wedding Band Alternative Metals Ceramic Cobalt Chrome Platinum Titanium Tungsten GIA Diamond Education Surrey Canada Vancouver Richmond Langley
@endsection


@section('main')

<div class="shape-container">
	<h1 class="wedding-title">Wedding Band Metals</h1>
	<div>


		<div class="text-container">
			<div>
				<img alt="Ceramic Alternative Metal Diamond Wedding Band Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/ceramic.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Ceramic</b></h2>
					<p class="text-description">Ceramic jewelry, like all other alternative metals is lightweight, hypoallergenic and also scratch resistant. Ceramic titanium carbide is very durable and affordable as an alternative metal. Ceramic jewelry has a smooth and shiny surface finishing. It can be made in various colors and a variety of finishes from matte to others. Ceramic jewelry is a great option for those who don’t want a heavy and traditional wedding band.
					</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Cobalt Chrome Alternative Metal Diamond Wedding Band Excel Jewellers Surrey Canada Langley Burnaby" src="{{ asset('storage/image/page_img/cobalt.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Cobalt Chrome</b></h2>
					<p class="text-description">Cobalt chrome jewelry was often used in ancient times jewelry due to its beautiful and bright tone. It is lighter in color than platinum and has a really reflective look. Cobalt has been used as alternative metal, it is scratch and crack resistant, it is also ideal for someone who has a lot of his/her hands in works. It is ideal for those couples who want a light weight wedding band. Cobalt chrome metals has a white, shiny appearance as platinum. It has lightweight on the finger and it is one of the most comfortable option as a metal for your wedding band.
					</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Platinum Alternative Metal Diamond Wedding Band Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/platinum.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Platinum</b></h2>
					<p class="text-description">Platinum is the most popular metal of all the wedding bands. It is naturally white subtle and sheen colored which will never fade. It is also the symbol for true, perfect and everlasting love. Platinum wedding bands are durable. It is a naturally white colored metal; it also holds its beauty forever. It is the strongest of all other jewelry metals, it can unique and really attractive attribute. Platinum is a very rare and heavy metal which usually cost more than gold. It is very popular in men’s wedding band and also preferred by the couples. This hypoallergenic metal band resists scratches and maintains its appearance over short time.
					</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Titanium Alternative Metal Diamond Wedding Band Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/titanium.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Titanium</b></h2>
					<p class="text-description">Titanium has very unique look and incredible strength. It is stronger than any other metal. It is pure. Titanium won’t even corrode and is highly resistant to dents and bending. It is naturally silver and white in color, but it can be customized in to different colors. It is lightweight, also it is the hardest naturally occurringmetal. Titanium has a low scratch resistance than some other metals, itis tarnished to retain its look naturally longer. It can be bought easily as it is quite affordable, it has a contemporary look and you can standout every day while wearing it.
					</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Tungsten Alternative Metal Diamond Wedding Band Excel Jewellers Surrey Canada Langley Burnaby Vancouver" src="{{ asset('storage/image/page_img/tungsten.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Tungsten</b></h2>
					<p class="text-description">Tungsten has the highest melting point of all other metals, making it more durable and really stronger than all other metals. These bands are made of tungsten carbide, which is made by combining an equal number of tungsten and carbide atoms. Tungsten bands have a grey color that can also be darkened with a polish finishing process according to the customer choice. It requires just a little maintenance. The most essential thing to note that tungsten bands cannot be resized. If you are looking for something unique in looks and all other stuff, tungsten bands might be the best one for you. These wedding bands are an amazing, modern choice for wedding jewelry. They are scratch resistant, which has made them stand out in everyday jewelry stuff. Tungsten bands are affordable in comparison to gold and platinum jewelry.
					</p>
				</div>
			</div>
		</div>



	</div>
</div>


<style type="text/css">

	@media only screen and (min-width: 0px) {
		.text-container{
			grid-template-columns:100%;
		}
	}

	@media only screen and (min-width: 768px) {
		.text-container{
			grid-template-columns: 40% 60%;
		}
	}

	.wedding-title{
		text-align: center;
		padding: 25px 0px;
		border-bottom: solid 1px #d60d8c;
	}

	.shape-container{
		max-width: 1000px;
		margin: auto;
		padding: 10px;
	}

	.text-container{
		display: grid;
	}

	.text-title{
		font-size: 17px;
	}

	.text-description{
		padding: 10px 0px;
		margin: 0px;
	}

	.text-container img{
		width: 80%;
	}

	.text-inner-container{
		position:relative;
		display: flex;
		align-items: center;
	}

	.text-case{
		width: 100%;
	}

	.stone-button{
		border:none;
		background: #d60d8c;
    	color: white;
    	padding: 6px 18px;
	}


</style>

@endsection