@extends('layouts.app')

@php
    $pageTitle = 'Our Management';
    $metaDescription = 'Meet the management team of Ahead Solar - experienced leaders driving Bangladesh\'s rooftop solar and energy storage revolution.';
@endphp

@section('content')
<x-page-banner title="Our" titleAccent="Management" crumb="Our Management" :crumb-parent="['label' => 'About Us', 'href' => '/about']" image="/images/aheadsolar/banner.jpg" eyebrow="Leadership" />

<section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16 items-center mb-16">
            <div class="lg:col-span-7 space-y-6">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">Our Management Team</span>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            The leaders driving our clean energy mission
                        </h2>
                    </div>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                        Our management team brings together decades of experience in solar engineering, energy storage, and sustainable business. Together, they set the strategic direction that keeps Ahead Solar at the forefront of Bangladesh&apos;s renewable energy transformation.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="reveal-image relative w-full h-72 sm:h-95 lg:h-115 rounded-lg shadow-lg" style="transition-delay:150ms">
                    <img src="{{ url('/images/about/team-image-1.jpg') }}" alt="Ahead Solar management team" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($team as $i => $member)
                @php $links = collect($member->social_links ?? [])->filter(); @endphp
                <div class="reveal group flex h-full flex-col overflow-hidden rounded-lg bg-secondary border border-accent-500 transition-all duration-300 hover:shadow-md" data-variant="fade-up" data-delay="{{ $i * 100 }}">
                    <div class="relative aspect-4/3 w-full overflow-hidden p-4 pb-0">
                        <div class="relative h-full w-full overflow-hidden rounded-lg">
                            <img src="{{ $member->image }}" alt="{{ $member->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-center px-6 py-8">
                        <h3 class="font-heading text-xl font-bold text-accent-500">{{ $member->name }}</h3>
                        <p class="mt-1 text-sm text-[#888888] font-medium">{{ $member->role }}</p>

                        <div class="mt-6 flex min-h-16 w-full items-center justify-center gap-3 pt-6 {{ $links->isNotEmpty() ? 'border-t border-forest-700/10' : '' }}">
                            @foreach ($links as $key => $url)
                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center transition-transform duration-300 hover:scale-110" aria-label="{{ ucfirst($key) }}">
                                    @switch($key)
                                        @case('facebook')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#1877F2"/><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z" fill="#ffffff"/></svg>
                                            @break
                                        @case('instagram')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#E4405F"/><g transform="translate(3,3) scale(0.75)"><rect x="3" y="3" width="18" height="18" rx="5" stroke="#ffffff" stroke-width="2.5" stroke-linejoin="round" fill="none"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" stroke="#ffffff" stroke-width="2.5" fill="none"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round"/></g></svg>
                                            @break
                                        @case('x')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#000000"/><g transform="translate(3,3) scale(0.75)"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.847h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.806l5.38 7.12 6.715-7.12zM17.61 20.644h2.039L6.486 3.24H4.298L17.61 20.644z" fill="#ffffff"/></g></svg>
                                            @break
                                        @case('linkedin')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#0A66C2"/><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.854 0-2.137 1.446-2.137 2.94v5.666H9.351V9.358h3.414v1.513h.048c.475-.9 1.633-1.85 3.36-1.85 3.593 0 4.256 2.363 4.256 5.437v5.994zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9.358h3.564v11.094z" fill="#ffffff"/></svg>
                                            @break
                                        @case('youtube')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#FF0000"/><g transform="translate(3,3) scale(0.75)"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" fill="#ffffff"/></g></svg>
                                            @break
                                    @endswitch
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative w-full overflow-hidden bg-white px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16 items-center">
            <div class="space-y-6 lg:col-span-7">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">Join The Team</span>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            Want to build a career in renewable energy?
                        </h2>
                    </div>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                        We are always looking for passionate engineers, technicians, and energy professionals who share our vision of a cleaner Bangladesh. If you believe in the power of sunshine, we&apos;d love to hear from you.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="reveal rounded-lg border border-white/60 bg-secondary p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)] text-center" data-variant="fade-up" data-delay="150">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-accent-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 17v2m3-2v2m3-2v2M4 8h16M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8M8 8V6a4 4 0 018 0v2"/></svg>
                    </div>
                    <h3 class="font-heading mt-6 text-xl font-bold text-accent-500">Open Positions</h3>
                    <p class="mt-3 text-sm text-[#888888] leading-relaxed">
                        Reach out with your resume and tell us how you can help power Bangladesh&apos;s solar future.
                    </p>
                    <a href="/contact" class="btn-brand group mt-6 inline-flex">
                        Contact Us
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection