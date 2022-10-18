@extends('layouts.nofollow')

@section('include')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home.css?'.time().'') }}">

@endsection

@section('main')

<x-account-add-address></x-account-add-address>

<x-account-edit-address></x-account-edit-address>

<div class="home-container">

    <div class="dashboard-container">
        <div><b>My Account</b></div>
        <hr>
        @if($user)
        <div>{{ $user->name }}</div>
        <div>{{ $user->email }}</div>
        @endif
        <a href="{{ url('wishlist') }}"><button class="main-bg-c rounded px-8 py-2 text-white text-xs my-1">View Wish List</button></a>
        <a href="{{ url('orders') }}"><button class="main-bg-c rounded px-8 py-2 text-white text-xs my-1">View Orders</button></a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#add_address"><button id="add_new_address" class="main-bg-c rounded px-8 py-2 text-white text-xs my-1">Add New Shipping Address</button></a>
        
        <div class="addresses-container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            @foreach($addresses as $address)
                <div data-id="{{ $address->id }}" class="address-block border rounded text-sm p-2">
                    <span>{{ $address->contact_name }}</span> 
                    <br>
                    <span>{{ $address->address }}</span> 
                    <br>
                    <span>{{ $address->city }}</span>, <span>{{ $address->spr}}</span> <span>{{ $address->zipcode }}</span>
                    <br> 
                    <span>{{ $address->phone_number }}</span> 
                    <br>
                    <span>{{ $address->country }}</span> 
                    <div>
                        <button id="{{ $address->id }}" type="button" class="main-bg-c rounded px-8 py-1 text-white text-xs address_edit" data-bs-toggle="modal" data-bs-target="#editModalCenter">Edit</button>
                        <button id="{{ $address->id }}" type="button" class="bg-red-500 rounded px-8 py-1 text-white text-xs address_delete">Delete</button>
                    </div>
                </div>
            @endforeach
            <div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="{{ URL::asset('js/home.js?'.time().'') }}"></script> -->

<script type="text/javascript">
    
e = @json($json);

$("select[name=country]").change(function () {
    
    val = $(this).children("option:selected").attr("id"),

    $('select[name=spr]').empty();
    for (var i = 0; i < e[val].states.length; i++) {
        $('select[name=spr]').append('<option value="' + e[val].states[i] + '">' + e[val].states[i] + "</option>");
    }

});

    
$(document).ready(function () {

        $("#add_new_address").click(function(){

            $("#adding_address select[name=country]").val('Canada');

            val = $('#adding_address select[name=country]').children("option:selected").attr("id")

            $('select[name=spr]').empty();
            for (var i = 0; i < e[val].states.length; i++) {
                $('select[name=spr]').append('<option value="' + e[val].states[i] + '">' + e[val].states[i] + "</option>");
            }

        });

        $(".add_address_btn").click(function () {
            $.ajax({
                url:window.origin + "/add_address",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                method: "POST",
                data: {
                    contact_name: $("#adding_address input[name=contact_name]").val(),
                    phone_number: $("#adding_address input[name=phone_number]").val(),
                    address: $("#adding_address input[name=address]").val(),
                    unit: $("#adding_address input[name=unit]").val(),
                    country: $("#adding_address select[name=country]").val(),
                    spr: $("#adding_address .spr-select").val(),
                    city: $("#adding_address input[name=city]").val(),
                    zipcode: $("#adding_address input[name=zipcode]").val(),
                },
                success: function (e) {
                    popup("green", "Address Added"), $(".modal").modal("hide"), location.reload();
                },
                error: function (e, t, n) {
                    popup("error");
                },
            });
        }),

        $(".address_delete").click(function () {
            $.ajax({
                url:window.origin + "/delete_address",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                method: "POST",
                data: { id: $(this).attr("id") },
                success: function (e) {
                    popup("red", "Address Deleted"), location.reload();
                },
                error: function (e, t, n) {
                    popup("error");
                },
            });
        }),

        $(".address_edit").click(function () {
            var n = $(this).attr("id");

            $('#editModalCenter input[name="contact_name"]').val($(".address-block[data-id="+n+"]").children("span:eq(0)").text());
            $('#editModalCenter input[name="phone_number"]').val($(".address-block[data-id="+n+"]").children("span:eq(5)").text());
            $('#editModalCenter input[name="address"]').val($(".address-block[data-id="+n+"]").children("span:eq(1)").text());
            $('#editModalCenter input[name="unit"]').val($(".address-block[data-id="+n+"]").children("span:eq(1)").text());
            $('#editModalCenter select[name="country"]').val($(".address-block[data-id="+n+"]").children("span:eq(6)").text());
            $('#editModalCenter input[name="city"]').val($(".address-block[data-id="+n+"]").children("span:eq(2)").text());
            $('#editModalCenter input[name="zipcode"]').val($(".address-block[data-id="+n+"]").children("span:eq(4)").text());

            $(".save_change").attr("id", n);
            ($val = $('.edit_country option[value="' + e + '"]').attr("id"));

            val = $('#editModalCenter option:selected').attr("id");

            $('#editModalCenter select[name=spr]').empty();

            for (var i = 0; i < e[val].states.length; i++) {
                $('#editModalCenter select[name=spr]').append('<option value="' + e[val].states[i] + '">' + e[val].states[i] + "</option>");
            }

            $('#editModalCenter select[name=spr]').val($(".address-block[data-id="+n+"]").children("span:eq(3)").text());

        }),

        $(".save_change").click(function () {
            $.ajax({
                url:window.origin + "/edit_address",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                method: "POST",
                data: {
                    id: $(this).attr("id"),
                    contact_name: $("#editModalCenter input[name=contact_name]").val(),
                    phone_number: $("#editModalCenter input[name=phone_number]").val(),
                    address: $("#editModalCenter input[name=address]").val(),
                    unit: $("#editModalCenter input[name=unit]").val(),
                    country: $("#editModalCenter select[name=country]").val(),
                    spr: $("#editModalCenter .spr-select").val(),
                    city: $("#editModalCenter input[name=city]").val(),
                    zipcode: $("#editModalCenter input[name=zipcode]").val(),
                },
                success: function (e) {
                    popup("green", "Address Updated"), $(".modal").modal("hide"), location.reload();
                },
                error: function (e, t, n) {
                    popup("error");
                },
            });
        });
});


</script>
@endsection
