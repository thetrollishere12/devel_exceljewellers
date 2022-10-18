@extends('layouts.follow')

@section('include')

@endsection


@section('page-title')
Diamond Engagement Ring Setting | Excel Jewellers
@endsection

@section('page-description')
About Engagement Ring Prong Setting Channel Bar Pave Bezel Tension Flush Gypsy Education Canada Langley Surrey Burnaby Coquitlam Richmond Victoria Vancouver
@endsection

@section('main')

<div class="shape-container">
	<h1 class="engagement-title">Engagement Ring Settings</h1>
	<div>

		<div class="text-container">
			<div>
				<img alt="Prong Setting Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Vancouver" src="{{ asset('storage/image/page_img/prong_setting.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Prong Settings</b></h2>
					<p class="text-description">Prong setting or claw setting secure the diamond or stone, by wrapping two or more prongs around the crown to secure it. Allowing more light to pass through a diamond.
					</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Channel Setting Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Vancouver" src="{{ asset('storage/image/page_img/channel_setting.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Channel Setting</b></h2>
					<p class="text-description">Channel or we can say that holder for the diamonds secure the gems or diamonds with the band in place between vertical metal walls. Channel setting is fit for the small diamonds or for those who work with their hands.
					</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Bar Setting Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Vancouver" src="{{ asset('storage/image/page_img/bar_setting.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Bar Setting</b></h2>
					<p class="text-description">In this type of setting, two vertical bars on both sides of the diamond or gemstone use to secure it. This Bar setting looks more modern.</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Pave Setting Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Vancouver" src="{{ asset('storage/image/page_img/pave_setting.png') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Pave Setting</b></h2>
					<p class="text-description">Closely setting small diamonds together with the minimal visibility of small beads securing the stones or diamond in place. the effect is one of continuous sparkle. This setting is also known as Pave setting, and usually perfect for the small stones or gems, may be called a micro-pavé setting.</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Bezel Setting Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Vancouver" src="{{ asset('storage/image/page_img/bezel_setting.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Bezel Setting</b></h2>
					<p class="text-description">A metal rim surrounds a diamond or gemstone to secure it. This dramatic setting is a versatile one. A bezel setting can be a full or partial one. A full bezel completely surrounds the stone, whereas half (partial) bezel leaves the sides open.
					</p>
				</div>
			</div>
		</div>

		<div class="text-container">
			<div>
				<img alt="Tension Setting Diamond Gold Engagement Ring Women Excel Jewellers Surrey Canada Langley Vancouver" src="{{ asset('storage/image/page_img/tension_setting.jpg') }}">
			</div>
			<div class="text-inner-container">
				<div class="text-case">
					<h2 class="text-title"><b>Tension Setting</b></h2>
					<p class="text-description">A tension setting is also one of the most popular settings to set and secure the diamond with the band. The tension setting is named for the tension of the metal band to secure it in place. With the help of lesser jeweler expertly cuts tiny grooves into the sides of the band, to secure the precious stone or diamond, is literally held by the pressure of the band pushing into the sides of the stone. Tension setting offers a unique appearance and thus less expensive to make.
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

	.engagement-title{
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
<script type="text/javascript">
    $(document).on('ready', function() {

        $('.main-carousel').flickity({
            cellAlign: 'center',
            contain: true,
            pageDots: false,
            wrapAround: true,
            asNavFor: '.carousel-main',
        });
    });
</script>
@endsection