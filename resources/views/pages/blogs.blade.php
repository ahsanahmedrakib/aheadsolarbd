@extends('layouts.app')

@section('content')

<x-page-banner title="Blogs" crumb="Blogs" image="/images/aheadsolar/banner.jpg" />

<section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
    <div class="solar-container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
            @foreach ($blogs as $i => $blog)
                <div class="reveal h-115" data-variant="fade-up" data-delay="{{ ($i % 3) * 120 }}">
                    <a href="{{ url('blogs/' . $blog->slug) }}" class="relative h-full rounded-lg overflow-hidden shadow-sm group flex flex-col justify-end p-4 transition-transform duration-300 hover:-translate-y-1">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style="background-image:url('{{ $blog->image_url }}')"></div>
                        <div class="absolute inset-0 bg-linear-to-t from-accent-400/80 via-transparent to-transparent z-0"></div>
                        <div class="relative z-10 w-full rounded-lg p-5 backdrop-blur-md transition-all duration-300 border bg-gold-900/40 backdrop-brightness-90 border-white/20 group-hover:bg-gold-900/70 group-hover:border-accent-500/30">
                            @if ($blog->category)
                                <span class="inline-block mb-2 text-[10px] font-semibold uppercase tracking-wider text-accent-400">{{ $blog->category }}</span>
                            @endif
                            <h3 class="font-heading text-lg lg:text-xl font-bold leading-snug tracking-tight text-white">{{ $blog->title }}</h3>
                            @if ($blog->content)
                                <p class="mt-2 text-sm text-white/80 line-clamp-2 max-h-0 opacity-0 overflow-hidden transition-all duration-300 group-hover:max-h-20 group-hover:opacity-100">{{ $blog->content }}</p>
                            @endif
                            <div class="mt-4 inline-flex items-center gap-2.5 text-xs font-semibold uppercase tracking-wider text-white group-hover:text-accent-400 transition-colors">
                                <span>Read More</span>
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