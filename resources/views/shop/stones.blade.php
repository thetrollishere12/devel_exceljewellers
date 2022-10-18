@extends('layouts.follow')

@section('include')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('page-title')
{{ $data['title'] }}
@endsection

@section('page-description')
{{ $data['description'] }}
@endsection

@section('main')
    
<div class="p-1 mx-auto" style="max-width: 1000px;">

      <x-create-product-stage>
          <x-slot name="stage">stone</x-slot>
      </x-create-product-stage>

      <x-stone-shop-filter>
        <x-slot name="type">{{ $type }}</x-slot>
        <x-slot name="carat">{{ $carat }}</x-slot>
        <x-slot name="high">{{ $high }}</x-slot>
      </x-stone-shop-filter>

      <h1 class="main-text-c text-3xl text-center py-3">{{ $data['h1'] }}</h1>

      <div id="shop">

        @if(count($products) > 0)
          <div id="shop-product-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-1">
         
          @include('shop.ajax.stones')

          </div>
        @else
          <div class="no-results">No Results Were Found</div>
        @endif

      </div>
    </div>

<script type="text/javascript">
  
  var all = @json($all);
  
  var page = {{ $count }};

</script>

<script type="text/javascript">
  
$(document).ready(function() {
    function e() {

        $.ajax({
            url: "{{ url('/filter-'.$type) }}",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: "POST",
            data: {
                shape: "{{ $param->shape }}",
                cut: $.urlParam("cut"),
                caratto: $(".carat--to").val(),
                caratfrom: $(".carat--from").val(),
                priceto: $(".price--to").val(),
                pricefrom: $(".price--from").val(),
                colorfrom: parseInt($(".color_slider .noUi-handle-lower").attr("aria-valuenow")),
                colorto: parseInt($(".color_slider .noUi-handle-upper").attr("aria-valuenow")),
                clarityfrom: parseInt($(".clarity_slider .noUi-handle-lower").attr("aria-valuenow")),
                clarityto: parseInt($(".clarity_slider .noUi-handle-upper").attr("aria-valuenow"))
            },
            beforeSend: function() {},
            success: function(e) {
                n = 0;
                a = 0;
                t = 0;
                $("#shop-product-container").html(e);
            },
            error: function(e, a, t) {
                console.log(e)
            }
        });

    }

    var a, t, n = 0;

    $(window).scroll(function() {

        if ($(window).scrollTop() + $(window).height() >= $("footer").offset().top) {
            clearTimeout(a), a = setTimeout(function() {
                console.log(n);
                n++;
                product = all.slice(24 * n, 24 * (n + 1));
                !$(".loading-more").length && 24 * n - 24 < e && $('<div class="loading-more main-bg-c text-white p-1 my-1 rounded text-sm text-center">Loading More...</div>').insertAfter("#shop"),
                    n < page &&
                    $.ajax({
                        url: "{{ url($type) }}",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        method: "POST",
                        data: {
                            product:product,
                            shape: "{{ $param->shape }}",
                            cut: $.urlParam("cut"),
                            caratto: $(".carat--to").val(),
                            caratfrom: $(".carat--from").val(),
                            priceto: $(".price--to").val(),
                            pricefrom: $(".price--from").val(),
                            colorfrom: parseInt($(".color_slider .noUi-handle-lower").attr("aria-valuenow")),
                            colorto: parseInt($(".color_slider .noUi-handle-upper").attr("aria-valuenow")),
                            clarityfrom: parseInt($(".clarity_slider .noUi-handle-lower").attr("aria-valuenow")),
                            clarityto: parseInt($(".clarity_slider .noUi-handle-upper").attr("aria-valuenow"))
                        },
                        beforeSend: function() {},
                        success: function(e) {
                            $(".loading-more").remove();
                            $("#shop-product-container").append(e);

                        },
                        error: function(e, a, t) {
                            console.log(e)
                        }
                    })
            }, 50)
        }

    });


    $('a[param-value="' + $.urlParam("cut") + '"] label').css({
        background: "#d60d8c",
        color: "white"
    });


    $("#{{ ($param->shape != '') ? $param->shape:'all' }}").css({
        background: "#d60d8c",
        color: "white !important"
    });

    $("#{{ ($param->shape != '') ? $param->shape:'all' }}").find("div,span").css({
        color: "white"
    });

    $(".advance-filter").click(function() {
        $(".product-filter-dropdown").slideToggle();
    });

    var r = document.getElementById("slider-step"),
        o = ["N", "M", "L", "K", "J", "I", "H", "G", "F", "E", "D"];
    noUiSlider.create(r, {
        start: [0, 10],
        connect: !0,
        step: 1,
        range: {
            min: [0],
            max: [10]
        },
        pips: {
            mode: "values",
            values: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            density: 100
        }
    }), $(".noUi-value").each(function(e) {
        $("#slider-step .noUi-value[data-value=" + e + "]").text(o[parseInt(e)])
    });
    var i = document.getElementById("clarity"),
        l = ["I3", "I2", "I1", "SI3", "SI2", "SI1", "VS2", "VS1", "VVS2", "VVS1", "IF"];
    noUiSlider.create(i, {
        start: [0, 10],
        connect: !0,
        step: 1,
        range: {
            min: [0],
            max: [10]
        },
        pips: {
            mode: "values",
            values: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            density: 100
        }
    }), $(".noUi-value").each(function(e) {
        $("#clarity .noUi-value[data-value=" + e + "]").text(l[parseInt(e)])
    });
    for (var c, u = document.querySelectorAll(".price__track"), s = document.querySelectorAll(".price--from"), d = document.querySelectorAll(".price--to"), m = [], f = 0; f < u.length; f++) m.push([s[f], d[f]]);
    c = Math.round($("#price-case").find(".right-slider-input").val()) + 1, [].slice.call(u).forEach(function(a, t) {
        function n(e, t) {
            var n = [null, null];
            n[e] = t, a.noUiSlider.set(n)
        }
        noUiSlider.create(a, {
            start: [0, c],
            connect: !0,
            range: {
                min: 0,
                max: c
            }
        }).on("update", function(e, a) {
            m[t][a].value = e[a]
        }), a.noUiSlider.on("change", function(a, t) {
            e()
        }), m[t].forEach(function(e, t) {
            e.addEventListener("change", function() {
                n(t, this.value)
            }), e.addEventListener("keydown", function(e) {
                var r, o = a.noUiSlider.get(),
                    i = Number(o[t]),
                    l = a.noUiSlider.steps()[t];
                switch (e.which) {
                    case 13:
                        n(t, this.value);
                        break;
                    case 38:
                        !1 === (r = l[1]) && (r = 1), null !== r && n(t, i + r);
                        break;
                    case 40:
                        !1 === (r = l[0]) && (r = 1), null !== r && n(t, i - r)
                }
            })
        })
    });
    var p = document.querySelectorAll(".carat__track"),
        h = document.querySelectorAll(".carat--from"),
        v = document.querySelectorAll(".carat--to"),
        g = [];
    for (f = 0; f < p.length; f++) g.push([h[f], v[f]]);
    ! function(a) {
        [].slice.call(p).forEach(function(t, n) {
            function r(e, a) {
                var n = [null, null];
                n[e] = a, t.noUiSlider.set(n)
            }
            noUiSlider.create(t, {
                start: [0, a],
                connect: !0,
                range: {
                    min: 0,
                    max: a
                }
            }).on("update", function(e, a) {
                g[n][a].value = e[a]
            }), t.noUiSlider.on("change", function(a, t) {
                e()
            }), g[n].forEach(function(e, a) {
                e.addEventListener("change", function() {
                    r(a, this.value)
                }), e.addEventListener("keydown", function(e) {
                    var n, o = t.noUiSlider.get(),
                        i = Number(o[a]),
                        l = t.noUiSlider.steps()[a];
                    switch (e.which) {
                        case 13:
                            r(a, this.value);
                            break;
                        case 38:
                            !1 === (n = l[1]) && (n = 1), null !== n && r(a, i + n);
                            break;
                        case 40:
                            !1 === (n = l[0]) && (n = 1), null !== n && r(a, i - n)
                    }
                })
            })
        })
    }(Math.round($("#carat-case").find(".right-slider-input").val()) + 1), r.noUiSlider.on("change", function(a, t) {
        e()
    }), i.noUiSlider.on("change", function(a, t) {
        e()
    }), $(".custom-range-slider__input").keyup(function() {
        e()
    });

});

</script>


@endsection