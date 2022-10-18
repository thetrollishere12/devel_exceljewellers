
<div>
    
    <select class="py-1 focus:outline-none outline-none rounded border-0" style="font-size: 10px;">
        <option @if(session('currency') == 'CAD') selected @endif value="CAD">CAD</option>
        <option @if(session('currency') == 'USD') selected @endif value="USD">USD</option>
    </select>

</div>

<script type="text/javascript">

    $("select").change(function(){
        $.ajax({
            url: window.origin +"/currency",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
            method: "POST",
            data: {
                currency:$(this).val()
            },
            success: function (c) {
                location.reload();
            },
            error: function (c, r, t) {
                location.reload();
            },
        });
    })

</script>
