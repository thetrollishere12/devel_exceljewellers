<div class="py-0.5">
    @for($i = 0; $i < $ratings; $i++)
    <span class="main-text-c">★</span>
    @endfor
    @php
    $missing = 5 - $i 
    @endphp

    @for($i = 0; $i < $missing; $i++)
    <span class="text-zinc-300">★</span>
    @endfor
    Based on {{ count($reviews) }} Reviews
</div>