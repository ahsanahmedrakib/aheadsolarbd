@extends('layouts.app')

@php
    $titleFull = 'Ahead Solar - Leading Renewable Energy Solutions';
    $metaDescription = 'Top-rated solar panel installation, battery storage, and maintenance for residential and commercial properties.';
@endphp

@section('content')
{{-- ================================================================
     HERO — fade slider
     ================================================================ --}}
@php $heroVideo = $heroSlides->first()->background_video ?: '/videos/hero.mp4'; @endphp
<section class="w-full relative min-h-187.5 overflow-hidden select-none" data-fade-slider data-autoplay="true">
    <video class="absolute inset-0 w-full h-full object-cover" src="{{ $heroVideo }}" autoplay muted loop playsinline preload="auto"></video>
    <div class="absolute inset-0 bg-linear-to-r from-forest-900/90 via-forest-900/60 to-transparent z-10"></div>

    @foreach ($heroSlides as $i => $slide)
        <div class="slide {{ $i === 0 ? 'active' : '' }} relative min-h-187.5 flex items-start">
            <div class="solar-container z-20 pt-20 pb-16 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative">
                <div class="lg:col-span-7 flex flex-col items-start space-y-6">
                    <div class="hero-anime-item inline-flex items-center space-x-2 bg-white text-accent-500 px-4 py-1.5 rounded-full shadow-lg">
                        <span class="w-2 h-2 rounded-full bg-accent-500 animate-pulse"></span>
                        <span class="text-xs md:text-sm font-semibold tracking-wide text-gold-500">{{ $slide->tagline }}</span>
                    </div>

                    <h1 class="font-heading text-4xl md:text-5xl lg:text-[68px] font-bold text-accent-600 leading-[1.1] tracking-tight max-w-3xl uppercase">
                        @php $titleWords = preg_split('/\s+/', trim($slide->title)); @endphp
                        @foreach ($titleWords as $wi => $word)
                            <span class="anime-word" style="transition-delay:{{ 0.35 + $wi * 0.06 }}s">{{ $word }}{!! $wi < count($titleWords) - 1 ? '&nbsp;' : '' !!}</span>
                        @endforeach
                        <br class="hidden md:inline">
                        @if ($slide->title_accent)
                            @php $accentWords = preg_split('/\s+/', trim($slide->title_accent)); @endphp
                            <span class="text-stroke-white">
                                @foreach ($accentWords as $wi => $word)
                                    <span class="anime-word" style="transition-delay:{{ 0.35 + count($titleWords) * 0.06 + $wi * 0.06 }}s">{{ $word }}{!! $wi < count($accentWords) - 1 ? '&nbsp;' : '' !!}</span>
                                @endforeach
                            </span>
                        @endif
                    </h1>

                    <p class="hero-anime-item text-white/75 text-base md:text-lg font-normal max-w-xl leading-relaxed">
                        {{ $slide->description }}
                    </p>

                    <div class="hero-anime-item flex flex-wrap items-center gap-4 pt-4 w-full sm:w-auto">
                        <a href="/contact" class="btn-brand w-full sm:w-auto justify-center group">
                            <span>Get Free Consultation</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="transition-transform duration-300 group-hover:translate-x-1"><path d="M6 4v16l14-8z"/></svg>
                        </a>

                        @if ($slide->show_video_button && $slide->video_url)
                            <button type="button" data-video-open="{{ $slide->video_url }}" class="group flex cursor-pointer items-center space-x-3 text-white font-medium hover:text-accent-500 transition-colors duration-300 py-3 px-4 rounded-full">
                                <span class="relative w-12 h-12 rounded-full bg-accent-500 group-hover:bg-forest-700 flex items-center justify-center transition-colors duration-300 shadow-md">
                                    <span class="absolute inset-0 rounded-full bg-accent-500/50 pulse-ring"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#fff" class="ml-0.5 relative"><path d="M6 4v16l14-8z"/></svg>
                                </span>
                                <span class="tracking-wide">Watch Our Story</span>
                            </button>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-5 hidden lg:block"></div>
            </div>
        </div>
    @endforeach

    @if (count($heroSlides) > 1)
        <div class="swiper-dots hero-dots" data-slider-dots>
            @foreach ($heroSlides as $i => $slide)
                <button type="button" data-bullet class="hero-swiper-bullet {{ $i === 0 ? 'hero-swiper-bullet-active' : '' }}"></button>
            @endforeach
        </div>
    @endif
