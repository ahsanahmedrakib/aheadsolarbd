@php
    $ticker = ['Generate Your Own Power', 'Reap the Returns', 'Heal the World', 'Efficiency & Power', '24/7 Support'];
@endphp
<div class="marquee bg-forest-700 py-2 border-y border-white/10">
    <div class="marquee-track" style="animation-duration: 42000ms">
        @foreach (array_merge($ticker, $ticker) as $i => $item)
            <span class="marquee-item font-heading font-bold uppercase leading-none whitespace-nowrap text-stroke-accent text-4xl" aria-hidden="true">
                {{ $item }}<span>/</span>
            </span>
        @endforeach
    </div>
</div>