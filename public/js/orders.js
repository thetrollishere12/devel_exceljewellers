$(document).ready(function () {
    $(".review-stars").mouseover(function () {
        for ($i = 0; $i <= $(this).attr("id"); $i++) $("#" + $i + ".review-stars").addClass("hover-star");
    }),
        $(".review-stars").mouseout(function () {
            $(".review-stars").removeClass("hover-star");
        }),
        $(".review-stars").click(function () {
            for ($(".review-stars").removeClass("selected_star"), $i = 0; $i <= $(this).attr("id"); $i++) console.log($i), $("#" + $i + ".review-stars").addClass("select-star");
            for ($i = 5; $i >= $(this).attr("id"); $i--) $("#" + (1 + $i) + ".review-stars").removeClass("select-star");
            $(this).addClass("selected_star");
        }),
        $(".leave-review-btn").click(function () {
            var t,
                e = [$(this).attr("data-order"), $(this).attr("data-sku"), $(this).attr("data-id")];
            (t = e),
                $("#add_address").on("show.bs.modal", function (e) {
                    $(".leave-final-review-btn").attr("data-order", t[0]).attr("id", t[1]).attr("data-id", t[2]);
                });
        }),
        $(".leave-final-review-btn").click(function () {
            $(".selected_star").attr("id") && $("textarea[name=comment]").val()
                ? $.ajax({
                      url: "submit_review",
                      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                      method: "POST",
                      data: {
                          id: $(".leave-final-review-btn").attr("data-id"),
                          order_num: $(".leave-final-review-btn").attr("data-order"),
                          sku: $(".leave-final-review-btn").attr("id"),
                          ratings: $(".selected_star").attr("id"),
                          comment: $("textarea[name=comment]").val(),
                      },
                      success: function (e) {
                          $(".leave-review-container").empty(),
                          popup("green", "Review Was Submitted"),
                          $(".modal").modal("hide"),
                          $("textarea[name=comment]").val(""),
                          $(".review-stars").removeClass("select-star");
                      },
                      error: function (e, t, a) {
                      	console.log(e);
                          $(".modal").modal("hide"), popup("red","Error Please Again");
                      },
                  })
                : ($(".modal").modal("hide"),
                	popup("red", "Please select rating or leave comment"));
        });
});