</section>

{{-- ================================================================
     ABOUT
     ================================================================ --}}
<section class="bg-white py-20 lg:py-25 font-sans relative">
    <div class="solar-container grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
        <div class="relative w-full max-w-135 mx-auto aspect-[0.92/1] lg:col-span-6 order-2 lg:order-1 mt-12 lg:mt-0 select-none">
            <div class="absolute top-6 right-4 sm:right-8 z-30 w-28 h-28 sm:w-32 sm:h-32 hidden sm:block select-none">
                <div class="w-full h-full relative animate-[spin_18s_linear_infinite]">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <defs>
                            <path id="rot-path" d="M 50,50 m -38,0 a 38,38 0 1,1 76,0 a 38,38 0 1,1 -76,0" fill="none"></path>
                        </defs>
                        <circle cx="50" cy="50" r="48" class="fill-forest-700/90"></circle>
                        <text class="text-[8.5px] font-bold fill-white tracking-[2.4px] uppercase">
                            <textPath href="#rot-path" startOffset="0" textAnchor="start">Ahead Solar Ltd&nbsp;&bull;&nbsp;Sunshine To Electricity&nbsp;&bull;&nbsp;</textPath>
                        </text>
                    </svg>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-12 h-12 rounded-full bg-accent-600 text-white flex items-center justify-center shadow-lg border-2 border-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                    </div>
                </div>
            </div>

            <div class="reveal-image absolute top-0 left-0 w-[70%] h-[64%] rounded-xl overflow-hidden shadow-sm">
                <img src="{{ url('/images/aheadsolar/about-1.jpg') }}" alt="Team discussing clean energy" class="absolute inset-0 w-full h-full object-cover">
            </div>

            <div class="reveal absolute bottom-0 left-0 w-[42%] aspect-[1/.85] flex flex-col justify-center items-center bg-forest-700 text-white p-4 rounded-lg shadow-md text-center z-20" data-variant="fade-up" data-delay="200">
                <div class="animate-float flex flex-col items-center">
                    <h3 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight mb-1 text-white">06+</h3>
                    <p class="text-xs sm:text-sm text-white/70 font-semibold leading-snug">Years In<br>Solar Business</p>
                </div>
            </div>

            <div class="reveal-image absolute bottom-0 right-0 w-[56%] h-[74%] rounded-xl overflow-hidden shadow-2xl border-4 sm:border-8 border-white z-10" style="transition-delay:150ms">
                <img src="{{ url('/images/aheadsolar/about-2.jpg') }}" alt="Engineers walking on site" class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>

        <div class="lg:col-span-6 lg:pl-10 space-y-6 order-1 lg:order-2">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">About Ahead Solar Ltd.</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Pioneering Bangladesh&apos;s energy revolution</h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed max-w-xl">
                    At Ahead Solar Ltd., we are pioneering Bangladesh&apos;s energy revolution. We specialize in advanced commercial and industrial energy storage solutions, primarily focusing on Rooftop Solar and BESS (Battery Energy Storage System) fusion systems. Driven by our mission to replace all diesel generators with our solar and storage fusion systems, we are dedicated to creating profits and giving back to society with sunshine.
                </p>
            </div>

            <hr class="border-gray-100 my-6">

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 items-center">
                <div class="sm:col-span-7 space-y-6">
                    @foreach ([
                        ['title' => 'R&D Driven Approach', 'text' => 'We are the only solar company focused on research and development to continuously improve system performance and adapt to evolving technology.', 'd' => 'M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5'],
                        ['title' => 'Five Milestone Firsts', 'text' => 'As an industry leader, we have achieved five milestone "firsts," including Bangladesh\'s first MW-Scale Energy Storage Project and the country\'s first BESS Assembly plant.', 'd' => 'M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21h.75a.75.75 0 0 0 .75-.75V9.375m0 0A2.25 2.25 0 0 1 9.375 7.125h5.25a2.25 2.25 0 0 1 2.25 2.25v6.375m-10.5 0V5.625a2.25 2.25 0 0 1 2.25-2.25h5.25a2.25 2.25 0 0 1 2.25 2.25v13.125'],
                        ['title' => 'First Solar 3-Wheeler Approval', 'text' => 'In the realm of sustainable mobility, we secured Bangladesh\'s first Solar 3-wheeler approval from the DNCC.', 'd' => 'M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12'],
                    ] as $i => $feature)
                        <div class="reveal flex gap-4 items-start group" data-variant="fade-up" data-delay="{{ 100 + $i * 100 }}">
                            <div class="shrink-0 w-12 h-12 rounded-[18px] bg-accent-500 text-accent-500 flex items-center justify-center shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['d'] }}"/></svg>
                            </div>
                            <div>
                                <h4 class="font-heading text-lg font-bold text-accent-500 mb-1">{{ $feature['title'] }}</h4>
                                <p class="text-xs sm:text-sm text-[#888888] leading-normal text-justify">{{ $feature['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="reveal-image sm:col-span-5 relative w-full aspect-4/3 sm:aspect-square rounded-lg overflow-hidden shadow-sm bg-gray-100" style="transition-delay:150ms">
                    <img src="{{ url('/images/aheadsolar/about-3.jpg') }}" alt="Solar fields installation" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </div>

            <div class="reveal pt-4 flex flex-row flex-wrap items-center gap-6" data-variant="fade-up" data-delay="150">
                <a href="/about" class="btn-brand group">
                    More About Us
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     SERVICES
     ================================================================ --}}
<section class="bg-secondary py-20 lg:py-25 px-4 sm:px-6 lg:px-8">
    <div class="solar-container space-y-12">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div class="space-y-4 max-w-2xl">
                <div class="reveal" data-variant="fade-up"><span class="section-eyebrow">Our Services</span></div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Comprehensive solar solutions for every business need</h2>
                </div>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="text-[#888888] text-sm sm:text-base leading-relaxed max-w-md">
                    From system design and professional installation to energy storage and ongoing maintenance — our integrated solutions deliver reliable performance for industrial and commercial facilities.
                </p>
                <a href="/services" class="btn-brand mt-5 group inline-flex">
                    View All Services
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                </a>
            </div>
        </div>

        <div class="swiper-dots pb-12" data-swiper data-loop="true" data-delay="3000" data-slides="1" data-breakpoints='{"640":2,"1024":3}'>
            <div class="swiper-wrapper">
                @foreach ($services as $service)
                    <div class="swiper-slide h-auto">
                        <a href="{{ url('services/' . $service->slug) }}" class="relative h-115 rounded-lg overflow-hidden shadow-sm group flex flex-col justify-end p-4 transition-transform duration-300 hover:-translate-y-1">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style="background-image:url('{{ $service->image }}')"></div>
                            <div class="absolute inset-0 bg-linear-to-t from-accent-400/80 via-transparent to-transparent z-0"></div>
                            <div class="relative z-10 w-full rounded-xl p-5 backdrop-blur-md transition-all duration-300 border bg-gold-900/40 backdrop-brightness-90 border-white/20 group-hover:bg-gold-900/70 group-hover:border-accent-500/30">
                                <h3 class="font-heading text-lg lg:text-xl font-bold leading-snug tracking-tight text-white">{{ $service->title }}</h3>
                                <p class="mt-2 text-sm text-white/80 line-clamp-2 max-h-0 opacity-0 overflow-hidden transition-all duration-300 group-hover:max-h-20 group-hover:opacity-100">{{ $service->description }}</p>
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
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

{{-- ================================================================
     WHY CHOOSE US
     ================================================================ --}}
<section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
    <div class="solar-container grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-start">
        <div class="lg:col-span-6 space-y-6 lg:pr-6">
            <div class="reveal" data-variant="fade-up"><span class="section-eyebrow">Why Choose Us</span></div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">One-stop rooftop solar solution provider for industries</h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed max-w-xl">
                    We deliver complete solar solutions — from system design and engineering to installation and ongoing maintenance — backed by 06+ years of experience serving Bangladesh&apos;s top industrial sectors.
                </p>
            </div>

            <div class="reveal" data-variant="fade-up" data-delay="240">
                <div class="relative bg-secondary rounded-lg p-5 sm:p-6 border-l-4 border-accent-500 flex gap-4 items-start shadow-sm transition-all duration-500 hover:shadow-md group">
                    <div class="shrink-0 w-12 h-12 rounded-[18px] bg-accent-500 text-accent-500 flex items-center justify-center transition-transform duration-500 group-hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.864 16.5a4.5 4.5 0 005.322-.024m0 0a4.5 4.5 0 005.322-6.104m-5.322 6.128a4.5 4.5 0 01-5.322-6.128m5.322 6.128v4.5m0-9.75a4.5 4.5 0 00-.001 9.001M12 3v3.75m0 9.75V21m0-12a3 3 0 110-6 3 3 0 010 6z"/></svg>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-heading text-base sm:text-lg font-bold text-accent-500">Flexible CapEx &amp; OpEx Models</h4>
                        <p class="text-xs sm:text-sm text-[#888888] leading-relaxed">Choose to own your system with our CapEx model or start saving from day one with our OpEx model — we provide the right financial and technical solution for every business.</p>
                    </div>
                </div>
            </div>

            <div class="reveal" data-variant="fade-up" data-delay="200">
                <div class="border-t border-b border-gray-100 py-6 my-8">
                    <div class="grid grid-cols-3 gap-4 sm:gap-6 text-left">
                        <div>
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">52MWp</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Largest Rooftop Project</p>
                        </div>
                        <div class="border-l border-gray-200 pl-4 sm:pl-6">
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">30GWh</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Green Energy Per Year</p>
                        </div>
                        <div class="border-l border-gray-200 pl-4 sm:pl-6">
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">06+</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Years In Solar Business</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-6 w-full space-y-4">
            <div class="reveal-image relative w-full aspect-[2.1/1] rounded-lg overflow-hidden shadow-sm bg-gray-100">
                <img src="{{ url('/images/aheadsolar/why-1.jpg') }}" alt="Expert solar engineers team installing panels on rooftop" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute bottom-3 left-3 right-3 flex flex-wrap gap-2 z-10">
                    @foreach (['Solar Systems', 'Green Energy', 'Residential Solar', 'Solar Installation'] as $idx => $label)
                        <span class="text-[9px] sm:text-[11px] font-medium text-white px-2.5 py-1 rounded-md backdrop-blur-md bg-black/30 whitespace-nowrap {{ $idx > 1 ? 'hidden sm:inline-block' : '' }}">{{ $label }}</span>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="reveal-image relative w-full aspect-[1.15/1] sm:aspect-[0.9/1] rounded-lg overflow-hidden shadow-sm bg-gray-100" style="transition-delay:120ms">
                    <img src="{{ url('/images/aheadsolar/why-2.jpg') }}" alt="Solar engineer inspecting photovoltaic panels" class="absolute inset-0 w-full h-full object-cover">
                </div>
                <div class="reveal w-full aspect-[1.15/1] sm:aspect-[0.9/1] bg-accent-500 text-white p-6 sm:p-8 rounded-lg shadow-sm flex flex-col justify-end relative overflow-hidden group" data-variant="fade-up" data-delay="220">
                    <div class="absolute top-6 left-6 w-20 h-20 sm:w-24 sm:h-24 md:w-30 md:h-30 opacity-95 transition-transform duration-500 group-hover:scale-110">
                        <img src="{{ url('/images/home/why-choose-info-image.png') }}" alt="Solar engineer" class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-2 sm:space-y-3 z-10">
                        <h3 class="font-heading text-xl sm:text-2xl font-bold tracking-tight">24/7 Data Monitoring</h3>
                        <div class="w-full h-px bg-forest-700/20 my-1 sm:my-2"></div>
                        <p class="text-xs sm:text-sm leading-relaxed">Real-time monitoring and analysis of every solar plant to ensure peak performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     WORK PROCESS + VIDEO CTA
     ================================================================ --}}
