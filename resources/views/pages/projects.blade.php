@extends('layouts.app')

@php
    $pageTitle = 'Projects';
    $metaDescription = 'Browse Ahead Solar\'s completed solar projects for residential, commercial, community, and industrial clients.';
@endphp

@section('content')
@php $heroVideo = $heroSlides->first()->background_video ?: '/videos/project.mp4'; @endphp
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

<section class="solar-container py-20 lg:py-25 bg-white select-none">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
        @foreach ($projects as $index => $project)
            <div class="reveal h-115" data-variant="fade-up" data-delay="{{ ($index % 3) * 120 }}">
                <a href="{{ url('projects/' . $project->slug) }}" class="relative h-full rounded-lg overflow-hidden shadow-sm group flex flex-col justify-end p-4 transition-transform duration-300 hover:-translate-y-1">
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
</section>
@endsection