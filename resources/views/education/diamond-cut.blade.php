@extends('layouts.follow')

@section('include')

@endsection
@section('page-title')
About Diamonds Cuts | Excel Jewellers
@endsection

@section('page-description')
Diamond High Quality Brilliant Ideal Cut Shape Reflection Brilliance Diamond Cut Chart Surrey BC Canada Burnaby Vancouver Richmond
@endsection

@section('main')

<div class="color-container">

	<h1 class="diamond-title">ABOUT DIAMOND CUT</h1>
	<div class="diamond-text-container">
		<div class="diamond-text">
<p>Cut to the diamond, ability to reflect the light. The cut of diamond not only effect on its shape, but it shows that how this can reflect the light to the viewers eyes. Cut of the diamond is directly related to its overall beauty. A well cut diamond appear brilliant and fiery, while normal or poorly cut diamonds look dark and sparkless. Higher cut qualities requires removal of more rough material and leads to higher cost. Because for the perfect diamond cuts, there is a need to remove unwanted and rough materials in order to achieve better cut proportions and symmetry when polishing the facets. Not only that, a well cut diamond appear more brilliant and stylish.</p>

<b>Brilliance, Dispersion and Scintillation</b>
<p>
A well-cut diamonds exhibit three different properties: brilliance, dispersion and scintillation, which is directly proportional to the cut of a diamond</p>
<b>Brilliance</b>
<p>
When the light strike on the diamonds’ surface it will reflect or refract. The reflection through the surface of a diamond table is called brilliance or brightness. And the Light enters through the diamond table, is broken down into a rainbow of spectral colors, and then reflect to the viewer's eyes.</p>
<b>Dispersion or Fire</b>
<p>When light travels through a stone, is broken down into spectral colors (rainbow colors), and thus reflected back to the viewers eyes, called dispersion. And the separation of white light into spectral colors is called fire.</p>
<b>Scintillation</b>
<p>Sparking on the surface when moves a diamond back and forth is known as scintillation. This will depends on the ability to refract or reflect the light of the diamond.</p>
<b>Cut of the diamonds</b>
<p>Color refers to the overall beauty of the diamond. When shopping for a diamond, preferred to choose the diamond with the least amount of color.</p>
<p>Diamond color is graded on a scale from D-Z and is divided into five categories.</p>
<ul>
	<li>Colorless</li>
	<li>Near Colorless</li>
	<li>Faint</li>
	<li>Very Light</li>
	<li>Light</li>
</ul>
<p>Diamonds with less color, allow more light to pass and one with less color, demonstrates more colorful fire.</p>

		</div>
	</div>
	<div class="diamond-slide-container">
		<div class="diamond-case">
			<img alt="High Quality Diamond Cut Chart Shape Fashion Jewellery Surrey Langley Canada" class="diamond-img" src="{{ asset('storage/image/page_img/cut.png') }}">
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
		width: 60%;
	}

</style>
@endsection