<section class="py-16 lg:py-25 px-4 bg-secondary font-sans overflow-x-hidden">
    <div class="solar-container">
        <div class="text-center mb-16 space-y-4">
            <div class="reveal" data-variant="fade-up"><span class="section-eyebrow justify-center">Our Work Process</span></div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold tracking-tight leading-[1.1] text-accent-500">From consultation to clean energy in three steps</h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="text-[#888888] text-sm sm:text-base leading-relaxed max-w-2xl mx-auto">Our streamlined process takes you from a free site assessment to a fully operational solar plant — handled end-to-end by certified engineers.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8 relative">
            @foreach ([
                ['number' => '01', 'title' => 'Site Assessment & Planning', 'desc' => 'We evaluate your roof structure, energy consumption, and design a custom solar system optimized for maximum savings.', 'd' => 'M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9 2 2 4-4'],
                ['number' => '02', 'title' => 'Engineering & Installation', 'desc' => 'Our certified team handles system design, permitting, and professional installation with minimal disruption.', 'd' => 'M8.21 13.89a7 7 0 0 0 7.58 0M21 9a3 3 0 0 1-3 3v.5A3.5 3.5 0 0 1 14.5 16h-5A3.5 3.5 0 0 1 6 12.5V12a3 3 0 0 1-3-3M3 9h18l-1.07-4.2A3 3 0 0 0 17 2.5H7a3 3 0 0 0-2.93 2.3L3 9zM6.5 20h11l-0.9-3a1.5 1.5 0 0 0-1.46-1.15H8.86A1.5 1.5 0 0 0 7.4 17l-0.9 3z'],
                ['number' => '03', 'title' => 'Commissioning & Monitoring', 'desc' => 'Your system starts generating clean energy immediately, backed by real-time 24/7 remote performance monitoring.', 'd' => 'M22 12h-4l-3 9L9 3l-3 9H2'],
            ] as $idx => $step)
                <div class="reveal group relative flex flex-col items-center text-center" data-variant="fade-up" data-delay="{{ $idx * 160 }}">
                    @if ($idx < 2)
                        <div class="hidden md:block absolute top-12 left-[60%] w-[80%] z-0 pointer-events-none">
                            <svg viewBox="0 0 160 50" fill="none" class="w-full h-auto text-accent-500">
                                <path d="{{ $idx % 2 === 0 ? 'M 10 10 Q 80 -10 145 35' : 'M 10 35 Q 80 55 145 10' }}" stroke="currentColor" stroke-width="2" stroke-dasharray="4 4" fill="none"></path>
                                <polygon points="{{ $idx % 2 === 0 ? '140,30 148,37 141,40' : '140,15 148,8 141,5' }}" fill="currentColor"></polygon>
                            </svg>
                        </div>
                    @endif
                    <div class="relative mb-6 z-10">
                        <div class="w-32 h-32 bg-accent-500 rounded-3xl flex items-center justify-center shadow-lg shadow-accent-500/25 group-hover:scale-105 group-hover:-translate-y-1 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-12 h-12"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['d'] }}"/></svg>
                        </div>
                        <div class="absolute -top-1 -right-1 bg-gold-500 text-white font-heading font-bold text-sm w-9 h-9 rounded-full flex items-center justify-center ring-4 ring-white">{{ $step['number'] }}</div>
                    </div>
                    <h3 class="font-heading text-xl sm:text-2xl font-bold text-forest-700 mb-3 tracking-tight">{{ $step['title'] }}</h3>
                    <p class="text-[#888888] text-sm leading-relaxed max-w-xs">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================================================================
     TESTIMONIALS
     ================================================================ --}}
