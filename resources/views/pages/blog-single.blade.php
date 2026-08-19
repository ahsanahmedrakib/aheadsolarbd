@extends('layouts.app')

@section('content')

<x-page-banner :title="$blog->title" :crumb="$blog->title" image="/images/aheadsolar/banner.jpg" />

<div class="bg-white min-h-screen text-accent-500 font-sans antialiased">
    <div class="solar-container px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <div class="flex flex-col lg:flex-row gap-8 lg:items-start">

            <aside class="w-full lg:w-[30%] lg:sticky lg:top-6 flex flex-col gap-6 shrink-0">
                <div class="reveal" data-variant="fade-up">
                    <div class="bg-secondary rounded-lg overflow-hidden border border-white shadow-sm">
                        <div class="font-heading bg-accent-500 text-white px-5 py-4 font-bold text-sm tracking-wide uppercase border border-b">Explore Our Blogs</div>
                        <nav class="flex flex-col">
                            @foreach ($allBlogs as $b)
                                <a href="{{ url('blogs/' . $b->slug) }}" class="flex items-center justify-between px-5 py-3.5 text-xs font-bold border-b border-forest-700/10 last:border-0 text-left transition-colors {{ $b->slug === $blog->slug ? 'bg-accent-500 text-white' : 'text-accent-500 hover:bg-white' }}">
                                    <span>{{ $b->title }}</span>
                                    <span class="text-base font-normal">→</span>
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </aside>

            <main class="w-full lg:w-[70%] flex flex-col gap-12 lg:pl-4">
                @php
                    $gallery = collect($blog->images ?? [])->filter()->values();
                    $slides = $gallery->prepend($blog->image_url)->unique()->values();
                @endphp
                <div class="flex flex-col">
                    <div class="reveal-image w-full h-56 sm:h-96 md:h-112.5 rounded-lg overflow-hidden shadow-md border border-gray-100">
                        @if ($slides->count() === 1)
                            <div class="h-full w-full bg-cover bg-center" style="background-image:url('{{ $slides->first() }}')"></div>
                        @else
                            <div data-swiper data-loop="true" data-delay="4000" data-navigation="true" data-slides="1" class="single-image-slider relative h-full w-full">
                                <div class="swiper-wrapper h-full">
                                    @foreach ($slides as $img)
                                        <div class="swiper-slide relative w-full h-full bg-cover bg-center" style="background-image:url('{{ $img }}')"></div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="reveal" data-variant="fade-up">
                    <article class="prose prose-gray blog-details max-w-none text-sm sm:text-base text-gray-600 leading-relaxed">
                        {!! $blog->blog_details !!}
                    </article>
                </div>
            </main>
        </div>
    </div>
</div>

@endsection