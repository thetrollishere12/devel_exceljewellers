@extends('layouts.nofollow')
@section('page-title')
Excel Jewellers | Shopping Cart
@endsection
@section('include')

<style type="text/css">
	
.checkout-form{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:white;max-width:800px}.inside-form{padding:30px}.inside-form input,.inside-form select{padding:3px;border-radius:3px;border:solid 1px #e6e6e6;width:49.5%;margin:5px 0}input[name="country-code"]{width:30px}input[name="phone-number"]{width:50%}@media only screen and (min-width:0){.cart-container{display:block}.shopping-cart{margin-bottom:20px}}@media only screen and (min-width:768px){.cart-container{display:grid;grid-template-columns:65fr 35fr;column-gap:20px}.shopping-cart{margin-bottom:0}}.cart-name,.summary-name{font-size:20px;padding-bottom:25px}.cart-container{max-width:1000px;margin:auto;padding:10px 10px}.shopping-cart{width:100%;background:white;border-radius:3px}.remove-btn{border:none;background:#d60d8c;color:white;border-radius:3px;padding:3px 9px;font-size:10px}.total{display:flex}.total-num{width:100%;text-align:right}.final{display:flex}.final_total{width:100%;text-align:right}.order-summary{width:100%;background:white;border-radius:3px}.order-summary hr{margin:10px 0}.order-summary button{border:none;background:#d60d8c;color:white;border-radius:3px;padding:10px 30px;margin:10px 0 0 0}@media only screen and (min-width:0){.item-option{display:grid}.item-quantity{margin:auto}}@media only screen and (min-width:1024px){.item-option{display:flex}.item-quantity{margin:0}}.item-container{display:flex;width:100%}.item-img-container{width:150px}.item-img-description a{color:#d60d8c;text-decoration:none}.item-img-container img{width:100%}.item-img-description{width:100%;padding:0 10px;font-size:10px}.item-option{width:100%;align-items:center;justify-content:flex-end}.item-quantity span{padding:0 5px;width:25px;text-align:center}.item-quantity button{background:white;border:solid 1px #e6e6e6;align-items:center;width:25px;padding:0 5px;text-align:center}hr{margin:10px 0}input[name="promo_code"]{padding:4px;margin:0;border:1px solid rgba(0,0,0,.1);outline:none}input[name="promo_code"]::placeholder{color:rgba(0,0,0,.4)}.promo_btn{border:none;background:#d60d8c;color:white;border-radius:3px;padding:5px 15px;margin:0 0 0 5px}button:focus{outline:none}

</style>

@endsection
@section('main')

<div class="cart-container"></div>

<script type="text/javascript">
	
$(document).ready(function() {
    function e() {
        $.ajax({
            url: window.origin + "/refresh",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: "POST",
            success: function(e) {
                $(".cart-container").empty().append(e), $.ajax({
                    url: window.origin + "/shop-cart-num",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    method: "POST",
                    success: function(e) {
                        $(".cart-text").empty().append(e)
                    },
                    error: function(e, t, r) {
                        popup("red", "Error With Number")
                    }
                })
            },
            error: function(e, t, r) {
                console.log(e), popup("error")
            }
        })
    }
    e(),

    $(document).on("click", ".remove-btn", function() {
        $.ajax({
            url: window.origin + "/remove-item",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: "POST",
            data: {
                id: $(this).attr("id")
            },
            success: function(t) {
                popup("red", "Removed From Cart"), e()
            },
            error: function(e, t, r) {
                popup("red", "Error Please Again");
            }
        })
    })
});

</script>

@endsection
