@php
    $trafficToday = \App\Models\Traffic::today();
    $trafficTotal = \App\Models\Traffic::total();
@endphp

<section class="visitor-counter-section bg-forest-700 border-t border-white/10 py-3 reveal" data-variant="fade-up">
    <div class="solar-container flex flex-col lg:flex-row items-center justify-center gap-x-10 gap-y-6">
        <span class="flex items-center gap-3 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="text-accent-500 shrink-0">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            <span class="font-heading font-bold text-white text-xl uppercase tracking-wide">
                Website Visitor
            </span>
        </span>

        <div class="flex flex-col sm:flex-row items-center gap-4">
            <span
                class="flex items-center gap-3 bg-white/5 border border-white/15 rounded-2xl px-6 py-2 min-w-40 justify-center">
                <span class="text-xs uppercase tracking-wider text-white/70 font-semibold">Today</span>
                <span class="text-4xl font-heading font-bold text-gold-500 tabular-nums leading-none">
                    {{ number_format($trafficToday) }}
                </span>
            </span>
            <span
                class="flex items-center gap-3 bg-white/5 border border-white/15 rounded-2xl px-6 py-2 min-w-40 justify-center">
                <span class="text-xs uppercase tracking-wider text-white/70 font-semibold">Total</span>
                <span class="text-4xl font-heading font-bold text-gold-500 tabular-nums leading-none">
                    {{ number_format($trafficTotal) }}
                </span>
            </span>
        </div>
    </div>
</section>
