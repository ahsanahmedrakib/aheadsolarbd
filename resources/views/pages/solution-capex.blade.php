@extends('layouts.app')

@php
    $pageTitle = 'CapEx Model';
    $metaDescription = 'Explore Ahead Solar\'s CapEx solar model - full ownership of your rooftop solar system, capital investment from your own source, and free electricity after payback.';
@endphp

@section('content')
<x-page-banner title="CapEx" titleAccent="Model" crumb="CapEx Model" image="/images/aheadsolar/banner.jpg" eyebrow="Solution" />

@php
    $features = [
        [
            'id' => '01.',
            'title' => 'Full Ownership',
            'description' => 'The roof owner owns the equipment outright once it has been fully paid off.',
            'd' => 'M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z',
        ],
        [
            'id' => '02.',
            'title' => 'Capital Investment',
            'description' => "Investment comes from the roof owner's own source or from the capital market.",
            'd' => 'M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z',
        ],
        [
            'id' => '03.',
            'title' => 'Free Electricity',
            'description' => 'Once the system is paid off, enjoy free electricity for the lifetime of the asset.',
            'd' => 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z',
        ],
    ];
@endphp

<section class="bg-white py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-x-hidden">
    <div class="solar-container space-y-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <div class="lg:col-span-6">
                <div class="reveal-image relative w-full aspect-4/3 rounded-lg overflow-hidden shadow-sm">
                    <img src="{{ url('/images/aheadsolar/about-1.jpg') }}" alt="Technicians installing and checking solar panels on a rooftop" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-6 space-y-6">
                <div class="reveal" data-variant="fade-up">
                    <span class="section-eyebrow">Our Solution</span>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Capital Expenditure <span class="text-accent-500">Model</span></h2>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed text-justify">With the CapEx model, the entire investment comes from the roof owner either from his own source of from capital market. Roof owner owns the equipment once it has been paid off and get free electricity after 10 years.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($features as $i => $feature)
                <div class="reveal" data-variant="fade-up" data-delay="{{ $i * 100 }}">
                    <div class="group bg-secondary rounded-lg p-6 sm:p-8 shadow-sm border border-white/60 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-500 flex flex-col justify-between relative overflow-hidden min-h-55 card-shine">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-[18px] text-white bg-accent-500 flex items-center justify-center shadow-sm transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['d'] }}"/></svg>
                            </div>
                            <span class="font-heading text-sm font-extrabold text-accent-500 tracking-wider">{{ $feature['id'] }}</span>
                        </div>

                        <div class="mt-6 space-y-2">
                            <h3 class="font-heading text-lg sm:text-xl font-bold text-accent-500 tracking-tight group-hover:text-accent-700 transition-colors duration-300">{{ $feature['title'] }}</h3>
                            <p class="text-xs sm:text-sm text-[#888888] font-medium leading-relaxed">{{ $feature['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative w-full overflow-hidden bg-forest-900 py-16 lg:py-24 font-sans">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat kenburns-active" style="background-image:url('{{ url('/images/aheadsolar/banner-2.jpg') }}')"></div>
    <div class="absolute inset-0 bg-forest-900/85"></div>

    <div class="relative z-10 solar-container flex flex-col items-center text-center">
        <div class="reveal" data-variant="fade-up">
            <span class="section-eyebrow mb-4">24/7 Support</span>
        </div>

        <div class="reveal" data-variant="fade-up" data-delay="100">
            <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-white tracking-tight leading-[1.1] max-w-3xl">Have Questions? We are Here to <span class="text-accent-500">Help You!</span></h2>
        </div>

        <div class="reveal" data-variant="fade-up" data-delay="200">
            <a href="/contact" class="btn-brand group mt-8">
                Learn More
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection