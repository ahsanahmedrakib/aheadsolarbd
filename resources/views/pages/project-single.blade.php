@extends('layouts.app')

@section('content')
@php
    $gallery = collect($project->images ?? [])->filter()->values();
    $slides = $gallery->prepend($project->image_url)->unique()->values();
@endphp

<x-page-banner :title="$project->title" :crumb="$project->title" :crumbParent="['label' => 'Projects', 'href' => '/projects']" />

<div class="bg-white min-h-screen text-accent-500 font-sans antialiased">
    <div class="solar-container px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <div class="flex flex-col lg:flex-row gap-8 lg:items-start">
            <aside class="w-full lg:w-[30%] lg:sticky lg:top-6 flex flex-col gap-6 shrink-0">
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <div class="bg-secondary rounded-lg overflow-hidden border border-white shadow-sm">
                        <div class="font-heading bg-accent-500 text-white px-5 py-4 font-bold text-sm tracking-wide uppercase border border-b">Explore Our Projects</div>
                        <nav class="flex flex-col">
                            @foreach ($related as $r)
                                <a href="{{ url('projects/' . $r->slug) }}" class="flex items-center justify-between px-5 py-3.5 text-xs font-bold border-b border-forest-700/10 last:border-0 text-left transition-colors text-accent-500 hover:bg-white">
                                    <span>{{ $r->title }}</span>
                                    <span class="text-base font-normal">→</span>
                                </a>
                            @endforeach
                        </nav>
                    </div>
                    <a href="/projects" class="btn-brand-outline group mt-6 inline-flex">
                        View All Projects
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
            </aside>

            <main class="w-full lg:w-[70%] flex flex-col gap-10 lg:pl-4">
                <div class="reveal" data-variant="fade-up">
                    <h1 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight leading-tight flex flex-wrap items-center gap-3">
                        {{ $project->title }}
                        @if ($project->is_featured)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gold-500 text-forest-900 text-[11px] font-bold uppercase tracking-wider shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                Featured
                            </span>
                        @endif
                    </h1>
                </div>

                <div class="reveal-image w-full h-64 sm:h-96 rounded-lg overflow-hidden shadow-md border border-gray-100">
                    @if ($slides->count() === 1)
                        <div class="h-full w-full bg-cover bg-center" style="background-image:url('{{ $slides->first() }}')"></div>
                    @else
                        <div data-image-slider class="single-image-slider relative h-full w-full flex flex-col">
                            <div class="relative flex-1 overflow-hidden">
                                @foreach ($slides as $img)
                                    <div class="slide {{ $loop->first ? 'active' : '' }} absolute inset-0 w-full h-full bg-cover bg-center" style="background-image:url('{{ $img }}')"></div>
                                @endforeach
                                <button type="button" data-slider-prev class="slider-btn-prev flex items-center justify-center" aria-label="Previous image">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                </button>
                                <button type="button" data-slider-next class="slider-btn-next flex items-center justify-center" aria-label="Next image">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                                </button>
                            </div>
                            <div data-slider-pagination class="single-image-pagination"></div>
                        </div>
                    @endif
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <div class="bg-secondary rounded-lg p-5 sm:p-6 grid grid-cols-1 sm:grid-cols-3 gap-5 border border-gray-100">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-gold-500">Client</span>
                            <p class="font-heading text-base font-bold text-accent-500 mt-1">{{ $project->client }}</p>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-gold-500">Location</span>
                            <p class="font-heading text-base font-bold text-accent-500 mt-1">{{ $project->location }}</p>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-gold-500">Category</span>
                            <p class="font-heading text-base font-bold text-accent-500 mt-1">{{ $project->category }}</p>
                        </div>
                    </div>
                </div>

                <div class="reveal text-[#888888] text-sm leading-relaxed space-y-4" data-variant="fade-up" data-delay="180">
                    {!! $project->project_details !!}
                </div>
            </main>
        </div>
    </div>
</div>

@if ($related->count())
    <section class="bg-secondary py-20 lg:py-25 font-sans overflow-x-hidden">
        <div class="solar-container space-y-12">
            <div class="text-center space-y-4">
                <div class="reveal" data-variant="fade-up"><span class="section-eyebrow justify-center">Related Projects</span></div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">More projects to explore</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
                @foreach ($related as $index => $r)
                    <div class="reveal h-115" data-variant="fade-up" data-delay="{{ ($index % 3) * 120 }}">
                        <a href="{{ url('projects/' . $r->slug) }}" class="relative h-full rounded-lg overflow-hidden shadow-sm group flex flex-col justify-end p-4 transition-transform duration-300 hover:-translate-y-1">
                            @if ($r->is_featured)
                                <span class="absolute top-4 left-4 z-20 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gold-500 text-forest-900 text-[11px] font-bold uppercase tracking-wider shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    Featured
                                </span>
                            @endif
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style="background-image:url('{{ $r->image_url }}')"></div>
                            <div class="absolute inset-0 bg-linear-to-t from-accent-400/80 via-transparent to-transparent z-0"></div>
                            <div class="relative z-10 w-full rounded-xl p-5 backdrop-blur-md transition-all duration-300 border bg-gold-900/40 backdrop-brightness-90 border-white/20 group-hover:bg-gold-900/70 group-hover:border-accent-500/30">
                                <h3 class="font-heading text-lg lg:text-xl font-bold leading-snug tracking-tight text-white">{{ $r->title }}</h3>
                                @if ($r->description)
                                    <p class="mt-2 text-sm text-white/80 line-clamp-2 max-h-0 opacity-0 overflow-hidden transition-all duration-300 group-hover:max-h-20 group-hover:opacity-100 group-hover:mt-2">{{ $r->description }}</p>
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
@endif
@endsection