<section class="bg-white py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-hidden">
    <div class="solar-container">
        @if (session('success'))
            <div class="reveal mb-10" data-variant="fade-up">
                <div class="flex items-start gap-3 bg-accent-500/10 border border-accent-500/40 rounded-xl px-5 py-4">
                    <svg class="w-5 h-5 shrink-0 text-accent-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <p class="text-accent-700 text-sm font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <div class="lg:col-span-5 space-y-6">
                <div class="reveal" data-variant="fade-up"><span class="section-eyebrow">Our Testimonials</span></div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Customers sharing their journey to solar</h2>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <a href="#write-review" class="btn-brand group" data-review-open>
                        Write A Review
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="240">
                    <div class="bg-white rounded-lg p-5 border border-accent-500 shadow-sm max-w-sm mt-8 space-y-3">
                        <div class="flex items-center gap-3">
                            @php $avg = $reviews->count() ? number_format($reviews->avg('rating'), 1) : '5.0'; @endphp
                            <span class="font-heading text-2xl font-extrabold text-accent-500">{{ $avg }}/5</span>
                            <div class="flex">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="relative w-8 h-8">
                                        <svg class="absolute inset-0 w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        <div class="absolute inset-0 overflow-hidden" style="width:{{ max(0, min(1, (float)$avg - $i)) * 100 }}%">
                                            <svg class="w-8 h-8 text-accent-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <p class="text-xs font-bold text-[#888888] leading-tight">1K+ Customer Trust Our Service</p>
                    </div>
                </div>
            </div>

            <div class="reveal lg:col-span-7 w-full" data-variant="fade-up" data-delay="150">
                <div class="swiper-dots pb-12" data-swiper data-loop="true" data-delay="3000" data-slides="1" data-breakpoints='{"640":1.3,"768":2,"1024":2.3}'>
                    <div class="swiper-wrapper">
                        @foreach ($reviews as $item)
                            <div class="swiper-slide h-auto">
                                <div class="bg-white rounded-lg mt-2 py-6 px-6 border border-accent-500 shadow-sm flex flex-col justify-between space-y-8 transition-all duration-300 hover:shadow-xl hover:-translate-y-1.5 h-80">
                                    <div class="space-y-4">
                                        <div class="flex text-accent-500">
                                            @for ($s = 0; $s < $item->rating; $s++)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-7 h-7 mr-0.5"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                            @endfor
                                        </div>
                                        <p class="text-sm sm:text-base font-medium text-[#888888] leading-snug tracking-tight" title="{{ $item->quote }}">&ldquo;{{ \Illuminate\Support\Str::limit($item->quote, 181) }}&rdquo;</p>
                                    </div>
                                    <div class="pt-4 border-t border-gray-100/80">
                                        <h4 class="font-heading text-base font-bold text-accent-500 tracking-tight">{{ $item->name }}</h4>
                                        <p class="text-xs sm:text-sm font-semibold text-[#888888] mt-0.5">{{ $item->role }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     REVIEW MODAL
     ================================================================ --}}
<div id="write-review" class="hidden fixed inset-0 z-50 items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" data-review-close></div>
    <div class="relative bg-white rounded-lg shadow-2xl w-full max-w-lg p-6 sm:p-8 max-h-[90vh] overflow-y-auto">
        <button type="button" data-review-close class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        <h3 class="font-heading text-xl sm:text-2xl font-bold text-accent-500 mb-1">Write A Review</h3>
        <p class="text-sm text-[#888888] mb-6">Share your experience with our solar solutions.</p>

        <form action="{{ route('reviews.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <div class="flex flex-col gap-1.5">
                <label class="text-accent-500 text-xs font-bold tracking-wide">Your Name*</label>
                <input type="text" name="name" placeholder="Enter your name" required class="w-full bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 outline-none placeholder-gray-400 text-sm focus:ring-2 focus:ring-accent-600 transition-all">
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-accent-500 text-xs font-bold tracking-wide">Your Role*</label>
                <input type="text" name="role" placeholder="e.g. Home Owner, Business Owner" required class="w-full bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 outline-none placeholder-gray-400 text-sm focus:ring-2 focus:ring-accent-600 transition-all">
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-accent-500 text-xs font-bold tracking-wide">Rating*</label>
                <select name="rating" class="w-full bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 outline-none text-sm focus:ring-2 focus:ring-accent-600 transition-all">
                    @for ($s = 5; $s >= 1; $s--)
                        <option value="{{ $s }}">{{ $s }} Star{{ $s > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-accent-500 text-xs font-bold tracking-wide">Your Review*</label>
                <textarea name="quote" rows="4" placeholder="Share your experience..." required class="w-full bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 outline-none placeholder-gray-400 text-sm resize-none focus:ring-2 focus:ring-accent-600 transition-all"></textarea>
            </div>
            <div class="mt-2">
                <button type="submit" class="w-full bg-accent-500 hover:bg-accent-600 text-secondary text-sm font-semibold px-6 py-3 rounded-2xl shadow-md transition-colors duration-200 cursor-pointer">Submit Review</button>
            </div>
        </form>
    </div>
</div>

{{-- VIDEO MODAL (global) --}}
<div data-video-modal class="hidden fixed inset-0 z-50 items-center justify-center bg-black/80 backdrop-blur-sm">
    <div class="relative w-full max-w-4xl mx-4">
        <button type="button" data-video-close class="absolute -top-12 right-0 text-white/80 hover:text-white transition z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        <div class="relative aspect-video rounded-xl overflow-hidden shadow-2xl">
            <iframe src="" class="w-full h-full" allow="autoplay; encrypted-media; fullscreen" allowfullscreen title="Video Player"></iframe>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-review-open]").forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            var modal = document.getElementById("write-review");
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            document.body.style.overflow = "hidden";
        });
    });
    document.querySelectorAll("[data-review-close]").forEach(function (el) {
        el.addEventListener("click", function () {
            var modal = document.getElementById("write-review");
            modal.classList.add("hidden");
            modal.classList.remove("flex");
            document.body.style.overflow = "";
        });
    });
});
</script>
@endpush