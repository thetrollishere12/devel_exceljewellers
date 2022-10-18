@extends('layouts.nofollow')

@section('include')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/returns.css?'.time().'') }}">
@endsection
@section('main')

<div class="returns-container">

    <div>
        <div class="select-returning">Please Select The Ones Returning</div>
        <hr>
        @foreach($products as $product)
        <form method="POST" action="initiate-return">
            @csrf
            <div class="order_summary">
                <div class="order_summary_inner">
                    <div class="item-container" id="{{ $product->id }}">
                        <div class="item-container-inner">
                            <div>
                                <input type="checkbox" name="return_goods[]" value="{{$product->item_sku.':'.$product->id}}">
                            </div>
                            <div class="item-img-container">
                                <img class="product-img" src="{{ asset('storage/image/fine-jewellery/'.$product->image.'-1.jpg') }}">
                            </div>
                            <div class="item-img-description">
                                <div>{{ $product->item_sku }} {{ $product->name }}</div>
                            </div>
                        </div>
                        <div class="item-price">
                            <div>${{ $product->price }} + ${{ $product->tax }} (tax)</div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        @endforeach
            <?php

            ?>
            <input type="hidden" name="order_num" value="{{ $return->order_num }}">
            <textarea name="comment" placeholder="Please Describe The Issue You Had With The Order(s)"></textarea>
            <button class="request-btn rounded main-bg-c text-white" type="submit">Request Return</button>
        </form>
    </div>
</div>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('js/returns.js?'.time().'') }}"></script>
@endsection