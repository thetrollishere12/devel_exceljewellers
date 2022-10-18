@extends('layouts.nofollow')

@section('main')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/orders.css?'.time().'') }}">
<!-- Modal -->

<x-leave-review></x-leave-review>

<div class="home-container">

    @if(session('success'))
    <div class="return-success">Return Initiated</div>
    @endif
    @if(session('error'))
    <div class="return-error">No Item Was Found</div>
    @endif
    <div class="dashboard-container">
        <div class="order-title"><b>My Orders</b></div>
        <hr>
        @if(count($orders) > 0)
            @foreach($orders as $order)
                <form class="return-form" action="returns" method="POST">
                    @csrf
                    <div class="order-id-container">
                        <div>Order ID: <span class="order_id">{{ $order['order_num'] }}</span></div>
                        <div>Order Time: {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order['created_at'])->format('d-m-Y') }}</div>
                        <div>
                        Tracking:@if($order['order_num'])
                        @else
                        No Tracking
                        @endif
                        </div>
                        <div>Order Amount: ${{ number_format($order['total_price']+$order['shipping_cost']+$order['tax'],2) }}</div>
                        <div>Tax: ${{ number_format($order['tax'],2) }}</div>
                        <div>Shipping: ${{ number_format($order['shipping_cost'],2) }}</div>
                        <div>
                            @foreach($order['order_list'] as $sold)
                            @if(in_array("Yes", array_column($order['order_list'], 'returns')) && !Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order['created_at'])->addDays(30)->isPast())
                            <button id="{{ $sold['item_sku'] }}" type="submit" name="status" value="returning" class="return-btn">Return</button>
                            <?php
                            break;
                            ?>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @foreach($order['order_list'] as $sold)



                    <div class="order-item-container">
                        <div class="order-img-ctn">
                            <img class="other-img" onerror="this.style.display='none'" src="{{ $sold['image'] }}">
                        </div>
                        <div class="order-item-text"><span class="item_sku">{{ $sold['item_sku'] }}</span></div>
                        <div class="order-item-text"><span class="item_name">{{ $sold['item_style'] }}@if($sold['size']) Size {{ $sold['size'] }}@endif</span></div>
                        <div>${{ $sold['price'] }}</div>
                        <div>
                            @if(!$sold['comment'])
                            <button id="{{ $sold['item_sku'] }}" class="leave-review-btn" data-order="{{ $order['order_num'] }}" data-sku="{{ $sold['item_sku'] }}" data-bs-toggle="modal" data-id="{{ $sold['id'] }}" data-bs-target="#add_address" onclick="return false">Leave Review</button>
                            @endif
                            <input type="hidden" name="order_num" value="{{ $order['order_num'] }}">
                            <input type="hidden" name="SKU[]" value="{{ $sold['item_sku'] }}">
                            <input type="hidden" name="id[]" value="{{ $sold['id'] }}">
                        </div>
                    </div>
                    @if($sold['diamond_name'])
                    <div class="order-item-container">
                        <div class="order-img-ctn">
                            @if(strpos($sold['diamond_name'], 'moissanite') !== false)
                            <img class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/moissanite/gem-shape/'.$sold['diamond_shape'].'.jpg') }}">
                            @else
                            <img class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/gemstone/'.$sold['diamond_shape'].'-cut.png') }}">
                            @endif
                        </div>
                        <div class="order-item-text"><span class="item_sku">{{ $sold['diamond_id'] }}</span></div>
                        <div class="order-item-text"><span class="item_name">{{ $sold['diamond_name'] }}</span></div>
                        <div>${{ $sold['diamond_price'] }}</div>
                    </div>
                    @endif
                    <hr>
                @endforeach
                </form> 
            @endforeach
        @else
        <div class="no-orders">No Orders</div>
        @endif
    </div>




    <div class="return-container">
        <div class="return-title"><b>My Returns</b></div>
        <hr>
        @if(count($returns) > 0)
            @foreach($returns as $order)
                    <div class="order-id-container">
                        <div>Order ID: <span class="order_id">{{ $order['order_num'] }}</span></div>
                        <div>Order Time: {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order['created_at'])->format('d-m-Y') }}</div>
                        <div>
                        Tracking:@if($order['order_num'])
                        @else
                        No Tracking
                        @endif
                        <div>Refund Amount: ${{ $order['total_price'] }}</div>
                        <div>Restock Fee: (${{ $order['restock_fee'] }})</div>
                        <div>
                            @if($order['status'] == "Approved")
                            <button type="submit" name="status" class="approve-btn">Approved</button>
                            @elseif($order['status'] == "Accepted")
                            <button type="submit" name="status" class="accepted-btn">Accepted</button>
                            @else
                            <button type="submit" name="status" class="pending-btn">Pending</button>
                            @endif
                        </div>
                        </div>
                     
                    </div>
                    @foreach($order['order_list'] as $sold)

                    <div class="order-item-container">
                        <div class="order-img-ctn">
                            <img class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/fine-jewellery/'.$sold['image'].'') }}">
                        </div>
                        <div class="order-item-text"><span class="item_sku">{{ $sold['item_sku'] }}</span></div>
                        <div class="order-item-text"><span class="item_name">{{ $sold['item_style'] }}@if($sold['size']) Size {{ $sold['size'] }}@endif</span></div>
                        <div>${{ $sold['price'] }}+{{$sold['tax']}} (Tax)</div>
                    </div>
                @endforeach
            @endforeach
        @else
        <div class="no-orders">No Returns</div>
        @endif
    </div>




</div>

<script type="text/javascript" src="{{ asset('js/orders.js?'.time().'') }}"></script>
@endsection
