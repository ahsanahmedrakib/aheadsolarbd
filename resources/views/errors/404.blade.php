@extends('layouts.app')

@php
    $pageTitle = 'Page Not Found';
    $metaDescription = 'The page you are looking for could not be found.';
@endphp

@section('content')

<section class="bg-white flex items-center justify-center py-24 lg:py-32 px-4 sm:px-8 font-sans">
    <div class="max-w-2xl w-full mx-auto text-center">
        <div class="reveal" data-variant="fade-up">
            <h1 class="font-heading text-accent-500 text-7xl sm:text-8xl md:text-9xl font-extrabold tracking-tight leading-none mb-6">404</h1>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="100">
            <h2 class="font-heading text-forest-800 text-2xl sm:text-3xl md:text-4xl font-bold tracking-tight mb-4">Page Not Found</h2>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="200">
            <p class="text-[#888888] text-sm sm:text-base leading-relaxed mb-10 max-w-md mx-auto">
                The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
            </p>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="300">
            <a href="{{ url('/') }}" class="btn-brand text-sm font-semibold px-8 py-3 rounded-full shadow-md transition-colors duration-200 inline-flex items-center gap-2">
                <span>Back to Home</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M6 4v16l14-8z"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
