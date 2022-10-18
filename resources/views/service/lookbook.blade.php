@extends('layouts.follow')

@section('include')

@endsection

@section('page-title')
Our Store Location - Excel Jewellers
@endsection

@section('page-description')
Excel Jewellers located at Langley and Guildford Mall Town Center Upper Level. We offer top quality brand named jewellery such as Verragio, Gabriel & Co and many more. 
@endsection

@section('content')

<div class="dark-bkg"></div>
<div class="view-container">
	<div class="view-container-ctn">
		<div class="view-div view-ctn-view-img">
			<img id="view-img" src="http://localhost/newexcel/storage/image/lookbook/CAYWBhFw.jpeg">
		</div>
		<div class="view-div">
			<h3>Product In Image</h3>
			<div class="product-list">
				
			</div>
		</div>
	</div>
</div>

<div class="lookbook-container">
	@foreach($db as $l)
	<div id="{{$l->id}}" class="lookbook-box">
		<img id="lookbook-img" src="{{ asset('storage/image/lookbook/'.$l->image.'') }}">
	</div>
	@endforeach
</div>

<style type="text/css">
	.lookbook-container{
		max-width: 1000px;
		margin: auto;
		padding: 10px;
		display: grid;
    	grid-gap: 5px;
    	grid-template-columns: 1fr 1fr 1fr;
	}

	.lookbook-container div img{
		width: 100%;
	}

	.view-container-ctn{
		display: grid;
		grid-template-columns: 65% 35%;
	}

	.view-container{
		position:fixed;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	    z-index: 1002;
	    display: none;
	    width: 1000px;
	}

	.view-container .view-div{
		display: inline-block;
		vertical-align: top;
	}

	.view-ctn-view-img{
		width:100%;
	}

	.view-ctn-view-img img{
		width: 100%;
	}

	.dark-bkg{
		position: fixed;
	    z-index: 1001;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%,-50%);
	    width: 100%;
	    height: 100%;
	    background: rgba(0,0,0,.5);
	    display: none;
	}

	.view-div h3{
		color:white;
		margin: 5px;
		background: #d60d8c;
		width: 100%;
		border-radius: 5px;
		padding: 10px;
		text-align: center;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){

		$('.lookbook-box').click(function(){
			var img = $(this).children('img').attr('src');
			$.ajax({
				url: "lookbook-info",
				headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
				method: "POST",
				data: {
					id:$(this).attr('id')
				},
			success: function (e) {
				$('.product-list').append(e);
				$('.dark-bkg').fadeIn();
				$('.view-container').fadeIn();
				$('#view-img').attr('src',img);
			},
			error: function (e, t, n) {
			
			},
			});
		});



	});
</script>
@endsection