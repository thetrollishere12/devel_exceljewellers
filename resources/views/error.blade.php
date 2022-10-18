@extends('layouts.nofollow')

@section('include')

@endsection

@section('main')
<div class="error-container m-auto p-4" style="max-width: 1000px;">
    <div class="text-4xl text-center main-t-c font-bold">Oops. This Page Cannot Be Found! 404</div>
    <hr>
    <div class="text-center p-8">
        <div class="main-text-c text-2xl">Helpful Links</div>
        <ul>
            <li><a href="{{ url('/')}}">Home</a></li>
            <li><a href="{{ url('/engagement-ring')}}">Engagement Rings</a></li>
            <li><a href="{{ url('/wedding-band')}}">Wedding Bands</a></li>
            <li><a href="{{ url('/fine-jewellery')}}">Fine Jewellery</a></li>
            <li><a href="{{ url('/diamonds')}}">Diamonds</a></li>
        </ul>
    </div>
</div>

<style type="text/css">
    
    .error-container ul{
        list-style: none;
        padding: 0px;
    }

    .error-container ul li{
        padding: 5px 0px;
        transition: .3s;
    }

    .error-container ul li:hover{
        color: #d60d8c;
    }

</style>
@endsection
