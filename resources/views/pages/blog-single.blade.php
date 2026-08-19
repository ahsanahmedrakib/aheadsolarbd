@extends('layouts.app')

@section('content')

<x-page-banner :title="$blog->title" :crumb="$blog->title" image="/images/aheadsolar/banner.jpg" />

@if ($blog->date || $blog->category)
    <div class="bg-forest-700">
        <div class="solar-container">
            <div class="reveal" data-variant="fade-up" data-delay="200" style="transition-duration:800ms">
                <div class="flex flex-wrap items-center justify-center gap-4 py-5 text-xs sm:text-sm text-white/75 font-medium">
                    @if ($blog->date)
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-accent-500"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                            <time datetime="{{ $blog->date }}">{{ $blog->date }}</time>
                        </div>
                    @endif
                    @if ($blog->date && $blog->category)
                        <span class="hidden sm:inline text-accent-500">•</span>
                    @endif
                    @if ($blog->category)
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-accent-500"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z"/></svg>
                            <span>{{ $blog->category }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

<div class="bg-white min-h-screen text-accent-500 font-sans antialiased">
    <div class="solar-container px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <div class="flex flex-col lg:flex-row gap-8 lg:items-start">

            <aside class="w-full lg:w-[30%] lg:sticky lg:top-6 flex flex-col gap-6 shrink-0">
                @if (count($recent))
                    <div class="reveal bg-secondary rounded-lg overflow-hidden border border-white shadow-sm" data-variant="fade-up">
                        <div class="font-heading bg-accent-500 text-white px-5 py-4 font-bold text-sm tracking-wide uppercase border border-b">Recent Posts</div>
                        <div class="flex flex-col">
                            @foreach ($recent as $r)
                                <a href="{{ url('blogs/' . $r->slug) }}" class="flex items-center gap-3 px-4 py-3 border-b border-forest-700/10 last:border-0 transition-colors hover:bg-white group">
                                    <img src="{{ $r->image_url }}" alt="{{ $r->title }}" class="w-12 h-12 rounded-md object-cover shrink-0">
                                    <span class="text-xs font-bold text-accent-500 leading-snug group-hover:text-gold-600 transition-colors">{{ \Illuminate\Support\Str::limit($r->title, 48) }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $categories = collect([$blog->category])
                        ->merge($recent->pluck('category'))
                        ->filter()
                        ->unique()
                        ->values();
                @endphp
                @if ($categories->count())
                    <div class="reveal bg-secondary rounded-lg overflow-hidden border border-white shadow-sm" data-variant="fade-up" data-delay="100">
                        <div class="font-heading bg-accent-500 text-white px-5 py-4 font-bold text-sm tracking-wide uppercase border border-b">Categories</div>
                        <div class="flex flex-col">
                            @foreach ($categories as $cat)
                                <a href="{{ url('blogs') }}" class="flex items-center justify-between px-5 py-3.5 text-xs font-bold border-b border-forest-700/10 last:border-0 text-left transition-colors text-accent-500 hover:bg-white">
                                    <span>{{ $cat }}</span>
                                    <span class="text-base font-normal">→</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (is_array($blog->tags) && count($blog->tags))
                    <div class="reveal bg-secondary rounded-lg overflow-hidden border border-white shadow-sm" data-variant="fade-up" data-delay="200">
                        <div class="font-heading bg-accent-500 text-white px-5 py-4 font-bold text-sm tracking-wide uppercase border border-b">Tags</div>
                        <div class="p-5 flex flex-wrap gap-2">
                            @foreach ($blog->tags as $tag)
                                <a href="{{ url('blogs') }}" class="text-[11px] font-semibold text-accent-500 bg-white border border-forest-700/10 px-3 py-1.5 rounded-md transition-colors hover:bg-accent-500 hover:text-white">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </aside>

            <main class="w-full lg:w-[70%] flex flex-col gap-12 lg:pl-4">
                <div class="flex flex-col">
                    <div class="reveal-image w-full h-56 sm:h-96 md:h-112.5 rounded-lg overflow-hidden shadow-md border border-gray-100">
                        <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="absolute inset-0 w-full h-full object-cover">
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