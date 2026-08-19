@extends('layouts.app')

@section('content')
<x-page-banner title="Our" titleAccent="Projects" crumb="Projects" />

<section class="solar-container py-20 lg:py-25 bg-white select-none">
    <div class="space-y-12">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div class="space-y-4 max-w-2xl">
                <div class="reveal" data-variant="fade-up"><span class="section-eyebrow">Our Projects</span></div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Projects that power progress</h2>
                </div>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <div class="flex flex-wrap gap-3">
                    <button type="button" data-filter="all" class="inline-flex items-center px-5 py-2.5 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider transition-colors duration-300 cursor-pointer border border-accent-500 bg-accent-500 text-white">All</button>
                    @foreach ($categories as $cat)
                        <button type="button" data-filter="{{ $cat }}" class="inline-flex items-center px-5 py-2.5 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider transition-colors duration-300 cursor-pointer border border-accent-500 bg-white text-accent-500 hover:bg-accent-500/10">{{ $cat }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
            @foreach ($projects as $index => $project)
                <div class="reveal h-115" data-variant="fade-up" data-delay="{{ ($index % 3) * 120 }}" data-project-card data-category="{{ $project->category }}">
                    <a href="{{ url('projects/' . $project->slug) }}" class="relative h-full rounded-lg overflow-hidden shadow-sm group flex flex-col justify-end p-4 transition-transform duration-300 hover:-translate-y-1">
                        @if ($project->is_featured)
                            <span class="absolute top-4 left-4 z-20 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gold-500 text-forest-900 text-[11px] font-bold uppercase tracking-wider shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                Featured
                            </span>
                        @endif
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style="background-image:url('{{ $project->image_url }}')"></div>
                        <div class="absolute inset-0 bg-linear-to-t from-accent-400/80 via-transparent to-transparent z-0"></div>
                        <div class="relative z-10 w-full rounded-xl p-5 backdrop-blur-md transition-all duration-300 border {{ $project->is_featured ? 'bg-gold-900/80 border-gold-500/30 shadow-lg' : 'bg-gold-900/40 backdrop-brightness-90 border-white/20 group-hover:bg-gold-900/70 group-hover:border-accent-500/30' }}">
                            <h3 class="font-heading text-lg lg:text-xl font-bold leading-snug tracking-tight text-white">{{ $project->title }}</h3>
                            @if ($project->description)
                                <p class="mt-2 text-sm text-white/80 line-clamp-2 max-h-0 opacity-0 overflow-hidden transition-all duration-300 group-hover:max-h-20 group-hover:opacity-100 group-hover:mt-2">{{ $project->description }}</p>
                            @endif
                            <div class="mt-4 inline-flex items-center gap-2.5 text-xs font-semibold uppercase tracking-wider text-white group-hover:text-accent-400 transition-colors">
                                <span>View Details</span>
                                <span class="flex items-center justify-center w-5 h-5 rounded-full bg-accent-500 text-gold-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    var buttons = document.querySelectorAll("[data-filter]");
    var cards = document.querySelectorAll("[data-project-card]");
    if (!buttons.length || !cards.length) return;
    buttons.forEach(function (btn) {
        btn.addEventListener("click", function () {
            var f = btn.dataset.filter;
            buttons.forEach(function (b) {
                b.classList.toggle("bg-accent-500", b === btn);
                b.classList.toggle("text-white", b === btn);
                b.classList.toggle("bg-white", b !== btn);
                b.classList.toggle("text-accent-500", b !== btn);
            });
            cards.forEach(function (card) {
                var show = f === "all" || card.dataset.category === f;
                card.classList.toggle("hidden", !show);
                if (show) card.classList.add("reveal-revealed");
            });
        });
    });
});
</script>
@endpush