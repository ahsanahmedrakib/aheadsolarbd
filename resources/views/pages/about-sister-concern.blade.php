@extends('layouts.app')

@php
    $pageTitle = 'Sister Concern';
    $metaDescription = 'Discover Ahead Solar\'s sister concern - Palash Charging Station, delivering 100% solar-charged lithium-ion battery rentals for easy-bikes and Mishuks.';
@endphp

@section('content')
<x-page-banner title="Sister" titleAccent="Concern" crumb="Sister Concern" :crumb-parent="['label' => 'About Us', 'href' => '/about']" image="/images/aheadsolar/banner-2.jpg" eyebrow="Our Group" />

<section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-8 items-center">
            <div class="space-y-6 lg:col-span-7">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">A Family Of Companies</span>
                    </div>

                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            Working together to power a cleaner tomorrow
                        </h2>
                    </div>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                        Ahead Solar is part of a growing family of companies united by a shared vision: accelerating the transition to renewable energy in Bangladesh. Through strategic joint ventures and trusted partnerships, we bring world-class solar and energy storage systems — and now clean electric mobility — to industries and communities across the country.
                    </p>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="240">
                    <div class="grid grid-cols-3 gap-4 sm:gap-6 border-t border-b border-forest-700/10 py-6 text-left">
                        <div>
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">01</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Joint Ventures</p>
                        </div>
                        <div class="border-l border-gray-200 pl-4 sm:pl-6">
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">03</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Sister Concerns</p>
                        </div>
                        <div class="border-l border-gray-200 pl-4 sm:pl-6">
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">100%</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Clean Energy Focus</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal-image relative w-full h-87.5 sm:h-112.5 lg:h-137.5 lg:col-span-5 rounded-lg shadow-lg" style="transition-delay:150ms">
                <img src="{{ url('/images/aheadsolar/what.jpg') }}" alt="Ahead Solar team planning clean energy projects" class="absolute inset-0 w-full h-full object-cover object-center">
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 lg:gap-12 items-end mb-16">
            <div class="lg:col-span-7 space-y-4">
                <div class="reveal" data-variant="fade-up">
                    <span class="section-eyebrow">Our Concerns</span>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                        The companies behind Ahead Solar
                    </h2>
                </div>
            </div>
            <div class="lg:col-span-5 lg:pl-4">
                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-sm leading-relaxed text-[#888888] sm:text-base">
                        Each concern brings deep expertise and a shared commitment to making clean, reliable energy accessible to everyone in Bangladesh.
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="reveal group flex flex-col overflow-hidden rounded-lg bg-secondary border border-accent-500 transition-all duration-300 hover:shadow-md" data-variant="fade-up" data-delay="0">
                <div class="relative aspect-16/10 w-full overflow-hidden p-4 pb-0">
                    <div class="relative h-full w-full overflow-hidden rounded-lg bg-white flex items-center justify-center">
                        <img src="{{ url('/logo.svg') }}" alt="Ahead Solar Ltd logo" class="h-16 w-auto object-contain">
                    </div>
                </div>
                <div class="flex flex-col p-6 pt-5">
                    <h3 class="font-heading text-xl font-bold text-accent-500">Ahead Solar Ltd.</h3>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-gold-500">Rooftop Solar &amp; BESS</p>
                    <p class="mt-3 text-sm text-[#888888] leading-relaxed">
                        The flagship company delivering rooftop solar solutions, battery energy storage systems, and complete clean energy services for industrial and residential customers across Bangladesh.
                    </p>
                    <a href="/about" class="mt-5 inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-accent-500 hover:text-gold-500 transition-colors">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
            </div>

            <div class="reveal group flex flex-col overflow-hidden rounded-lg bg-secondary border border-accent-500 transition-all duration-300 hover:shadow-md" data-variant="fade-up" data-delay="120">
                <div class="relative aspect-16/10 w-full overflow-hidden p-4 pb-0">
                    <div class="relative h-full w-full overflow-hidden rounded-lg bg-white flex items-center justify-center">
                        <img src="{{ url('/images/palash/logo-palash.png') }}" alt="Palash logo" class="h-16 w-auto object-contain">
                    </div>
                </div>
                <div class="flex flex-col p-6 pt-5">
                    <h3 class="font-heading text-xl font-bold text-accent-500">Palash</h3>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-gold-500">Solar EV Charging Station</p>
                    <p class="mt-3 text-sm text-[#888888] leading-relaxed">
                        A pioneering electric mobility venture introducing solar charging systems for three-wheeler vehicles — reducing diesel dependency and promoting eco-friendly transportation.
                    </p>
                    <a href="/palash-charging-station" class="mt-5 inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-accent-500 hover:text-gold-500 transition-colors">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
            </div>

            <div class="reveal group flex flex-col overflow-hidden rounded-lg bg-secondary border border-accent-500 transition-all duration-300 hover:shadow-md" data-variant="fade-up" data-delay="240">
                <div class="relative aspect-16/10 w-full overflow-hidden p-4 pb-0">
                    <div class="relative h-full w-full overflow-hidden rounded-lg bg-white flex items-center justify-center">
                        <img src="{{ url('/images/palash/palash-1.webp') }}" alt="Solar charging station project" class="h-full w-full object-cover">
                    </div>
                </div>
                <div class="flex flex-col p-6 pt-5">
                    <h3 class="font-heading text-xl font-bold text-accent-500">Nitol Niloy Group</h3>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-gold-500">Strategic Group Partner</p>
                    <p class="mt-3 text-sm text-[#888888] leading-relaxed">
                        An esteemed partner group collaborating with Ahead Solar to launch advanced solar EV charging solutions and expand clean mobility across Bangladesh.
                    </p>
                    <a href="/contact" class="mt-5 inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-accent-500 hover:text-gold-500 transition-colors">
                        Contact Us
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16 items-center">
            <div class="reveal-image relative w-full h-72 sm:h-95 lg:h-115 lg:col-span-5 rounded-lg shadow-lg" style="transition-delay:150ms">
                <img src="{{ url('/images/aheadsolar/project-2.jpg') }}" alt="Global solar technology partnership" class="absolute inset-0 w-full h-full object-cover">
            </div>

            <div class="space-y-6 lg:col-span-7">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">Global Partnership</span>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            Powered by world-class global technology
                        </h2>
                    </div>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                        Ahead Solar Ltd. operates as a joint venture with Zhejiang SAV Digital Power Technologies Ltd., bringing world-class photovoltaic and battery energy storage technology to Bangladesh. As part of the Jack Group (603337.SH), we deliver full-scope solutions for industrial, commercial, and zero-carbon industrial parks — from engineering and installation to operation and maintenance.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach ([
                        ['icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'title' => 'Full-Scope Solutions', 'text' => 'PV and BESS systems from design to O&M.'],
                        ['icon' => 'M2.25 18L9 11.25l4.306 4.306a11.95 11.95 0 015.814-5.518l2.74-1.22m0 0l-5.94-2.281m5.94 2.28l-2.28 5.941', 'title' => 'Zero-Carbon Parks', 'text' => 'Ready for future-ready industrial energy.'],
                        ['icon' => 'M12 3v3m0 12v3m9-9h-3M6 12H3m15.364-6.364l-2.121 2.121M7.757 17.243l-2.121 2.121m12.728 0l-2.121-2.121M7.757 6.757L5.636 4.636', 'title' => 'Global Innovation', 'text' => 'Backed by the Jack Group ecosystem.'],
                    ] as $i => $f)
                        <div class="reveal rounded-lg border border-white/60 bg-white p-6 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md" data-variant="fade-up" data-delay="{{ $i * 80 }}">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-accent-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f['icon'] }}"/></svg>
                            </div>
                            <h3 class="font-heading mt-6 text-base font-bold text-accent-500">{{ $f['title'] }}</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#888888] sm:text-sm">{{ $f['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative w-full bg-white px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container text-center">
        <div class="reveal" data-variant="fade-up">
            <span class="section-eyebrow">Get In Touch</span>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="100">
            <h2 class="mx-auto mt-4 max-w-2xl font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                Want to know more about our group?
            </h2>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="180">
            <a href="/contact" class="btn-brand group mt-8 inline-flex">
                Contact Our Team
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection