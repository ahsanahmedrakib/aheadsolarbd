@extends('layouts.app')

@section('content')
<x-page-banner :title="$service->title" :crumb="$service->title" :crumbParent="['label' => 'Services', 'href' => '/services']" image="/images/aheadsolar/banner.jpg" />

@php
    $allServices = \App\Models\Service::orderBy('id')->get();
    $gallery = collect($service->images ?? [])->filter()->values()->all();
    $slides = count($gallery) > 0 ? array_merge([$service->image], $gallery) : [$service->image];
    $slides = array_values(array_unique(array_filter($slides)));
@endphp

<div class="bg-white min-h-screen text-accent-500 font-sans antialiased">
    <div class="solar-container px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <div class="flex flex-col lg:flex-row gap-8 lg:items-start">
            <aside class="w-full lg:w-[30%] lg:sticky lg:top-6 flex flex-col gap-6 shrink-0">
                <div class="reveal bg-secondary rounded-lg overflow-hidden border border-white shadow-sm" data-variant="fade-up">
                    <div class="font-heading bg-accent-500 text-white px-5 py-4 font-bold text-sm tracking-wide uppercase border border-b">Explore Our Services</div>
                    <nav class="flex flex-col">
                        @foreach ($allServices as $s)
                            <a href="{{ url('services/' . $s->slug) }}" class="flex items-center justify-between px-5 py-3.5 text-xs font-bold border-b border-forest-700/10 last:border-0 text-left transition-colors {{ $s->slug === $service->slug ? 'bg-accent-500 text-white' : 'text-accent-500 hover:bg-white' }}">
                                <span>{{ $s->title }}</span>
                                <span class="text-base font-normal">&rarr;</span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </aside>

            <main class="w-full lg:w-[70%] flex flex-col gap-12 lg:pl-4">
                <div class="reveal" data-variant="fade-up">
                    <section class="flex flex-col gap-6">
                        <div class="flex flex-col">
                            <div class="reveal-image relative w-full h-64 sm:h-96 rounded-lg overflow-hidden shadow-md border border-gray-100">
                                <div data-image-slider class="single-image-slider absolute inset-0">
                                    @foreach ($slides as $i => $img)
                                        <div class="slide {{ $i === 0 ? 'active' : '' }} relative w-full h-full">
                                            <img src="{{ $img }}" alt="{{ $service->title }}" class="absolute inset-0 w-full h-full object-cover">
                                        </div>
                                    @endforeach
                                    <button type="button" data-slider-prev class="slider-btn-prev" aria-label="Previous image">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                    </button>
                                    <button type="button" data-slider-next class="slider-btn-next" aria-label="Next image">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                                    </button>
                                    <div data-slider-pagination class="single-image-pagination absolute bottom-0 left-0 right-0 z-10"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-[#888888] text-sm leading-relaxed space-y-4">{!! $service->service_details !!}</div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection