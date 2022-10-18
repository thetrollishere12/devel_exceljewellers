@extends('layouts.nofollow')

@section('include')

@endsection

@section('main')

<div class="home-container flex m-auto p-1" style="max-width: 1000px;">

    <div class="wishlist-container w-full rounded">
        <div class="py-4 text-2xl"><b>My Wish List</b></div>

        @if(isset($item))
            @foreach($item as $details)
            <div class="items-center block md:flex w-full rounded items-center mb-1 rounded border p-2">
                <div class="item-img-container w-72 m-auto md:m-0">
                    <img class="other-img w-full" onerror="this.style.display='none'" src="{{ $details->img }}">
                </div>
                <div class="w-full text-sm pl-4 md:pl-0 text-center pb-2">
                    <div class="img-sku">{{ $details->item_sku }}</div>
                    @if(isset($details->name))
                    <div class="img-title">{{ $details->name }}</div>
                    @else
                    @if(isset($details->type))
                    <div class="img-title">{{ $details->type }}</div>
                    @else
                    <div class="img-title">{{ $details->clarity }} {{ $details->color }} {{ $details->shape }} Diamond</div>
                    @endif
                    @endif
                    <div class="main-text-c font-bold">${{ $details->price }}</div>
                </div>
                <div class="justify-center md:justify-end items-center flex w-full">
                    <div>
                        <a href="{{ $details->link }}"><button class="add-to-cart rounded main-bg-c text-white px-3 py-1.5 text-xs" id="{{ $details->id }}">View</button></a>
                        <button class="remove-btn  rounded bg-red-500 text-xs text-white px-3 py-1.5" id="{{ $details->item_sku }}">Remove</button>
                    </div>
                </div>
            </div>
 
            @endforeach
        @else
            <div>Empty</div>
        @endif

    </div>
</div>
<script>
    
$(document).ready(function () {

    $(".remove-btn").click(function () {
        $.ajax({
            url: "remove-fav",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
            method: "POST",
            data: { sku: $(this).attr("id") },
            success: function (e) {
                popup("red", "Removed From Wishlist"), location.reload();
            },
            error: function (e, t, s) {
                popup("error");
            },
        });
    }),

    $(".style-img").click(function (e) {
        $(this).css({ border: "solid 1px #7df048" }).addClass("selected_style"),
            $(".style-img").not(this).css({ border: "solid 1px #e6e6e6" }).removeClass("selected_style"),
            $(".main-image").attr("src", $(this).attr("src")),
            $(this).parent().parent().prev().children(".style-text").text($(this).attr("id"));
    });
        
});


</script>
<script type="text/javascript">
    $('.other-img').on("error",function(){
            $(this).remove();
        });
</script>
@endsection
